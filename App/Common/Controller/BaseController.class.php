<?php
/*
 * 基础控制器
 * @author     ZHAO
 * @Created  2020/05/18
 */
namespace Common\Controller;

use Think\Controller;

class BaseController extends Controller {

	//企业信息
	protected $company;
	//个人信息
	protected $user;
	//网站信息
	protected $site;

	/**
	 * 初始化函数
	 */
	public function  _initialize() {
		//判断个人与企业用户
		if ($user = $_SESSION["user"]) {
			if ($user["usertype"] == 2) {
				//将企业信息放入session
					$_SESSION["company"] = D("company")->field('description', true)->where("uid=" . $user["id"])->find();
				$this->company = $_SESSION["company"];
				$this->user    = $user;
				//获取未处理简历数量
				$where     = array('comid=' . $this->company['id'], 'status=1');
				$apply_num = M('apply')->where($where)->count();
				$this->assign('apply_num', $apply_num);
			}
		}
		//获取网站信息
		$list = M('setting')->where('item=0')->select();
		$site = array();
		foreach($list as $v){
			$site[$v['itemkey']] = $v['itemvalue'];
		}
		$this->site = $site;
		$this->assign("site", $site);
		$this->assign("user", $user);
		$this->assign("company", $this->company);
		$this->assign("cname", $this->company['cname']);
		if (method_exists($this, '_init')) {
			$this->_init();
		}
		$refer = 'http://localhost' . $_SERVER['REQUEST_URI'];
		if (CONTROLLER_NAME != 'Register' && CONTROLLER_NAME != 'Login') {
			session('refer', $refer);
		}
	}


	/**
	 * 图片上传
	 */
	public function imgUpload() {

		/* 配置上传参数 */
		$config = array(
			// 允许上传的文件后缀
			'allowExts' => array('jpg', 'jpeg', 'gif', 'png'),
			// 启用子目录保存文件
			'autoSub'   => true,
			// 子目录创建方式，采用数组或者字符串方式定义
			'subName'   => $_GET['module'] . '/' . date('Ymd') . "/",
			// 图片文件保存目录
			'rootPath'  => C('UPLOAD_PATH') . 'Picture/',
		);

		/* 实例化上传类 */
		$do = new \Think\Upload($config);
		
		
		/* 执行上传 */
		$info = $do->uploadOne($_FILES['upfile']);

		/* 返回结果 */
		if ($info) {
			$this->ajaxReturn(array(
				//保存后的文件路径
				'url'      => $info["savepath"] . $info['savename'],
				//文件描述，对图片来说在前端会添加到title属性上
				'title'    => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
				//原始文件名
				'original' => $info['name'],
				//上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
				'state'    => "SUCCESS",
			));
		} else {
			$this->ajaxReturn(array(
				'state' => $do->getError(),
			));
		}
	}


	/**
	 * logo图片上传
	 */
	public function uploadLogo() {

		/* 配置上传参数 */
		$config = array(
			// 允许上传的文件后缀
			'allowExts' => array('jpg', 'jpeg', 'gif', 'png'),
			'autoSub'   => false,
			// 图片文件保存目录
			'rootPath'  => C('UPLOAD_PATH') . 'Picture/logo/',
		);
	
		/* 实例化上传类 */
		$do = new \Think\Upload($config);

		/* 执行上传 */
		$info = $do->uploadOne($_FILES['logo']);


		/* 返回结果 */
		if ($info) {
			//生成缩略图文件名
			$thumb = pathinfo($info["savename"], PATHINFO_FILENAME) . "_thumb.";
			$thumb .= pathinfo($info["savename"], PATHINFO_EXTENSION);
			//生成缩略图
			$image = new \Think\Image();
			$image->open(C("UPLOAD_PATH") . '/Picture/logo/' . $info['savename']);
			$image->thumb(500, 500)->save(C("UPLOAD_PATH") . "/Picture/logo/" . $thumb);
			//删除原图
			unlink(C("UPLOAD_PATH") . "/Picture/logo/" . $info["savename"]);
			$info['path']     = C('IMG_URL') . 'logo/' . $thumb;
			$info['width']    = $image->width();
			$info['height']   = $image->height();
			$info['savename'] = $thumb;
			$this->ajaxReturn(array(
				//上传后的返回信息
				'info'   => $info,
				'status' => "1",
			));
		} else {
		var_dump($do->getError());
			$this->ajaxReturn(array(
				'status' => $do->getError(),
			));
		}
	}

	/**
	 * 保存企业logo图片
	 */
	public function  saveLogo() {
		$image = new \Think\Image();
		$image->open(C("UPLOAD_PATH") . '/Picture/logo/' . I('origin_image_name'));
		$savepath = C("UPLOAD_PATH") . '/Picture/company/logo/';
		if (!file_exists($savepath)) {
			mkdir($savepath, 0777, true);
		}
		$res = $image->crop(I('w'), I('h'), I('x1'), I('y1'))->save($savepath . I('origin_image_name'));
		if ($res) {
			//删除原图
			unlink(C("UPLOAD_PATH") . '/Picture/logo/' . I('origin_image_name'));
			//获取原Logo路径
			$oldpath = M('company')->where('id=' . $this->company['id'])->getfield("logo");
			$oldpath = "." . $oldpath;

			//Logo路径导入数据库
			$logo_path = "/Uploads/Picture/" . 'company/logo/' . I('origin_image_name');
			$set       = M('company')->where('id=' . $this->company['id'])->setfield("logo", $logo_path);
			//删除原logo
			if ($set && file_exists($oldpath)) {
				unlink($oldpath);
			}
			$this->ajaxReturn(array(
				'info'   => C('IMG_URL') . 'company/logo/' . I('origin_image_name'),
				'status' => 1
			));

		}
	}

}