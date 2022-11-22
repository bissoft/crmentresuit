@extends('layouts.admin')
@section('content')
<div class="body-content">
	<div class="row">
	  <div class="col-md-12 col-lg-12">
		  <!-- this is content body........................................ -->
		 <div class="card mb-4">
			<div class="card-header">
			  <div class="d-flex justify-content-between align-items-center">
				 <div>
					<h6 class="fs-17 font-weight-600 mb-0">Zoom Credential </h6>
				 </div>
				 <div class="text-right">
					<div class="actions">
					  <a href="/user-interview" class="btn btn-primary pull-right">Interviews</a>
					 {{--  <a href="{{route("HomeUrl")}}/{{admin}}/author-list" class="btn btn-info pull-right">Author List</a> --}}
					  {{-- <a href="{{route("HomeUrl")}}/{{admin}}/blog-category" class="btn btn-info pull-right">Add Category</a> --}}
					</div>
				 
				 </div>
			  </div>
			</div>
			<div class="card-body">
			  <form method="POST" action="" enctype="multipart/form-data">
				 @csrf
				 <input type="hidden" name="id" value="{{$zoom->id ?? ""}}">
					<div class="form-group">
						<label class=" req font-weight-600">User Name</label>
						<input type="text" class="form-control tcount" placeholder="Enter name..." name="name" value="{{$zoom->name ?? ''}}">
						@error('name')
							 <div class="text-danger">{{$message}} </div>
						@enderror
					</div>
					<div class="form-group">
						<input type="text" class="form-control tcount" hidden placeholder="Enter Zoom Api Url..." name="api_url" value="https://api.zoom.us/v2/">
					</div>
					<div class="form-group">
						<label class=" req font-weight-600">ZOOM API KEY</label>
						<input type="text" class="form-control tcount" placeholder="Enter Zoom Api Key..." name="api_key" value="{{$zoom->api_key ?? ''}}">
						@error('api_key')
							 <div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label class=" req font-weight-600">ZOOM API SECRET</label>
						<input type="text" class="form-control tcount" placeholder="Enter Zoom Api Secret..." name="api_secret" value="{{$zoom->api_secret ?? ''}}">
						@error('api_secret')
							 <div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					</div><div class="form-group">
							<button type="submit" name="submit" value="Submit" class="btn btn-info float-right">Submit </button>
						</div>
					</div>
				 </form>
			  </div>
			</div>
		 </div>
	  </div>
 </div>
@endsection
