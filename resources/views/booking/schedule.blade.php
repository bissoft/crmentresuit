@section('styles')
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/core/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/daygrid/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/timegrid/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/list/main.css">
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


<div class="page-content">
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Bookings and Schedules</h5>
                </div>
                
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div id='calendar'></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src='/dash-assets/plugins/calender_js/core/main.js'></script>
<script src='/dash-assets/plugins/calender_js/daygrid/main.js'></script>
<script src='/dash-assets/plugins/calender_js/timegrid/main.js'></script>
<script src='/dash-assets/plugins/calender_js/list/main.js'></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["dayGrid"],
            height: "parent",
            header: {
                left: "prev,next today",
                center: "title",
                right: ""
            },
            defaultView: "dayGridMonth",
            defaultDate: "{{ now() }}",
            navLinks: true,
            editable: true,
            eventLimit: true,
            events: [
                @foreach($bookings as $booking) {
                    id: "{{ $booking->id }}",
                    title: "{{ $booking->title }}",
                    start: "{{ $booking->from_date . 'T' . $booking->from }}",
                    end: "{{ $booking->to_date . 'T' . $booking->to }}",
                    color: "#9267FF"
                },
                @endforeach
            ],
            eventClick: function (info) {
                // window.location.href = '/bookings/' + info.event.id;

                // change the border color just for fun
                info.el.style.borderColor = 'red';
            }
        });

        calendar.render();
    });

</script>

@endsection
