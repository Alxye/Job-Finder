<?php
/**
 * 简历管理
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  ResumeController.class.php
 */

namespace Admin\Controller;

class ResumeController extends CommonController {
	/**
	 * 显示列表页
	 * @author    Zhao
	 * @Created   2020/06/13
	 */
	public function index() {
		$this->display();
	}

	/**
	 * 查询列表数据
     * @author    Zhao
     * @Created   2020/06/13
	 */
	public function resumeList() {
		$do = M("resume");

		$pageSize       = I('iDisplayLength');
		$maxRows        = $do->count();
		$page           = I("iDisplayStart");
		$field          = array("id", "uid", "truename", "sex", "eid", "hopecid", "hopejob", "status");
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "sort desc";
		$where          = I('sSearch') != "" ? "truename like '%" . I('sSearch') . "%' or hopejob like '%" . I('sSearch') . "%'" : "";
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->field($field)->where($where)->order($order)->limit($page, $pageSize)->select();
		foreach ($data as $k => $v) {
			//学历
			$edu             = getTagInfo($v['eid']);
			$data[$k]['eid'] = $edu['tagname'];
			//期望城市
			$hopecity            = getCityInfo($v['hopecid']);
			$data[$k]['hopecid'] = $hopecity['name'];
		}
		$list["sEcho"]                = I("sEcho");
		$list["iTotalRecords"]        = $maxRows;
		$list["iTotalDisplayRecords"] = $DisplayRecords;
		$list["aaData"]               = $data;

		$this->ajaxReturn($list);
	}

	/**
	 * 显示简历详细信息
     * @author    Zhao
     * @Created   2020/06/13
	 */
	public function details() {
		$do    = D("resume");
		$basic = $do->where('id=' . I('id'))->find();
		if ($basic['sex'] == 1) {
			$basic['sex'] = "男";
		} else {
			$basic['sex'] = "女";
		}
		$basic['birthday'] = date("Y-m-d", $basic['birthday']);
		$edu               = getTagInfo($basic['eid']);
		$basic['eid']      = $edu['tagname'];
		switch ($basic['status']) {
			case "1":
				$basic['status'] = "目前在职，准备换个新环境";
				break;
			case "2":
				$basic['status'] = "目前离职，可快速到岗";
				break;
			case "3":
				$basic['status'] = "应聘毕业生";
				break;
			case "4":
				$basic['status'] = "暂时不找工作";
				break;
		}
		//有具体对应关系表后再写数据转换
		$nowcity          = getCityInfo($basic['nowcid']);
		$basic['nowcid']  = $nowcity['name'];
		$oldcity          = getCityInfo($basic['oldcid']);
		$basic['oldcid']  = $oldcity['name'];
		$hopecity         = getCityInfo($basic['hopecid']);
		$basic['hopecid'] = $hopecity['name'];
		$hopepay          = getTagInfo($basic['hopepay']);
		$basic['hopepay'] = $hopepay['tagname'];

		$do   = D("resume_edu");
		$edu  = $do->where('id=' . I('id'))->find();
		$do   = D("resume_pro");
		$pro  = $do->where('id=' . I('id'))->find();
		$do   = D("resume_work");
		$work = $do->where('id=' . I('id'))->find();
		$this->assign($basic);   //输出简历基本资料
		$this->assign($edu);    //输出教育经历
		$this->assign($pro);    //输出项目经验
		$this->assign($work);   //输出工作经历
		$this->assign('url', 'javascript:history.go(-1);'); //返回上层url
		$this->display(details);//输出到details
	}
}