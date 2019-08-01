<?php

namespace app\common\model;

use think\Model;

/**
 * 短信验证码
 */
class Pretend Extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    // 追加属性
    protected $append = [
    ];

    public function getTypeList()
    {
        return ['1' => __('头饰'), '2' => __('座驾')];
    }

    /**
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取礼物
     */
    public function get_list()
    {

        $map = [];
        if(input('type/d',0)){
            $map['type'] = input('type/d');
        }
        return $this->where($map)->order('price desc')->paginate(input('list_rows/d',15))->each(function ($item,$key){
            $type_list = $this->getTypeList();
            $item['type'] = $type_list[$item['type']];

        });
    }

}
