<?php

namespace App\Http\Controllers\Update;

use App\Model\User\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UpdateController extends Controller
{
    //
    public function update()
    {
        return view('update.update');
//        返回到修改密码界面
    }

    public function send()
    {
        $all = Input::all();
        $email = $all['email'];
        $phpmailer = new \PHPMailer();
//        实例化phpmailer
        $str = '12345678900123456789';
        $code = substr(str_shuffle(substr($str, 0, 20)), 0, 4);
//        设置一个随机4位数
        date_default_timezone_set('PRC');
//      时区设置。
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
        $phpmailer->Subject = '尊敬的' . $_SESSION['user'] . '用户：您好！';
//        邮件主题
        $phpmailer->Body = '你的验证码为：' . $code;
//        设置收信人
        $phpmailer->CharSet = 'UTF-8';
//        设置字符集，163邮箱不设置，会乱码
        $phpmailer->AddAddress($email, '刘强');
//        增加一个收件人地址(邮件目的地址).以及发送人的名字
//        $phpmailer->AddCC('1090035743@qq.com','刘强');
//        添加一个密送
        if (!$phpmailer->send()) {
            return 'false';
        }
//        如果发送失败，就返回false
        $_SESSION['code'] = $code;
//        把验证码存在session里面，好验证
        return 60;
//        发送成功返回60
    }

    public function verify()
    {
        $all = Input::all();
//        获取ajax过来的所有数据
        $code = $_SESSION['code'];
//        获取验证码
        if ($all['code'] == $code) {
            return 'success';
        }
//        判断如果相等就返回success
        return 'fail';
//        否则就返回fail
    }

    public function password()
    {
        session_write_close();
//        解开session锁
        $all = Input::all();
//        获取所有数据
        $password = $all['password'];
//        获取新密码
        UserModel::where('username', $_SESSION['user'])->update(['password' => $password]);
//        新密码写入数据库
        return 'success';
//        返回成功标记
    }
}
