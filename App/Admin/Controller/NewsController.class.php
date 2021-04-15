<?php
/*
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace Admin\Controller;

class NewsController extends CommonController {

	public function index() {
		$this->display();
	}


	/**
	 * 查询数据
	 */
	public function  lists() {
		$do = M("news");

		/* 初始化分页查询条件 */
		$pageSize       = I('iDisplayLength');    //每页记录数
		$maxRows        = $do->count();           //总记录数
		$page           = I("iDisplayStart");     //当前起始索引
		$field          = array("id", "title", "uname", "addtime", "level","status"); //查询字段
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "addtime desc";//排序
		$where          = I('sSearch') != "" ? "title like '%" . I('sSearch') . "%'" : ""; //搜素标题title
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->field($field)->where($where)->order($order)->limit($page, $pageSize)->select(); //获取数据

		/* 返回给客户端数据 */
		$list["sEcho"]                = I("sEcho"); //来自客户端 sEcho 的没有变化的复制品
		$list["iTotalRecords"]        = $maxRows;   //总记录数
		$list["iTotalDisplayRecords"] = $DisplayRecords;   //过滤之后，实际的行数
		$list["aaData"]               = $data;      //表中数据

		$this->ajaxReturn($list);
	}

	/**
	 * 图片上传裁剪函数
	 */
	public function thumpUpload() {
		/*图片上传*/
		//动态修改上传文件配置信息
		$upload           = new \Think\Upload();
		$upload->rootPath = C('UPLOAD_PATH') . 'Picture/';
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->autoSub  = true;
		$upload->subName  = 'news' . '/' . date('Ymd') . "/";

		$info = $upload->uploadOne($_FILES['thumb']);
		/*图片裁剪*/
		$image = new \Think\Image();
		$image -> open(C('UPLOAD_PATH')."Picture/".$info['savepath'].$info['savename']);
		$image -> thumb(728,380,\Think\Image::IMAGE_THUMB_FIXED)->save(C('UPLOAD_PATH')."Picture/".$info['savepath'].$info['savename']);
		$image -> thumb(728,289,\Think\Image::IMAGE_THUMB_NORTHWEST)->save(C('UPLOAD_PATH')."Picture/".$info['savepath']."title_".$info['savename']);
		return $info;
	}

	/**
	 * 加载新闻添加页面
	 */
	public function add() {
		//获取新闻分类信息
		$list = getCate(C('NEWS'),0);
		$this->assign("list",$list);
		$this->display('edit');
	}

	/**
	 * 加载编辑页面
	 */
	public function edit() {
		//获取信息分类信息和新闻内容信息
		$list = getCate(C('NEWS'),$pid=0);
		$data = D('news')->relation(true)->find(I('id', 0));
		$this->assign("list",$list);
		$this->assign('data', $data);
		$this->display();
	}

	/**
	 * 添加数据
	 */
	public function insert() {
		$do                 = D('news');
		//判断是否有内容简介，若没有从新闻内容中截取前120字作为简介
		$_POST["introduce"] = $_POST["introduce"] ? $_POST["introduce"] : intro($_POST["content"]);
		//判断是否有文件上传
		if($_FILES['thumb']['name']) {
			//若有文件上传调用上传文件函数
			$info = $this->thumpUpload();
			if ($info) {
				//上传成功则将保存路径封装
				$_POST['thumb'] =  "/Uploads/Picture/". $info['savepath'] . $info['savename'];
				if (!$do->create()) {
					$this->error($do->getError());
				} else {
					if ($id = $do->add()) {
						//内容表中添加数据
						$data['id']      = $id;
						$data['content'] = I('content');
						M('news_data')->add($data);
						$this->success('添加成功！', U("index"));
					} else {
						$this->error($do->getError());
					}
				}
			} else {
				$this->error("上传图片错误！");
			}
		}else{
			$this->error("请上传标题图片");
		}
	}

	/**
	 * 删除数据
	 */
	public function delete() {
		$do = D('news');
		//根据id查找对应新闻信息
		$picname = $do->where("id=".I('id'))->getField("thumb");
		if ($do->delete(I('id'))) {
			//删除成功则删除对应新闻内容信息
			M("news_data")->delete(I("id"));
			//删除标题图片
			unlink(".".$picname);
			$titlepicname = pathinfo($picname);
			unlink(".".$titlepicname['dirname'].C('TITLE_PREFIX').$titlepicname['basename']);
			$this->success("删除成功!");
		} else {
			$this->error("删除失败!");
		}

	}

	/**
	 * 修改数据
	 */
	public function update() {
		$do                 = D("news");
		//判断是否有内容简介，若没有从新闻内容中截取前120字作为简介
		$_POST["introduce"] = $_POST["introduce"] ? $_POST["introduce"] : intro($_POST["content"]);
		//获取修改前的图片保存路径
		$oldpicname         = $do->where("id=" . I('id'))->getField("thumb");
		if ($_FILES['thumb']['name']) {
			$info = $this->thumpUpload();
			if ($info) {
				//若有文件上传删除原图片
				unlink(".".$oldpicname);
				//拼装标题图路径
				$titlepicname = pathinfo($oldpicname);
				unlink(".".$titlepicname['dirname'].C('TITLE_PREFIX').$titlepicname['basename']);
				//将新上传的图片保存路径封装
				$_POST['thumb'] = ltrim(C('UPLOAD_PATH'),".") . "Picture/" . $info['savepath'] . $info['savename'];
			} else {
				$this->error("上传图片失败!");
				return;
			}
		}else{
			//若无文件上传则保留原图
			$_POST['thumb'] = $oldpicname;
		}
			if ($do->create()) {
				if ($do->save()) {
					//更新内容表
					M("news_data")->where('id=' . I('id'))->setField('content', I("content"));
					$this->success("修改成功", U("index"));
				} else {
					$this->error("修改失败");
				}
			} else {
				$this->error($do->getError());
			}


	}
}