<html>
<head>
    <title>{{ config('app.name') }}</title>
    <style>
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .btn {
            margin-bottom: 10px;
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: .9rem;
            line-height: 1.6;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn-primary {
            text-decoration: none;
            color: #fff;
            background-color: #3490dc;
            border-color: #3490dc;
        }

        .btn-primary:hover {
            text-decoration: none;
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
        }

        .btn {
            white-space: nowrap;
            font-size: 1rem;
            line-height: 1.5;
        }

        .btn-success {
            text-decoration: none;
            color: #fff;
            background-color: #38c172;
            border-color: #38c172;
        }

        .btn-success:hover {
            text-decoration: none;
            background-color: #28a745;
            border-color: #28a745;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
        }

        .btn-danger {
            text-decoration: none;
            color: #fff;
            background-color: #e3342f;
            border-color: #e3342f;
        }

        .btn-danger:hover {
            text-decoration: none;
            background-color: #dc3545;
            border-color: #dc3545;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
        }
    </style>
</head>

<body>
<div style="margin: 20px 50px">
    Dear <b>{{$data['name']}}</b>,
    <br><br><br>

    You have been invited by {{$data['invited_by']}} to sign or provide input on an {{ config('app.name') }} document. Please
    click 'Begin Signing' to begin this process.<br><br>
    
    <a href="{{ url('/') }}/signature/{{$data['id']}}/{{$data['email']}}" type="button" class="btn btn-primary">Begin Signing</a>
    <br><br><br>

    Document signing powered by <b>{{ config('app.name') }}</b><br>
    <small>Copyright &copy; {{ date('Y') }} {{ config('app.name') }},LCC All Rights Reserved.</small>
</div>
</body>

</html>
