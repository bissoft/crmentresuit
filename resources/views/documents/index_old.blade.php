@extends('layouts.admin.master')

@section('content')
    <div class="page height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4><i class="icon-table"></i> Folders</h4>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-wrapper animatedParent animateOnce">
            <div class="container">
                <section class="paper-card">
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-outline-primary btn-sm float-sm-right ml-2"
                               href="#" data-toggle="modal" data-target="#myModal">
                                <i class='icon icon-plus pr-0'></i>
                                Add Folder
                            </a>
                            {{--<a class="btn btn-outline-danger btn-sm float-sm-right ml-2"
                               href="{{route('city.trash')}}">
                                <i class='icon icon-trash pr-0'></i> Trash Folders
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
                                        @foreach($folders as $folder)
                                            <div class="col-md-1">
                                                <a href="{{route('document.create',$folder->id)}}">
                                                    <img src="{{asset('images/folder.svg')}}"/>
                                                    {{$folder->name}}
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
                    <h4 class="modal-title">Create Folder</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('folder.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="form-control-label">Folder Name: </label>
                                <input type="text" id="folderName" name="name" class="form-control "
                                       value="" required/>
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
    <script>
        function confirmDelete(id) {
            let choice = confirm('Are you sure, You want to delete ?');
            if (choice) {
                document.getElementById('delete-template-' + id).submit();
            }
        }

        const toDataURL = url => fetch(url)
            .then(response => response.blob())
            .then(blob => new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.onloadend = () => resolve(reader.result)
                reader.onerror = reject
                reader.readAsDataURL(blob)
            }));

        function convertFile1(file) {
            if (file) {
                toDataURL(file)
                    .then(dataUrl => {
                        // console.log('RESULT:', dataUrl)
                    })
            }
        }
    </script>
@endsection