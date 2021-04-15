<?php
/*
 * Rbac 用户管理(管理员)
 * @author    Xixi Zhao
 * @Created  2020/05/14
 */
namespace Admin\Controller;

class AdminController extends CommonController {

	public function index() {
		$this->display();
	}

	/**
	 * 查询数据
	 */
	public function  lists() {
		$do = D("admin");

		/* 初始化分页查询条件 */
		$pageSize       = I('iDisplayLength');    //每页记录数
		$maxRows        = $do->count();           //总记录数
		$page           = I("iDisplayStart");     //当前起始索引
		$field          = array("userid", "username", "alias", "logintime", "loginip"); //字段
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "id asc";//排序
		$where          = I('sSearch') != "" ? "username like '%" . I('sSearch') . "%'" : ""; //搜索用户名
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->where($where)->order($order)->limit($page, $pageSize)->relation(true)->select(); //获取数据

		/* 返回给客户端数据 */
		$list["sEcho"]                = I("sEcho"); //来自客户端 sEcho 的没有变化的复制品
		$list["iTotalRecords"]        = $maxRows;   //总记录数
		$list["iTotalDisplayRecords"] = $DisplayRecords;   //过滤之后，实际的行数
		$list["aaData"]               = $data;      //表中数据

		$this->ajaxReturn($list);
	}

	/**
	 * 添加用户页面
	 */
	public function  add() {
		//获取所有角色列表
		$role = M("role")->field("id,remark")->select();
		$this->assign("role", $role);
		$this->display("edit");
	}

	/**
	 * 执行添加操作
	 */
	public function insert() {
		$do = D("admin");
		if ($do->create()) {
			if ($user_id = $do->add()) {
				//添加角色_用户关联表数据
				$data['user_id'] = $user_id;
				$data['role_id'] = I("role_id");
				M("role_user")->add($data);
				$this->success("用户添加成功!", U("Admin/index"));
			} else {
				$this->error("用户添加失败！");
			}
		} else {
			$this->error($do->getError());
		}
	}

	/**
	 * 删除用户
	 */
	public function  delete() {
		$do       = D("admin");
		$username = D("admin")->where("userid=" . I("uid", 0))->getField("username");
		if ($username == C("RBAC_SUPERADMIN")) {
			$this->error("超级管理员无法删除");
			exit;
		}
		if ($do->delete(I("uid", 0))) {
			//删除角色_用户关联表数据
			M("role_user")->where("user_id=" . I("uid"))->delete();
			$this->success("删除成功");
		} else {
			$this->error("删除失败");
		}
	}

	/**
	 * 编辑页面
	 */
	public function edit() {
		//获取用户昵称与所属角色
		$alias   = D("admin")->where("userid=" . I("uid", 0))->getField("alias");
		$role_id = D("role_user")->where("user_id=" . I("uid", 0))->getField("role_id");
		//获取所有角色列表
		$role = M("role")->field("id,remark")->select();
		$this->assign("role", $role);
		$this->assign("role_id", $role_id);
		$this->assign("alias", $alias);
		$this->display("edit");
	}

	/**
	 * 执行更新操作
	 */
	public function update() {
		$do = D("admin");
		if ($do->create()) {
			//修改用户昵称
			$do->where("userid=" . I("userid"))->setField("alias", I("alias"));
			//修改角色_用户关联表数据
			M("role_user")->where("user_id=" . I("userid"))->setField("role_id", I("role_id"));
			$this->success("用户信息修改成功", U("Admin/index"));

		} else {
			$this->error($do->getError());
		}
	}
}