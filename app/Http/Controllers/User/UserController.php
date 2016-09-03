<?php

namespace App\Http\Controllers\User;

use App\Model\User\UserModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    //
    public function user(Request $request)
    {
        $name = $request->input('username');
//        获取用户名
        $status = UserModel::where('username', $name)->first();
//        如果存在用户名给用户提示
        if ($status) {
            return 'no';
        }
        return 'yes';

    }

    public function getUserMessage()
    {
        date_default_timezone_set('PRC');
//        设置中国时区
        $input = Input::except('password_c', '_token', 'picture');
//        排除不需要的字段
        UserModel::create($input);
//        添加数据到数据库
        UserModel::where('username', $input['username'])->update(['register_time' => date('Y-m-d H:i:s', time()),'lasttime'=>date('Y-m-d H:i:s', time())]);
//       注册时间和状态时间更新
        if (Input::file('picture')) {
            $file = Input::file('picture');
            $img = $file->getClientOriginalExtension();
//                获取图片的扩展名
            $new_name = date('Ymdhis') . mt_rand(100, 900) . '.' . $img;
//                  避免重命名，以当前时间，精确到秒加上三位数的随机数来命名。
            $file->move('uploads', $new_name);
//                移动到public目录下的uploads
            $filepath = 'uploads/' . $new_name;
//                获取完整的url路径

            UserModel::where('username', $input['username'])->update(['picture' => $filepath]);
//            如果存在的话，就把默认的图片修改成用户上传的图片

        }
        return redirect()->action('Email\SendMailController@send', [$input['username'],$input['email']]);
//        return redirect('Userlogin');
//        用重定向，不然许多图片无法显示

    }

    public function login($msg = 0)
    {
        return view('login.login',['msg'=>$msg]);
    }

    public function code()
    {
        session_start();
//        重点，每次用SESSION都要先开启session
        $code = new \Code();
//      实例化对象
        $code->make();
//        获取验证码图像
    }

    public function cookie()
    {
        $user = '';
        $pass = '';
        //        如果没有设置cooike就默认为空
        if (!empty($_COOKIE["UserName"]) && !empty($_COOKIE["UserPassword"])) {
            $user = $_COOKIE["UserName"];
            $pass = $_COOKIE["UserPassword"];
        }
//        如果存在cookie就赋值给两个变量
        $cookie = array('username' => $user, 'password' => $pass);
//        然后打包成数组
        return $cookie;
//        返回给视图

    }

    public function judge(Request $request)
    {

        $input = $request->all();
//        获取所有视图传过来的数据
        $user = UserModel::where('username', $input['username'])->first();
        if (!$user) {
            return 'username';
        }
//        如果用户名存在的话，就返回数据给视图，给用户提示
        if ($user->password != $input['password']) {
            return 'password';
        }
//        如果输入的密码不正确的话，就返回数据给视图，然后给用户提示
        session_start();
        //        重点，每次用SESSION都要先开启session
        $code = new \Code;
        //      实例化对象
        $_code = $code->get();
//        获取验证码
        if (strtoupper($input['code']) != $_code) {
            return 'code';
        }
//        用户输入的验证码大小写都可以
        if (isset($input['checkbox'])) {
//           如果传过来的数据有checkbox，代表设置cookie
            $vtime = true;
            $time = time() + 60 * 60 * 24 * 10;
//            设置10天
        } else {
            $vtime = false;
        }
        if ($vtime) {
            setcookie("UserName", "$user->username", "$time");
            setcookie("UserPassword", "$user->password", "$time");
//            设置cookie 10天有效期
        } else {
            setcookie("UserName", "username");
            setcookie("UserPassword", "$user->password");
//            否则设置cookie为浏览器关闭之前有效
        }
        $_SESSION['user'] = $user->username;
        $_SESSION['picture']=$user->picture;
//        设置session验证
        UserModel::where('username', $input['username'])->update(['register_time' => date('Y-m-d H:i:s', time()),'lasttime'=>date('Y-m-d H:i:s', time())]);
//       注册时间和状态时间更新
        return 'success';
//        返回成功标记
        
    }

   
}
