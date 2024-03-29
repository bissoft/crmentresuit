@extends('layouts.admin')
@section('page-title')
    {{__('Manage Documents')}}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto" data-url="{{ route('docments.create') }}" data-ajax-popup="true" data-title="{{__('Create New Document')}}">
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
                                <th>{{__('Document Type')}}</th>
                                <th>{{__('Customer Name')}}</th>
                                <th>{{__('Document #')}}</th>
                                <th>{{__('Expiray Date')}}</th>
                                <th>{{__('Document File')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($docments as $docment)
                                    <tr>
                                        <td>{{ $docment->document_type }}</td>
                                        <td>{{ $docment->customer->name ?? "" }}</td>
                                        <td>{{ $docment->document_number }}</td>
                                        <td>{{ $docment->expiry_date }}</td>
                                        <td>
                                            <a href="{{URL::to('/'.$docment->file)}}" target="_blank">
                                                <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                            </a>
                                        </td>
                                        
                                        <td>
                                           
                                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('docments.edit',$docment->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$docment->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['docments.destroy',
                                                $docment->id],'id'=>'delete-form-'.$docment->id]) !!}
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
