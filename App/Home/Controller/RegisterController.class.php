<?php
/*
 * 注册控制器
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;

class RegisterController extends CommonController{
	/**
	 * 加载首页
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 加载普通用户注册页
	 */
	public function user(){
		$this->display();
	}

	/**
	 * 加载企业用户注册页
	 */
	public function company(){
		$this->display();
	}

	/**
	 * 普通用户注册处理
	 */
	public function userReg(){
		$mod = D("Admin/user");
		//记录用户登录时间
		$_POST['logintime'] = time();
		if($mod->create()) {
			if ($mod->add()) {
				$info = $mod->find($mod->getLastInsID());
				//注册成功后登陆记录session
				session("user",$info);
				//根据浏览的session跳转到注册页前一个页面
				if($_SESSION['refer']) {
					$refer = session("refer");
					$this->success("注册成功", U("Index/index"));
				}else{
					$this->success("注册成功", U("Index/index"));
				}
			} else {
				$this->error("注册失败", U("Register/user"));
			}
		}else{
			$this->error($mod->getError());
		}
	}

	/**
	 *企业用户注册处理
	 */
	public function companyReg(){
		$mod = D("Admin/user");
		$res = M("company");
		//记录登陆时间
		$_POST['logintime'] = time();
		//封装注册信息
		if($mod->create()) {
			if ($mod->add()){
				//记录刚添加的用户id
				$id["uid"] = $mod->getLastInsID();
				//根据用户id在company表写入对应的ID
				if($res->create($id)) {
					//将用户类型改为禁用
					$res->status = 2;
					$res->add();
					//记录用户session
					$_SESSION['user'] = $mod->find($id["uid"]);
					//获取刚添加的企业用户的company表id
					$uid = $res->getLastInsID();
					//记录企业session
					$_SESSION['company']['id'] = $uid;
					$_SESSION['company']['uid'] = $id['uid'];
					//渲染用户详情页面
					$this->success("",U("Register/comItem"));
				}else{
					$this->error("注册失败");
				}
			}else{
				$this->error("注册失败");
			}
		}else{
			$this->error($mod->getError());
		}
	}

	/**
	 * 加载企业用户详情注册页面
	 */
	public function comItem(){
		//企业性质
		$this->assign("attr",getTag(C('ATTRID')));
		//企业规模
		$this->assign("size",getTag(C('SIZEID')));
		//公司行业
		$this->assign("industry",getTag(C('TRADE')));
		//所在城市
		$this->assign('city',city(2));
		$this->display();
	}

	/**
	 * 企业用户注册详细信息处理
	 */
	public function comItemReg(){
		$mod = D("Admin/company");
		$_POST['uid'] = $this->company['uid'];
		if($mod->create()) {
			//限制企业介绍如果超出则截取
			if(I('description')){
				$mod->description = str_br($mod->description);
			}
			//将用户状态改为正常
			$mod->status = 1;
			//添加企业用户的详细信息
			if ($mod->where("id=".$this->company['id'])->save()) {
				//记录企业信息
				$_SESSION["company"] = $mod->where("id=".$this->company['id'])->find();
				$this->success("注册成功", U("User/Job/index"));
			} else {
				$this->error("注册失败！");
			}
		}else{
			$this->error($mod->getError());
		}
	}
}