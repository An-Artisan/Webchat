$(function () {
    var password = '';
    var password_c = '';
    var username = '';
    var email = '';
    $("#username").blur(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//                设置laravel的CSFR验证
        $.post("http://webchat.joker1996.com/User/user",
//                          ajax的post请求到User/user路由
            {
                username: $('#username').val()
//                          传用户注册的用户名验证
            },
            function (data, status) {
                if (status == 'success' && data == 'yes') {
                    $('#status_span').removeClass('glyphicon-remove');
                    $('#status_div').removeClass('has-error');
                    $('#status_span').addClass('glyphicon-ok ');
                    $('#status_div').addClass('has-success ');
                    $('#user_s').addClass('sr-only');
                    username = $('#username').val();
                }
//                                    如果通过，则给用户提示
                else {
                    $('#status_span').addClass('glyphicon-remove');
                    $('#status_div').addClass('has-error');
                    $('#user_s').removeClass('sr-only');
                    $('#user_s').html('用户已经存在，请重新输入！');
                }
//                            不通过，给用户提示
            });
    });
    $("#password").blur(function () {
        password = $('#password').val();
        if (password == '') {
            $('#status_span_p').addClass('glyphicon-remove');
            $('#status_div_p').addClass('has-error');
            $('#user_p').html('密码不能为空！');
            $('#user_p').removeClass('sr-only');
            return;
        }
        if (password.length < 6) {
            $('#status_span_p').addClass('glyphicon-remove');
            $('#status_div_p').addClass('has-error');
            $('#user_p').html('密码不能小于6位');
            $('#user_p').removeClass('sr-only');
            return;
        }
        if (password.length > 16) {
            $('#status_span_p').addClass('glyphicon-remove');
            $('#status_div_p').addClass('has-error');
            $('#user_p').html('密码不能大于16位');
            $('#user_p').removeClass('sr-only');
            return;
        }
        $('#status_span_p').removeClass('glyphicon-remove');
        $('#status_div_p').removeClass('has-error');
        $('#status_span_p').addClass('glyphicon-ok ');
        $('#status_div_p').addClass('has-success ');
        $('#user_p').addClass('sr-only');

    });
    $("#password_c").blur(function () {
        password_c = $('#password_c').val();
        if (password != password_c) {
            $('#status_span_cp').addClass('glyphicon-remove');
            $('#status_div_cp').addClass('has-error');
            $('#user_cp').html('两次密码输入不匹配，请重新输入!');
            $('#user_cp').removeClass('sr-only');
            return;
        }
        $('#status_span_cp').removeClass('glyphicon-remove');
        $('#status_div_cp').removeClass('has-error');
        $('#status_span_cp').addClass('glyphicon-ok ');
        $('#status_div_cp').addClass('has-success ');
        $('#user_cp').addClass('sr-only');

    });
    $("#email").blur(function () {

        var judgeUsername = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
        // 匹配邮箱的正则表达式
        if (judgeUsername.test(document.getElementsByName('email')[0].value)) {
            $('#status_span_email').removeClass('glyphicon-remove');
            $('#status_div_email').removeClass('has-error');
            $('#status_span_email').addClass('glyphicon-ok ');
            $('#status_div_email').addClass('has-success ');
            $('#email').addClass('sr-only');
            email = $('#email').val();
        }
        else {
            $('#status_span_email').addClass('glyphicon-remove');
            $('#status_div_email').addClass('has-error');
            $('#email_t').removeClass('sr-only');
            $('#email_t').html('邮箱格式不正确！');
            document.getElementById('email').focus();
        }
    });
    $("form").submit(function () {
        if (username == '' || password == '' || password_c == '' || email == '') {
            return false;
        }
//            有一个为空的时候就不能提交表单
    });
    $(".file").change(function () {

        var pic = document.getElementById('file').files[0];
        // 二进制对象
        var src = window.URL.createObjectURL(pic);
        $('#header').attr("src", src);
        $('#header').attr("width", '100px');
        $('#header').attr("height", '100px');
        // 把二进制对象直接读成浏览器显示的资源
    });
});