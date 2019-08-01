<?php

namespace app\admin\model;

use think\Model;


class UserGoodnum extends Model
{

    

    //数据库
    protected $connection = 'database';
    // 表名
    protected $name = 'user_goodnum';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'is_use_text',
        'usetime_text'
    ];
    

    
    public function getIsUseList()
    {
        return ['1' => __('Is_use 1'), '0' => __('Is_use 0')];
    }


    public function getIsUseTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['is_use']) ? $data['is_use'] : '');
        $list = $this->getIsUseList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getUsetimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['usetime']) ? $data['usetime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setUsetimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
