<?php

namespace App\Http\Controllers\Chat;

use App\Model\Message\MessageModel;
use App\Model\User\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SendMessageController extends Controller
{

    public function sendmessage()
    {
        date_default_timezone_set('PRC');
//        设置中国时区
        $all = Input::all();
        $msg = new MessageModel();
        $msg->getter = $all['getter'];
        $msg->sender = $all['sender'];
        $msg->content = $all['content'];
        $msg->time = date('Y-m-d H:i:s', time());
        $msg->save();
//        更新一条消息
        UserModel::where('username',$all['sender'])->update(['lasttime' => date('Y-m-d H:i:s', time())]);
//        更新当前用户的状态时间，用于确定是否在线
        return 'success';
    }
}
