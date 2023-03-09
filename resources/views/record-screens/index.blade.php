@extends('layouts.admin')
@section('page-title')
    {{__('Demo Videos')}}
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row mt-2">
                @if(\Auth::guard('customer')->check())
                @elseif(\Auth::guard('vender')->check())
                @else
                <div class="col-md-12 float-right">
                        <a class="btn btn-outline-primary btn-sm float-right ml-2 mb-2"
                           href="{{route('demo-video.create')}}">
                            <i class='fa fa-plus'></i> Add Intro Video</a>
                    <a class="btn btn-outline-danger btn-sm float-right ml-2 mb-2"
                       href="{{route('demo-video.trash')}}">
                        <i class='fa fa-trash'></i> Trash Intro Videos</a>
                    <a class="btn btn-outline-success btn-sm float-right ml-2 mb-2"
                       href="{{route('demo-video.index')}}">
                        <i class='fa fa-check'></i>
                        All Intro Videos</a>
                </div>
                @endif
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    @if (session()->has('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
            </div>
            <!-- calnder row -->
            <div class="table-responsive bg-white" style="min-height: 70vh;overflow: auto;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Heading</th>
                        @if(\Auth::guard('customer')->check())
                        @elseif(\Auth::guard('vender')->check())
                        @else
                        <th>Link</th>
                        @endif
                        {{--<th>Description</th>
                        <th>Thumbnail</th>--}}
                        <th>Video</th>
                        @if(\Auth::guard('customer')->check())
                        @elseif(\Auth::guard('vender')->check())
                        @else
                        <th width="10">Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($videos) && $videos->count() > 0)
                        @foreach($videos as $index => $list)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$list->heading}}</td>
                                @if(\Auth::guard('customer')->check())
                                @elseif(\Auth::guard('vender')->check())
                                @else
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" demoId="{{$list->id}}"
                                               value="{{url('public/assets/videos/demo-videos/'.$list->video)}}"
                                               id="copyLink{{$list->id}}" readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary btn-flat"
                                                    onclick="copyLink({{$list->id}})"
                                                    title="Copy the Link">
                                                <i class="fa fa-copy"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                               @endif
                                <td>
                                    <video width="250" height="150" controls>
                                        <source src="{{url('public/assets/videos/demo-videos/'.$list->video)}}"
                                                type="video/mp4">
                                        <source src="{{url('public/assets/videos/demo-videos/'.$list->video)}}"
                                                type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                @if(\Auth::guard('customer')->check())
                                @elseif(\Auth::guard('vender')->check())
                                @else
                                @if($list->trashed())
                                    <td style="text-align: center">
                                        <a class="btn btn-outline-info btn-sm"
                                           title="Restore"
                                           href="{{route('demo-video.recover',$list->id)}}">
                                            <i class="fa fa-history"></i>
                                        </a>
                                    </td>
                                @else
                                    <td style="text-align: center">
                                            <a class="btn btn-outline-success btn-sm mb-2"
                                               title="Edit"
                                               href="{{route('demo-video.edit',$list->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a id="trash-team-{{$list->id}}"
                                               class="btn btn-outline-primary btn-sm mb-2" title="Trash"
                                               href="{{route('demo-video.remove',$list->id)}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm mb-2" title="Delete"
                                               href="{{ route('demo-video.destroy', $list->id) }}"
                                               onclick="return confirm('Are you sure, You want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                    </td>
                                @endif
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" align="center">No demo video found..</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="col-md-12 mt-1">
                    <div class="float-right">
                        {{$videos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function copyLink(id) {
            /* Get the text field */
            var copyText = document.getElementById("copyLink"+ id);

            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            // alert("Copied the text: " + copyText.value);
            alert("Copied the Link");
        }

        function confirmDelete(id) {
            let choice = confirm('Are you sure, You want to delete ?');
            if (choice) {
                document.getElementById('delete-team-' + id).submit();
            }
        }
    </script>
@endsection