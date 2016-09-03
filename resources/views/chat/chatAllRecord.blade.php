<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{url('css/w3.css')}}">
    <link rel="stylesheet" href="{{url('css/scrollbar.css')}}">
    <title>Document</title>
    <script src="{{url('jQuery/jquery.js')}}"></script>
</head>
<body class="w3-container">

<table class="w3-table w3-striped w3-bordered w3-border">
    <thead>
    <tr class="w3-light-grey w3-hover-red">
        <th>Number</th>
        <th>发送</th>
        <th>内容</th>
        <th>接收</th>
        <th>时间</th>
    </tr>
    </thead>
    <div style="display: none">{{$number = 1}}</div>
    {{--设置一个计数变量--}}
    @foreach($all_record as $v)
    <tr class="w3-hover-green">
        <td>{{$number++}}</td>
        <td>{{$v->sender}}</td>
        <td>{!! $v->content !!}</td>
        <td>{{$v->getter}}</td>
        <td>{{$v->time}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>