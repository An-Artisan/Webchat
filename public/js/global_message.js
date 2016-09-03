$(function () {

    $('ul input[type="button"]').click(function (ev) {
//      ul下的所有Input标签类型为button的点击事件
        $('ul li').removeClass('lightpink');
//      先清除背景
        $(this).parent().addClass('lightpink');
//      在添加当前选中的背景
        $('#getter').html($(this).parent().children("div").first().text());
//      获取昵称
        $('#now').html('正在和');
//      给用户提示
        $('#chat').html('聊天......');
//      给用户提示
        window.open("http://webchat.joker1996.com/ChatWindow/" + $(this).parent().children("div").first().text());
//        跳转到聊天的页面，并且传当前的用户值过去
        $(this).parent().children("span").removeClass("glyphicon glyphicon-comment");
    //    清除消息提示
    });
    $('ul input[type="submit"]').click(function (ev) {
//      ul下的所有Input标签类型为submit的点击事件
        $('#now').html('正在查看与');
//      给用户提示
        $('#chat').html('的聊天记录....');
//      给用户提示
        $('#getter').html($(this).parent().children("div").first().text());
//      获取昵称
        window.open("http://webchat.joker1996.com/AllRecord/" + $(this).parent().children("div").first().text());
//        跳转到聊天的页面，并且传当前的用户值过去
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var setting = {
        type: 'POST',
        url:'http://webchat.joker1996.com/global',
        dataType:'json',
        data:{sender:$('#sender').text()},
        success:function(data){

            /*
             * jquery选择器所以返回的是jquery对象而非dom对象，
             * 而jquery对象是没有play()方法的，你要么将jquery对象转换成dom对象，
             * 要么使用源生选择器document.getElementById
             * 这里选择用的是原生的js代码
             * */

            $("div[name='username']").each(
                //循环name值等于username的标签
                function(){
                     if(data.indexOf($(this).html())!= -1 && $(this).html()!=$('#getter').html() ){

                         $(this).parent().children("span").first().addClass('glyphicon glyphicon-comment');
                     }
                    //如果返回的数据能找到且不等于当前聊天的对象就增加消息提示
                }
            );
            setTimeout(function(){$.ajax(setting)},1000);
            //    立马再次执行ajax轮询

        }
    };
    $.ajax(setting);
});