<?php
/*
 * 标签控制器
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace Admin\Controller;

class TagController extends CommonController {

	/**
	 * 浏览标签
	 */
	public function index() {
		$list = D('tag')->order("concat(path,id)")->select();
		foreach ($list as $k => $v) {
			if ($v['pid'] > 0) {
				$num              = substr_count($v["path"], ",") - 1;
				$list[$k]['tagname'] = str_repeat("&nbsp;", $num * 4) . " —| " . $v['tagname'];
			}
		}
		$this->assign('list', $list);
		$this->display();
	}

	/**
	 * 添加标签页面
	 */
	public function add() {
		$list = D('tag')->field("id,pid,path,tagname")->order("concat(path,id)")->select();
		foreach ($list as $k => $v) {
			if ($v['pid'] > 0) {
				$num              = substr_count($v["path"], ",") - 1;
				$list[$k]['tagname'] = str_repeat("&nbsp;", $num * 3) . "—| " . $v['tagname'];
			}
			if(I('id') == $v['id']){
				$list[$k]["selected"] = "selected";
			}
		}
		$this->assign('list', $list);
		$this->display("edit");
	}

	/**
	 * 执行添加标签
	 */
	public function insert() {
		$do = D('tag');
		if ($do->create()) {
			//组合pid与路径
			$tmp      = explode("|", I('pid'));
			$do->pid  = $tmp[0];
			$do->path = $tmp[1] . $tmp[0] . ",";

			//执行添加
			if ($do->add()) {
				$this->success('添加标签成功!', U("index"));
			} else {
				$this->error("添加标签失败！");
			}
		} else {
			$this->error($do->getError());
		}

	}

	/**
	 * 删除标签
	 */
	public function delete() {
		if (!D("tag")->where("pid=" . I('id'))->select()) {
			//执行删除
			if (D("tag")->delete(I('id'))) {
				$this->success("标签删除成功!");
			} else {
				$this->success("标签删除失败!");
			}
		} else {
			$this->error("此标签下含有子标签,无法删除！请先删除子标签");
		}
	}

	/**
	 * 修改标签页面
	 */
	public function edit() {
		$item                = D("tag")->find(I('id', 0));
		$list[0]             = D('tag')->find($item['pid']);
		$list[0]["selected"] = "selected";
		if(!$list[0]['tagname']){
			$list[0]['tagname'] = "作为主标签";
		}
		$this->assign('disabled', 'disabled');
		$this->assign('item', $item);
		$this->assign('list', $list);
		$this->display("edit");
	}

	/**
	 * 执行修改
	 */
	public function update() {
		$do = D('tag');
		if ($do->create()) {
			if ($do->where('id=' . I('id'))->setField("tagname", I("tagname"))) {
				$this->success('修改标签成功!', U("index"));
			} else {
				$this->error("修改标签失败！");
			}
		} else {
			$this->error($do->getError());
		}
	}
}