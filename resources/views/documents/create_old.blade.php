@extends('layouts.admin.master')
@section('style')
    <style>
        .ck-content {
            height: 200px;
            overflow: auto;
        }
    </style>
@endsection

@section('content')
    <div class="page height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4><i class="icon-table"></i> Documents</h4>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-wrapper animatedParent animateOnce">
            <div class="container">
                <section class="paper-card">
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-outline-danger btn-sm float-sm-right ml-2"
                               href="{{route('document.index')}}">
                                <i class='icon icon-arrow-circle-left pr-0'></i>
                                Back
                            </a>
                            <a class="btn btn-outline-primary btn-sm float-sm-right ml-2"
                               href="#" data-toggle="modal" data-target="#myModal">
                                <i class='icon icon-plus pr-0'></i>
                                Add Documents
                            </a>
                            {{--<a class="btn btn-outline-danger btn-sm float-sm-right ml-2"
                               href="{{route('city.trash')}}">
                                <i class='icon icon-trash pr-0'></i> Trash Documents
                            </a>--}}
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            @if (session()->has('danger'))
                                <div class="alert alert-danger text-white bg-red">
                                    {{session('danger')}}
                                </div>
                            @endif
                            @if (session()->has('message'))
                                <div class="alert alert-success text-white bg-green">
                                    {{session('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        {{--<div class="col-md-2">
                                            <i class="icon icon-folder-3 s-128"></i>
                                            Test
                                        </div>--}}
                                        @foreach($documents as $document)
                                            <div class="col-md-1">
                                                <a href="{{asset('assets/files/documents/'.$document->file)}}"
                                                   target="_blank"
                                                   title="{{$document->name.'.'.$document->extension}}">
                                                    <img src="{{asset('images/pdf.svg')}}"/>
                                                    {{$document->name}}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
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
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Document</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="folder_id" value="{{@$id}}">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="form-control-label">Document: </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="documentFile" name="file"
                                           required="" accept="application/pdf">
                                    <label class="custom-file-label" for="file" id="imgthumbnail">Choose file...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#documentFile').on('change', function () {
                var file = $(this).get(0).files;
                $("#imgthumbnail").html(file[0].name);
            });
        });

    </script>
@endsection