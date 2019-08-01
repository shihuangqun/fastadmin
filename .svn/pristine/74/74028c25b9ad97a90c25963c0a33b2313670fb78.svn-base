<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\Pretend as M;

/**
 * 装扮商城
 */
class Pretend extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 礼物列表
     *
     * @ApiTitle    (装扮商城列表)
     * @ApiSector   (装扮商城)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/pretend)
     * @ApiParams  (name="type", type="integer", required=false, description="1头饰，2座驾", sample="1")
     * @ApiParams  (name="page", type="integer", required=false, description="当前页", sample="1")
     * @ApiParams  (name="list_rows", type="integer", required=false, description="分页数量", sample="15")
     * @ApiReturn   ({
    "code": 1,
    "msg": "请求成功",
    "time": "1562658685",
    "data": {
    "total": 2,
    "per_page": 15,
    "current_page": 1,
    "last_page": 1,
    "data": [
    {
    "id": 2,
    "name": "牛逼座驾",
    "price": 120,
    "days": 5,
    "image": "/uploads/20190709/bc208d7786180aec3eaf99713e0fa2e2.png",
    "createtime": 1562660158,
    "type": "座驾",
    "status": 1,
    "weigh": 2
    },
    {
    "id": 1,
    "name": "牛逼头饰",
    "price": 100,
    "days": 0,
    "image": "/uploads/20190709/7127377ce3134099cd0e21762856272a.jpg",
    "createtime": 1562654294,
    "type": "头饰",
    "status": 1,
    "weigh": 1
    }
    ]
    }
    })
     */
    public function index()
    {
        $m = new M();
        $list = $m->get_list();
        $this->success('请求成功',$list);
    }
}
