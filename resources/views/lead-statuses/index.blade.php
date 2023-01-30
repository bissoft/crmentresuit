@extends('layouts.admin')
@section('page-title')
    {{__('Manage Lead Status')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create constant tax')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('lead-status.create') }}" data-ajax-popup="true" data-title="{{__('Create Lead Status')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fas fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
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
                                <th> {{__('Name')}}</th>
                                <th> {{__('Color')}}</th>
                                <th> {{__('Leads')}}</th>
                                <th> {{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($statuses as $status)
                                <tr class="font-style">
                                    <td>{{ $status->name }}</td>
                                    <td style="background-color: {{$status->color}}" class="text-dark">{{ $status->color }}</td>
                                    <td>{{ '0' }}</td>
                                    <td class="Action">
                                        <span>
                                        @can('edit constant tax')
                                                <a href="#" class="edit-icon" data-url="{{ route('lead-status.edit',$status->id) }}" data-ajax-popup="true" data-title="{{__('Edit Lead')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            @endcan
                                            @can('delete constant tax')
                                                <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$status->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['lead-status.destroy', $status->id],'id'=>'delete-form-'.$status->id]) !!}
                                                {!! Form::close() !!}
                                            @endcan
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
