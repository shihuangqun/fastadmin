<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\RoomLabel as M;

/**
 * 房间标签接口
 */
class Roomlabel extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 房间分类列表
     *
     * @ApiTitle    (房间标签列表)
     * @ApiSector   (房间标签接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/roomlabel)
     */
    public function index()
    {
        $m = new M();
        $list = $m->get_list();
        $this->success('请求成功',$list);
    }
}
