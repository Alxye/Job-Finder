<?php
/**
 * 职位申请历史
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  HistoryController.class.php
 */
namespace User\Controller;

use Think\Controller;

class HistoryController extends CommonController {
	/**
	 * 全部申请历史
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function index() {
		//查找所有申请历史(倒序排列）
		$history = M('apply')->where('uid=' . session('user.id'))->order('addtime desc')->select();

		//判断数据是否存在,存在则进行数据封装,否则返回空
		if ($history > 0) {
			$history = $this->status($history);
		}
		$ac = '1';                              //标签页默认选择项
		$this->assign('ac', $ac);
		$this->assign('history', $history);     //向模板输出历史信息
		$this->display('index');                //执行剩余页面显示

	}

	/**
	 * 已读申请历史
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function isread() {
		//查找状态为已读的申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=2')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '2';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 已通知面试
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function interview() {
		//查找状态为已通知面试的申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=3')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '3';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 已发出offer
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function offer() {
		//查找状态为发出offer申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=4')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '4';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 已接受的offer
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function accept() {
		//查找状态为不合适的申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=5')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '5';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 已拒绝offer
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function refuse() {
		//查找状态为不合适的申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=6')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '6';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 不合适的
     * @author    Zhao Xixi
     * @Created   2020/06/14
	 */
	public function bad() {
		//查找状态为不合适的申请历史
		$history = M('apply')->where('uid=' . session('user.id') . ' AND status=7')->order('addtime desc')->select();
		if ($history) {
			$history = $this->status($history);
		}
		$ac = '7';
		$this->assign('ac', $ac);
		$this->assign('history', $history);
		$this->display('index');
	}

	/**
	 * 基础页面信息
	 * @author    Zhao Xixi
	 * @Created   2020/06/14
	 */
	public function status($result) {
		$history = $result;
		//准备状态中文列表
		$status = array('1' => '投递成功', '2' => '简历已读', '3' => '通知面试', '4' => '接到offer', '5' => '已接受offer', '6' => '已拒绝offer', '7' => '简历不合适');
		for ($i = 0; $i < count($history); $i++) {
			$jid = $history[$i]['jid'];
			$cid = $history[$i]['comid'];
			//转换职位名称
			$history[$i]['jobname'] = M('job')->where('id=' . $jid)->getField('name');
			//转换企业名称
			$history[$i]['comname'] = M('company')->where('id=' . $cid)->getField('cname');
			//转换添加时间
			$history[$i]['addtime'] = tranTime($history[$i]['addtime']);
			//转换简历状态
			foreach ($status as $k => $v) {
				if ($history[$i]['status'] == $k) {
					$history[$i]['statusval'] = $v;
				}
			}
		}
		return ($history);
	}
}