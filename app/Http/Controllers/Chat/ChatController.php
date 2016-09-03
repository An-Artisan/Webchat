<?php

namespace App\Http\Controllers\Chat;

use App\Model\Message\MessageModel;
use App\Model\User\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ChatController extends Controller
{
    //
    public function chatlist()
    {

        $all = UserModel::where('username', '!=', $_SESSION['user'])->orderBy('lasttime','desc')->paginate(6);
//        在线的排在前面，获取所有数据
        return view('chat.chatList', ['user_all' => $all]);
//        返回数据到视图

    }

    public function window($getter)
    {
        MessageModel::where('sender','!=',$getter)->where('getter',$_SESSION['user'])->update(['msg_read'=>0]);
//        给全局信息提示重新赋值0
        return view('chat.chatPage',['getter' =>$getter]);
//        返回要聊天的对象
    }

    public function record($getter)
    {
        $all_record = MessageModel::where('sender',$getter)->where('getter',$_SESSION['user'])->orWhere('sender',$_SESSION['user'])->where('getter',$getter)->orderBy('time','asc')->get();
//       获取所有的两个人的所有信息
        return view('chat.chatAllRecord',['all_record'=>$all_record]);
    }
    public function iframe()
    {
        return view('chat.chatContent');
//        返回iframe框架
    }

    public function upload()
    {
        $file = Input::file('myFileName');
        $img = $file->getClientOriginalExtension();
        $new_name = date('Ymdhis') . mt_rand(100, 900) . '.' . $img;
//                  避免重命名，以当前时间，精确到秒加上三位数的随机数来命名。
        $file->move('Editor/uploadfiles', $new_name);
//                移动到public目录下的uploads
        $filepath = 'http://webchat.joker1996.com/Editor/uploadfiles/' . $new_name;
//                获取完整的url路径,默认的路径是public
        return $filepath;
    }




    

}
