<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\RoomClass as M;

/**
 * 房间分类接口
 */
class Roomclass extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 房间分类列表
     *
     * @ApiTitle    (房间分类列表)
     * @ApiSector   (房间分类接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/roomclass)
     */
    public function index()
    {
        $m = new M();
        $list = $m->get_list();
        $this->success('请求成功',$list);
    }
}
