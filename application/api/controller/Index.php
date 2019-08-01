<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\GiftLog as M;
/**
 * 首页接口
 */
class Index extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     *
     */
    public function index()
    {
        $this->success('请求成功');
    }

    /**
     * 热门推荐
     */
    public function recommend(){

        $model = new M();
        $list = $model->get_count();
        dump($list);
        $this->success('请求成功',$list);
    }
}
