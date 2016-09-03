<?php

namespace App\Http\Controllers\Chat;

use App\Model\Message\MessageModel;
use App\Model\User\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GetMessageController extends Controller
{
    //
    public function getmessage()
    {
        $get_msg = Input::all();
//        获取ajax过来的数据
        session_write_close();
//        接触session锁，重要。在框架开发中，多个ajax并发程序经过session中间件，会导致程序卡死
        set_time_limit(0);
//        设置响应时间为无限

        while (true) {
            $msg = MessageModel::where('getter', $get_msg['sender'])->where('sender', $get_msg['getter'])->where('is_read', 0)->first();
//            获取自己的数据
            if (!empty($msg->content)) {
//                如果有数据就返回
                $picture = UserModel::where('username',$msg->sender)->first();
//               获取对方的头像
                $data = array('content' => $msg->content, 'time' => $msg->time,'picture'=> $picture->picture);
//                造一个数组，返回是json格式，因为php的数组和js的json对象恰好一样
                MessageModel::where('m_id', $msg->m_id)->update(['is_read' => 1]);
//                然后把未读消息，改为已读
                $msg = json_encode($data);
//                把数组转成json格式,这里不能用之前用过的变量覆盖
                exit($msg);
//                退出脚本并返回数据
            }

            usleep(5000);
//            每隔1/1000秒执行一次
        }
    }
}
