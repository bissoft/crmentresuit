@extends('layouts.admin')
@section('style')

@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('demo-video.index')}}">Intro Videos</a></li>
                                @if(isset($list))
                                    <li class="breadcrumb-item active">Edit Intro Video</li>
                                @else
                                    <li class="breadcrumb-item active">Add Intro Video</li>
                                @endif
                            </ol>
                        </div>
                        @if(isset($list))
                            <h4 class="page-title">Edit Intro Video</h4>
                        @else
                            <h4 class="page-title">Add Intro Video</h4>
                        @endif
                    </div>
                </div>
            </div> --}}
            <!-- calnder row -->
            <div class="bg-gray col-12">

                <div class="card p-4">
                    <form role="form" method="post" class="form-horizontal form-groups-bordered validate"
                          action="@if(isset($list)){{ route('demo-video.update',$list) }}
                          @else{{ route('demo-video.store') }}@endif" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
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
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Heading</label>
                                <div class="col-sm-12">
                                    <input type="text" name="heading" class="form-control" id="heading"
                                           value="{{@$list->heading}}"
                                           placeholder="Heading">
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label for="picture" class="col-sm-3 control-label">Picture</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" name="picture" accept="image/*"
                                               class="custom-file-input" id="picture">
                                        <label class="custom-file-label" id="pictureLabel" for="picture">{{(isset($list->picture))?$list->picture:"Choose file"}}</label>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label for="video" class="col-sm-3 control-label">Video</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" name="video" accept="video/*"
                                               class="custom-file-input" id="video">
                                        <label class="custom-file-label" id="videoLabel" for="video">{{(isset($list->video))?$list->video:"Choose file"}}</label>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea name="description" id="description" cols="30" rows="6"
                                              class="form-control">{{@$list->description}}</textarea>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group default-padding float-right">
                                        @if(isset($list))
                                            <button type="submit" class="btn mt-2 btn-outline-danger">Update</button>
                                        @else
                                            <button type="submit" class="btn mt-2 btn-outline-danger">Save</button>
                                        @endif
                                        <a type="submit" class="btn mt-2 btn-outline-dark"
                                           href="{{route('demo-video.index')}}">Cancel</a>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#picture').on('change', function () {
                var file = $(this).get(0).files;
                $("#pictureLabel").html(file[0].name);
            });
            $('#video').on('change', function () {
                var file = $(this).get(0).files;
                $("#videoLabel").html(file[0].name);
            });
        });

    </script>
@endsection