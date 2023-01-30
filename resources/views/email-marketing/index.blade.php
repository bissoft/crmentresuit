@extends('layouts.admin')
@php
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('page-title')
    {{__('Manage Emails')}}
@endsection

@section('content')
<div class="page-content">
    <div class="card radius-10 mt-5">
        @if (Session::has('msg'))
            <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
                <strong>{!! Session('msg') !!}</strong>
            </div>
        @endif
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Email List</h5>
                </div>
                <div>
                    <a class="btn btn-dark pull-right" href="{{ route('emails.index') }}">Email List</a>
                    <a href="{{ route('emails.create') }}" class="btn btn-info pull-right">Add Email</a>
                    <a href="{{ route('emails.send') }}" class="btn btn-info pull-right">Send Email</a>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emails as $item)
                    <tr>
                        <td>{{ $item->id }}</td> 
                        <td>{{ $item->email }}</td>
                        <td>{{date("j F, Y, g:i a", strtotime($item->created_at))}}</td>
                        <td>
                          <a href="{{ route('emails.update',$item->id) }}" class="fa fa-edit fa-sm mr-2" title="Edit"></a>
                          <a href="{{ route('emails.index') }}?delete={{ $item->id }}" class="fa fa-trash sconfirm mr-2 fa-sm" title="Delete"></a>
                          <a href="{{ route('emails.send.single',$item->id) }}" class="fa fa-envelope fa-sm mr-2" title="Send Email"></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection
