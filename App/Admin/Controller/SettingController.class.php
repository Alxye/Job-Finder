<?php
namespace Admin\Controller;

use Think\Controller;

class SettingController extends CommonController {
	/**
	 * 加载编辑页面
	 */
	public function edit() {
		$mod  = M("Setting");
		//获取对应模块设置
		$list = $mod->where("item=0")->select();
		//遍历获取的信息
		foreach ($list as $key => $v) {
			//将表中的键值对封装为数组
			$data[$v["itemkey"]] = $v["itemvalue"];
		}
		$this->assign("data", $data);
		$this->display();
	}
	/**
	 * 执行修改
	 */
	public function update() {
		//dump();
		$mod = M("Setting");
		//var_dump($mod);
		$mod->where('item=0')->delete();
        //echo $temp;
        //die;
		//将获取的信息遍历
		foreach (I('post.') as $k => $v) {
			//将获取的信息中的键封装进itemkey字段
			$data['itemkey'] = $k;
			//将获取的信息中的值封装进itemvalue字段
			$data['itemvalue'] = $v;

			$mod->add($data);
			//var_dump($mod);
		}
		 //exit;
		$this->redirect("setting/edit");
	}

	/**
	 * 修改个人密码
	 */
	public function inbox() {
		$this->display();
	}

	/**
	 * 执行个人密码修改
	 */
	public function updatepw() {
		$mod  = M("admin");
		//根据用户名找到对应的用户信息
		$data = $mod->where("userid='" . $_SESSION["admin"]['userid'] . "'")->find();
		//判断重复密码和输入的密码是否相同
		if (I("repassword") == I("password")) {
			//将输入的密码和数据库中的密码比较
			if (md5(I("oldpassword")) == $data['password']) {
				//验证通过修改用户密码
				$mod->where("userid=" . $_SESSION["admin"]['userid'])->setField("password", md5(I("password")));
				$this->success("密码修改成功,请妥善保管您的新密码！", U("Setting/inbox"));
			} else {
				$this->error("原密码错误", U("Setting/inbox"));
			}
		} else {
			$this->error("重复新密码错误", U("Setting/inbox"));
		}
	}

	/**
	 * 删除缓存Runtime文件夹
	 */
	public function  clearCache() {
		if (file_exists(RUNTIME_PATH)) {
			$dir = new \Common\Util\File(RUNTIME_PATH);
			if ($dir->rmdirs()) {
				$this->success('缓存清除成功！');
			};
		}

	}
}