<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/register.css')}}">
    <script src="{{url('jQuery/jquery.js')}}"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/register.js')}}"></script>
    <title>WebChat</title>

</head>
<body>
<div id="Layer1" style="position:absolute; width:100%; height:100%; background-color: #22C3AA; z-index:-1" >
    <img src="{{url('img/registerBgp.jpg')}}" height="100%" width="100%"/>
</div>
<div class="center">
    <p class="text-center size">注册账号</p>
    <form action="{{url('User/getUserMessage')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <div id="status_div" class="form-group  has-feedback">
            <label class="control-label" for="inputSuccess2">用户名：</label>
            <input type="text" class="form-control" id="username" name="username"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span id="user_s" class="sr-only"></span>
        </div>
        <div id="status_div_p" class="form-group  has-feedback">
            <label class="control-label" for="inputSuccess2">密码：</label>
            <input type="password" class="form-control" name="password" id="password"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span_p" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span id="user_p" class="sr-only"></span>
        </div>
        <div id="status_div_cp" class="form-group  has-feedback">
            <label class="control-label" for="inputSuccess2">确定密码：</label>
            <input type="password" class="form-control" name="password_c" id="password_c"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span_cp" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span id="user_cp" class="sr-only"></span>
        </div>
        <div id="status_div_email" class="form-group  has-feedback">
            <label class="control-label" for="inputGroupSuccess1">邮箱：</label>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" name="email" id="email"
                       aria-describedby="inputGroupSuccess1Status">
            </div>
            <span id="status_span_email" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span id="email_t" class="sr-only">(success)</span>
        </div>


        <div class="form-group">
            <label class="control-label" for="inputGroupSuccess1">选择头像:</label>
            <input class="file"  name="picture" type="file" id="file">
            <img class="img-circle"   id="header" alt="">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">注册</button>
        </div>
    </form>
</div>
</body>
</html>