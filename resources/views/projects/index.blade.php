@extends('layouts.admin')
@section('page-title')
    {{__('Manage Projects')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create project')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('projects.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New Project')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
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
                    <h5>Projects</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table table-striped mb-0 dataTable">
                <thead>
                    <tr>
                        <th>Project#</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Start Date</th>
                        <th>Deadline</th>
                        <th>Billing Type</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($projects->count())
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ "PRJ-".sprintf("%06d", 100000 + $project->id) }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->customer->name?? '' }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->dead_line }}</td>
                        <td>{{ $project->billing_type_id }}</td>
                        <td>{{ $project->status_id }}</td>
                        <td>
                            <a href="{{ route('projects.show',$project->id) }}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('projects.edit',$project->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$project->id}}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy',
                                $project->id],'id'=>'delete-form-'.$project->id]) !!}
                                {!! Form::close() !!}

                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="fw-bold text-center bg-primary text-wrap">No Projects Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection
