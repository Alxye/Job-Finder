<?php
/*
 * 前台首页显示
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;


class IndexController extends CommonController {
	public function index() {

		//幻灯图片
		$pic = M('news')->where('status=1')->order('level desc')->field('id,title')->limit(6)->select();
		$this->assign('pic',$pic);
	
		//登录后
		$user=$_SESSION['user'];
		$usertype= $user['usertype'];
		$this->assign("usertype",$usertype);
		$company=$this->company;
		$this->assign("company",$company);
		//头像
		$photo=defaultPhoto($user['id']);
		$userphoto=$photo['photo'];
		$this->assign("userphoto",$userphoto);

		$this->display();
	}

}