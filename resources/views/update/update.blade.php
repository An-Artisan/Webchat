<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{url('bootstrap/bootstrap.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{url('jQuery/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.js')}}"></script>
<script src="{{url('js/update.js')}}"></script>
<body>
    <span id="user" style="display: none;">{{$_SESSION['user']}}</span>
    <p class="text-center text-primary">修改密码</p>
        <div id="status_div_p" class="form-group  has-feedback">
            <label class="control-label" for="inputSuccess2">新密码：</label>
            <input type="password" class="form-control" name="password" id="password"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span_new" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span id="user_p" class="sr-only">密码不能小于6位</span>
        </div>
        <div id="status_div_cp" class="form-group  has-feedback">
            <label class="control-label" for="inputSuccess2">确定密码：</label>
            <input type="password" class="form-control" name="password_conf" id="password_conf"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span_conf" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span id="user_cp" class="sr-only"></span>
        </div>
        <div id="status_div_email" class="form-group    has-feedback">
            <label class="control-label" for="inputGroupSuccess1">邮箱：</label>
            <div class="input-group  col-lg-4">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" name="email" id="email"
                       aria-describedby="inputGroupSuccess1Status">
            </div>

            <span id="status_span_email" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span id="email_t" class="sr-only">(success)</span>
        </div>
        <button type="button" id="send_code" class="btn  btn-default" disabled="disabled">发送验证码</button>
        <br>        <br>

        <div id="status_div_code" class="form-group has-feedback">
            <label class="control-label" for="inputSuccess2">输入验证码：</label>
            <input type="password" class="form-control" name="password_c" id="code"
                   aria-describedby="inputSuccess2Status">
            <span id="status_span_code" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
            <span id="user_code" class="sr-only"></span>
        </div>
        <div class="form-group">
            <button type="submit" id="update" class="btn btn-default" disabled="disabled" >修改密码</button>
        </div>


</body>
</html>