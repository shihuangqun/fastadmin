<?php

namespace app\admin\model;

use think\Model;


class RoomInfo extends Model
{

    

    //数据库
    protected $connection = 'database';
    // 表名
    protected $name = 'room_info';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'room_status_text',
        'is_hot_text'
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }

    
    public function getRoomStatusList()
    {
        return ['1' => __('Room_status 1'), '2' => __('Room_status 2')];
    }

    public function getIsHotList()
    {
        return ['0' => __('Is_hot 0'), '1' => __('Is_hot 1')];
    }


    public function getRoomStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['room_status']) ? $data['room_status'] : '');
        $list = $this->getRoomStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsHotTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['is_hot']) ? $data['is_hot'] : '');
        $list = $this->getIsHotList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function roomclass()
    {
        return $this->belongsTo('RoomClass', 'room_class_id', 'name', [], 'LEFT')->setEagerlyType(0);
    }


    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
