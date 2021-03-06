<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\Banner as M;

/**
 * banner接口
 */
class Banner extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页轮播图
     *
     * @ApiTitle    (首页轮播图)
     * @ApiSector   (banner接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/banner)
     * @ApiReturnParams   (name="code", type="integer", required=true, sample="0")
     * @ApiReturnParams   (name="msg", type="string", required=true, sample="返回成功")
     * @ApiReturnParams   (name="data", type="object", sample="", description="扩展数据返回")
     * @ApiReturn   ({
        "code": 1,
        "msg": "请求成功",
        "time": "1562658685",
        "data": [
            {
            "id": 1,
            "name": "么么哒2",
            "image": "/uploads/20190709/7127377ce3134099cd0e21762856272a.jpg",
            "url": "http://192.168.1.181:8002/",
            "createtime": 1562658681,
            "weigh": 1
            }
        ]
     })
     */
    public function index()
    {
        $Banner = new M();
        $list = $Banner->get_banner();
        $this->success('请求成功',$list);
    }

}
