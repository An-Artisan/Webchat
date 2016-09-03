var editor = new wangEditor('div1');

// 上传图片（举例）
editor.config.uploadImgUrl = 'http://webchat.joker1996.com/upload';

// 配置自定义参数（举例）
editor.config.uploadParams = {
    token: 'abcdefg',
    user: 'wangfupeng1988'
};

// 设置 headers（举例）
editor.config.uploadHeaders = {
    'Accept': 'text/x-json',
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//    配置laravel的token验证

};


editor.config.hideLinkImg = true;
// 隐藏掉插入网络图片功能。该配置，只有在你正确配置了图片上传功能之后才可用。
editor.config.menus = $.map(wangEditor.config.menus, function (item, key) {
    if (item === 'video') {
        return null;
    }
    if (item === 'location') {
        return null;
    }
    if (item === 'insertcode') {
        return null;
    }
    if (item === 'table') {
        return null;
    }
    return item;
});
// 隐藏不必要的菜单栏
editor.config.uploadImgFileName = 'myFileName';
// 统一后台的FILE['myFileName']
editor.config.emotions = {
    // 支持多组表情

    // 第一组，id叫做 'default' 
    'default': {
        title: '默认',  // 组名称
        data: [
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_1.png",
                value: "[呵呵]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_2.png",
                value: "[哈哈]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_3.png",
                value: "[吐舌]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_4.png",
                value: "[啊]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_5.png",
                value: "[酷]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_6.png",
                value: "[怒]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_7.png",
                value: "[开心]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_8.png",
                value: "[汗]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_9.png",
                value: "[泪]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_10.png",
                value: "[黑线]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_11.png",
                value: "[鄙视]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_12.png",
                value: "[不高兴]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_13.png",
                value: "[真棒]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_14.png",
                value: "[钱]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_15.png",
                value: "[疑问]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_16.png",
                value: "[阴险]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_17.png",
                value: "[吐]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_18.png",
                value: "[咦]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_19.png",
                value: "[委屈]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_20.png",
                value: "[花心]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_21.png",
                value: "[呼~]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_22.png",
                value: "[笑眼]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_23.png",
                value: "[冷]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_24.png",
                value: "[太开心]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_25.png",
                value: "[滑稽]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_26.png",
                value: "[勉强]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_27.png",
                value: "[狂汗]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_28.png",
                value: "[乖]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_29.png",
                value: "[睡觉]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_30.png",
                value: "[惊哭]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_31.png",
                value: "[升起]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_32.png",
                value: "[惊讶]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_33.png",
                value: "[喷]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_34.png",
                value: "[爱心]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_35.png",
                value: "[心碎]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_36.png",
                value: "[玫瑰]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_37.png",
                value: "[haha]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_38.png",
                value: "[胜利]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_39.png",
                value: "[大拇指]"
            },
            {
                icon: "http://webchat.joker1996.com/Editor/emoji/emoji_40.png",
                value: "[弱]"
            }

        ]  // data 可以是一个url地址，访问该地址要能返回表情包的json文件
    },
    // 第二组，id叫做'weibo'
    'weibo': {
        title: '微博表情',  // 组名称
        data: [{
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif",
            value: "[草泥马]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif",
            value: "[神马]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif",
            value: "[浮云]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif",
            value: "[给力]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif",
            value: "[围观]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif",
            value: "[威武]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6e/panda_thumb.gif",
            value: "[熊猫]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/81/rabbit_thumb.gif",
            value: "[兔子]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/otm_thumb.gif",
            value: "[奥特曼]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/15/j_thumb.gif",
            value: "[囧]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/89/hufen_thumb.gif",
            value: "[互粉]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c4/liwu_thumb.gif",
            value: "[礼物]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/ac/smilea_thumb.gif",
            value: "[呵呵]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0b/tootha_thumb.gif",
            value: "[嘻嘻]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6a/laugh.gif",
            value: "[哈哈]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/14/tza_thumb.gif",
            value: "[可爱]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/af/kl_thumb.gif",
            value: "[可怜]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a0/kbsa_thumb.gif",
            value: "[挖鼻屎]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f4/cj_thumb.gif",
            value: "[吃惊]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6e/shamea_thumb.gif",
            value: "[害羞]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c3/zy_thumb.gif",
            value: "[挤眼]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/29/bz_thumb.gif",
            value: "[闭嘴]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/71/bs2_thumb.gif",
            value: "[鄙视]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/lovea_thumb.gif",
            value: "[爱你]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/9d/sada_thumb.gif",
            value: "[泪]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/19/heia_thumb.gif",
            value: "[偷笑]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/8f/qq_thumb.gif",
            value: "[亲亲]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/b6/sb_thumb.gif",
            value: "[生病]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/58/mb_thumb.gif",
            value: "[太开心]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/17/ldln_thumb.gif",
            value: "[懒得理你]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/98/yhh_thumb.gif",
            value: "[右哼哼]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/zhh_thumb.gif",
            value: "[左哼哼]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a6/x_thumb.gif",
            value: "[嘘]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/af/cry.gif",
            value: "[衰]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/73/wq_thumb.gif",
            value: "[委屈]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/9e/t_thumb.gif",
            value: "[吐]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f3/k_thumb.gif",
            value: "[打哈欠]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/27/bba_thumb.gif",
            value: "[抱抱]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7c/angrya_thumb.gif",
            value: "[怒]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/5c/yw_thumb.gif",
            value: "[疑问]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/a5/cza_thumb.gif",
            value: "[馋嘴]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/88_thumb.gif",
            value: "[拜拜]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/e9/sk_thumb.gif",
            value: "[思考]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/24/sweata_thumb.gif",
            value: "[汗]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7f/sleepya_thumb.gif",
            value: "[困]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6b/sleepa_thumb.gif",
            value: "[睡觉]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/90/money_thumb.gif",
            value: "[钱]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0c/sw_thumb.gif",
            value: "[失望]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/cool_thumb.gif",
            value: "[酷]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/8c/hsa_thumb.gif",
            value: "[花心]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/49/hatea_thumb.gif",
            value: "[哼]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/36/gza_thumb.gif",
            value: "[鼓掌]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d9/dizzya_thumb.gif",
            value: "[晕]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/1a/bs_thumb.gif",
            value: "[悲伤]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/62/crazya_thumb.gif",
            value: "[抓狂]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/91/h_thumb.gif",
            value: "[黑线]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6d/yx_thumb.gif",
            value: "[阴险]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/89/nm_thumb.gif",
            value: "[怒骂]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/hearta_thumb.gif",
            value: "[心]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/ea/unheart.gif",
            value: "[伤心]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/58/pig.gif",
            value: "[猪头]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d6/ok_thumb.gif",
            value: "[ok]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d9/ye_thumb.gif",
            value: "[耶]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d8/good_thumb.gif",
            value: "[good]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c7/no_thumb.gif",
            value: "[不要]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d0/z2_thumb.gif",
            value: "[赞]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/40/come_thumb.gif",
            value: "[来]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d8/sad_thumb.gif",
            value: "[弱]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/91/lazu_thumb.gif",
            value: "[蜡烛]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6a/cake.gif",
            value: "[蛋糕]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/d3/clock_thumb.gif",
            value: "[钟]"
        }, {
            icon: "http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/1b/m_thumb.gif",
            value: "[话筒]"
        }
        ]

    }
    // 下面还可以继续，第三组、第四组、、、
};

editor.create();


$('#btn1').click(function () {
    // 获取编辑器区域完整html代码
    var html = editor.$txt.html();
    console.log(html);
    // 获取编辑器纯文本内容
    // var text = editor.$txt.text();
    // console.log(text);

    // 获取格式化后的纯文本
    // var formatText = editor.$txt.formatText();
    // console.log(formatText);

});
var iframe = document.getElementById('child');
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    iframe.onload = function() {
//以下操作必须在iframe加载完后才可进行，不然先执行ajax会提示childFunctionGet不存在这个函数
        var setting = {
            type: 'POST',
            url:'http://webchat.joker1996.com/getmessage',
            dataType:'json',
            data:{sender:$('#sender').text(),getter:$('#getter').text()},
            success:function(data){
                audio.play();
                /*
                 * jquery选择器所以返回的是jquery对象而非dom对象，
                 * 而jquery对象是没有play()方法的，你要么将jquery对象转换成dom对象，
                 * 要么使用源生选择器document.getElementById
                 * 这里选择用的是原生的js代码
                 * */
                console.log(data);
                child.window.childFunctionGet(data.content,data.time,data.picture);
                //成功时把数据传给iframe
                setTimeout(function(){$.ajax(setting)},1000);
                // $.ajax(setting);
                //    立马再次执行ajax轮询

            }
        };
        $.ajax(setting);
    };

});

document.onkeydown = function (event) {
    var e = event || window.event || arguments.callee.caller.arguments[0];
    if (e && e.keyCode == 13) { // 按 enter  e.ctrlKey代表ctrl
        if (editor.$txt.html() != '<p><br></p>') {
            str = getNowFormatDate();
            child.window.childFunctionSend(editor.$txt.html(),str,$('#picture').text());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("http://webchat.joker1996.com/sendmessage",
//                          ajax的post请求到wangEditor/getContent.php路由
                {
                    content: editor.$txt.html(),
//                          传用户注册的用户名验证
                    getter:$('#getter').text(),
                    sender:$('#sender').text()

                },
                function (data) {
                    if (data != 'success') {
                        alert('发送消息失败');
                    }

                });
            editor.$txt.html('');
        //    清空编辑器
        }
    }

};
function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    var hour = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    if (hour >= 0 && hour <= 9) {
        hour = "0" + hour;
    }
    if (minutes >= 0 && minutes <= 9) {
        minutes = "0" + minutes;
    }
    if (seconds >= 0 && seconds <= 9) {
        seconds = "0" + seconds;
    }
    var currentdate = year + seperator1 + month + seperator1 + strDate
        + " " + hour + seperator2 + minutes
        + seperator2 + seconds;

    return currentdate;
}
//js的当前时间戳自定义函数

var audio = document.getElementById("voice");
//获取聊天提示音
