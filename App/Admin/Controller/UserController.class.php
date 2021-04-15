<?php
/*
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace Admin\Controller;

class UserController extends CommonController {
	/**
	 * 加载index显示页面
	 */
	public function index() {


		$this->display();
	}


	/**
	 * 查询数据
	 */
	public function  lists() {
		$do = M("User");

		/* 初始化分页查询条件 */
		$pageSize       = I('iDisplayLength');    //每页记录数
		$maxRows        = $do->count();           //总记录数
		$page           = I("iDisplayStart");     //当前起始索引
		$field          = array("id", "username", "password", "usertype", "alias","regtime","email","phone","edittime","logintime","photo","status"); //查询字段
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "edittime desc";//排序
		$where          = I('sSearch') != "" ? "alias like '%" . I('sSearch') . "%'" : ""; //搜索昵称
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->field($field)->where($where)->order($order)->limit($page, $pageSize)->select(); //获取数据
		foreach ($data as $k=>$v){
            $data[$k]["collect"]="0";
		    if($data[$k]["usertype"]==1){
		        $job_collect=M("collect")->where("uid=".$data[$k]["id"])->count();
                $data[$k]["collect"]="职位:".$job_collect."   企业:";
                $company_collect=M("collect_company")->where("uid=".$data[$k]["id"])->count();
                $data[$k]["collect"]=$data[$k]["collect"].$company_collect;
            }
        }
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
		$upload->subName  = 'photo' . '/' . date('Ymd') . "/";

		$info = $upload->uploadOne($_FILES['photo']);
		/*图片裁剪*/
		$image = new \Think\Image();
		$image -> open(C('UPLOAD_PATH')."Picture/".$info['savepath'].$info['savename']);
		$image -> thumb(108,108,\Think\Image::IMAGE_THUMB_FIXED)->save(C('UPLOAD_PATH')."Picture/".$info['savepath'].$info['savename']);
		return $info;
	}
	/**
	 * 加载添加页面
	 */
	public function add() {
		$this->display('add');
	}

	/**
	 * 加载编辑页面
	 */
	public function edit() {
		$data = D('User')->find(I('id', 0));
		$this->assign('data', $data);
		$this->display();
	}

	/**
	 * 添加数据
	 */
	public function insert() {
		$mod                 = D ('User');
		if($_FILES['photo']['name']) {
			//若有文件上传调用上传文件函数
			$info = $this->thumpUpload();
			if ($info) {
				//上传成功则将保存路径封装
				$_POST['photo'] = ltrim(C('UPLOAD_PATH'), ".") . "Picture/" . $info['savepath'] . $info['savename'];
			}else{
				$this->error("上传图片错误！");
			}
		}
		//封装添加信息
		if(!$mod->create ()){
			$this->error($mod->getError());
		}else {
			//执行添加
			if ($mod->add() > 0) {
				$this->success('添加成功！', U("index"));
			} else {
				$this->error('添加失败！',U("index"));
			}
		}
	}

	/**
	 * 删除数据
	 */
	public function delete() {
		$do = D('user');
		//根据id查找对应新闻信息
		$photoname = $do->where("id=".I('id'))->getField("photo");
		//根据获取id删除对应信息
		if ($do->delete(I('id'))>0) {
			unlink(".".$photoname);
			$this->success("删除成功!");
		} else {
			$this->error("删除失败!");
		}

	}

	/**
	 * 修改数据
	 */
	public function update() {
		$mod = D("user");
		//获取修改前的头像保存路径
		$oldphoto         = $mod->where("id=" . I('id'))->getField("photo");
		if ($_FILES['photo']['name']) {
			$info = $this->thumpUpload();
			if ($info) {
				//若有文件上传删除原头像
				unlink("." . $oldphoto);
				$_POST['photo'] = ltrim(C('UPLOAD_PATH'), ".") . "Picture/" . $info['savepath'] . $info['savename'];
			} else {
				$this->error("上传头像失败!");
				return;
			}
		}else{
			//若无文件上传则保留原图
			$_POST['photo'] = $oldphoto;
		}
		//封装并验证
		if(!$mod->create()){
			$this->error($mod->getError());
		}else {
			if ($mod->save()) {
				$this->success("修改成功", U("index"));
			} else {
				$this->error("修改失败");
			}
		}
	}
}