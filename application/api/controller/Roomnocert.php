<?php

namespace app\api\controller;

use app\common\controller\api;

use app\common\model\Roomnocert as M;
use app\api\controller\User;
use fast\Random;
use think\Cookie;
use think\Db;
use think\Validate;
use app\api\controller\Token;

/**
 * 我的房间:未认证
 */

class Roomnocert extends api{

    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 前往认证
     *
     */

    public function tocert(){

        $res = $this->request->param();
        $res['userid'] = $this->request->request('userid');
        $this->_validate($res);

        if(!$res['userid']) $this->error('缺少更新条件');

        $user = new User();
        $user_status = $user->prohibit($res['userid']);

        if($user_status['status'] == 'hidden') $this->error('该账户已被封禁');

        if(Cookie::get($res['mobile']) != $res['code']) $this->error('验证码错误');

        unset($res['code']);

        $model = new M();
        $list = $model->cert($res);

        if(!$list) $this->error();

        $this->success('认证成功');

    }

    public function examine(){

        if(Request()->isPost()){
            $id = $this->request->request('id');

            $info = Db::name('userCard')->find($id);
            if($info && $info['status'] == 0){

                $ret = Db::name('userCard')->where('id',$info['id'])->update(['status' => 1]);

                if($ret) $this->success('实名通过');

            }
        }
    }


    /**
     * 获取验证码
     *
     * @param int $mobile 手机号
     */
    public function send(){

        $mobile = $this->request->request('mobile');
        $rand = rand(100000,999999);

        Cookie::set($mobile,$rand,180);

        return $rand;

    }

    /**
     * 常见问题
     */
    public function matter(){

        $model = new M();
        $list = $model->get_matter();

        $this->success('请求成功',$list);
    }


    public function _validate($res){

        $rules = [
            'name|姓名' => 'require',
            'card|身份证号' => 'require|length:18',
            'mobile|手机号' => 'require|length:11',
            'code|验证码' => 'require',
            'userid' => 'unique:userCard'
        ];
        $message = [
            'card.length' => '身份证号不符合规格',
            'mobile.length' => '手机号不符合规格',
            'userid.unique' => '用户已存在'
        ];

        $validate = new Validate($rules,$message);

        if(!$validate->check($res)) $this->error($validate->getError());
    }

    public function ceshi(){
        $token = Random::uuid();

        \app\common\library\Token::set($token,'2',180);
        dump($token);
    }

    public function ceshi1(){
        $aa = \app\common\library\Token::check('2d1a9b45-f58d-4392-b42b-2daeb59abb5a','2');
        dump($aa);
    }
}