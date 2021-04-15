<?php
/*
 * 企业个人中心职位管理控制器
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace User\Controller;

class JobController extends CommonController {

	/**
	 *首页
	 */
	public function index() {
		$do = M('job');
		$where[] = array('comid=' . $this->company['id']);
		if (I('status')) {
			$where[] = array('status=' . I('status'));
		}
		$count = $do->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类
		$Page->setConfig("prev",'上一页');
		$Page->setConfig("next",'下一页');
		$show       = $Page->show();// 分页显示输出
		$list  = $do->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($list as $k => $v) {
			$list[$k]['apply'] = M('apply')->where('jid=' . $v['id'])->count();
		}
		$this->assign('list', $list);
		$this->assign('show', $show);
		$this->display();
	}

	/**
	 * 发布职位
	 */
	public function add() {
		if (I('cid')) {
			//step2 添加职位
			//获取城市列表
			$this->assign('city', city(2));
			//获取最低学历
			$this->assign('edu', getTag(C('EID')));
			//获取工作年限
			$this->assign('year', getTag(C('YEARID')));
		} elseif (I('id')) {
			//step3 //填写标题
			$name = M("job")->where('id=' . I('id'))->getfield("name");
			if (!$name) {
				$this->redirect("Job/index");
				exit;
			};
			$this->assign('name', $name);
		} else {
			//step1 选择分类
			//获取职位分类列表
			$this->assign('list', getCate(C('JOB')));
		}
		$this->display();
	}

	/**
	 * Ajax获取职位分类
	 */
	public function  getCate() {
		$list = getCate(C('JOB'));
		$this->ajaxReturn($list);
	}

	/**
	 * 执行添加职位
	 */
	public function insert() {
		$do = D('Admin/job');
		if ($do->create()) {
			if(I('duty')){
				$do->duty = str_br($do->duty);
			}
			if(I('request')){
				$do->request = str_br($do->request);
			}
			$do->comid = $this->company['id'];
			if ($id = $do->add()) {
				$this->success("职位发布成功", U("Job/add?id=" . $id));
			} else {
				$do->error("职位添加失败");
			}
		} else {
			$this->error($do->getError());
		}
	}

	/**
	 * 完成页面
	 */
	public function done() {
		if (!M('job')->find(I('id'))) {
			$this->redirect("Job/index");
			exit;
		}
		if (I('status') == 'add') {
			$message = "职位发布成功";
		} else {
			$message = "职位保存成功";
		}
		$this->assign("message", $message);
		$this->display();
	}

	/**
	 * 修改职位页面
	 */
	public function edit() {
		$do = M('job');
		//获取职位信息
		$data = $do->find(I('id'));
		//信息不存在跳转
		if (!$data) {
			$this->redirect('Job/index');
		}
		$data['cid'] = I('cid') ? I('cid') : $data['cid'];
		$data['duty']  = str_replace("<br/>","\n",htmlspecialchars_decode($data['duty']));
		$data['request']  = str_replace("<br/>","\n",htmlspecialchars_decode($data['request']));
		$this->assign('data', $data);
		//最低学历
		$this->assign('edu', getTag(C('EID')));
		//工作年限
		$this->assign('year', getTag(C('YEARID')));
		//获取城市列表
		$this->assign('city', city(2));
		$this->display();
	}

	/**
	 * 职位修改
	 */
	public function update() {
		$do = D('Admin/job');
		//判断是否本人发布
		$comid = $do->where('id=' . I('id', 0))->getfield("comid");
		if ($comid != $this->company['id']) {
			$this->redirect("Job/index");
			exit;
		}
		if ($do->create()) {
			if(I('duty')){
				$do->duty = str_br($do->duty);
			}
			if(I('request')){
				$do->request = str_br($do->request);
			}
			$do->id = I('id');
			if ($do->save()) {
				if (I('done') == 'add') {
					$this->success("职位发布成功", U("Job/done?status=add&id=" . I('id')));
				} else {
					$this->success("职位修改成功", U("Job/done?status=edit&id=" . I('id')));
				}
			} else {
				$this->error("职位修改失败");
			}
		} else {
			$this->error($do->getError());
		}
	}

	/**
	 * 选择分类页面
	 */
	public function selcate() {
		//获取职位分类列表
		$this->assign('list', getCate(C('JOB')));
		$this->display();
	}

	/**
	 * 刷新职位
	 */
	public function flush() {
		$do   = M('job');
		$data = $do->find(I('id'));
		//判断是否本人操作
		if ($data['comid'] != $this->company['id']) {
			$this->redirect("Job/index");
			exit;
		}
		//判断刷新时间是否是当天
		if (date('Ymd', $data['edittime']) !== date('Ymd', time())) {
			$data['id']       = I('id');
			$data['flushnum'] = 5;
			$do->save($data);
		}
		//更新修改时间
		if ($data['flushnum'] > 0) {
			$data['id']       = I('id');
			$data['flushnum'] = $data['flushnum'] - 1;
			$data['edittime'] = time();
			if ($do->save($data)) {
				$this->success("刷新成功, 您今天剩余 " . $data['flushnum'] . " 次职位刷新机会");
			}
		} else {
			$this->error("刷新失败, 您今天的刷新次数已经用完");
		}

	}

}