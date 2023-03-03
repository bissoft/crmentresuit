@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_favicon=Utility::getValByName('company_favicon');
@endphp

    <!DOCTYPE html>
<html lang="en">
{{-- <meta name="_token" id="csrf-token" content="{{ csrf_token() }}"> --}}
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @auth

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="user-id" content="{{ Auth::id() }}">
    @php
        $user = auth()->user();
    @endphp
    @if (!isset($user->app_name) or $user->app_name=="")
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'MYAccount')}} - @yield('page-title')</title>
    @else
    <title>{{ $user->app_name }}</title>
    @endif
    @endauth

    @guest
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'MYAccount')}} - @yield('page-title')</title>
    @endguest
    <link rel="shortcut icon" href="{{ url('public/favicon.png') }}">

    <link rel="stylesheet" href="{{  url('assets/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/libs/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{  url('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.css') }}">
    <link rel="stylesheet" href="{{  url('assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{  url('assets/libs/select2/dist/css/select2.min.css') }}">

    @stack('css-page')

    <link rel="stylesheet" href="{{  url('assets/css/site.css') }}">
    <link rel="stylesheet" href="{{  url('assets/css/ac.css') }}">
    <link rel="stylesheet" href="{{  url('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{  url('assets/css/stylesheet.css') }}">
    @yield('styles')
</head>

<body class="application application-offset">
<div class="container-fluid container-application">
    @include('partials.admin.menu')
    <div class="main-content position-relative">
        @include('partials.admin.header')
        <div class="page-content">
            <div class="page-title">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        {{-- <div class="d-inline-block">
                            <h5 class="h4 d-inline-block font-weight-400 mb-0 ">@yield('page-title')</h5>
                        </div> --}}
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end">
                        @yield('action-button')
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h4 class="h4 font-weight-400 float-left modal-title" id="exampleModalLabel"></h4>
                <a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close">{{__('Close')}}</a>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


<script src="{{  url('assets/js/site.core.js') }}"></script>

<script src="{{  url('assets/libs/progressbar.js/dist/progressbar.min.js') }}"></script>
<script src="{{  url('assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{  url('assets/libs/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{  url('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script src="{{  url('assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{  url('assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{  url('assets/libs/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{  url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
@yield('scripts')
<script>moment.locale('en');</script>
@stack('theme-script')

<script>
    var dataTabelLang = {
        paginate: {previous: "{{__('Previous')}}", next: "{{__('Next')}}"},
        lengthMenu: "{{__('Show')}} _MENU_ {{__('entries')}}",
        zeroRecords: "{{__('No data available in table')}}",
        info: "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
        infoEmpty: " ",
        search: "{{__('Search:')}}"
    }
</script>

<script src="{{  url('assets/js/site.js') }}"></script>
<script src="{{  url('assets/js/datatables.min.js') }}"></script>

<script src="{{  url('assets/js/jscolor.js') }} "></script>
<script src="{{  url('assets/js/custom.js') }} "></script>
<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "{{__('Sun')}}",
            "{{__('Mon')}}",
            "{{__('Tue')}}",
            "{{__('Wed')}}",
            "{{__('Thu')}}",
            "{{__('Fri')}}",
            "{{__('Sat')}}"
        ],
        monthNames: [
            "{{__('January')}}",
            "{{__('February')}}",
            "{{__('March')}}",
            "{{__('April')}}",
            "{{__('May')}}",
            "{{__('June')}}",
            "{{__('July')}}",
            "{{__('August')}}",
            "{{__('September')}}",
            "{{__('October')}}",
            "{{__('November')}}",
            "{{__('December')}}"
        ],
    };
    var calender_header = {
        today: "{{__('today')}}",
        month: '{{__('month')}}',
        week: '{{__('week')}}',
        day: '{{__('day')}}',
        list: '{{__('list')}}'
    };
</script>

@if($message = Session::get('success'))
    <script>
        show_toastr('Success', '{!! $message !!}', 'success');
    </script>
@endif
@if($message = Session::get('error'))
    <script>
        show_toastr('Error', '{!! $message !!}', 'error');
    </script>
@endif
@stack('script-page')
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6cf972f1-fe97-4d08-8a5b-31d0272ab093";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
