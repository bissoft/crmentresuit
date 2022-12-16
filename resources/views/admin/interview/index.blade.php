@extends('layouts.admin')
@section('content')
 
		@if (Session::has('msg') and Session::has('type'))
		<div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<strong>{!! Session('msg') !!}</strong>
		</div>
		@endif
		
    <div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between align-items-center">
				
		  
				<div>
					<h6 class="fs-17 font-weight-600 mb-0">Your Zoom API Key And Secret</h6>
				</div>
				<div class="text-right">
					<div class="actions">
							<!-- Button trigger modal -->
						<button type="button" id="zoomModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Tips To Create Credentails
						</button>						
						<a href="/credentials" class="btn btn-primary pull-right">
							@if (!empty($zoom))
								Update Credentails
							@else
								Add Credentials
							@endif 
						</a>
						{{--  <a href="{{route("HomeUrl")}}/{{admin}}/author-list" class="btn btn-info pull-right">Author List</a> --}}
						{{-- <a href="{{route("HomeUrl")}}/{{admin}}/blog-category" class="btn btn-info pull-right">Add Category</a> --}}
					</div>
				</div>
			</div>
			@if (!empty($zoom))
			<div class="form-group mt-3">
				<input type="text" class="form-control tcount"  disabled name="api_key" value="{{$zoom->api_key  ?? ''}}">
			</div>
			<div class="form-group">
				<input type="text" class="form-control tcount"  disabled name="api_secret" value="{{$zoom->api_secret ?? ''}}">
			</div>
			@else
				 <div class="text-danger"><h3 class="text-danger">Please Enter your Zoom Credentails First</h3></div>
			@endif
            {{-- Interview --}}
        </div>
       
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
		@if (!empty($zoom))
		  {{-- @can('video_interview_create') --}}
				<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="{{route('admin.interview.create')}}">
								Add New
							</a>
						</div>
				</div>
			{{-- @endcan  --}}
        <div class="card-body">
			<div class="">
            <h4>Video Meeting</h4>
        </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                    <thead>
                        <tr>    
                            <th>
                                Sr.
                            </th>
                            <th>
                                Topic
                            </th>
                            <th>
                                Start Time 
                            </th>
                            <th>
                                Invite
                            </th>
                            <th>
                                Start
                            </th>
                            <th>
                                Duration
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Created_at
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interview as $index=> $item)
                            <tr>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->topic ?? '' }}
                                </td>
                                <td>
                                    {{ $item->start_time ?? '' }}
                                </td>
                                <td>
                                    {{ $item->invite_link ?? '' }}
                                </td>
                                <td>
                                    <a href="https://zoom.us/s/{{ $item->uuid }}" target="_blank" class="btn btn-info">Start</a>
                                </td>
                                <td>
                                    {{ $item->duration ?? '' }}
                                </td>
                                <td>
                                    {{ $item->user_name->first_name ?? '' }} {{ $item->user_name->last_name ?? '' }}
                                </td>
                                <td>
                                    {!! $item->created_at ?? '' !!}
                                </td>
                                <td style="min-width:180px">
                                    {{-- @can('video_interview_edit') --}}
                                        <a class="btn btn-xs btn-info" href="{{ url('video-meeting/edit/'.$item->id ) }}">
                                            Edit
                                        </a>
                                    {{-- @endcan --}}
                                    {{-- @can('video_interview_delete') --}}
                                    <a class="btn btn-xs btn-danger" onclick="interviewDelete{{ $item->id }}({{ $item->id }})">
                                        Delete
                                    </a>
                                    {{-- @endcan --}}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		@endif
   </div>

 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">How to Create Credentials</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			<h4>Access Zoom marketplace</h4> 
			<div class=""><span class="text-success h5">2 :> </span> 	<a href="https://marketplace.zoom.us/">Sign in</a></div>
			<div class=""><span class="text-success h5">3 :> </span> <a href="https://marketplace.zoom.us/develop/create">Click  'Develop'  button on header and select Build App menu.</a>	</div>
			<div class="text-info"><span class="text-success h5">4 :> </span>  	Choose the 'JWT' and create application with the app name what you want.</div>
			<p class="text-primary"><span class="text-success h5">5 :> </span>  	Input required information AppName, ShortDescription, CompanyName, Name,and Email Address and click Continue until your app will be activated. Don't forget to remember your credentials. It's used for API calling.</p>

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
			</div>
		</div>
	</div>
</div>



<div class="modal fade " id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div>
					<h4 class="h4 font-weight-400 float-left modal-title" id="exampleModalLabel">Create New Project</h4>
					<a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close">Close</a>
			</div>
			<div class="modal-body">  
					<div class="card bg-none card-box">
							<h4>Access Zoom marketplace</h4> 
							<div class=""><span class="text-success h5">2 :> </span> 	<a href="https://marketplace.zoom.us/">Sign in</a></div>
							<div class=""><span class="text-success h5">3 :> </span> <a href="https://marketplace.zoom.us/develop/create">Click  'Develop'  button on header and select Build App menu.</a>	</div>
							<div class="text-info"><span class="text-success h5">4 :> </span>  	Choose the 'JWT' and create application with the app name what you want.</div>
							<p class="text-primary"><span class="text-success h5">5 :> </span>  	Input required information AppName, ShortDescription, CompanyName, Name,and Email Address and click Continue until your app will be activated. Don't forget to remember your credentials. It's used for API calling.</p>
			
							<div class="col-12 text-end">
								<button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
								<br>
							</div>
							<br>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
    @foreach ($interview as $item)
        <script>
				$(document).ready(function(){
					$('#zoomModal').on('click',function(){
						$('#commonModal').modal('toggle');
					});
				});
            function interviewDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('deleteInterview',':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });
            }
        </script>
    @endforeach
@endsection
