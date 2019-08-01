<?php

namespace app\common\model;

use think\Model;
use think\Db;
/**
 * 热门推荐
 */
class GiftLog Extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    // 追加属性
    protected $append = [
    ];


    public function get_count()
    {
        $list = Db::name('giftLog')
            ->alias('g')
            ->join('user u','u.id = g.receive_user_id')
            ->field('FROM_UNIXTIME(g.createtime,\'%i\') as minute,g.receive_user_id,sum(g.gaft_price) as momey,u.username')
            ->group('g.receive_user_id,minute')
            ->order('minute asc')
            ->select();


        return $list;
    }

}
