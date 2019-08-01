<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\Gift as M;

/**
 * 礼物接口
 */
class Gift extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 礼物列表
     *
     * @ApiTitle    (礼物列表)
     * @ApiSector   (礼物接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/gift)
     * @ApiReturn   ({
    "code": 1,
    "msg": "请求成功",
    "time": "1562658685",
    "data": [
    {
    "id": 1,
    "name": "么么哒",
    "price": 100,
    "small_image": "/uploads/20190709/bc208d7786180aec3eaf99713e0fa2e2.png",
    "big_image": "/uploads/20190709/bc208d7786180aec3eaf99713e0fa2e2.png",
    "createtime": 1562655069,
    "updatetime": 1562655154,
    "status": 1
    }
    ]
    })
     */
    public function index()
    {
        $m = new M();
        $list = $m->get_list();
        $this->success('请求成功',$list);
    }
}
