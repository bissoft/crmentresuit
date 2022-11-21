@extends('layouts.dashboard')

@section('content')
    <div class="row gigs">
        <div class="col-xl-9 col-xxl-12">
            <div class="p-2 bg-white rounded shadow mb-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="font-accent mb-3 mt-3">Folder Files</h3>
                    <div>
                        <div class=" justify-content-end d-flex">
                            <div class="dropdown mr-3">
                                <!-- <button class="btn bg-transparent dropdown-toggle border" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Upload
                                </button> -->
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                            data-target="#addNewDocument">Upload Doc
                                    </button>
                                </div>
                                <div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Upload Documents</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('document.store')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <select name="folder_id" class="form-control select2" required>
                                                        <option value="">Select Folders</option>
                                                        @foreach($folders as $folder)
                                                            <option value="{{$folder->id}}">
                                                                {{$folder->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" id="documentFile"
                                                               accept="application/pdf" name="file" required>
                                                        <label class="custom-file-label" for="customFile" id="imgthumbnail">
                                                            Choose file
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn bg-transparent border" data-toggle="modal"
                                    data-target="#newFolderUpload">
                                New Folder
                            </button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="newFolderUpload" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Create Folder</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('folder.store')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Folder Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                           placeholder="Enter Folder Name" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="editDocumentUpload" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('document.update')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_id" id="document_id" value="">
                                            <div class="modal-body">
                                                <select name="folder_id" id="folder_id" class="form-control select2"
                                                        required>
                                                    <option value="">Select Folders</option>
                                                    @foreach($folders as $folder)
                                                        <option value="{{$folder->id}}">
                                                            {{$folder->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="documentFile1"
                                                           accept="application/pdf" name="file">
                                                    <label class="custom-file-label" for="documentFile1" id="imgthumbnail1">
                                                        Choose file
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="renameDocumentUpload" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Rename Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('document.rename')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_id" id="document_id1" value="">
                                            <div class="modal-body">
                                                <input type="text" name="rename" id="rename" value="" required
                                                       class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body px-2">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                @if (session()->has('danger'))
                                    <div class="alert alert-danger">
                                        {{session('danger')}}
                                    </div>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success ">
                                        {{session('message')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <!-- <th>Action</th> -->
                                    <th>Type</th>
                                    <!-- <th>Index</th> -->
                                    <th>Sign</th>
                                    <th>Name</th>
                                    <th>Pages</th>
                                    <th>Data Size</th>
                                    <th>Uploaded Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $index => $document)
                                    <tr>
                                        <!-- <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" x-placement="top-start"
                                                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-90px, -53px, 0px);">
                                                    <a class="dropdown-item"
                                                       onclick="return confirm('Are you sure! You want to delete this file?')"
                                                       href="{{route('document.remove',$document->id)}}">
                                                        Delete
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                            onclick="editDocument('{{$document->id}}')"
                                                            data-target="#editDocumentUpload">Update
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                            onclick="renameDocument('{{$document->id}}')"
                                                            data-target="#renameDocumentUpload">Rename
                                                    </button>
                                                    <a href="{{route('document.download',$document->id)}}"
                                                       class="dropdown-item">
                                                        Download
                                                    </a>
                                                    <a href="{{route('document.response.list',$document->id)}}"
                                                       class="dropdown-item">
                                                        Response List
                                                    </a>
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>
                                            @if($document->type == 'Pdf')
                                                <i style="font-size: 28px;"
                                                   class="fa fa-file-pdf"></i>
                                            @else
                                                <i style="font-size: 28px;" class="fa fa-file"></i>
                                            @endif
                                        </td>
                                        <!-- <td>{{$document->folder_id.'.'.($index+1)}}</td> -->
                                        <td>
                                            @if(!$document->signature)
                                                <a href="{{route('document.modify',$document->id)}}"
                                                   target="_blank">
                                                    Sign<i class="fa fa-pencil"></i>
                                                </a>
                                            @else
                                                <span class="text-success">Signed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$document->signature)
                                                <a href="{{asset('assets/files/documents/'.$document->file)}}"
                                                   target="_blank" style="font-size: 15px">
                                                    {{$document->name.'.'.$document->extension}}
                                                </a>
                                            @else
                                                <a href="{{route('download.document.file',[$document->id,$document->user->id,$document->created_by])}}"
                                                   target="_blank" style="font-size: 15px">
                                                    {{$document->name.'.'.$document->extension}}
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{$document->pages}}</td>
                                        <td>{{App\Helpers\HumanReadable::bytesToHuman($document->size)}}</td>
                                        <td>{{date('m/d/Y',strtotime($document->created_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End lined tabs -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var base_url = $('meta[name="base-url"]').attr('content');
        $(function () {
            $('#documentFile').on('change', function () {
                var file = $(this).get(0).files;
                $("#imgthumbnail").html(file[0].name);
            });
            $('#documentFile1').on('change', function () {
                var file = $(this).get(0).files;
                $("#imgthumbnail1").html(file[0].name);
            });
        });

        function editDocument(id) {
            // alert(id);
            $.ajax({
                type: 'GET',
                url: base_url + '/document/details/' + id,
                success: function (response) {
                    // console.log(response.name);
                    $('#folder_id option[value="' + response.folder_id + '"]').prop('selected', 'selected').change();
                    $('#document_id').val(response.id);
                    $('#imgthumbnail1').html(response.name + '.' + response.extension);
                }
            });
        }

        function renameDocument(id) {
            // alert(id);
            $.ajax({
                type: 'GET',
                url: base_url + '/document/details/' + id,
                success: function (response) {
                    // console.log(response.name);
                    $('#document_id1').val(response.id);
                    $('#rename').val(response.name);
                }
            });
        }

    </script>
@endsection