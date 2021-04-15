<?php
/*
 * 用户账号设置
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace User\Controller;

class AccountSetController extends CommonController {

	public function index() {
		$this->display();
	}

	public function set(){
		$do = D("Admin/user");
		if(!I('old_password')){
			$this->error("请填写原密码");
			exit;
		}
		if(!preg_match('/^\S{6,12}$/',I('password'))){
			$this->error("新密码格式错误");
			exit;
		}
		if(!I('re_password')){
			$this->error("请重复填写新密码");
			exit;
		}
		if(I("password") != I('re_password')){
			$this->error("两次输入的新密码不一致");
			exit;
		}
		$old_password = $do->where('id='.$this->user['id'])->getField("password");
		if(md5(I('old_password')) != $old_password){
			$this->error("原密码输入错误");
			exit;
		}
		$do->where('id='.$this->user['id'])->setField("password",md5(I('password')));
		$do->where('id='.$this->user['id'])->setField("email",I('email'));
		$this->success("修改成功");
	}
}