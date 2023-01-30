@extends('layouts.admin')
@php
$profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('page-title')
{{__('Manage Aa Customization')}}
@endsection

@section('content')
<div class="row">
    @php
        $user = auth()->user();
    @endphp
    {{Form::open(array('url'=>'app-customization','enctype'=>'multipart/form-data','method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('name',__('App Name'),['class'=>'form-control-label']) }}
                {{Form::text('app_name', auth()->user()->app_name,array('class'=>'form-control','placeholder'=>__('Enter App Name'),'required'=>'required'))}}
                @error('name')
                <small class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </small>
                @enderror
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group" style="border:1px solid #ccc;height: 150px;padding:10px; text-align: center;">
                    <label style="display: block;">App Logo:</label>
                    @if (!isset($user->app_logo) or $user->app_logo=="")
                    {!! Form::file('app_logo', null, array('class' => 'form-control')) !!}
                    @else
                    @php
                    $image = url("/public/assets/images/".$user->app_logo);
                    @endphp
                    <img src="{{$image}}" style="max-width:100px;max-height: 75px;display:revert;"><br>
                    <a href="?del=app_logo&id={{$user->id}}" class="btn btn-danger btn-sm  mt-1 sconfirm">Delete</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
        </div>
    </div>
    {{Form::close()}}
</div>
@endsection
