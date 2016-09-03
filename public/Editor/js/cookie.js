$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//                设置laravel的CSFR验证
    $.ajax({
        type: 'POST',
        //设置POST方式请求
        url: 'http://webchat.joker1996.com/User/cookie',
        //设置请求地址
        dataType: 'json',
        //返回数据格式
        success: function(data){
            $('#username').val(data.username);
            $('#password').val(data.password);
            $('#j_remember').attr("checked", true);
        //    如果成功调用会掉函数，设置cookie
        }
    });

});