@extends('layouts.admin')
@section('page-title')
    Intake Form
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create goal')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                {{-- <a href="#" data-url="{{ route('contracts.create') }}" data-ajax-popup="true" data-title="{{__('Create New Contract Type')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fas fa-plus"></i> {{__('Create')}}
                </a> --}}
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th> {{__('#')}}</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Phone</th>
                                <th> Date Of Birth </th>
                                <th> Logo</th>
                                <th> {{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($intake as $contract)
                            <tr>
                                <td>{{$contract->id??''}}</td>
                                <td>{{$contract->name??''}}</td>
                                <td>{{$contract->email ?? ""}}</td>
                                <td>{{$contract->phone ?? ""}}</td>
                                <td>{{$contract->date_of_birth??''}}</td>
                                <td><img src="{{url($contract->logo??'')}}" style="height:60px;width:100px;"></img></td>
                                <td>
                                    
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
