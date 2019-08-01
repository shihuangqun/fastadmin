<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\ConfRecharge as M;

/**
 * 充值配置接口
 */
class Confrecharge extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 充值配置接口
     *
     * @ApiTitle    (充值配置接口)
     * @ApiSector   (充值配置接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/confrecharge)
     * @ApiReturn   ({
    "code": 1,
    "msg": "请求成功",
    "time": "1562658685",
    "data": [
    {
    "id": 1,
    "pay_money": 10,
    "money": 60,
    "weigh": 1
    },
    {
    "id": 2,
    "pay_money": 20,
    "money": 120,
    "weigh": 2
    }
    ]
    })
     */
    public function index()
    {
        $Banner = new M();
        $list = $Banner->get_list();
        $this->success('请求成功',$list);
    }
}
