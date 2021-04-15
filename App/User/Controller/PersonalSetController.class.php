<?php
/**
 * 个人账号设置
 * @author    Zhao
 * @Created   2020/5/28
 */
namespace User\Controller;

use Think\Controller;

class PersonalSetController extends CommonController {
	/**
	 * 账号设置首页
	 */
	public function index() {
		$uid               = session('user.id');
		$userinfo          = M('user')->where('id=' . $uid)->field('username,email,alias,phone')->find();
		$userinfo['photo'] = defaultPhoto($uid)['photo'];
		$this->assign('userinfo', $userinfo);
		$this->display();
	}

	/**
	 * 修改密码页
	 */
	public function editPassword() {
		$this->display('password');
	}

	/**
	 * 执行密码修改
	 */
	public function password() {
		$do = D("Password");
		if (!I('old_password')) {
			$this->error("请填写原密码");
			exit;
		}
		if (!preg_match('/^\S{6,12}$/', I('password'))) {
			$this->error("新密码格式错误");
			exit;
		}
		if (!I('re_password')) {
			$this->error("请重复填写新密码");
			exit;
		}
		if (I("password") != I('re_password')) {
			$this->error("两次输入的新密码不一致");
			exit;
		}
		$old_password = $do->where('id=' . session('user.id'))->getField("password");
		if (md5(I('old_password')) != $old_password) {
			$this->error("原密码输入错误");
			exit;
		}
		$do->where('id=' . session('user.id'))->setField("password", md5(I('password')));
		$this->success("密码修改成功", $_SERVER['HTTP_REFERER']);
	}
    /**
     * 执行信息更新
     */
    public function update(){
        $do = M("user");
        $do->where('id='.session('user.id'))->setField("username",I('login_name'));
        $do->where('id='.session('user.id'))->setField("alias",I('alias'));
        $do->where('id='.session('user.id'))->setField("email",I('email'));
        $do->where('id='.session('user.id'))->setField("phone",I('phone'));

        $this->success("修改成功");
    }
}