<html>
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
   <p><strong> Contract Subject </strong> : {{$subject ?? ''}}</p>
   <p><strong> Contract Details </strong> : {{$detail ?? ''}}</p>
   <br>
   <a href="{{route('download.contract.file',$content ?? '')}}">See Contract Documents</a>
</body>
</html>