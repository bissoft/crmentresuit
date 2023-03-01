@extends('layouts.admin')
@section('page-title')
    Intake Form
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create goal')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="{{ route('intake') }}" class="btn btn-xs btn-white btn-icon-only width-auto">
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
                                    <a href="{{ route('intake.show',$contract->id) }}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('intake.edit',$contract->id) }}" class="edit-icon" data-size="2xl"  data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$contract->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['intake.destroy',
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
