<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('User/register', function () {
    return view('register.index');
});
Route::post('User/user', 'User\UserController@user');
//判断用户是否已经注册
Route::post('User/getUserMessage', 'User\UserController@getUserMessage');
//注册用户信息
Route::get('/', 'User\UserController@login');
//登录界面
Route::get('User/code', 'User\UserController@code');
//验证码界面
Route::post('User/judge', 'User\UserController@judge');
//判断用户密码界面
Route::post('User/cookie', 'User\UserController@cookie');
//设置cookie界面
Route::get('Mail/mail/{username}/{email}','Email\SendMailController@send');
//设置发送邮箱路由，接收重定向此路由的两个参数
Route::get('Mail/verify/{random}','Email\SendMailController@random');
//设置发送邮箱路由，接收重定向此路由的两个参数
Route::group(['middleware' => 'session'], function () {
    Route::get('User/chatlist', ['uses' => 'Chat\ChatController@chatlist']);
//    好友列表
    Route::get('User/iframe', ['uses' => 'Chat\ChatController@iframe']);
//    iframe内联框架
    Route::post('upload', ['uses' => 'Chat\ChatController@upload']);
//    发送图片
    Route::post('sendmessage', ['uses' => 'Chat\SendMessageController@sendmessage']);
//    发送消息
    Route::post('getmessage', ['uses' => 'Chat\GetMessageController@getmessage']);
//    获取消息
    Route::get('ChatWindow/{getter}', ['uses' => 'Chat\ChatController@window']);
//    聊天窗口
    Route::get('AllRecord/{getter}', ['uses' => 'Chat\ChatController@record']);
//    查看聊天记录
    Route::post('global', ['uses' => 'GlobalMessage\GlobalController@getmessage']);
//    得到全局信息
    Route::get('update', ['uses' => 'Update\UpdateController@update']);
//    返回修改界面
    Route::post('Send/email', ['uses' => 'Update\UpdateController@send']);
//    发送修改密码验证码
    Route::post('verify', ['uses' => 'Update\UpdateController@verify']);
//   判断验证码是否正确
    Route::post('password', ['uses' => 'Update\UpdateController@password']);
//   修改密码


});
