<?php

namespace app\common\model;

use think\Model;
use think\Db;
use think\Request;

/**
 * 搜索页
 */
class Search Extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    // 追加属性
    protected $append = [
    ];

    public function get_user($keyword){

        $list = Db::name('roomInfo')
            ->alias('r')
            ->join('user u','u.id = r.user_id')
            ->field('r.*,u.username,u.gender')
            ->where('r.id|r.room_title|u.username','like','%'.$keyword.'%')
            ->select();
        return $list;
    }

}
