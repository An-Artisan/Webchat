<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebChat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('bootstrap/bootstrap.css')}}">
    <script src="{{url('jQuery/jquery.js')}}"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('Editor/dist/css/wangEditor.min.css')}}"></script>
</head>
<body>
@yield('content')
</body>
</html>