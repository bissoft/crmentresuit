<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\DocumentUserElement;
use App\Models\DocumentUserResponse;
use App\Models\Folder;
use App\Models\SendDocument;
use App\User;
use App\Signature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;
use Spatie\PdfToText\Pdf;
use Validator;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('checkDocumentAttachFile', 'documentUserResponseStore', 'downloadFile','customerSign');
    }

    public function index()
    {
        if (Auth::user()->type == 'admin') {
            $folders = Folder::orderBY('name', 'asc')->get();
        } else {
            $folders = Folder::where('created_by', Auth::id())
                ->orderBY('name', 'asc')
                ->get();
        }
        foreach ($folders as $folder) {
            $document = Document::where('folder_id', $folder->id)->latest()->get();
            if ($document->count() > 0) {
                $folder->uploaded_date = $document[0]->created_at;
                $folder->document_number = $document->count();
                $folder->size = Document::where('folder_id', $folder->id)->sum('size');
            } else {
                $folder->uploaded_date = $folder->created_at;
                $folder->document_number = 0;
                $folder->size = 0;
            }
        }
        return view('documents.index', compact('folders'));
    }

    public function folderStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:folders',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $folder = Folder::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);
        if ($folder) {
            return back()->with('message', 'Folder Successfully Added');
        } else {
            return back()->with('danger', 'Error Inserting Folder');
        }
    }

    public function folderUpdate(Request $request)
    {
        $folder = Folder::where('id', $request->folder_id)->first();
        if ($folder) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:folders,name,' . $folder->id,
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $folder->name = $request->name;
            if ($folder->save()) {
                return back()->with('message', 'Folder Successfully Updated.');
            } else {
                return back()->with('danger', 'Error Inserting Folder');
            }
        } else {
            return back()->with('danger', 'No such folder found.');
        }
    }

    public function folderBYId($id)
    {
        return Folder::where('id', $id)->first();
    }

    public function removeFolder($id)
    {
        $folder = Folder::where('id', $id)->first();
//        $template->deleted_by = Auth::user()->id;
//        $template->save();
        if ($folder->forceDelete()) {
            return back()->with('message', 'Folder Successfully Deleted!');
        } else {
            return back()->with('message', 'Error Deleting Folder.');
        }
    }

    public function create($id)
    {
        $documents = Document::with('user', 'signature')->where('folder_id', $id)->get();
        $folders = Folder::all();
        return view('documents.create', compact('id', 'documents', 'folders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf',
            'folder_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $document = null;
        $type = null;
        if ($request->has('file')) {
            $image = $request->file('file');
            $filepdf = fopen($image, "r");
            if ($filepdf) {
                $line_first = fgets($filepdf);
                // extract number such as 1.4 ,1.5 from first read line of pdf file
                preg_match_all('!\d+!', $line_first, $matches);
                // save that number in a variable
                $pdfversion = implode('.', $matches[0]);
//                    echo $pdfversion;
                fclose($filepdf);
                // if ($pdfversion > "1.4") {
                //     $message = "PDF file version is greater the 1.4 which wasn't supported by FPDI.";
//                    echo $pdfversion . " PDF file version is greater the 1.4 which wasn't supported by FPDI.
//                        We are still working on it. Thanks for your patience.";
//                    exit();
                // } else {
                    $size = $image->getSize();
                    $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
                    $name = explode('.', $namewithextension)[0];
                    $fileName = 'document-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path() . '/assets/files/documents';
                    $image->move($destinationPath, $fileName);
                    $type = "Pdf";
                    $path = $destinationPath . '/' . $fileName;
                    $totoalPages = $this->countPages($path);
                    $document = Document::create([
                        'name' => $name,
                        'category' => $request->category,
                        'folder_id' => $request->folder_id,
                        'extension' => $image->getClientOriginalExtension(),
                        'file' => $fileName,
                        'type' => $type,
                        'size' => $size,
                        'pages' => $totoalPages,
                        'created_by' => $request->user_id,
                        'expiry' => $request->expiry,
                        'contract_id' => $request->cid,
                    ]);

                    $user = User::where('id', $request->user_id)->first();

                    DocumentUser::create([
                        'document_id' => $document->id,
                        'name' => $user->name(),
                        'email' => $user->email,
                        'cc' => $request->cc,
                        'created_by' => $request->user_id,
                    ]);

                    $message = "Document Successfully Added";
                // }
            } else {
                $message = "Error Inserting Document";
            }
        } else {
            $message = "Error! No Document Found";
        }

        return back()->with('message', $message);

    }

    public function documentBYId($id)
    {
        return Document::where('id', $id)->first();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'folder_id' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $document = Document::where('id', $request->document_id)->first();
        if ($request->has('file')) {
            $image = $request->file('file');
            $filepdf = fopen($image, "r");
            if ($filepdf) {
                $line_first = fgets($filepdf);
                // extract number such as 1.4 ,1.5 from first read line of pdf file
                preg_match_all('!\d+!', $line_first, $matches);
                // save that number in a variable
                $pdfversion = implode('.', $matches[0]);
//                    echo $pdfversion;
                fclose($filepdf);
                if ($pdfversion > "1.4") {
                    $message = "PDF file version is greater the 1.4 which wasn't supported by FPDI.";
//                    echo $pdfversion . " PDF file version is greater the 1.4 which wasn't supported by FPDI.
//                        We are still working on it. Thanks for your patience.";
//                    exit();
                } else {
                    File::delete(asset('assets/files/documents/' . $document->file));
                    $size = $image->getSize();
                    $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
                    $name = explode('.', $namewithextension)[0];
                    $fileName = 'document-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path() . '/assets/files/documents';
                    $image->move($destinationPath, $fileName);
                    $type = "Pdf";
                    $path = $destinationPath . '/' . $fileName;
                    $totoalPages = $this->countPages($path);
                    $document->name = $name;
                    $document->file = $fileName;
                    $document->type = $type;
                    $document->size = $size;
                    $document->pages = $totoalPages;
                    $document->extension = $image->getClientOriginalExtension();
                    $message = "Document Successfully Updated!";
                }
            }
        }
        $document->folder_id = $request->folder_id;
        $document->updated_by = Auth::id();

        if ($document->save()) {
            return back()->with('message', $message);
        } else {
            return back()->with('danger', "Error Updating Document");
        }
    }

    public function remove($id)
    {
        $document = Document::where('id', $id)->first();
        $document->deleted_by = Auth::id();
        $document->save();
        if ($document->forceDelete()) {
            return back()->with('message', 'Document Successfully Trashed!');
        } else {
            return back()->with('message', 'Error Deleting Document.');
        }
    }

    function countPages($path)
    {
        $pdftext = file_get_contents($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }

    public function modifyDocument($id)
    {
        $document = Document::where('id', $id)->first();
//        dd($document);
        $users = DocumentUser::where('document_id', $id)->get();
        return view('documents.modify', compact('id', 'document', 'users'));
    }
    
    public function customerSign($id,$email)
    {   
        $document = Document::where('id', $id)->first();
//        dd($document);
        $users = DocumentUser::where('document_id', $id)->where('email',$email)->get();
        //dd($users);
        return view('documents.signature', compact('id', 'document', 'users'));
    }

    
    public function addDocumentUser(Request $request)
    {
        $validate = array(
            'name' => 'required',
            'email' => 'required',
            'document_id' => 'required'
        );

        $error = Validator::make($request->all(), $validate);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $user = DocumentUser::create([
            'document_id' => $request->document_id,
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'created_by' => Auth::id(),
        ]);

        if ($user) {
            return response()->json(['success' => 'User add successfully.']);
        } else
            return response()->json(['fail' => 'Error adding user.']);
    }

    public function editDocumentUser(Request $request)
    {
        $validate = array(
            'name' => 'required',
            'email' => 'required',
            'document_user_id' => 'required'
        );

        $error = Validator::make($request->all(), $validate);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $user = DocumentUser::where('id', $request->document_user_id)->first();
        if (isset($user)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cc = $request->cc;
            if ($user->save()) {
                return response()->json(['success' => 'User update successfully.']);
            } else {
                return response()->json(['fail' => 'Error updating user.']);
            }
        } else {
            return response()->json(['fail' => 'No such user found.']);
        }
    }

    function getDocumentUsers($id)
    {
        $users = DocumentUser::where('document_id', $id)->get();
        return $users;
    }

    function getDocumentUserDetails($id)
    {
        $user = DocumentUser::where('id', $id)->first();
        return $user;
    }

    function deleteDocumentUser($id)
    {
        $user = DocumentUser::where('id', $id)->forceDelete();
        if ($user) {
            return response()->json(['success' => 'User Deleted successfully.']);
        } else {
            return response()->json(['fail' => 'Error deleting User.']);
        }
    }

    function sendDocumentUser($id)
    {
        $users = DocumentUser::select('document_users.*', 'documents.file')
            ->leftjoin('documents', 'documents.id', '=', 'document_users.document_id')
            ->where('document_id', $id)
            ->get();
        foreach ($users as $user) {
            $data['id']     =$id;
            $data['user_id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['cc'] = $user->cc;
            $data['document_id'] = $user->document_id;
            $data['invited_by'] = Auth::user()->first_name . " " . Auth::user()->last_name;
            $data['link'] = asset('/assets/files/documents/' . $user->file);
            Mail::to($user->email)->send(new \App\Mail\SendDocument($data));
        }
        return back()->with('message', 'Email sent successfully.');
    }

    function getDocumentElements($id, $page, $user_id)
    {
        $elements = DocumentUserElement::where('document_id', $id)
            ->where('page_no', $page)
            ->where('user_id', $user_id)->with(['signature'])
            ->get();
        return $elements;
    }

    public function addDocumentUserElement(Request $request)
    {
        $validate = array(
            'type' => 'required',
            'document_id' => 'required'
        );

        $error = Validator::make($request->all(), $validate);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $document = Document::find($request->document_id);

        if ($request->type == 'signature') {
            $user = DocumentUserElement::create([
                'document_id' => $request->document_id,
                'user_id' => $request->user_id,
                'type' => $request->type,
                'top' => ($request->signatureTop),
                'left_distance' => $request->signatureLeft,
                'height' => $request->signatureHeight,
                'width' => $request->signatureWidth,
                'page_no' => $request->signaturePage,
                'total_pages' => $request->signatureTotalPages,
                'description' => $request->description,
                'created_by' => $document->created_by,
            ]);
        } elseif ($request->type == 'text') {
            $user = DocumentUserElement::create([
                'document_id' => $request->document_id,
                'user_id' => $request->user_id,
                'type' => $request->type,
                'top' => $request->textTop,
                'left_distance' => $request->textLeft,
                'height' => $request->textHeight,
                'width' => $request->textWidth,
                'page_no' => $request->textPage,
                'total_pages' => $request->textTotalPages,
                'description' => $request->description,
                'created_by' => Auth::id(),
            ]);
        }


        if ($user) {
            return response()->json(['success' => 'Documents is saved and ready to send.']);
        } else
            return response()->json(['fail' => 'Error adding Element.']);
    }

    function deleteDocumentElement($id)
    {
        $temp = DocumentUserElement::where('id', $id)->forceDelete();
        if ($temp) {
            return response()->json(['success' => 'Element Deleted successfully.']);
        } else {
            return response()->json(['fail' => 'Error deleting Element.']);
        }
    }

    function sendDocumentToUsers($id)
    {
        $document = Document::where('id', $id)
            ->first();
        if (isset($document)) {
            $users = DocumentUser::where('document_id', $id)->get();
            foreach ($users as $user) {
                $datetime = new \DateTime('+30day');
                $expired_at = $datetime->format('Y-m-d H:i:s');
                $send = SendDocument::create([
                    'document_id' => $document->id,
                    'user_id' => $user->id,
                    'type' => 'Email',
                    'expired_at' => $expired_at,
                    'last_send_at' => date('Y-m-d H:i:s'),
                    'created_by' => Auth::id(),
                ]);
                if ($send) {
                    $data = array();
                    $data['user_id'] = $user->id;
                    $data['name'] = $user->name;
                    $data['email'] = $user->email;
                    $data['document_id'] = $document->id;
                    $data['invited_by'] = Auth::user()->first_name . " " . Auth::user()->last_name;
                    $data['link'] = url('document/check-file/' . $document->id . '/' . $user->id . '/' . $send->id);
                    Mail::to($user->email)->send(new \App\Mail\SendDocument($data));
                }
            }
        }

        return redirect()->back()->with('message', "Schedule send Successfully!");
    }

    public function checkDocumentAttachFile($id, $user_id, $send_id)
    {
        $text = false;
        $signature = false;
        $message = "No such schedule and sender find.";
        $sendTemp = SendDocument::where('id', $send_id)->first();
        if (isset($sendTemp)) {
            if ($sendTemp->status != "Expired") {
                $date = new Carbon();
                if ($date > $sendTemp->expired_at) {
                    $sendTemp->status = "Expired";
                    $sendTemp->save();
                    $message = "Document Link Expired Please ask for new one.";
                    return view('message', compact('message'));
                } else {
                    if ($sendTemp->status == "Complete" || $sendTemp->status == "Completed") {
                        $message = "You already have given the response against this document.";
                        return view('message', compact('message'));
                    } else if ($sendTemp->status == "Pending" || $sendTemp->status == 'Read' || $sendTemp->status == 'No Signer Assign') {
                        $scheduleElement = DocumentUserElement::where('document_id', $id)
                            ->where('user_id', $user_id)
                            ->distinct('type')
                            ->get();
                        foreach ($scheduleElement as $schedule) {
                            if ($schedule->type == 'text') {
                                $text = true;
                            }
                            if ($schedule->type == 'signature') {
                                $signature = true;
                            }
                        }
                        if ($signature == false && $text == false) {
                            $sendTemp->status = "No Signer Assign";
                            $sendTemp->save();
                            $message = "Because document didn't assign any signer, so that's why won't be able to take signature from " . $sendTemp->user_type . ".";
                            return view('message', compact('message'));
                        }
                        $sendTemp->status = "Read";
                        $sendTemp->save();
                        return view('documents.document-response', compact('id', 'user_id', 'send_id', 'scheduleElement', 'text', 'signature'));
                    }
                }
            } else {
                $message = "Schedule Link Expired Please ask for new one.";
//                return view('message', compact('message'));
            }
        }
        return view('message', compact('message'));
    }

    public function documentUserResponseStore(Request $request)
    {
        $signature = null;
        $result = array();
//        dd($request->sign_data);
        if ($request->sign_data) {
            $image = $request->sign_data;  // your base64 encoded
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = md5(date("dmYhisA"));
//            File::put(asset('assets/images/signature/'). '/' . $imageName.'.jpeg', base64_decode($image));
            Storage::disk('public')->put('/images/signature/' . $imageName . '.jpeg', base64_decode($image));
            $signature = $imageName . '.jpeg';
        }
        $schedule = DocumentUserResponse::where('document_id', $request->document_id)
            ->where('user_id', $request->user_id)->first();
        if (!$schedule) {
            $schedule = DocumentUserResponse::create([
                'signature' => $signature,
                'text' => ($request->name != '' && $request->name != 'undefined') ? $request->name : '',
                'document_id' => $request->document_id,
                'user_id' => $request->user_id,
                'send_document_id' => $request->send_id,
            ]);
            $sendTemp = SendDocument::where('id', $request->send_id)->first();
            $sendTemp->status = "Completed";
            $sendTemp->save();
            if ($schedule) {
                $result['status'] = 1;
                $result['msg'] = 'Signature Created Successfully.';
                echo json_encode($result);
                exit;
            } else {
                $result['status'] = 0;
                $result['msg'] = 'Error! Signature Not Added.';
                echo json_encode($result);
                exit;
            }
        } else {
            $result['status'] = 2;
            $result['msg'] = 'Signature already exist.';
            echo json_encode($result);
            exit;
        }
    }

    public function downloadFile($id, $user_id, $send_id)
    {
        
        $schedule = Document::where('id', $id)->first();
        
        if (isset($schedule)) {
            $pages = $schedule->pages;
            $pdf = new \setasign\Fpdi\Fpdi();
            $file = base_path() . '/public/assets/files/documents/' . $schedule->file;
            
            for ($i = 0; $i < $pages; $i++) {
                $templateElement = DocumentUserElement::where('document_id', $id)
                    ->where('user_id', $user_id)
                    ->where('page_no', $i + 1)
                    ->get();
                $templateResponse = DocumentUserResponse::where('document_id', $id)
                    ->where('user_id', $user_id)->first();
               // dd($templateResponse);
                // add a page
                $pdf->AddPage();
                // set the source file
                $fileContent = file_get_contents($file, 'rb');
                //dd($templateResponse);

                $pdf->setSourceFile(StreamReader::createByString($fileContent));
                // $pdf->setSourceFile($file);
                $tplId = $pdf->importPage($i + 1);
                // use the imported page and place it at point 10,10 with a width of 100 mm
                $pdf->useTemplate($tplId);
                // $pdf->Image('resources/lantern.png', 50, 50, 100, '', '', '', '', false, 300);
                 
                if ($templateResponse) {
                    foreach ($templateElement as $item) {
                        
                        $item->top = (($item->top * 25.4) / 96) - 5;
                        $item->left_distance = (($item->left_distance * 25.4) / 96) - 19;
                        if ($item->type == 'signature') {
                            $item->width = (($item->width * 25.4) / 96);
                            $item->height = (($item->height * 25.4) / 96);
                            $pdf->Image(base_path() . '/storage/app/public/images/signature/' . $templateResponse->signature, $item->left_distance, $item->top, $item->width, $item->height, 'png');
//                    $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',$item->top,$item->left_distance,90,0,'PNG');
                        }
                        if ($item->type == 'text') {
                            $pdf->SetFont('Helvetica', '', 12); // Font Name, Font Style (eg. 'B' for Bold), Font Size
                            $pdf->SetTextColor(0, 0, 0); // RGB
                            $pdf->SetXY($item->left_distance, $item->top + 23); // X start, Y start in mm
                            $pdf->Write(0, $templateResponse->text);
                        }
                    }
                }
            }
            // $pdf->Output();
            // Storage::put('assets/files/documents/'. $schedule->file, $pdf->output());
            $pdf->Output($schedule->file,'D');
            exit;
        } else {
            return redirect()->to(asset('/assets/files/documents/' . $schedule->file));
        }
    }

    public function renameDocument(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'document_id' => 'required',
            'rename' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $document = Document::where('id', $request->document_id)->first();

        $document->name = $request->rename;
        $document->updated_by = Auth::id();

        if ($document->save()) {
            return back()->with('message', "Document Successfully Renamed!");
        } else {
            return back()->with('danger', "Error Renaming Document");
        }
    }

    public function getDownload($id)
    {
        $document = Document::where('id', $id)->first();
        if (isset($document)) {
            $file = public_path() . '/assets/files/documents/' . $document->file;
            $headers = [
                'Content-Type' => 'application/pdf',
            ];
            return response()->download($file, $document->name . '.' . $document->extension, $headers);
        } else {
            return back()->with('danger', "Error Downloading Document");
        }
    }

    public function gotItHowToAddUser()
    {
        $user = User::where('id', Auth::id())->first();
        $user->add_document = 1;
        $user->save();
        return true;
    }

    public function gotItHowToAddUserSignature()
    {
        $user = User::where('id', Auth::id())->first();
        $user->add_document_user = 1;
        $user->save();
        return true;
    }

    public function gotItHowToAddSignatureBox()
    {
        $user = User::where('id', Auth::id())->first();
        $user->add_signature_box = 1;
        $user->save();
        return true;
    }

    function searchFolder(Request $request)
    {
        $search = $request->search;

        if (Auth::user()->type == 'admin') {
            $folders = Folder::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->orderBY('name', 'asc')->get();
        } else {
            $folders = Folder::where('created_by', Auth::id())
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->orderBY('name', 'asc')
                ->get();
        }
        foreach ($folders as $folder) {
            $document = Document::where('folder_id', $folder->id)->latest()->get();
            if ($document->count() > 0) {
                $folder->uploaded_date = $document[0]->created_at;
                $folder->document_number = $document->count();
                $folder->size = Document::where('folder_id', $folder->id)->sum('size');
            } else {
                $folder->uploaded_date = $folder->created_at;
                $folder->document_number = 0;
                $folder->size = 0;
            }
        }
        return view('documents.index', compact('folders'));
    }

    function suggestionSearch(Request $request)
    {
        $search = $request->search;

        if (Auth::user()->type == 'admin') {
            $folders = Folder::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->get();
        } else {
            $folders = Folder::where('created_by', Auth::id())
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })->get();
        }
        $data = array();
        foreach ($folders as $folder) {
            $data[] = $folder->name;
        }
        return $data;
    }

    public function documentResponseList($id)
    {
        $documents = SendDocument::select('send_documents.*',
            'documents.name',
            'documents.file',
            'documents.extension',
            'documents.type',
            'documents.size',
            'documents.pages',
            'documents.folder_id')
            ->leftjoin('documents', 'documents.id', '=', 'send_documents.document_id')
            ->where('send_documents.document_id', $id)
            ->latest()
            ->paginate(10);
        $folders = Folder::all();
        return view('documents.response-files', compact('documents', 'folders', 'id'));
    }
    
    public function documentSignature(Request $request)
    {
        $doc_u_elem = DocumentUserElement::find($request->id);

        $data = new Signature;
        $data->d_u_elements= $request->id;
        $data->document_id= $doc_u_elem->document_id;
        $data->sign=$request->dataUrl;
        $data->type=$request->type;
        $data->save();

        $signature = null;
        $result = array();
//        dd($request->sign_data);
        if ($request->signImg) {
            $image = $request->dataUrl;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = md5(date("dmYhisA"));
//            File::put(asset('assets/images/signature/'). '/' . $imageName.'.jpeg', base64_decode($image));
            // $image->storeAs('public/images/signature', $imageName . '.jpeg');
            Storage::disk('public')->put('/images/signature/' . $imageName . '.png', base64_decode($image));
            $signature = $imageName . '.png';
        }

        $response = DocumentUserResponse::where('document_id', $request->document_id)
            ->where('user_id', $doc_u_elem->user_id)->first();
        if (!$response) {
            $response = DocumentUserResponse::create([
                'signature' => $signature,
                'text' => ($request->name != '' && $request->name != 'undefined') ? $request->name : '',
                'document_id' => $doc_u_elem->document_id,
                'user_id' => $doc_u_elem->user_id
            ]);
        }
       
        return response($data);
    }

    public function documentText(Request $request)
    {
        $data= new Signature;
        $data->d_u_elements= $request->id;
        $data->sign=$request->dataUrl;
        $data->type=$request->type;
        $data->save();
       
        return response($data);
    }

    public function documentImage(Request $request)
    {
        
        $data= new Signature;
        if ($request->has('file')) {
          
                        $image = $request->file('file');
                        
                        $fileName = 'product-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path() . '/assets/img';
                        $image->move($destinationPath, $fileName);
                        //$user->picture = $fileName;
                    }

        $data->d_u_elements= $request->sign_id3;
        $data->sign=$fileName;
        $data->type=$request->typethree;
        $data->save();
       
        return response($data);
    }

    public function uploadDocument($id)
    {
        $cid = 2;
        $user = User::with('documents')->where('id', $id)->first();
        
        return view('document', compact('user','cid'));
    }

    

    public function documents(Request $request)
    {
        $documents = Document::where('category', $request->category)
            ->where('created_by', $request->staff_id)
            ->get();
        
        $staff_id = $request->staff_id;
        return view('staff.documents', compact('documents', 'staff_id'));
    }
    
    public function contract($id)
    {
        $documents = Document::where('category', 'document')
            ->where('created_by',auth()->user()->id)->where('contract_id',$id)
            ->get();
        
        $staff_id = auth()->user()->id;
        $contact_id=$id;
        return view('staff.documents', compact('documents', 'staff_id','contact_id'));
    }
}
