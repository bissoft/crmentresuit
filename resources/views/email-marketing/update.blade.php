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
        <a class="btn btn-primary" href="{{ route('emails.index') }}"> Back</a>
    </div>
    <div class="row mt-5">
       

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Update Email</h5>

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
                    <form action="" class="row g-3" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $email->name }}"  class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $email->email }}"  class="form-control" placeholder="Enter Email">
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
