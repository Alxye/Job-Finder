<?php
/*
 * 前台企业展示
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;

use Think\Controller;

class CompanyController extends CommonController {
	public function index() {
		//多条件筛选
		//要进行筛选的字段放在这里
		$conditions = array('nowcid', 'industryid', 'sizeid', 'attrid',  'orderid');
		//先给需要筛选的字段赋空值，这些值将输出到页面的hidden fileds 中
		$nowcid = $industryid = $sizeid = $attrid = $orderid = '';
		//以下循环给已经进行的筛选赋值，以便能够在下一次筛选中保留
		foreach ($conditions as $value) {
			if (isset($_GET[$value])) {
				$this->assign($value, $_GET[$value]);
			}
		}

		//获取城市
		$citylist = array_slice(city(2), 0, 12);
		$this->assign("citylist", $citylist);
		//获取行业的标签
		$trade = getTag($id = C('TRADE'));
		$this->assign("trade", $trade);
		//企业规模
		$size = getTag($id = C('SIZEID'));
		$this->assign("size", $size);
		//企业性质
		$attr = getTag($id = C('ATTRID'));
		$this->assign("attr", $attr);

		//查询条件
		$where[] = array('status=1');
		if (I('nowcid')) {//城市
			$where[] = array('nowcid = ' . I('nowcid'));
		}
		if (I('industryid')) {//行业
			$where[] = array('industryid = ' . I('industryid'));
		}
		if (I('sizeid')) {//规模
			$where[] = array('sizeid = ' . I('sizeid'));
		}
		if (I('attrid')) {//公司性质
			$where[] = array('attrid = ' . I('attrid'));
		}
		if (I('keyword')) {//关键字
			$where[] = array("cname like '%" . I('keyword') . "%' or one like '%" . I('keyword') . "%'");
		}
		//排序
		if (I('orderid')) {
			$order = str_replace("_", ' ', I('orderid'));
		} else {
			$order = 'id desc';
			$this->assign('orderid', 'id_desc');
		}

		//分页
		$Article = M('company');
		$count   = $Article->where($where)->count();
		$Page    = new  \Think\Page($count, 30);
		$show    = $Page->show();


		//获取企业信息
		$company = $Article->order($order)->field('description',true)->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
		foreach ($company as $k => $v) {
		    //var_dump($company);
			//行业
			$industry                  = getTagInfo($v['industryid']);
			$company[$k]['industryid'] = $industry['tagname'];
			//公司规模
			$size                  = getTagInfo($v['sizeid']);
			$company[$k]['sizeid'] = $size['tagname'];
			//企业性质
			$attr                  = getTagInfo($v['attrid']);
			$company[$k]['attrid'] = $attr['tagname'];
			//所在城市
			$nowcid                = getCityInfo($v['nowcid']);
			$company[$k]['nowcid'] = $nowcid['name'];
			//获取当前企业发布过的职位信息
			$job  = M('job')->field('id,name')->where('comid=' . $v['id'])->limit(0, 5)->select();
			$company[$k]['job'] = $job;
		}

		$this->assign("count", $count);
		$this->assign("company", $company);
		$this->assign('page', $show);// 赋值分页输出

		$this->display();
	}

	public function item() {
		//企业信息
		$comitem               = M('company')->find($_GET['comid']);
		$attr                  = getTagInfo($id = $comitem['attrid']);//公司性质
		$comitem['attrid']     = $attr['tagname'];
		$size                  = getTagInfo($id = $comitem['sizeid']);//公司规模
		$comitem['sizeid']     = $size['tagname'];
		$industry              = getTagInfo($id = $comitem['industryid']);//公司所属行业
		$comitem['industryid'] = $industry['tagname'];

		$this->assign('comitem', $comitem);

		//当前企业下的其他职位
		$jobother = M('job')->where('comid=' . $_GET['comid'])->select();
		foreach ($jobother as $k => $v) {
			$jobother[$k]['payid'] = number_format($v['payid'] * 1000);//薪资
			$e                     = getTagInfo($v['eid']);//学历
			$jobother[$k]['eid']   = $e['tagname'];
			$year                  = getTagInfo($v['year']);//工作年限
			$jobother[$k]['year']  = $e['tagname'];
		}
		$this->assign("jobother", $jobother);

		$this->display();
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
                $where['comid'] = $_POST['comid'];
                $collect = M('collect_company')->where($where)->select();
                $this->assign("collect_company", $collect);

                if (empty($collect)) {
                    //执行添加
                    $collect['uid'] = $_POST['uid'];
                    $collect['comid'] = 1;
                    $collect        = M('collect_company');

                    $collect->create();
                    if ($collect->add()) {
                        echo 1;
                        //echo '收藏成功！';
                    } else {
                        echo 2;
                        //echo '收藏失败！';
                    }
                   // var_dump($collect);
                } else {
                    //执行删除
                    $where['uid'] = $_POST['uid'];
                    $where['comid'] = $_POST['comid'];
                    if (M('collect_company')->where($where)->delete()) {
                        echo 3;
                    }
                }
            }
        }
    }
}