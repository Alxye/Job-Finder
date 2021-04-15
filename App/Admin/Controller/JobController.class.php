<?php
/*
 * 职位管理控制器
 * @author     Zhao
 * @Created  2020-06-13
 */
namespace Admin\Controller;

class JobController extends CommonController {

	public function index() {
		$this->display();
	}

	/**
	 * 查询城市列表信息
	 */
	public function lists() {
		$do = D("job");

		/* 初始化分页查询条件 */
		$pageSize       = I('iDisplayLength');    //每页记录数
		$maxRows        = $do->count();           //总记录数
		$page           = I("iDisplayStart");     //当前起始索引
		$field          = array("id", "comid", "name", "payid", "num", "eid", "year", "status", "edittime"); //查询字段
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "id desc";//排序
		$where          = I('sSearch') != "" ? "name like '%" . I('sSearch') . "%'" : ""; //搜素标题title
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->relation(true)->field($field)->where($where)->order($order)->limit($page, $pageSize)->select(); //获取数据
		foreach ($data as $k => $v) {//遍历输出TAG标签名
			$data[$k]['payid'] .= "<span style='color:#888888;'>K</span>";//薪资范围(非TAG标签)
			$data[$k]['company'] = M('company')->where('id=' . $v['comid'])->getField('cname');//公司名称
			$edu                 = getTagInfo($v['eid']);
			$data[$k]['eid']     = $edu['tagname'];//学历
			$year                = getTagInfo($v['year']);
			$data[$k]['year']    = $year['tagname'];//工作年限
		}
		/* 返回给客户端数据 */
		$list["sEcho"]                = I("sEcho"); //来自客户端 sEcho 的没有变化的复制品
		$list["iTotalRecords"]        = $maxRows;   //总记录数
		$list["iTotalDisplayRecords"] = $DisplayRecords;   //过滤之后，实际的行数
		$list["aaData"]               = $data;      //表中数据

		$this->ajaxReturn($list);

		$this->display();
	}

	//执行修改
	public function update() {
		$do = D("job");
		if ($do->create()) {
			if(I('duty')){
				$do->duty = str_br($do->duty);
			}
			if(I('request')){
				$do->request = str_br($do->request);
			}
			if ($do->save()) {
				$this->success("修改成功", U("index"));
			} else {
				$this->error("修改失败");
			}
		} else {
			$this->error($do->getError());
		}
		$this->display();

	}

	//执行删除
	public function delete() {
		if (D('job')->delete(I('id'))) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}

	//分别查出相关表中的字段的值，并放入到加载的修改页面中
	public function edit() {
		//查出分类信息
		$category = D("category")->select();
		$this->assign("catlist", $category);


		//查出月薪范围
		$payidlist = getTag($id = C('PAYID'));
		$this->assign("payidlist", $payidlist);

		//查出地区
		$city = D("city")->select();
		$this->assign("citylist", $city);

		//查出学历
		$elist = getTag($id = C('EID'));
		$this->assign("elist", $elist);

		//查出工作年限
		$yearlist = getTag($id = C('YEARID'));
		$this->assign("yearlist", $yearlist);

		//查出职位信息
		$data = D('job')->find(I('id', 0));

		//查出企业信息
		$cname = D("company")->where('id=' . $data['comid'])->getField('cname');
		$this->assign("cname", $cname);

		//被申请次数
		$applynum = M('apply')->where('jid=' . I('id'))->count();
		$this->assign("applynum", $applynum);

		$data['edittime'] = date("Y-m-d H:i:s", $data['edittime']);
		$data['duty']  = str_replace("<br/>","\n",htmlspecialchars_decode($data['duty']));
		$data['request']  = str_replace("<br/>","\n",htmlspecialchars_decode($data['request']));
		$this->assign('data', $data);
		$this->display();
	}
}