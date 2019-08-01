<?php

namespace app\common\model;


use think\Model;
use think\Db;
use think\Request;
use think\Validate;

/**
 * 我的房间（未认证）
 */
class Roomnocert Extends Model
{

    protected $table = '';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    // 追加属性
    protected $append = [
    ];

    /**
     * 身份认证
     */
    public function cert($res){

        return Db::name('userCard')->insert($res);

    }

    /**
     * 常见问题
     */

    public function get_matter(){

        $list = Db::name('matter')
            ->order('createtime desc')
            ->paginate(10,false,['query' => Request::instance()->request()]);

        return $list;
    }
}
