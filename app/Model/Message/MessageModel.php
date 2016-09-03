<?php

namespace App\Model\Message;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{

    protected $table='message';
//    设置表名
    protected $primaryKey='m_id';
//    设置主键
    public $timestamps=false;
//    不需要系统自带的两个字段
    protected $guarded=[];
//    表示任何字段都能用create填充
    
}
