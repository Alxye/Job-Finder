<?php
/*
 * 公司管理
 * @author    Xixi Zhao
 * @Created  2020/05/14
 */
namespace Admin\Controller;

class CompanyController extends CommonController {

	public function index() {
		$this->display();
	}


	/**
	 * 查询数据
	 */
	public function  lists() {
		$do = D("company");

		/* 初始化分页查询条件 */
		$pageSize       = I('iDisplayLength');    //每页记录数
		$maxRows        = $do->count();           //总记录数
		$page           = I("iDisplayStart");     //当前起始索引
		$field          = array("id", "cname", "nowcid", "attrid", 'industryid', "contact", 'phone', 'status'); //查询字段
		$order          = I('iSortCol_0') != null ? $field[intval(I('iSortCol_0'))] . " " . I("sSortDir_0") : "id desc";//排序
		$where          = I('sSearch') != "" ? "cname like '%" . I('sSearch') . "%'" : "";
		$DisplayRecords = $do->where($where)->count();
		$data           = $do->field($field)->where($where)->order($order)->limit($page, $pageSize)->select(); //获取数据
		foreach ($data as $k => $v) {
			//公司性质
			$attr                   = getTagInfo($v['attrid']);
			$data[$k]['attrid']     = $attr['tagname'];
			//所属行业
			$industry               = getTagInfo($v['industryid']);
			$data[$k]['industryid'] = $industry['tagname'];
			//所在城市
			$city                   = getCityInfo($v['nowcid']);
			$data[$k]['nowcid']     = $city['name'];
		}
		/* 返回给客户端数据 */
		$list["sEcho"]                = I("sEcho"); //来自客户端 sEcho 的没有变化的复制品
		$list["iTotalRecords"]        = $maxRows;   //总记录数
		$list["iTotalDisplayRecords"] = $DisplayRecords;   //过滤之后，实际的行数
		$list["aaData"]               = $data;      //表中数据

		$this->ajaxReturn($list);
	}

	public function edit() {
		$data = D('company')->find(I('id', 0));
		$data['description']  = str_replace("<br/>","\n",htmlspecialchars_decode($data['description']));
		//企业级别
		$level = array(
			1 => '1级',
			2 => '2级',
			3 => '3级',
			4 => '4级',
			5 => '5级',
		);
		$this->assign('level', $level);
		//企业性质
		$this->assign("attr", getTag(C('ATTRID')));
		//企业规模
		$this->assign("size", getTag(C('SIZEID')));
		//公司行业
		$this->assign("industry", getTag(C('TRADE')));
		//所在城市
		$this->assign('city', city(2));
		$this->assign('data', $data);
		$this->display();
	}

	/**
	 * 修改数据
	 */
	public function update() {
		$do = D("company");
		if ($do->create()) {
			if(I('description')){
				$do->description = str_br($do->description);
			}
			if ($do->save()) {
				$this->success("修改成功", U("index"));
			} else {
				$this->error("修改失败");
			}
		} else {
			$this->error($do->getError());
		}

	}
}