<?php
/**
 * 用户中心 - 个人简历
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace User\Controller;

use Think\Controller;

class ResumeController extends CommonController {
	/**
	 * 在线简历页面加载
	 * @author    Frank
	 * @Created   2015/1/9
	 */
	public function index() {
		// 基本信息数据,$byear 和 $syear 控制年龄范围,当前控制为16-45岁
		$uid             = session('user.id');                     //获取用户id
		$basic           = D('resume');
		$binfo           = $basic->where('uid=' . $uid)->find();   //获取基本信息
		$binfo['wylist'] = getTag(C('YEARID'));                    //获取工作年限选项卡
		$paylist         = getTag(C('PAYID'));                     //获取工资选项卡
		$eidlist         = getTag(C('EID'));                       //获取学历选项卡

		$binfo['citylist']     = city(1);                          //籍贯,所在地
		$binfo['hopecitylist'] = city(2);                          //期望城市
		// 封装"目前状态"选项卡
		$binfo['slist'] = array('1' => '目前在职，考虑换个环境', '2' => '目前离职，可以快速到岗', '3' => '应届毕业生', '4' => '暂时不找工作');
		// 封装出生日期选项卡
		// 生日起始值,因未成年参工违法,故年龄范围16-45岁
		$byear  = date('Y', strtotime('-16 year'));                //出生日期最大可选年份
		$syear  = date('Y', strtotime('-45 year'));                //出生日期最小可选年份
		$bylist = array();                                         //出生日期选择卡范围
		for ($byear; $syear <= $byear; $byear--) {
			$bylist[] = $byear;
		}
		$binfo['bylist'] = $bylist;

		if ($binfo['birthday'] !== null) {
			$binfo['byear']  = date('Y', $binfo['birthday']);      //生日年
			$binfo['bmonth'] = date('m', $binfo['birthday']);      //生日年
			$binfo['bday']   = date('d', $binfo['birthday']);      //生日年
		}

		$this->assign('basic', $binfo);                            //向模板添加基本信息数据
		$this->assign('paylist', $paylist);                        //向模板添加薪资数据
		$this->assign('eidlist', $eidlist);                        //向模板添加教育数据

		// 工作经历数据
		$work  = D('resume_work');
		$winfo = $work->where('uid=' . $uid)->select();
		// 遍历所有工作经历
		foreach ($winfo as $k => $v) {
			// 对起止日期做处理
			$stime               = explode(',', $winfo[$k]['sdate'])[0];   //拆分用户工作起始日期
			$winfo[$k]['syear']  = date('Y', $stime);                      //用户工作起始年
			$winfo[$k]['smonth'] = date('m', $stime);                      //用户工作起始月
			$ttime               = explode(',', $winfo[$k]['sdate'])[1];   //拆分用户工作终止日期
			if ($ttime == 0) {
				$winfo[$k]['tyear']  = 0;
				$winfo[$k]['tmonth'] = 0;
			} else {
				$winfo[$k]['tyear']  = date('Y', $ttime);                      //用户工作终止年
				$winfo[$k]['tmonth'] = date('m', $ttime);                      //用户工作终止月
			}
		}
		// 循环输出工作起止年
		$wbyear = date('Y', time());
		$wsyear = date('Y', strtotime('Y,-35year'));
		for ($wbyear; $wbyear > $wsyear; $wbyear--) {
			$ssyear[] = $wbyear;
		}
		$this->assign('ssyear', $ssyear);                                 //向模板添加起工作止年数据
		$this->assign('work', $winfo);                                    //向模板添加工作数据


		// 项目经验数据
		$pro   = D('resume_pro');
		$pinfo = $pro->where('uid=' . $uid)->select();
		// 遍历所有项目经验
		foreach ($pinfo as $k => $v) {
			// 对起止日期做处理
			$stime               = explode(',', $pinfo[$k]['psdate'])[0];  //拆分用户项目起始日期
			$pinfo[$k]['syear']  = date('Y', $stime);                      //用户项目起始年
			$pinfo[$k]['smonth'] = date('m', $stime);                      //用户项目起始月
			$ttime               = explode(',', $pinfo[$k]['psdate'])[1];  //拆分用户项目终止日期
			if ($ttime == 0) {
				$pinfo[$k]['tyear']  = 0;
				$pinfo[$k]['tmonth'] = 0;
			} else {
				$pinfo[$k]['tyear']  = date('Y', $ttime);                      //用户项目终止年
				$pinfo[$k]['tmonth'] = date('m', $ttime);                      //用户项目终止月
			}
		}
		$this->assign('project', $pinfo);                                  //向模板添加项目数据


		// 教育数据
		$edu   = D('resume_edu');
		$einfo = $edu->where('uid=' . $uid)->select();
		// 遍历所有教育数据
		foreach ($einfo as $k => $v) {
			// 对起止日期做处理
			$stime               = explode(',', $einfo[$k]['esdate'])[0];  //拆分用户教育起始日期
			$einfo[$k]['syear']  = date('Y', $stime);                      //用户教育起始年
			$einfo[$k]['smonth'] = date('m', $stime);                      //用户教育起始月
			$ttime               = explode(',', $einfo[$k]['esdate'])[1];  //拆分用户教育终止日期
			$einfo[$k]['tyear']  = date('Y', $ttime);                      //用户教育终止年
			$einfo[$k]['tmonth'] = date('m', $ttime);                      //用户教育终止月
		}

		$this->assign('education', $einfo);

		$this->display('index');
	}

	/**
	 * 基本信息添加与修改
	 * @author    Frank
	 * @Created   2015/1/11
	 */
	public function updateBasic() {
		$basic = D("Basic");
		if ($basic->create()) {
			//拼装生日
			$birthday = $_POST['birth_year'] . "-" . $_POST['birth_month'] . "-" . $_POST['birth_day'];
			//转换生日为时间戳
			$birthday        = strtotime($birthday);
			$basic->birthday = $birthday;
			$basic->uid      = session('user.id');
			//判断基本资料库中是否存在用户资料,存在则修改,不存在则添加
			if (!empty($basic->id)) {
				$result = $basic->where('id=' . $basic->id)->save();
			} else {
				$result = $basic->add();
			}
			if ($result) {
				$this->success('保存成功', $_SERVER["HTTP_REFERER"]);
			}
		} else {
			$this->error($basic->getError());
		}
	}

	/**
	 * 求职意向添加与修改
	 * @author    Frank
	 * @Created   2015/1/11
	 */
	public function updateJob() {
		$job          = D("Resjob");
		$_POST['uid'] = session('user.id');
		if ($job->create()) {
			//判断执行添加或修改
			if (!empty($job->id)) {
				$result = $job->where('id=' . $job->id)->save();
			} else {
				$result = $job->add();
			}
			if ($result) {
				$this->success('保存成功', $_SERVER["HTTP_REFERER"]);
			}
		} else {
			$this->error($job->getError());
		}

	}

	/**
	 * 工作经历添加与修改
	 * @author    Frank
	 * @Created   2015/1/11
	 */
	public function updateCompany() {
		$work = D('Work');
		//格式化起止日期
		$sdate = strtotime($_POST['syear'] . "-" . $_POST['smonth']);
		//判断止日期是否为'至今'
		if ($_POST['tyear'] == 0 || $_POST['tmonth'] == 0) {
			$tdate = 0;
		} else {
			$tdate = strtotime($_POST['tyear'] . "-" . $_POST['tmonth']);
		}
		//拼装起止日期为数据库需要格式
		$_POST['sdate'] = $sdate . ',' . $tdate;
		$_POST['uid']   = session('user.id');
		if ($work->create()) {
			//判断执行添加或修改
			if (!empty($work->id)) {
				$result = $work->where('id=' . $work->id)->save();
			} else {
				$result = $work->add();
			}
			if ($result) {
				$this->success('保存成功', $_SERVER["HTTP_REFERER"]);
			} else {
				$this->error();
			}
		} else {
			$this->error($work->getError());
		}

	}

	/**
	 * 项目经验添加与修改
	 * @author    Frank
	 * @Created   2015/1/11
	 */
	public function updateProject() {
		$pro = D('Project');
		//格式化起止日期为时间戳
		$sdate = strtotime($_POST['syear'] . "-" . $_POST['smonth']);
		//判断止日期是否为'至今'
		if ($_POST['tyear'] == 0 || $_POST['tmonth'] == 0) {
			$tdate = 0;
		} else {
			$tdate = strtotime($_POST['tyear'] . "-" . $_POST['tmonth']);
		}
		//拼装日期为数据库需要格式
		$_POST['psdate'] = $sdate . ',' . $tdate;
		$_POST['uid']    = session('user.id');
		if ($pro->create()) {
			if (!empty($pro->id)) {
				$result = $pro->where('id=' . $pro->id)->save();
			} else {
				$result = $pro->add();
			}
			if ($result) {
				$this->success('保存成功', $_SERVER["HTTP_REFERER"]);
			} else {
				$this->error();
			}
		} else {
			$this->error($pro->getError());
		}

	}

	/**
	 * 教育经历添加与修改
	 * @author    Frank
	 * @Created   2015/1/11
	 */
	public function updaeEducation() {
		$edu = D('Education');
		//格式化起止日期
		$sdate = strtotime($_POST['syear'] . "-" . $_POST['smonth']);
		$tdate = strtotime($_POST['tyear'] . "-" . $_POST['tmonth']);
		if ($edu->create()) {
			//封装起止日期
			$edu->esdate = $sdate . ',' . $tdate;
			$edu->uid    = session('user.id');
			//判断执行添加或修改
			if (!empty($edu->id)) {
				$result = $edu->where('id=' . $edu->id)->save();
			} else {
				$result = $edu->add();
			}
			if ($result) {
				$this->success('保存成功', U('Resume/index'));
			} else {
				$this->error();
			}
		} else {
			$this->error($edu->getError());
		}

	}

	/**
	 * 工作经历/项目经验/教育经历删除
	 * @author    Frank
	 * @Created   2015/1/12
	 */
	public function delete() {
		$action = $_POST['item'];
		// 通过item判断删除数据属于哪项,并执行删除操作
		switch ($action) {
			case 'company':
				$result = D('resume_work')->where('id=' . $_POST['id'])->delete();
				break;
			case 'project':
				$result = D('resume_pro')->where('id=' . $_POST['id'])->delete();
				break;
			case 'education':
				$result = D('resume_edu')->where('id=' . $_POST['id'])->delete();
		}
		if ($result) {
			$this->ajaxReturn($result);
		} else {
			$this->display(false);
		}
	}

	/**
	 * 职位申请(简历页)
	 * @author    Frank
	 * @Created   2015/1/13
	 */
	public function apply() {
		$jid = $_GET['jobid'];
		$job = D('job');
		$com = D('company');
		//获取所有职位信息
		$jobs = $job->where('id=' . $jid)->find();
		//转换职位工作地点成城市名
		$jobs['city'] = getCityInfo($jobs)['name'];
		//转换薪资值
		$jobs['payid'] = $jobs['payid'] * 1000;
		//获取相关企业所有信息
		$coms = $com->where('id=' . $jobs['comid'])->field('cname,logo')->find();
		//添加企业名称
		$jobs['cname'] = $coms['cname'];
		//添加企业logo
		$jobs['logo'] = $coms['logo'];
		$this->assign('job', $jobs);
		$this->index();
	}

	/**
	 * 执行职位申请
	 * @author    Frank
	 * @Created   2015/1/13
	 */
	public function doApply() {
		$do['jid'] = $_POST['jobid'];
		$do['uid'] = session('user.id');
		//格式化.封装数据
		$do['comid']   = D('job')->where('id=' . $do['jid'])->getField('comid');
		$do['rid']     = D('resume')->where('uid=' . $do['uid'])->getField('id');
		$do['addtime'] = time();
		$do['status']  = 1;
		$doIt          = D('apply');
		$doIt->create($do);
		$result = $doIt->add();
		if ($result) {
			$this->ajaxReturn(true);
		} else {
			$this->ajaxReturn(false);
		}
	}
}