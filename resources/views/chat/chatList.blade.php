<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/w3.css')}}">
    <link rel="stylesheet" href="{{url('css/color.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/bootstrap.css')}}">
    <script src="{{url('jQuery/jquery.js')}}"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/global_message.js')}}"></script>
<body>
<audio id="voice" >
    <source src="{{url('chatVoice/chatVoice.wav')}}" type="audio/wav">
</audio>
<h4 style="text-align: center;">
    <p class="text-primary"><span id="sender">{{$_SESSION['user']}}</span><span id="now"></span><span id="getter"></span><span id="chat"></span><a style="float: right;" href="http://webchat.joker1996.com/update"  class="text-primary">修改密码</a>
    </p>
</h4>
<div>
    @foreach ($user_all as $v)
        <ul class="w3-ul w3-card-4">
            <li class="w3-padding-16">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style=" color: rgb(125, 143, 152); font-size: 20px;"></span>
                <br>
                <img src="{{url($v->picture)}}" class="w3-left w3-circle w3-margin-right"
                     style="width:60px;height:60px;">
                <div name="username" class="w3-xlarge">{{$v->username}}</div><br>
                        <span>
                            @if(strtotime(date('y-m-d h:i:s',time())) -strtotime($v->lasttime)<600)
                                在线
                            @else
                                离线
                            @endif
                        </span>
                <input class="w3-btn w3-brown"  type="button" style="width:100px;float: right;"
                       value="Chat">
                <input class="w3-btn w3-pale-yellow"  type="submit" style="width:100px;float: right;"
                       value="AllRecord">
            </li>
        </ul>
    @endforeach
</div>
<ul class="pagination">
    {!! $user_all->links() !!}
</ul>

</body>
</html>