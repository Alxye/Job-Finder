<?php
/**
 * 简历预览页面
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  PreviewController.class.php
 */
namespace User\Controller;

use Think\Controller;

class PreviewController extends CommonController {
	/**
	 * 个人简历预览页
	 * @author    Frank
	 * @Created   2015/1/9
	 */
	public function index() {
		//判断查看人是企业还是个人
		if (!empty($_GET['uid'])) {
			$uid    = $_GET['uid'];            //获取被查看简历用户id
			$pid    = $_GET['id'];             //获取被查看简历id
			$lookid = $this->company['id'];    //获取查看者id

			$apply  = D('apply');
			$info   = $apply->where('id=' . $pid)->field('comid,status')->find();
			$comid  = $info['comid'];
			$status = $info['status'];
			//判断是否为所投简历企业查看
			if ($lookid == $comid && $status == 1) {
				$apply->where('id=' . $pid)->setField('status', 2);   //更改简历状态为已读
			}
		} else {
			$uid = session('user.id');
		}

		$basic     = M('resume');        //基本资料
		$work      = M('resume_work');   //工作经历
		$project   = M('resume_pro');    //项目经验
		$eduaction = M('resume_edu');    //学习经历

		/**
		 * 获取基本信息并格式化输出格式
		 */
		$binfo = $basic->where('uid=' . $uid)->find();  //获取用户基本信息
		//转换性别
		if ($binfo['sex'] == 1) {
			$binfo['sex'] = "男";
		} else {
			$binfo['sex'] = "女";
		}
		//转换当前状态
		switch ($binfo['status']) {
			case '1':
				$binfo['status'] = "目前在职，考虑换个环境";
				break;
			case '2':
				$binfo['status'] = "目前离职，可以快速到岗";
				break;
			case '3':
				$binfo['status'] = "应届毕业生";
				break;
			case '4':
				$binfo['status'] = "暂时不找工作";
				break;
		}
		//转换生日
		$binfo['birthday'] = date('Y.m.d', $binfo['birthday']);
		//转换学历
		$edu = getTag(C('EID'));    //获取学历列表
		foreach ($edu as $v) {
			if ($v['id'] == $binfo['eid']) {
				$binfo['eid'] = $v['tagname'];
			}
		}
		//转换工作年限
		$workyear = getTag(C('YEARID'));    //获取年限列表
		foreach ($workyear as $v) {
			if ($v['id'] == $binfo['year']) {
				$binfo['year'] = $v['tagname'];
			}
		}
		//转换现居地,籍贯
		$city = city(1);    //获取省名
		foreach ($city as $k => $v) {
			if ($v['id'] == $binfo['nowcid']) {
				$binfo['nowcid'] = $v['name'];
			}
			if ($v['id'] == $binfo['oldcid']) {
				$binfo['oldcid'] = $v['name'];
			}
		}
		//转换希望城市
		$hopecity = city(2);    //获取热门市名
		foreach ($hopecity as $k => $v) {
			if ($v['id'] == $binfo['hopecid']) {
				$binfo['hopecid'] = $v['name'];
			}
		}
		//转换期望薪资
		$pay = getTag(C('PAYID'));  //获取薪资列表
		foreach ($pay as $v) {
			if ($v['id'] == $binfo['hopepay']) {
				$binfo['hopepay'] = $v['tagname'];
			}
		}

		/**
		 * 获取工作经历并格式化输出格式
		 */
		$winfo = $work->where('uid=' . $uid)->select();
		//遍历转换其中数据至直接输出格式
		for ($i = 0; $i < count($winfo); $i++) {
			//转换工资
			foreach ($pay as $v) {
				if ($v['id'] == $winfo[$i]['pay']) {
					$winfo[$i]['pay'] = $v['tagname'];
				}
			}
			//转换工作起止日期
			$winfo[$i]['starttime'] = date('Y.m', explode(',', $winfo[$i]['sdate'])[0]);
			if (explode(',', $winfo[$i]['sdate'])[1] == 0) {
				$winfo[$i]['stoptime'] = "至今";
			} else {
				$winfo[$i]['stoptime'] = date('Y.m', explode(',', $winfo[$i]['sdate'])[1]);
			}
		}

		/**
		 * 获取项目经验并格式化输出格式
		 */
		$pinfo = $project->where('uid=' . $uid)->select();
		//遍历转换其中数据至直接输出格式
		for ($i = 0; $i < count($pinfo); $i++) {
			//转换项目起止日期
			$pinfo[$i]['starttime'] = date('Y.m', explode(',', $pinfo[$i]['psdate'])[0]);
			if (explode(',', $pinfo[$i]['psdate'])[1] == 0) {
				$pinfo[$i]['stoptime'] = "至今";
			} else {
				$pinfo[$i]['stoptime'] = date('Y.m', explode(',', $pinfo[$i]['psdate'])[1]);
			}
		}

		/**
		 * 获取教育经历并格式化输出格式
		 */
		$einfo = $eduaction->where('uid=' . $uid)->select();
		//遍历转换其中数据至直接输出格式
		for ($i = 0; $i < count($einfo); $i++) {
			//转换学历
			foreach ($edu as $v) {
				if ($v['id'] == $einfo[$i]['seid']) {
					$einfo[$i]['seid'] = $v['tagname'];
				}
			}
			//转换学习起止日期
			$einfo[$i]['starttime'] = date('Y.m', explode(',', $einfo[$i]['esdate'])[0]);
			$einfo[$i]['stoptime']  = date('Y.m', explode(',', $einfo[$i]['esdate'])[1]);
		}

		$this->assign('basic', $binfo);
		$this->assign('work', $winfo);
		$this->assign('project', $pinfo);
		$this->assign('education', $einfo);
		$this->display('index');
	}
}