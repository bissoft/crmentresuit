@extends('layouts.admin')
@section('page-title')
    {{__('Manage Tickets')}}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto" data-url="{{ route('tickets.create') }}" data-ajax-popup="true" data-title="{{__('Create New Ticket')}}">
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
                                <th>{{__('Ticket#')}}</th>
                                <th>{{__('Subject')}}</th>
                                <th>{{__('Department')}}</th>
                                <th>{{__('Service')}}</th>
                                <th>{{__('Contact')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Priority')}}</th>
                                <th>{{__('Assigned To')}}</th>
                                <th>{{__('Last Reply')}}</th>
                                <th>{{__('Created')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ "TIC-".sprintf("%06d", 100000 + $ticket->id) }}</td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>{{ $ticket->customer_contact_id }}</td>
                                        <td>{{ $ticket->department_id }}</td>
                                        <td>{{ $ticket->project_id }}</td>
                                        <td>{{ $ticket->assigned_to }}</td>
                                        <td>{{ $ticket->ticket_status_id }}</td>
                                        <td>{{ $ticket->ticket_priority_id }}</td>
                                        <td>{{ $ticket->ticket_service_id }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td>
                                            <a href="{{ route('tickets.show',$ticket->id) }}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                
                                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('tickets.edit',$ticket->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$ticket->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy',
                                                $ticket->id],'id'=>'delete-form-'.$ticket->id]) !!}
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
