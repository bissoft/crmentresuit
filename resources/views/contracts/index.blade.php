@extends('layouts.admin')
@section('page-title')
    {{__('Manage Contract Types')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create goal')
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('contracts.create') }}" data-ajax-popup="true" data-title="{{__('Create New Contract')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fas fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                                <th> {{__('Subject')}}</th>
                                <th> {{__('Contract Type')}}</th>
                                <th> {{__('Customer')}}</th>
                                <th> {{__('Contract Value')}}</th>
                                <th> {{__('Date')}}</th>
                                <th> {{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contracts as $contract)
                            <tr>
                                <td>{{$contract->id}}</td>
                                <td>{{$contract->name}}</td>
                                <td>{{$contract->contractType->name ?? ""}}</td>
                                <td>{{$contract->customer->name ?? ""}}</td>
                                <td>{{$contract->contract_value}}</td>
                                <td>{{$contract->start_date}}</td>
                                <td>                                    
                                    
                                    <a href="{{ route('contracts.show',$contract->id) }}" class="edit-icon bg-info" data-toggle="tooltip" data-original-title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('contracts.edit',$contract->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$contract->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['contracts.destroy',
                                        $contract->id],'id'=>'delete-form-'.$contract->id]) !!}
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
