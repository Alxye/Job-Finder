<?php
/*
 * 用户中心基础控制器
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace User\Controller;

use Common\Controller\BaseController;

class CommonController extends BaseController {

	/**
	 * 初始化
	 */
	public function _init() {
		//未登录判断
		if (!$_SESSION["user"]) {
			$this->redirect("Home/Login/login");
			exit;
		}
		//个人用户控制器
		$user_controller = array(
			'resume',
			'preview',
		);
		//企业用户控制器
		$company_controller = array(
			'company',
			'apply',
			'job',
			'accountset',
			'preview',
		);
		//个人用户不能访问企业控制器
		if ($this->user['usertype'] == 1) {
			if (!in_array(strtolower(CONTROLLER_NAME), $user_controller)) {
				$this->redirect("Home/Error/index");
				exit;
			}
		}
		//企业用户不能访问个人控制器
		if ($this->user['usertype'] == 2) {
			if (!in_array(strtolower(CONTROLLER_NAME), $company_controller)) {
				$this->redirect("Home/Error/index");
				exit;
			}
		}


	}
}