@extends('layouts.admin')
@php
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('page-title')
    {{__('Manage Emails')}}
@endsection

@section('content')

<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('emails.index') }}">Back</a>
    </div>
    <div class="row mt-5">
        

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Send Emails</h5>

                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form action="" class="row g-3" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-md-6">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="Enter Subject" required>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject" class="form-label mb-2">Upload Logo</label>
                                <div class="form-group" style="border:1px solid #ccc;height:40px;padding:10px; text-align: center;border-color: #a3afbb;border-radius: 10px;">
                                    <label style="display: block;">Logo:</label>
                                    <input name="logo" type="file" required style="margin-top:25px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Company" required>
                        </div>
                        <div class="col-md-12">
                            <label for="subject" class="form-label">Email Content</label>
                            <textarea name="email_content" id="oneditor" class="form-control" cols="30" rows="10" required>{!! old('email_content') !!}</textarea>
                        </div>


                        <div class="col-12 text-end">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection
