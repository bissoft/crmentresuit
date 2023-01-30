@section('styles')
<link rel="stylesheet" href="/public/dash-assets/plugins/calender_js/demo/main.css">=
@endsection


@extends('layouts.admin')
@section('page-title')
    {{__('Manage Booking & Schedule')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create project')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('booking.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New Project')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection


@section('content')

<style>#calendar {
    max-width: 1100px;
    margin: 0 auto;
  }</style>
<div class="page-content">
    <div class="col-md-12 col-sm-12">
        <div id='calendar'></div>
    </div>
</div>

@endsection

@section('scripts')
=
<script src='/public/dash-assets/plugins/calender_js/demo/main.js'></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;

        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'darkly',
            //Random default events
            events: [
                @foreach($bookings as $booking) {
                    id: "{{ $booking->id }}",
                    title: "{{ $booking->title }}",
                    start: "{{ $booking->from_date . 'T' . $booking->from }}",
                    end: "{{ $booking->to_date . 'T' . $booking->to }}",
                    backgroundColor: '#f39c12', //yellow 
                    borderColor: '#f56954', //red
                    allDay: true
                },
                @endforeach
            ],

            eventClick: function (info) {
                //window.location.href = '/staff/shifts/' + info.event.id;
                // change the border color just for fun
                info.el.style.borderColor = 'red';
            }

        });

        calendar.render();
    });

</script>


@endsection
