@extends('layouts.admin')

@section('content')
    <div class="col-10 col-md-11 py-4 px-md-5">
        <div class="d-flex flex-wrap justify-content-between">
            <h5 class="dashbord-title position-relative">Join Video Session</h5>
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
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card p-4">
                    <form role="form" method="post" class="form-horizontal form-groups-bordered validate"
                          action="{{ url('room/create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(isset($success))
                                <div class="alert alert-success no-border">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                                class="sr-only">Close</span></button>
                                    {!! $success !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="roomName" class="col-sm-3 control-label">Enter Room ID</label>
                                <div class="col-md-12">
                                    <input type="text" name="roomName" onload="convertToSlug(this.value)" 
                                    onkeyup="convertToSlug(this.value)" class="form-control" id="roomName"
                                           value="" required
                                           placeholder="Room ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group default-padding float-right">
                                        <button type="submit" class="btn btn-success">Join Video Session</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
@endsection
@section('scripts')
    <script>
        function convertToSlug( str ) {
    
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                    .toLowerCase();
            
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');
            
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');   
            document.getElementById("roomName").value = str;
            //return str;
        }
    </script>
@endsection