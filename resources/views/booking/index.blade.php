@extends('layouts.admin')
@section('page-title')
    {{__('Manage Booking & Schedule')}}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
                <a href="#" data-url="{{ route('booking.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New Meeting')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
    </div>
@endsection

@section('content')
<div class="page-content">
    <div class="card radius-10 mt-5">
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
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Bookings and Schedules</h5>
                </div>
                <div>
                    <a class="btn btn-dark pull-right" href="{{ route('bookingSchedule') }}">Calender</a>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($bookings->count())
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->title }}</td>
                        <td>{{ $booking->from_date }}</td>
                        <td>{{ $booking->to_date }}</td>
                        <td>{{ $booking->from }}</td>
                        <td>{{ $booking->to }}</td>
                        <td>
                            {{-- <a href="{{ route('booking.show',$booking->id) }}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View')}}">
                                <i class="fas fa-eye"></i>
                            </a> --}}

                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('booking.edit',$booking->id) }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$booking->id}}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['booking.destroy',
                                $booking->id],'id'=>'delete-form-'.$booking->id]) !!}
                                {!! Form::close() !!}
                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="fw-bold text-center bg-primary text-wrap">No Bookings and Schedules Found</td>
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
