<?php

namespace App\Http\Controllers\Email;

use App\Model\Email\StatusModel;
use App\Model\User\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SendMailController extends Controller
{
    //
    public function send($username,$email)
    {
        $phpmailer = new \PHPMailer();
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456!@#$%';
        $code = substr(str_shuffle(substr($str, 0,52)),0,8);
// 五天后过期
        $expire = time()+5*24*3600;

//        $sql  = "insert into activecode (uname,code,expire) values ('$uname','$code','$expire')";
        $status = new StatusModel();
        $expire = time()+5*24*3600;
        $status->username = $username;
        $status->code = $code;
        $status->expire = $expire;
        $status->save();
//        更新激活状态表记录
        date_default_timezone_set('PRC');
// 时区设置。
        $phpmailer->IsSMTP();
//        SMTP邮件协议
        $phpmailer->Host = 'smtp.163.com';
//        设置注定要转换的邮箱服务器
        $phpmailer->Port = 25;
//        设置邮箱SMTP的端口号，默认位25
        $phpmailer->SMTPAuth = true;
//        SMTP服务器是否需要认证,使用了用户名和密码变量.
        $phpmailer->Username = '13330295142@163.com';
//        设置登录用户名
        $phpmailer->Password = 'yatou199412';
//        登录密码

//        现在可以发信了
        $phpmailer->From = '13330295142@163.com';
//        发件人地址,必须写13330295142@163.com的地址
        $phpmailer->FromName = 'joker1996.com';
//        收件人姓名
        $phpmailer->Subject = '尊敬的'.$username.'用户：欢迎您注册，你的激活邮件';
//        邮件主题
        $phpmailer->Body = '请点击链接:http://webchat.joker1996.com/Mail/verify/'.$code.' 进行激活，如不能打开连接，请复制连接到浏览器打开！';
//        设置收信人
        $phpmailer->CharSet = 'UTF-8';
//        设置字符集，163邮箱不设置，会乱码
        $phpmailer->AddAddress($email,'刘强');
//        增加一个收件人地址(邮件目的地址).以及发送人的名字
//        $phpmailer->AddCC('1090035743@qq.com','刘强');
//        添加一个密送
        if (!$phpmailer->send()) {
            echo "邮件错误信息: " . $phpmailer->ErrorInfo;
            echo '<br>';
            exit('邮箱发送失败，请稍后再试！');
        }
        return view('verify.verify',['send'=>'send']);
    }

    public function random($code)
    {

        $verify = StatusModel::where('code',$code)->first();
        if(empty($verify->code)){ //判断激活码是否存在
            exit('激活码错误');
        }
        if (strlen($code)!=8) {
            exit('激活码错误');
        }

// 判断激活码是否已过期
        if(time()>$verify->expire){
            exit('激活码已过期，请重新申请！');
        }
// 激活用户

       UserModel::where('username',$verify->username)->update(['status'=>1]);

// 把此激活码作废
       StatusModel::where('code',$code)->update(['expire'=>0]);
        return  view('verify.verify',['active'=>'active']);

    }
    
}
