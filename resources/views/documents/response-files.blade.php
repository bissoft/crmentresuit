@extends('layouts.admin.master')
@section('header')
    <h5 class="text-white">
        <i class="icon-files-o"></i>
        Folder Files
    </h5>
@endsection
@section('content')
    <div class="page height-full">
        <div class="container-fluid animatedParent animateOnce my-3">
            <div class="animated fadeInUpShort">
                <div class=" justify-content-end d-flex">
                    <div class="dropdown mr-3">
                        <button class="btn bg-transparent dropdown-toggle border" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Upload
                        </button>
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
                                            <select name="folder_id" class="custom-select select2" required>
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
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-transparent border" data-toggle="modal"
                            data-target="#newFolderUpload">
                        New Folder
                    </button>

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
                                        <select name="folder_id" id="folder_id" class="custom-select select2"
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
                <section class="paper-card mt-2">
                    <div class="row mt-2">
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="table-responsive my-2 pdf-table bg-white ">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Type</th>
                                            <th>Index</th>
                                            <th>File</th>
                                            <th>Name</th>
                                            <th>Pages</th>
                                            <th>Data Size</th>
                                            <th>Status</th>
                                            <th>Send Date</th>
                                        </tr>
                                        @foreach($documents as $index => $document)
                                            <tr>
                                                <td>
                                                    @if($document->type == 'Pdf')
                                                        <i style="font-size: 28px;"
                                                           class="icon icon-document-file-pdf2"></i>
                                                    @else
                                                        <i style="font-size: 28px;" class="icon icon-folder_shared"></i>
                                                    @endif
                                                </td>
                                                <td>{{$document->folder_id.'.'.$document->document_id.'.'.($index+1)}}</td>
                                                <td>
                                                    <a href="{{route('download.document.file',[$document->document_id,$document->user_id,$document->id])}}"
                                                       target="_blank" title="check file">
                                                        <i class="icon icon-check-square-o"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{asset('assets/files/documents/'.$document->file)}}"
                                                       target="_blank" style="font-size: 15px">
                                                        {{$document->name.'.'.$document->extension}}
                                                    </a>
                                                </td>
                                                <td>{{$document->pages}}</td>
                                                <td>{{HumanReadable::bytesToHuman($document->size)}}</td>
                                                <td>{{$document->status}}</td>
                                                <td>{{date('m/d/Y',strtotime($document->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

            </div>
        </div>
    </div>
@endsection
@section('script')
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