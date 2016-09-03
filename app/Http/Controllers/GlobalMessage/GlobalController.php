<?php

namespace App\Http\Controllers\GlobalMessage;

use App\Model\Message\MessageModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GlobalController extends Controller
{
    //
    public function getmessage()
    {
        $user = Input::all();
//        获取所有的ajax传过来的数据
        session_write_close();
//        接触session锁，重要。在框架开发中，多个ajax并发程序经过session中间件，会导致程序卡死
        set_time_limit(0);
//        设置响应时间为无限

        while (true) {
            $all = MessageModel::where('getter', $user['sender'])->where('is_read', 0)->where('msg_read', 0)->distinct()->pluck('sender');
//          找所有人给当前用户发送的未读消息，且全局消息状态不为1的记录
            foreach ($all as $key => $value) {
                $data = array($key => $value);
                MessageModel::where('sender', $value)->update(['msg_read' => 1]);
//          如果有数据就立即处理全局状态为1
            }
//          把对象转成数组判断是否有消息
            if (!empty($data)) {
//          如果有数据就返回
                return $all;
//          退出脚本并返回数据
            }
            usleep(5000);
//          每隔1/1000秒执行一次
        }
    }
}
