@extends('layouts.admin')
@section('page-title')
    {{__('Manage Leads')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('leads.create') }}" data-ajax-popup="true" data-title="{{__('Create Lead')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                <i class="fas fa-plus"></i> {{__('Create')}}
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
            <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
                <strong>{!! Session('msg') !!}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th> {{__('#')}}</th>
                                <th> {{__('Name')}}</th>
                                <th> {{__('Email')}}</th>
                                <th> {{__('Phone')}}</th>
                                <th> {{__('Status')}}</th>
                                <th> {{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($leads as $lead)
                                <tr class="font-style">
                                    <td>{{ $lead->id }}</td>
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->email ?? '' }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <td style="background-color: {{$lead->status->color ?? ''}}" class="text-dark">{{$lead->status->name ?? ''}}</td>
                                    
                                    <td class="Action">
                                        <span>
                                            <a href="{{ route('leads.show',$lead->id) }}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('Show Lead')}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if ($lead->is_customer != 1)
                                            <a href="#" class="edit-icon " data-toggle="tooltip" data-original-title="{{__('Change To Customer')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('change-to-customer-{{$lead->id}}').submit();">
                                                <i class="fas fa-random"></i>
                                            </a>
                                            {!! Form::open(['method' => 'POST', 'route' => ['leadCustomer', $lead->id],'id'=>'change-to-customer-'.$lead->id]) !!}
                                            {!! Form::close() !!}
                                            @endif
                                            <a href="#" class="edit-icon" data-url="{{ route('leads.edit',$lead->id) }}" data-ajax-popup="true" data-title="{{__('Edit Lead')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$lead->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['leads.destroy', $lead->id],'id'=>'delete-form-'.$lead->id]) !!}
                                            {!! Form::close() !!}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
