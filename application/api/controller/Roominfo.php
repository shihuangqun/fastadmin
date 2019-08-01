<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\RoomInfo as M;

/**
 * 房间详情接口
 */
class Roominfo extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 房间分类列表
     *
     * @ApiTitle    (房间列表)
     * @ApiSector   (房间详情接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/roominfo)
     * @ApiParams  (name="keywords", type="string", required=false, description="房间ID/用户名/用户昵称/房间标题", sample="陆小魁")
     * @ApiParams  (name="page", type="integer", required=false, description="当前页", sample="1")
     * @ApiParams  (name="list_rows", type="integer", required=false, description="分页数量", sample="15")
     */
    public function index()
    {
        $m = new M();
        $map = [];
        if(input('keywords')) $map['room_title|username|nickname|ri.id'] = ['like',"%".input('keywords')."%"];

        $list = $m->get_list($map);
        $this->success('请求成功',$list);
    }

    /**
     * 房间分类列表
     *
     * @ApiTitle    (房间详情)
     * @ApiSector   (房间详情接口)
     * @ApiMethod   (POST/GET)
     * @ApiRoute    (/api/roominfo/info)
     * @ApiParams  (name="id", type="integer", required=true, description="房间ID", sample="10000")
     */
    public function info()
    {
        $m = new M();
        $map = [];
        if(input('id/d',0)) $map['ri.id'] = input('id/d');
        if(!$map) $this->error('缺少搜索条件');


        $list = $m->get_info($map);
        $this->success('请求成功',$list);
    }
}
