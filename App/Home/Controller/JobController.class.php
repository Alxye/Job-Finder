<?php
/*
 * 前台职位展示
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;

use Think\Controller;

class JobController extends CommonController {
	public function index() {
		//多条件筛选
		//要进行筛选的字段放在这里
		$conditions = array('cityid', 'industryid', 'cid', 'payid', 'eid', 'year', 'cid2', 'orderid');
		//先给需要筛选的字段赋空值，这些值将输出到页面的hidden fileds 中
		$cityid = $industryid = $cid = $cid2 = $payid = $eid = $year = $orderid = '';
		//以下循环给已经进行的筛选赋值，以便能够在下一次筛选中保留
		foreach ($conditions as $value) {
			if (isset($_GET[$value])) {
				$this->assign($value, $_GET[$value]);
			}
		}

		//获取城市列表
		$citylist = array_slice(city(2), 0, 12);
		$this->assign("citylist", $citylist);

		//获取行业的标签
		$trade = getTag(C('TRADE'));
		$this->assign("trade", $trade);
		//获取一级职能分类
		$category = getCate(C('JOB'));
		$this->assign("category", $category);
		//获取二级职能分类
		if (I('cid')) {
			$category_2 = getCate(C('JOB'), I('cid'));
			$this->assign("category_2", $category_2);

			if (!isCateChild(I('cid2'), I('cid'))) {
				$this->assign("cid2", 0);
			}
		} else {
			$this->assign("cid2", 0);
		}
		//获取薪水
		$pay = array(
			'<3'                => '3000以下',
			'BETWEEN 3 AND 5'   => '3000-5000',
			'BETWEEN 5 AND 8'   => '5000-8000',
			'BETWEEN 8 AND 15'  => '8000-15000',
			'BETWEEN 15 AND 20' => '15000-20000',
			'>20'               => '20000以上',
		);
		$this->assign('pay', $pay);
		//学历
		$eidlist = getTag(C('EID'));
		$this->assign("eidlist", $eidlist);
		//经验
		$experience = array(
			'28,29'             => '应届生',
			'29_30'             => '1年以下',
			'30_31_32'          => '1-3年',
			'32_33_34'          => '3-5年 ',
			'34_35_36_37_38_41' => '5-10年',
			'54'                => '10年以上',
		);
		$this->assign('experience', $experience);

		//查询条件
		$where[] = array('status = 1');
		if (I('cityid')) {//城市
			$where[] = array('cityid = ' . I('cityid'));
		}
		if (I('industryid')) {//行业
			$com_list = M('company')->where('industryid = ' . I('industryid'))->getField('id', true);
			$where[]  = array("comid in (" . implode(',', $com_list) . ")");
		}
		if (I('cid')) {//职能
			if (I('cid2')) {
				$where[] = array('cid  in(' . implode(',', getCateChild(I('cid2'))) . ')');
			} else {
				$where[] = array('cid  in(' . implode(',', getCateChild(I('cid'))) . ')');
			}
		}
		if (I('payid')) { //薪水
			$where[] = array("payid " . htmlspecialchars_decode(I('payid')));
		}
		if (I('eid')) {//学历
			$where[] = array('eid = ' . I('eid'));
		}
		if (I('year')) {//经验
			$where[] = array("year in(" . str_replace('_', ',', I('year')) . ")");
		}
		if (I('keyword')) {//关键字
			$where[] = array("title like '%" . I('keyword') . "%' or name like '%" . I('keyword') . "%'");
		}

		//排序
		if (I('orderid')) {
			$order = str_replace("_", ' ', I('orderid'));
		} else {
			$order = 'edittime desc';
			$this->assign('orderid', 'edittime_desc');
		}

		//分页
		$do    = M('job'); // 实例化Data数据对象
		$count = $do->where($where)->count();// 查询满足要求的总记录数
		$Page  = new  \Think\Page($count, 2);// 实例化分页类 传入总记录数
		$show  = $Page->show();// 分页显示输出

		$field = "id,cid,comid,title,name,payid,num,cityid,eid,year,addtime,edittime,hits";
		//获取所有职位
		$joblist = $do->order($order)->field($field)->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();

		foreach ($joblist as $k => $v) {
			//薪资
			$joblist[$k]['payid'] = number_format($v['payid'] * 1000);
			//学历
			$e                  = getTagInfo($v['eid']);
			$joblist[$k]['eid'] = $e['tagname'];
			//工作经历
			$year = getTagInfo($v['year']);
			if ($year['id'] == 29) {//将0年改为“不限”
				$joblist[$k]['year'] = "不限";
			} else {
				$joblist[$k]['year'] = $year['tagname'];
			}
			//公司名称
			$joblist[$k]['comname']  = M('company')->where('id = ' . $v['comid'])->getField('cname');
			$joblist[$k]['logo']     = M('company')->where('id = ' . $v['comid'])->getField('logo');
			$city                    = getCityInfo($v['cityid']);
			$joblist[$k]['cityname'] = $city['name'];
			//统计被评论次
			$comment                 = M("comment");
			$comwhere['mid']         = C('JOB');//封装模块id查询条件
			$comwhere['pid']         = $v['id'];//封装当前职位信息的id
			$num                     = $comment->where($comwhere)->count();
			$joblist[$k]['flushnum'] = $num;    //将刷新字段的值在此临时设置成评论统计条数
		}
		$this->assign("count", $count);
		$this->assign("joblist", $joblist);
		$this->assign('page', $show);
		//dump($joblist);
		$this->display("index");
	}

	public function item() {
		//当前职位基本信息
		$job = D('job')->find($_GET['jobid']);

		//面包屑：分类显示
		$a = getCateInfo($job['cid']);
		if ($a['pid'] > 0) {
			$b = getCateInfo($a['pid']);
			if ($b['pid'] > 0) {
				$c = getCateInfo($b['pid']);
			}
		}
		$industryid   = $c['id'];
		$industryname = $c['name'];
		$cid          = $b['id'];
		$cidname      = $b['name'];
		$cid2         = $a['id'];
		$cid2name     = $a['name'];
		$this->assign("industryid", $industryid);
		$this->assign("industryname", $industryname);
		$this->assign("cid", $cid);
		$this->assign("cidname", $cidname);
		$this->assign("cid2", $cid2);
		$this->assign("cid2name", $cid2name);

		$job['cityid'] = M('city')->where('id=' . $job['cityid'])->getField('name');//城市

		$year         = getTagInfo($job['year']);//工作年分
		$job['year']  = $year['tagname'];
		$e            = getTagInfo($job['eid']);//学历
		$job['eid']   = $e['tagname'];
		$job['payid'] = number_format($job['payid'] * 1000);//薪资

		$this->assign("jobitem", $job);
		//dump($job);
		//可能感兴趣的职位
		$jobrecommend = M('job')->where('cid=' . $job['cid'])->select();
		foreach ($jobrecommend as $k => $v) {
			$jobrecommend[$k]['payid'] = number_format($v['payid'] * 1000);//薪资
		}
		$this->assign("jobrecommend", $jobrecommend);
		//dump($jobrecommend);
		//企业信息
		$company = M('company')->where('id=' . $job['comid'])->select();
		foreach ($company as $k => $v) {
			$attr                      = getTagInfo($v['attrid']);//公司性质
			$company[$k]['attrid']     = $attr['tagname'];
			$industry                  = getTagInfo($v['industryid']);//公司所属行业
			$company[$k]['industryid'] = $industry['tagname'];
			$size                      = getTagInfo($v['sizeid']);//公司人数（规模）
			$company[$k]['sizeid']     = $size['tagname'];
		}
		$this->assign("company", $company[0]);
		//dump($company);
		//当前企业下的其他职位
		$jobother = M('job')->where('comid=' . $job['comid'])->select();
		foreach ($jobother as $k => $v) {
			$jobother[$k]['payid'] = number_format($v['payid'] * 1000);//薪资
			$e                     = getTagInfo($v['eid']);//学历
			$jobother[$k]['eid']   = $e['tagname'];
			$year                  = getTagInfo($v['year']);//工作年限
			$jobother[$k]['year']  = $e['tagname'];
		}
		$this->assign("jobother", $jobother);
		//dump($jobother);
		//显示收藏状态
		$where['uid'] = $_SESSION['user']['id'];
		$where['jid'] = $_GET['jobid'];
		$collect      = M('collect')->where($where)->count();
		$this->assign("collect", $collect);
		//$comcollect=M('company')->where('uid='.$_SESSION['user']['id'])->select();
		//dump($comcollect);
		//dump($_SESSION['user']['id']);
		//显示申请状态
		$appuser = M("user")->where('id=' . $_SESSION['user']['id'] . ' and usertype=2')->field('id,usertype')->count();  //查询是否为企业帐号
		$this->assign("appuser", $appuser);
		$apply = M("apply")->where($where)->count();
		$this->assign("apply", $apply);
		$this->display();
	}

	//登录情况下的立即申请按钮状态
	public function apply() {
		//判断是否登录
		if ($this->user) {
			echo $this->user['usertype'];
		}
	}

	//登录下的执行收藏
	public function collect() {
		//判断是否登录
		if ($_POST['uid'] > 0) {
			$comcollect=M('company')->where('uid='.$_POST['uid'])->count();
			if($comcollect>0){
				echo 4;//企业帐户
			}else{
			//查出是否已收藏
			$where['uid'] = $_POST['uid'];
			$where['jid'] = $_POST['jid'];

			$collect = M('collect')->where($where)->select();
			$this->assign("collect", $collect);

			if (empty($collect)) {
				//执行添加
				$collect['uid'] = $_POST['uid'];
				$collect['jid'] = $_POST['jid'];
				$collect        = M('collect');

				$collect->create();
				if ($id = $collect->add()) {
					echo 1;
					//echo '收藏成功！';
				} else {
					echo 2;
					//echo '收藏失败！';
				}
			} else {
				//执行删除
				$where['uid'] = $_POST['uid'];
				$where['jid'] = $_POST['jid'];
				//$coll=M('$collect')->where($where)->delete();
				if (M('collect')->where($where)->delete()) {
					echo 3;
					//echo "已取消收藏！";
				}
			}
			}
		}
	}

}
