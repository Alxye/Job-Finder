<?php
/*
 * 后台基础控制器
 * @author    Xixi Zhao
 * @Created  2020/05/14
 */
namespace Admin\Controller;

use Common\Controller\BaseController;

class CommonController extends BaseController {

	/**
	 * 初始化
	 */
	public function _init() {

		//登陆判断
		if (!$_SESSION["admin"]) {
			$this->redirect("Login/index");
			exit;
		}
		//获取管理员数据
		$this->assign("user", $_SESSION["admin"]);

		//rbac权限判断
		if( !\Org\Util\Rbac::AccessDecision()){
			$this->error('抱歉，您没有权限执行此操作');
		}
	}
}