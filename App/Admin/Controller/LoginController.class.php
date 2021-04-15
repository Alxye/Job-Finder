<?php
/*
 * 后台登陆控制器
 * @author    Zhao
 * @Created   2020/06/13
 * @filename LoginController.class.php
 */

namespace Admin\Controller;

use Think\Controller;

use Org\Util\Rbac;

class LoginController extends Controller {

	/**
	 * 登陆页面
	 */
	public function  index() {
		$this->display();
	}

	/**
	 * 登陆操作
	 */
	public function login() {
		$do = M("admin");
		if ($_POST['username']) {
			//从数据库中获取用户数据
			$info = $do->where("username='" . $_POST["username"] . "'")->find();
			if ($info) {
				//判断密码是否正确
				if (md5($_POST["password"]) == $info['password']) {
					//获取所属角色状态,判断是否被禁用
					$role_id = M("role_user")->where("user_id=".$info["userid"])->getField("role_id");
					$status = M("role")->where("id=".$role_id)->getField("status");
					if($status > 1 && $info["username"] != C("RBAC_SUPERADMIN")){
						$this->error("此账号已被禁用！");
						exit;
					}
					//登陆成功记录登陆时间与IP
					$data['logintime'] = time();
					$data['loginip']   = get_client_ip();
					$do->where("userid=" . $info["userid"])->setField($data);
					$info = $do->where("userid=" . $info["userid"])->find();

					//用户数据写入Session
					$_SESSION["admin"] = $info;

					//超级管理员无需认证
					if ($info["username"] == C("RBAC_SUPERADMIN")) {
						session(C("ADMIN_AUTH_KEY"), true);
					}
					//获取访问权限列表
					$_SESSION[C("USER_AUTH_KEY")] = $info["userid"];
					Rbac::saveAccessList();

					//跳转后台首页
					$this->redirect("Index/index");
				} else {
					$this->error("用户名或密码错误！");
				}
			} else {
				$this->error("用户不存在！");
			}
		} else {
			$this->error("请输入用户名或密码！");
		}
	}

	/**
	 * 退出操作
	 */
	public function logout() {
		session(null);//清空所有session
		$this->redirect("Login/index");
	}
}