@extends('layouts.admin')
@section('page-title')
    {{__('Manage services')}}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto" data-url="{{ route('ticketpriorities.create') }}" data-ajax-popup="true" data-title="{{__('Create New Priority')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (Session::has('msg'))
                <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
                    <strong>{!! Session('msg') !!}</strong>
                </div>
                @endif
                <div class="card-body py-0">
                    
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr role="row">
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($priorities as $priority)
                                    <tr>
                                        <td>{{ $priority->name }}</td>
                                        <td>{{ $priority->description }}</td>
                                        <td>
                                           
                                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('ticketpriorities.edit',$priority->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$priority->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['ticketpriorities.destroy',
                                                $priority->id],'id'=>'delete-form-'.$priority->id]) !!}
                                                {!! Form::close() !!}
                
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
