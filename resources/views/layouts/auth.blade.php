<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'AccountGo')}} - @yield('page-title')</title>
    <link rel="icon" href="{{url(Storage::url('uploads/logo')).'/favicon.png'}}" type="image" sizes="16x16">

    <script src="{{ url('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ url('assets/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/libs/select2/dist/css/select2.min.css') }}">

    <!-- Purpose CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/site.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/ac.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/stylesheet.css') }}">
</head>

<body>
@yield('content')

<!-- General JS Scripts -->
<script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('assets/libs/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{ url('assets/libs/select2/dist/js/select2.min.js') }}"></script>

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
<script src="{{ url('assets/js/custom.js')}}"></script>
</body>
</html>
