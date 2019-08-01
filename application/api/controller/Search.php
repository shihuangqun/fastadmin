<?php

namespace app\api\controller;

use app\common\controller\api;
use app\common\model\Search as M;

/**
 * 搜索页
 */
class Search extends Api{

    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];


    /**
     * 搜索页接口
     *
     * @ApiRoute    (/api/search/index/keyword/{keyword})
     * @param string $keyword 搜索条件（昵称|唱聊ID|房间名）
     * @ApiReturn   ({
            "code": 1,
            "msg": "请求成功",
            "time": "1564385805",
            "data": [
                {
                "id": 10000,
                "user_id": 2,
                "room_class_id": 2,
                "room_label_ids": "2,1",
                "room_title": "滴啥都会",
                "room_desc": "啊实打实",
                "online_number": 11,
                "room_status": 2,
                "password": "",
                "createtime": 1562664209,
                "updatetime": 1564211634,
                "weigh": 10000,
                "is_hot": 1,
                "username": "陆小魁",
                "gender": 0
                }
            ]
        })
     */
    public function index(){

        $keyword = $this->request->request('keyword');

        if(!$keyword) $this->error('缺少搜索条件');
        $model = new M();
        $list = $model->get_user($keyword);

        if(!$list){
            $this->error('未找到您想搜索的内容，可换个词重新搜索~~~');
        }

        $this->success('请求成功',$list);
    }
}