$(function () {
   $('#password').blur(function () {

                   if ($(this).val().length>6) {
                       //新密码不能少于6位
                       $('#status_span_new').removeClass('glyphicon-remove');
                       $('#status_div_p').removeClass('has-error');
                       $('#status_span_new').addClass('glyphicon-ok ');
                       $('#status_div_p').addClass('has-success ');
                       $('#user_p').addClass('sr-only');
                   }
                     else {
//                                    如果通过，则给用户提示
                       $('#status_span_new').addClass('glyphicon-remove');
                       $('#status_div_p').addClass('has-error');
                       $('#user_p').removeClass('sr-only');
                       $('#user_p').html('新密码不能小于6位，请重新输入！');
//                            不通过，给用户提示
                         }
   });
    $('#password_conf').blur(function () {
        if ($('#password').val() == $(this).val()) {
            //确定密码和新密码一致
            $('#status_span_conf').removeClass('glyphicon-remove');
            $('#status_div_cp').removeClass('has-error');
            $('#status_span_conf').addClass('glyphicon-ok ');
            $('#status_div_cp').addClass('has-success ');
            $('#user_cp').addClass('sr-only');
        }
        else {
//                                    如果通过，则给用户提示
            $('#status_span_conf').addClass('glyphicon-remove');
            $('#status_div_cp').addClass('has-error');
            $('#user_cp').removeClass('sr-only');
            $('#user_cp').html('两次输入密码不匹配，请重新输入！');
//                            不通过，给用户提示
        }
    });
    $('#email').blur(function () {
        var judgeUsername = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
        // 匹配邮箱的正则表达式
        if (judgeUsername.test(document.getElementsByName('email')[0].value)) {
            $('#status_span_email').removeClass('glyphicon-remove');
            $('#status_div_email').removeClass('has-error');
            $('#status_span_email').addClass('glyphicon-ok ');
            $('#status_div_email').addClass('has-success ');
            $('#email_t').addClass('sr-only');
            $('#send_code').removeAttr('disabled','disabled');
        }
        else {
            $('#status_span_email').addClass('glyphicon-remove');
            $('#status_div_email').addClass('has-error');
            $('#email_t').removeClass('sr-only');
            $('#email_t').html('邮箱格式不正确！');
            document.getElementById('email').focus();
        }
    });

    $('#send_code').click(function () {
        $('#send_code').attr('disabled','disabled');
        //马上把发送按钮置为不可点击
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//                设置laravel的CSFR验证
        $.post("http://webchat.joker1996.com/Send/email",
//                          ajax的post请求到User/user路由
            {
                email: $('#email').val()
//                          传用户注册的用户名验证
            },
            function (data) {
                if (data == 60){
                    //如果返回值为60的话说明发送邮箱成功

                    var send = setInterval(function () {
                        $('#send_code').html('发送成功，请查看您的邮箱获取验证码！'+data+'秒后再试！');
                        --data;
                        if (data == 0){
                            clearInterval(send);
                            $('#send_code').removeAttr('disabled','disabled');
                            $('#send_code').html('发送验证码');
                        }
                    },1000);
                //    设置定时器，60秒内不可以再次点击

                }
                else{
                    $('#send_code').html('发送失败，请稍后再试！');
                //    否则提示用户发送失败
                }

            });
    });
    
    $('#code').blur(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("http://webchat.joker1996.com/verify",
//                          ajax的post请求到路由
            {
                code: $('#code').val()
//                          传用户注册的用户名验证
            },
            function (data) {
                if (data == 'success'){
                    $('#status_span_code').removeClass('glyphicon-remove');
                    $('#status_div_code').removeClass('has-error');
                    $('#status_span_code').addClass('glyphicon-ok ');
                    $('#status_div_code').addClass('has-success ');
                    $('#user_code').addClass('sr-only');
                    $('#update').removeAttr('disabled','disabled');
                }
                //    如果成功就给给修改密码按钮置为可以点击状态
                else{
                    $('#status_span_code').addClass('glyphicon-remove');
                    $('#status_div_code').addClass('has-error');
                    $('#user_code').removeClass('sr-only');
                    $('#user_code').html('验证码错误！');
                    document.getElementById('code').focus();
                }
            //  就提示用户验证码错误
            });
    });
    $('#update').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("http://webchat.joker1996.com/password",
//                          ajax的post请求到User/user路由
            {
                password: $('#password').val()
//                          传用户注册的用户名验证
            },
            function (data) {
                if (data == 'success'){
                    $('#update').html('修改成功！三秒后跳转到登录页面！');
                    //给用户提示修改密码成功！
                    setTimeout(function () {
                        window.location.href='http://webchat.joker1996.com';
                        //登录界面
                        window.close();
                    //    关闭当前窗口
                    }, 3000);
                }

            });
    });
});