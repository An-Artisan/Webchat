<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{url('css/w3.css')}}">
    <title>Document</title>
</head>
<body class="w3-container">


@if(!empty($send))
<div class="w3-card-4" style="width:50%;margin:0 auto;">

    <header class="w3-container w3-blue">
        <h1>注册</h1>
    </header>

    <div class="w3-container">
        <p class="w3-text-purple"> 我们已将激活邮件发至您的邮箱，请前往您的邮箱查看。<br>注意：有可能邮箱会误将激活邮件打回到垃圾箱，如没有收到邮箱，请查看垃圾箱！
        </p>
    </div>

    <footer class="w3-container w3-blue">
        <h5>copyright© <a href="http://www.joker1996.com">www.joker1996.com</a></h5>
    </footer>

</div>
@endif
@if(!empty($active))
    <div class="w3-card-4" style="width:50%;margin:0 auto;">

        <header class="w3-container w3-blue">
            <h1 id="success" >激活成功</h1>
        </header>

        <div class="w3-container">
            <p class="w3-text-purple">
                您已成功激活账号，系统跳转到登录界面！
                如果没有跳转，请点击<a href="http://webchat.joker1996.com/Userlogin">登录</a>
            </p>
        </div>

        <footer class="w3-container w3-blue">
            <h5>copyright© <a href="http://www.joker1996.com">www.joker1996.com</a></h5>
        </footer>

    </div>
    @endif
</body>
<script>
    var jump = document.getElementById('success');
    if(jump.innerHTML = '激活成功') {
//        如果激活成功的话就等3秒跳转到登录界面
        setInterval(function () {
            window.location.href = "http://webchat.joker1996.com";
        }, 3000);
    }
</script>
</html>