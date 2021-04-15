<?php
/*
 * 公共组件
 * @author    Xixi Zhao
 * @filename UserWidget.class.php
 * @Created  2020/05/11
 */

namespace Common\Widget;

use Think\Controller;

class PublicWidget extends Controller {
	/**
	 * 头部导航条
	 */
	public function nav() {

		//定义导航
		$nav = array(
			'Index'   => array(
				'url'  => U('Home/Index/index'),
				'name' => '首页'
			),
			'Job'     => array(
				'url'  => U('Home/Job/index'),
				'name' => '职位'
			),
			'Company' => array(
				'url'  => U('Home/Company/index'),
				'name' => '企业'
			),
			'Person' => array(
				'url'  => U('Home/Person/index'),
				'name' => '人才'
			),
		);
		//导航激活显示
		foreach ($nav as $k => $v) {
			if (MODULE_NAME == 'Home') {
				if (CONTROLLER_NAME == $k) {
					$nav[$k]['on'] = "class='on'";
				}
			} else {
				$nav['Index']['on'] = "class='on'";
			}
		}
		//搜索
		if (MODULE_NAME == 'Home' && CONTROLLER_NAME == 'Company'){
			$search = array(
				'url' => U('Home/Company/index'),
				'placeholder'=>'企业关键字...'
			);
		}else if(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'Job'){
			$search = array(
				'url' => U('Home/Job/index'),
				'placeholder'=>'职位关键字...'
			);
		}else if(MODULE_NAME == 'Home' && CONTROLLER_NAME == 'Person'){
			$search = array(
				'url' => U('Home/Person/index'),
				'placeholder'=>'人才关键字...'
			);
		}
		$this->assign('keyword', I('keyword'));
		$this->assign('search', $search);
		$this->assign('nav', $nav);
		$this->display("./App/Common/View/Public/nav.html");
	}

	/**
	 * 页面footer
	 */
	public function footer() {
		$links = D("link")->order('sort desc')->select();
		$this->assign("links", $links);
		$this->display("./App/Common/View/Public/footer.html");
	}

	/**
	 * 热招企业
	 */
	public function hotcompany(){
		//热招企业
		$where['status']=1;
		$hotcompany = M("company")->where($where)->order('level desc')->limit(30)->select();
		foreach ($hotcompany as $k => $v) {
			$hotcompany[$k]['cname'] = $v['cname'];
		}
		$this->assign("hotcompany", $hotcompany);
		$this->display("./App/Common/View/Public/hotCompany.html");
	}

}