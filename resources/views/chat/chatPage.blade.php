<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!--引入wangEditor.css-->
    <link rel="stylesheet" type="text/css" href="{{url('Editor/dist/css/wangEditor.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/color.css')}}">
    <link rel="stylesheet" href="{{url('css/w3.css')}}">
    <link rel="stylesheet" href="{{url('css/scrollbar.css')}}">
    <script src="{{url('jQuery/jquery.js')}}"></script>
    <script src="{{url('Editor/js/bootstrap.js')}}"></script>

</head>
<body>
<audio id="voice" >
    <source src="{{url('chatVoice/chatVoice.wav')}}" type="audio/wav">
</audio>
<span id="picture" style="display: none" >{{$_SESSION['picture']}}</span>
{{--用户的图片存在当前位置，隐藏起来--}}
<h4 style="text-align: center;">
    <p class="text-primary"><span id="sender">{{$_SESSION['user']}}</span><span id="now">正在和</span><span id="getter">{{$getter}}</span><span id="chat">聊天...</span></p>
</h4>
<div style="width: 900px;margin:0 auto;">

    <div style="float: left">
        <!--<div style="width:100%;height: 400px;border: 2px solid gainsboro;">哈哈</div>-->
        <iframe src="{{url('User/iframe')}}" id="child" name="child" height="400px;" width="100%;" scrolling
                frameborder="1"></iframe>
        <div style="width:100%;height: 200px;">
            <!--用当前元素来控制高度-->
            <div id="div1" style="height:400px;max-height:200px;">


            </div>
        </div>
    </div>

</div>
</body>
<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->
<script type="text/javascript" src="{{url('Editor/dist/js/lib/jquery-1.10.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('Editor/dist/js/wangEditor.min.js')}}"></script>
<script type="text/javascript" src="{{url('Editor/emoji.js')}}"></script>
<script>
</script>
</html>