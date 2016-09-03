<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{
    //
    protected $table='register';
//    设置表名
    protected $primaryKey='user_id';
//    设置主键
    public $timestamps=false;
//    不需要系统自带的两个字段
    protected $guarded=[];
//    表示任何字段都能用create填充
}
