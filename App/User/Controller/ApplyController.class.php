<?php
/*
 * 申请简历管理
 * @author     Zhao
 * @Created  2020/06/13
 */
namespace User\Controller;

class ApplyController extends CommonController {

	/**
	 * 查看简历页面
	 */
	public function index() {
		$do      = M('apply');
		$where[] = array('comid' => $this->company['id']);
		//状态查询
		if (I('status')) {
			$where[] = array('status' => I('status'));
		}
		//职位对应的简历
		if (I('jid')) {
			$where[] = array('jid' => I('jid'));
		}
		$count = $do->where($where)->count();// 查询满足要求的总记录数
		$Page  = new \Think\Page($count, 10);// 实例化分页类
		$Page->setConfig("prev", '上一页');
		$Page->setConfig("next", '下一页');
		$page  = $Page->show();// 分页显示输出
		$apply = $do->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
		//获取简历信息/职位名称
		foreach ($apply as $k => $v) {
			$apply[$k]['jobname'] = M('job')->where('id=' . $v['jid'])->getField("name");
			$apply[$k]['info']    = M('resume')->find($v['rid']);
			$edu                  = getTagInfo($apply[$k]['info']['eid']);
			$apply[$k]['edu']     = $edu['tagname'];
			$year                 = getTagInfo($apply[$k]['info']['year']);
			$apply[$k]['year']    = $year['tagname'];
		}
		$this->assign('page', $page);
		$this->assign('apply', $apply);
		$this->display();
	}

	/**
	 * 修改简历状态
	 */
	public function update() {
		$do    = M("apply");
		$where = array("id" => I('id'), 'comid' => $this->company['id']);
		if ($do->where($where)->setField('status', I('status'))) {
			$this->success('操作成功');
		} else {
			$this->error('操作失败:' . $do->getLastsql());
		}
	}

	/**
	 * 生成邀请表单
	 */
	public function interviewForm() {
        header("Content-type:text/html;charset=utf-8");
		$id        = I('id');
		$apply     = M('apply')->find(I('id'));
		$mail      = M('user')->where('id=' . $apply['uid'])->getField('email');//收件人
		$cname     = $this->company['cname'];//公司名称
		$job       = M('job')->where('id=' . $apply['jid'])->getField('name');//职位名称
		$address   = $this->company['address'];//联系地址
		$contact   = $this->company['contact'];//联系人
		$phone     = $this->company['phone'];//联系电话
		$send_mail = M('user')->where('id=' . $this->company['uid'])->getField('email');//发件人
		$date      = date('Y-m-d');
		if (I('status') == 3) {
			$interview = <<<str
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
				<h4 class="modal-title">面试通知</h4></div>
			<div class="modal-body js-edit">
				<form class="form-horizontal" action="" method="post" id="ajaxForm">
					<input type="hidden" name="id" value="{$id}">
					<input type="hidden" name="status" value="3">
					<div class="form-group"><label class="col-sm-2 control-label">收件人</label>
						<div class="col-sm-10">
							<p class="form-control-static">{$mail}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label control-label-required js-column-required" data-column="subject">邮件主题</label>

						<div class="col-sm-10">
							<input class="form-control js-edit-subject" type="text" name="title" value="{$cname}：{$job}面试邀请函" placeholder="邮件主题"  autocomplete="off">
						</div>
					</div>
					<div class="form-group form-inline">
						<label class="col-sm-2 control-label control-label-required js-column-required" data-column="date">面试时间</label>

						<div class="col-sm-10">
							<input class="form-control js-edit-date" type="text" name="notification[date]" value="{$date}" data-toggle="date_picker" data-date-format="YYYY-MM-DD" placeholder="年-月-日" >
							&nbsp;
							<select class="form-control js-edit-hour" name="hour">
								<option value="00">00</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18" selected="">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
							</select>&nbsp;时
							&nbsp;:&nbsp;
							<select class="form-control js-edit-minute" name="minute">
								<option value="00">00</option>
								<option value="05">05</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="25">25</option>
								<option value="30">30</option>
								<option value="35" selected="">35</option>
								<option value="40">40</option>
								<option value="45">45</option>
								<option value="50">50</option>
								<option value="55">55</option>
							</select>&nbsp;分
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="address">面试地点</label>

						<div class="col-sm-10"><input class="form-control js-edit-address" type="text" name="address" value="{$address}" placeholder="地址" autocomplete="off"></div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="contact">联系人</label>

						<div class="col-sm-10"><input class="form-control js-edit-contact" type="text" name="contact" value="{$contact}" placeholder="联系人姓名"  autocomplete="off"></div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="phone">联系方式</label>

						<div class="col-sm-10"><input class="form-control js-edit-phone" type="text" name="phone" value="{$phone}" placeholder="联系方式"  autocomplete="off"></div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">其他内容</label>

						<div class="col-sm-10"><textarea class="form-control js-edit-content" name="content" rows="5">请您准时参加面试，如遇特殊情况请提前来电或回复邮件至：{$send_mail}</textarea></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary js-btn-send " >发送</button>
			</div>
		</div>
	</div>
</div>
str;
		} elseif (I('status') == 4) {
			$offer = <<<str
	<div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
		<div class="modal-dialog js-notify-apply-status">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
					<h4 class="modal-title">录用通知</h4></div>
				<div class="modal-body js-edit">
					<form class="form-horizontal" action="" method="post" id="ajaxForm">
						<input type="hidden" name="id" value="{$id}">
						<input type="hidden" name="status" value="4">

						<div class="form-group"><label class="col-sm-2 control-label">收件人</label>

							<div class="col-sm-10"><p class="form-control-static">
								{$mail}</p></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label control-label-required js-column-required" data-column="subject">邮件主题</label>
							<div class="col-sm-10">
								<input class="form-control js-edit-subject" type="text" name="title" value="{$cname}：{$job}" placeholder="邮件主题"  autocomplete="off"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="job">职位名称</label>
							<div class="col-sm-10"><input class="form-control js-edit-job" type="text" name="job" value="{$job}" placeholder="职位名称" o autocomplete="off"></div>
						</div>
						<div class="form-group form-inline"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="date">入职时间</label>

							<div class="col-sm-10"><input class="form-control js-edit-date" type="text" name="date" value="{$date}" data-toggle="date_picker" data-date-format="YYYY-MM-DD" placeholder="年-月-日" >
								&nbsp;
								<select class="form-control js-edit-hour" name="hour">
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09" selected="">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>&nbsp;时
								&nbsp;:&nbsp;
								<select class="form-control js-edit-minute" name="minute">
									<option value="00">00</option>
									<option value="05">05</option>
									<option value="10">10</option>
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="25">25</option>
									<option value="30">30</option>
									<option value="35">35</option>
									<option value="40">40</option>
									<option value="45">45</option>
									<option value="50">50</option>
									<option value="55">55</option>
								</select>分
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label control-label-required js-column-required" data-column="address">入职地点</label>

							<div class="col-sm-10"><input class="form-control js-edit-address" type="text" name="address" value="{$address}" placeholder="地址"  autocomplete="off"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" data-column="department">部门</label>

							<div class="col-sm-10"><input class="form-control js-edit-department" type="text" name="department" value="" placeholder="部门" autocomplete="off"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" data-column="probation">试用期至</label>

							<div class="col-sm-10"><input class="form-control js-edit-probation" type="text" name="probation" value="年-月-日" data-toggle="date_picker" data-date-format="YYYY-MM-DD" placeholder="年-月-日"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" data-column="trialsalary">试用月薪</label>

							<div class="col-sm-10"><input class="form-control js-edit-trialsalary" type="text" name="trialsalary" value="" placeholder="金额" autocomplete="off"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label control-label-required js-column-required" data-column="salary">转正月薪</label>

							<div class="col-sm-10"><input class="form-control js-edit-salary" type="text" name="salary" value="" placeholder="金额" autocomplete="off"></div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label">补充</label>

							<div class="col-sm-10"><textarea class="form-control js-edit-content" name="content" rows="5" placeholder="如岗位职责、公司福利、薪酬制度"></textarea></div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary js-btn-send" >发送</button>
				</div>
			</div>
		</div>
	</div>
str;
		}
		if ($apply && I('status') == 3) {
			echo $interview;
		} elseif ($apply && I('status') == 4) {
			echo $offer;
		}
	}

	/**
	 * 发送邀请邮件
	 */
	public function  sendMail() {
		//判断发送权限
		$comid = M('apply')->where('id=' . I('id'))->getfield('comid');
		if ($comid != $this->company['id']) {
			$this->error('没有发送权限');
			exit;
		}
		$apply    = M('apply')->find(I('id'));
		$mail     = M('user')->where('id=' . $apply['uid'])->getField('email');//收件人
		$ailas    = M('user')->where('id=' . $apply['uid'])->getField('email');//收件人昵称
		$cname    = $this->company['cname'];//公司名称
		$job      = M('job')->where('id=' . $apply['jid'])->getField('name');//职位名称
		$address  = I('address');//联系地址
		$contact  = I('contact');//联系人
		$phone    = I('phone');//联系电话
		$contents = I('content');
		$comurl   = C('SITE_URL') . '/' . U('Home/Company/item?comid=' . $this->company['id']); //公司主页
		$joburl   = C('SITE_URL') . '/' . U('Home/Job/item?jobid=' . $apply['jid']); //职业页面
		$date     = I('date');  //面试日期
		$hour     = I('hour'); //面试日期
		$minute   = I('minute'); //面试日期
		$loginurl = C('SITE_URL') . '/' . U('Home/Login/index');
		if (I('status') == 3) {
			$interview = <<<str
<table align="center" cellspacing="0" cellpadding="0" width="600">
    <tbody>
        <tr class="firstRow">
            <td valign="middle" style="font-size: 12px; -webkit-font-smoothing: subpixel-antialiased; background-color: rgb(44, 62, 81); border: none; padding: 20px; ">
                <img src="http://www.jobtong.com/Public/jobtong/images/logo_mail_2.png" width="265" height="35" style="border: none; vertical-align: middle;"/>
            </td>
        </tr>
        <tr>
            <td valign="top" style="font-size: 12px; -webkit-font-smoothing: subpixel-antialiased; word-break: break-all; padding: 0px; border: none; ">
                <p style="line-height: 20px; padding: 20px;">
                    <span style="font-size: 14px; color: rgb(44, 62, 81);">亲爱的<span style="color: rgb(255, 102, 51); ">{$ailas}</span>，您好：</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">我是<a href="{$comurl}" target="_blank" style="outline: none; text-decoration: none; cursor: pointer; color: rgb(255, 102, 51); ">{$cname}</a>，很高兴通知您已通过初试，现特邀您至我司参加<span style="color: rgb(255, 102, 51); ">复试</span>。</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">具体信息如下：</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">应聘职位：</span><a href="{$joburl}" target="_blank" style="outline: none; cursor: pointer; color: rgb(255, 102, 51); font-size: 14px; ">{$job}</a><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">面试时间：</span><span style="font-size: 14px; color: rgb(255, 102, 51);"><span t="5" times=" {$hour}:{$minute}" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204);">{$date}</span>&nbsp;{$hour}:{$minute}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">面试地点：</span><span style="font-size: 14px; color: rgb(255, 102, 51);">{$address}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">联系人：</span><span style="font-size: 14px; color: rgb(44, 62, 81);"><span t="6" data="{$contact}" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204); z-index: 1;">{$contact}</span></span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">联系电话：</span><span style="font-size: 14px; color: rgb(44, 62, 81);"><span t="6" data="{$phone}" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204); z-index: 1;">{$phone}</span></span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">{$contents}</span>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    <br/>
</p>
str;
			$content   = $interview;
		} elseif (I('status') == 4) {
			$department  = I('department'); //部门
			$trialsalary = I('trialsalary'); //使用月薪
			$salary      = I('salary');      //转正月薪
			$probation   = I('probation');  //试用日期

			$offer   = <<<str
<table align="center" cellspacing="0" cellpadding="0" width="600">
    <tbody>
        <tr class="firstRow">
            <td valign="middle" style="font-size: 12px; -webkit-font-smoothing: subpixel-antialiased; background-color: rgb(44, 62, 81); border: none; padding: 20px; ">
                <img src="http://www.jobtong.com/Public/jobtong/images/logo_mail_2.png" width="265" height="35" style="border: none; vertical-align: middle;"/>
            </td>
        </tr>
        <tr>
            <td valign="top" style="font-size: 12px; -webkit-font-smoothing: subpixel-antialiased; word-break: break-all; padding: 0px; border: none; ">
                <p style="line-height: 20px; padding: 20px;">
                    <span style="font-size: 14px; color: rgb(44, 62, 81);">亲爱的<span style="color: rgb(255, 102, 51); ">{$ailas}</span>，您好：</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">我是<a href="{$comurl}" target="_blank" style="outline: none; text-decoration: none; cursor: pointer; color: rgb(255, 102, 51); ">{$cname}</a>，很高兴您通过了面试，我司荣幸地聘请您为：<a href="{$joburl}" target="_blank" style="outline: none; text-decoration: none; cursor: pointer; color: rgb(255, 102, 51); ">{$job}</a>。我们相信您的技能和资历将为公司带来很大价值，衷心期待您的加入。</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">有关职位具体信息如下，在您正式入职时生效：</span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">职位：</span><a href="{$joburl}" target="_blank" style="outline: none; text-decoration: none; cursor: pointer; color: rgb(255, 102, 51); font-size: 14px;">{$job}</a><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">部门：</span><span style="font-size: 14px; color: rgb(44, 62, 81);">{$department}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">入职时间：</span><span style="font-size: 14px; color: rgb(255, 102, 51);"><span t="5" times="11:00" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204);">{$date}</span>{$hour}:{$minute}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">入职地点：</span><span style="font-size: 14px; color: rgb(255, 102, 51);">{$address}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">试用期至：</span><span style="font-size: 14px; color: rgb(44, 62, 81);"><span t="5" times="" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204);">{$probation}</span></span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">试用月薪：</span><span style="font-size: 14px; color: rgb(44, 62, 81);">{$trialsalary}</span><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">转正月薪：</span><span style="font-size: 14px; color: rgb(44, 62, 81);"><span t="6" data="{$salary}" style="border-bottom-width: 1px; border-bottom-style: dashed; border-bottom-color: rgb(204, 204, 204); z-index: 1;">{$salary}</span></span><br/><br/><span style="font-size: 14px; color: rgb(44, 62, 81);">{$contents}</span>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    <br/>
</p>
str;
			$content = $offer;
		}


			$do    = M("apply");
			$where = array("id" => I('id'), 'comid' => $this->company['id']);
			$do->where($where)->setField('status', I('status'));
			$this->success('邮件发送成功');
		
	}

}