<?php

namespace app\common\model;

use think\Model;
use app\common\model\RoomLabel;

/**
 * 房间详情
 */
class RoomInfo Extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    // 追加属性
    protected $append = [
    ];


    public function get_list($map = [])
    {

        $list =  $this->alias('ri')->field('ri.*,rc.name as room_class_name,u.username,u.nickname,avatar')
            ->join('__ROOM_CLASS__ rc','rc.id=ri.room_class_id')
            ->join('__USER__ u','u.id=ri.user_id')
            ->where($map)
            ->paginate(input('list_rows/d',15))
            ->each(function ($item,$key){
                $RoomLabel = new RoomLabel();
                $item['room_labels'] = $RoomLabel->where('id','in',explode(',',$item->room_label_ids))->order('weigh desc')->select();

            });
        return $list;
    }

    /**
     * @param array $map
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取房间详情
     */
    public function get_info($map=[])
    {
        $RoomLabel = new RoomLabel();
        $info =  $this->alias('ri')->field('ri.*,rc.name as room_class_name,u.username,u.nickname,avatar')
                ->join('__ROOM_CLASS__ rc','rc.id=ri.room_class_id')
                ->join('__USER__ u','u.id=ri.user_id')
                ->where($map)->find();



        if ($info){
            //标签
            $info->room_labels = $RoomLabel->where('id','in',explode(',',$info->room_label_ids))->order('weigh desc')->select();
            //配置文件
            $info->room_config = [];
            //观众
            $info->room_users = [];
        }
        return $info;
    }

}
