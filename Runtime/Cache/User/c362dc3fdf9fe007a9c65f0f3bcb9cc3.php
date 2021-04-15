<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<meta name="keywords" content="<?php echo ($site["seo_keywords"]); ?>">
	<meta name="description" content="<?php echo ($site["seo_content"]); ?>">
	<title><?php echo ($site["seo_title"]); ?></title>
	<script>
		wolf = {};
		wolf.seajsBase = "/thinkphp/Public/Js/";
	</script>
	<script src="/thinkphp/Public/Js/global.js" type="text/javascript"></script>
	<script src="/thinkphp/Public/Js/libs/seajs/2.3.0/sea.js" type="text/javascript"></script>
	<script src="/thinkphp/Public/Js/libs/jquery-plugin/imgliquid-min.js" type="text/javascript"></script>
	<script src="/thinkphp/Public/Js/config.js" type="text/javascript"></script>
	<?php if((CONTROLLER_NAME == 'Company') OR (CONTROLLER_NAME == 'Preview') OR (CONTROLLER_NAME == 'PersonalSet')): ?><link rel="stylesheet" type="text/css" href="/thinkphp/Public/Css/Common/public.css"/>
		<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Css/Common/index_aio.css">
		<?php else: ?>
		<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Css/Common/index_aio.css">
		<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Css/Common/public.css"/><?php endif; ?>
	<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Css/Common/common.css"/>
	<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Js/libs/Font-Awesome-3.2.1/css/font-awesome.css"/>
</head>

<body>

<!--header start-->
<?php echo W('Common/Public/nav');?>
<!--header end-->



<style type="text/css">
	.resume select.form-control {
	padding: 7px 5px;
	height: 40px;
	width: 100px;
	display: inline;
}
	.resume input.form-control {
		width: 260px;
		display: inline;
	}
	.resume .form-horizontal .control-label,
	.resume .form-horizontal .radio,
	.resume .form-horizontal .checkbox,
	.resume .form-horizontal .radio-inline,
	.resume .form-horizontal .checkbox-inline {
		padding-top: 12px;
		margin-top: 0;
		margin-bottom: 0;
	}
	.resume .form-horizontal .form-control-static {
	padding-top: 12px;
}

	/****************************************************************************************/
	/*                                     企业列表                                         */
	/****************************************************************************************/

	.wei-user-list {

	}

	.wei-user-list li {
		padding: 12px 20px 12px 12px;
		text-align: left;
		border-bottom: 1px solid #E0E0E0;
		min-height: 112px;
	}

	.wei-user-list.hide-last-border li:last-child {
		border-bottom: none;
	}

	.wei-user-list li:hover {
		background-color: #f2f2f2;
	}

	.wei-user-list h3 {
		margin-top: -4px;
	}

	.wei-user-list h3 .small {
		font-size: 80%;
	}

	.wei-user-list > li > p > span {
		margin-right: 20px;
	}

	.wei-user-list .wei-user-logo {
		width: 90px;
		height: 90px;
		margin-right: 15px;
	}

	.wei-user-list .wei-user-logo img {
		width: 90px;
		height: 90px;
	}

	#logo_img {
		width: 60px;
		height: 60px;
	}

	/****************************************************************************************/
	/*                                       简历                                           */
	/****************************************************************************************/

	.resume_job {
		background-color: #fff;
		border: 1px solid #D3D4D5;
		margin: 20px 0;
		padding: 20px 30px;
	}

	.resume_job .wei-user-logo {
		float: left;
		width: 60px;
		height: 60px;
		margin: 5px 20px 0 0;
		border: 1px solid #D3D4D5;
	}

	.resume_job p {
		font-size: 16px;
		line-height: 150%;
		margin: 4px 0;
	}

	.resume_job .message {
		padding: 20px 16px 0 0;
	}

	.resume_header {
		margin: 20px 0;
	}

	.resume_header > span {
		float:left;
		margin-top: -2px;
		font-size: 16px;
	}

	.resume_header > .btn {
		float: right;
		margin-top: -6px;
		margin-right: 5px;
	}

	.resume_header .progress {
		float: left;
		width: 500px;
		background-color: #EBEBEB;
	}

	.resume {
		background-color: #fff;
		border: 1px solid #D3D4D5;
		margin-top: 20px;
	}

	.resume_switcher {
		background-color: #DBDFE2;
		height: 60px;
	}

	.resume_switcher li {
		float: left;
		list-style-type: none;
		width: 50%;
		text-align: center;
	}

	.resume_switcher li a {
		display: block;
		line-height: 60px;
		font-size: 30px;
	}

	.resume_switcher li a.on {
		background-color: #579dde;
		color: #fff;
	}

	.resume_nav {
		background-color: #eaeaea;
		height:40px;
		border: 1px solid #DEDEDE;
	}

	.resume_nav li {
		float: left;
		list-style-type: none;
		text-align: center;
	}

	.resume_nav li a {
		line-height:35px;
		display:block;
		padding:0 15px;
		border-right:1px solid #dedede;
		margin: 3px 0;
	}

	.resume_nav li:last-child a {
		border-right: none;
	}

	.resume_nav li a.on {
		color: #579dd3;
		background-color: #ffffff;
		border-right: 1px solid #dedede;
		padding:3px 15px;
		margin: 0;
	}

	.resume_title {
		border-bottom: 1px solid #ddd;
		padding-bottom: 6px;
	}

	.resume_title h2 {
		border-bottom: 8px solid #579dde;
		width: 86px;
		padding: 0 2px;
		display: inline;
	}

	.resume_title i {
		font-size: 30px;
		margin-right: 20px;
	}

	.resume_content {
		margin: 30px;
	}

	.resume_content form {
		margin: 30px 0;
	}

	.resume_item_list {
		margin-top: 30px;
	}

	.resume_item_list li {
		margin: 20px 20px;
		border-left: 1px solid #579DDE;
		padding-left: 20px;
	}

	.resume_item_list li.education {
		font-size: 15px;
	}

	.resume_item_list li h3 {
		font-size: 16px;
		display: inline;
	}

	.resume_item_list li p {
		margin-top: 5px;
		line-height: 150%;
	}

	.resume_btn_large {
		width: 100%;
		height: 50px;
		font-size: 27px;
	}

	.resume_toolbar {
		position: absolute;
		right: 0;
		top: 60px;
	}

	/* 简历打印 */
	@media print {
		.resume {
			width: 100%;
		}

		.resume_toolbar,
		.mtop,
		.header,
		.footer,
		#toast-container {
			display: none;
		}

		.header .post span {
			display: block;
		}

		.header .logo {
			padding-left: 10px;
		}
	}
</style>
<div class="main2">
	<?php if(!empty($job)): ?><div class="resume_job"><h2>您正在申请以下职位：</h2>

		<div class="wei-user-logo imgLiquid_bgSize imgLiquid_ready" style=" background-size: contain; background-position: 50% 50%; background-repeat: no-repeat;">
			<img id="logo_img" src="/thinkphp/Public/images/zhiwei2.gif">
		</div>
		<p style="margin-top:8px;"><a href="<?php echo U('Home/Company/item?comid='.$job['comid']);?>" class="highlight" title="<?php echo ($job["cname"]); ?>"><?php echo ($job["cname"]); ?></a></p>

		<p><a href="<?php echo U('Home/Job/item?jobid='.$job['id']);?>" class="highlight"><?php echo ($job["title"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<!--			<span class="text-primary"><?php echo ($job["city"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;-->
			<strong class="cOrange">￥<?php echo ($job["payid"]); ?></strong></p>

		<div class="right" style="margin-top:-80px; margin-right: -12px;">
			<a href="javascript:;" onclick="doApply('<?php echo ($job["id"]); ?>');" class="btn btn-primary btn-lg apply_button" style="margin:0 0 10px 32px;">
				马上申请
			</a><br>
			<span class="text-muted">&nbsp;</span>
		</div>
	</div><?php endif; ?>
	<div class="resume">
		<ul class="resume_switcher">
			<li><a class="on">在线简历</a></li>
		</ul>
		<div id="box_placeholder" style="height:42px; width:860px; display:none;"></div>
		<ul class="resume_nav">
			<li style="width: 235px;"><a class="on" href="#basic">基本信息</a></li>
			<li style="width: 235px;"><a href="#expect">求职意向</a></li>
			<li style="width: 235px;"><a href="#company">工作经历</a></li>
			<li style="width: 235px;"><a href="#project">项目经验</a></li>
			<li style="width: 235px;"><a href="#education">教育经历</a></li>
		</ul>
		
		<div class="resume_content">
			
			<div class="resume_header">
				<a href="<?php echo U('Preview/index');?>" target="_blank" class="btn btn-default">
					<i class="icon-eye-open"></i>&nbsp;在线预览
				</a>
			</div>
			<div style="clear:both;"></div>
			<div sytle="height:50px">&nbsp;</div>
			
			<div id="basic">
				<div class="resume_title">
					<h2>基本信息</h2>
					<a href="javascript:;" onclick="updateAtomicItem('resume_basic');" class="right">
						<i class="icon-pencil"></i>
					</a>
				</div>
				
				<form class="form-horizontal" role="form" id="resume_basic">
					<?php if(!empty($basic["id"])): ?><div class="form-group"><label for="name" class="col-sm-1 control-label">基本</label>

							<div class="col-sm-4">
								<p class="form-control-static"><?php echo ($basic["truename"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;
									
									<?php if($basic['sex'] == 1): ?>男
										<?php else: ?>
										女<?php endif; ?>
									&nbsp;&nbsp;|&nbsp;&nbsp;
									<?php echo (date('Y.m.d',$basic["birthday"])); ?>
								</p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">联系方式</label>

							<div class="col-sm-4">
								<p class="form-control-static"><?php echo ($basic["email"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($basic["phone"]); ?></p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">当前状态</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									
									<?php if(is_array($basic["slist"])): foreach($basic["slist"] as $k=>$stlist): if($k == $basic['status']): echo ($stlist); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">学历</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									
									<?php if(is_array($eidlist)): foreach($eidlist as $key=>$elist): if($elist["id"] == $basic['eid']): echo ($elist["tagname"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">工作经验</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									
									<?php if(is_array($basic["wylist"])): foreach($basic["wylist"] as $key=>$wylist): if($wylist["id"] == $basic['year']): echo ($wylist["tagname"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">现居地</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									<?php if(is_array($basic["citylist"])): foreach($basic["citylist"] as $key=>$ncity): if($ncity["id"] == $basic['nowcid']): echo ($ncity["name"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group"><label for="name" class="col-sm-1 control-label">籍贯</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									<?php if(is_array($basic["citylist"])): foreach($basic["citylist"] as $key=>$ocity): if($ocity["id"] == $basic['oldcid']): echo ($ocity["name"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div><?php endif; ?>
				</form>
				
				<form class="form-horizontal ajaxForm" role="form" id="form_resume_basic" method="post" action=<?php echo U("Resume/updateBasic");?> style="display:<?php if(!empty($basic["id"])): ?>none<?php endif; ?>;">
					<input type="hidden" name="id" value="<?php echo ($basic["id"]); ?>"/>

					<div class="form-group">
						<label for="name" class="col-sm-1 control-label">真实姓名</label>

						<div class="col-sm-4">
							<input class="form-control" id="name" name="truename" value="<?php echo ($basic["truename"]); ?>" placeholder="真实姓名" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-1 control-label">常用邮箱</label>

						<div class="col-sm-4">
							<input class="form-control" id="email" name="email" value="<?php echo ($basic["email"]); ?>" placeholder="常用邮箱" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="mobile" class="col-sm-1 control-label">手机号码</label>

						<div class="col-sm-4">
							<input class="form-control" id="mobile" name="phone" value="<?php echo ($basic["phone"]); ?>" placeholder="手机号码" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="work_status" class="col-sm-1 control-label">当前状态</label>

						<div class="col-sm-4">
							<select id="work_status" name="status" class="form-control" style="width: 286px;">
								<?php if(is_array($basic["slist"])): foreach($basic["slist"] as $k=>$st): ?><option value="<?php echo ($k); ?>"
									<?php if($basic["status"] == $k): ?>selected<?php endif; ?>
									><?php echo ($st); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="sex" class="col-sm-1 control-label">性别</label>

						<div class="col-sm-4">
							<div class="radio-inline">
								<label>
									<input name="sex" id="" value="1" alt="男" type="radio"
									<?php if($basic["sex"] == 1): ?>checked<?php endif; ?>
									>男
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input name="sex" id="" value="2" alt="女" type="radio"
									<?php if($basic["sex"] == 2): ?>checked<?php endif; ?>
									>女
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="birth_year" class="col-sm-1 control-label">出生日期</label>

						<div class="col-sm-6">
							<select id="birth_year" name="birth_year" class="form-control">
								<?php if(is_array($basic["bylist"])): foreach($basic["bylist"] as $key=>$byear): ?><option value="<?php echo ($byear); ?>"
									<?php if($byear == $basic['byear']): ?>selected<?php endif; ?>
									><?php echo ($byear); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;
							<select name="birth_month" class="form-control">
								<?php $__FOR_START_1001924427__=1;$__FOR_END_1001924427__=13;for($i=$__FOR_START_1001924427__;$i < $__FOR_END_1001924427__;$i+=1){ ?><option value="<?php echo ($i); ?>"
									<?php if($basic["bmonth"] == $i): ?>selected<?php endif; ?>
									><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;
							<select name="birth_day" class="form-control">
								<?php $__FOR_START_2053529391__=1;$__FOR_END_2053529391__=32;for($i=$__FOR_START_2053529391__;$i < $__FOR_END_2053529391__;$i+=1){ ?><option value="<?php echo ($i); ?>"
									<?php if($basic["bday"] == $i): ?>selected<?php endif; ?>
									><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;日&nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="degree_basic" class="col-sm-1 control-label">学历</label>

						<div class="col-sm-6">
							<select id="degree_basic" name="eid" class="form-control">
								<?php if(is_array($eidlist)): foreach($eidlist as $key=>$edu): ?><option value="<?php echo ($edu["id"]); ?>"
									<?php if($edu["id"] == $basic['eid']): ?>selected<?php endif; ?>
									><?php echo ($edu["tagname"]); ?></option><?php endforeach; endif; ?>

							</select>
							<label style="padding-right: 15px; width: 136px; text-align: right;">工作年限</label>
							<select name="year" class="form-control">
								<?php if(is_array($basic["wylist"])): foreach($basic["wylist"] as $key=>$wyear): ?><option value="<?php echo ($wyear["id"]); ?>"
									<?php if($wyear["id"] == $basic['year']): ?>selected<?php endif; ?>
									><?php echo ($wyear["tagname"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="current_province_id" class="col-sm-1 control-label">现居地</label>

						<div class="col-sm-6">
							<select id="current_province_id" name="nowcid" class="form-control">
								<?php if(is_array($basic["citylist"])): foreach($basic["citylist"] as $key=>$ncity): ?><option value="<?php echo ($ncity["id"]); ?>"
									<?php if($ncity["id"] == $basic['nowcid']): ?>selected<?php endif; ?>
									><?php echo ($ncity["name"]); ?></option><?php endforeach; endif; ?>
							</select>
							<label style="padding-right: 15px; width: 136px; text-align: right;">籍贯</label>
							<select id="native_province_id" name="oldcid" class="form-control">
								<?php if(is_array($basic["citylist"])): foreach($basic["citylist"] as $key=>$ocity): ?><option value="<?php echo ($ocity["id"]); ?>"
									<?php if($ocity["id"] == $basic['oldcid']): ?>selected<?php endif; ?>
									><?php echo ($ocity["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div style="margin-left: 140px; margin-bottom: 20px;">
							<button type="submit" class="btn btn-primary">保存</button>
							&nbsp;
							<button type="button" class="btn btn-default" onclick="cancelUpdateAtomicItem('resume_basic');">取消</button>
						</div>
					</div>
				</form>
			</div>
			

			
			<div id="expect">
				<div class="resume_title">
					<h2>求职意向</h2>
					<a href="javascript:;" onclick="updateAtomicItem('resume_expect');" class="right">
						<i class="icon-pencil"></i>
					</a>
				</div>
				
				<form class="form-horizontal" role="form" id="resume_expect">
					<?php if(!empty($basic["desc"])): ?><div class="form-group">
							<label for="name" class="col-sm-1 control-label">期望城市</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									<?php if(is_array($basic["hopecitylist"])): foreach($basic["hopecitylist"] as $key=>$hcity): if($hcity["id"] == $basic['hopecid']): echo ($hcity["name"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-1 control-label">期望职位</label>

							<div class="col-sm-4">
								<p class="form-control-static"><?php echo ($basic["hopejob"]); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-1 control-label">期望薪资</label>

							<div class="col-sm-4">
								<p class="form-control-static">
									<?php if(is_array($paylist)): foreach($paylist as $key=>$plist): if($plist["id"] == $basic['hopepay']): echo ($plist["tagname"]); endif; endforeach; endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-1 control-label">自我描述</label>

							<div class="col-sm-9">
								<p class="form-control-static"><?php echo ($basic["desc"]); ?></p>
							</div>
						</div><?php endif; ?>
				</form>
				
				<form class="form-horizontal ajaxForm" role="form" id="form_resume_expect" method="post" action="<?php echo U('Resume/updateJob');?>" style="display:<?php if(!empty($basic["desc"])): ?>none<?php endif; ?>;">
				<input type="hidden" name="id" value="<?php echo ($basic["id"]); ?>">

				<div class="form-group">
					<label for="expect_city_id" class="col-sm-1 control-label">期望城市</label>

					<div class="col-sm-6">
						<select id="expect_city_id" name="hopecid" class="form-control">
							<?php if(is_array($basic["hopecitylist"])): foreach($basic["hopecitylist"] as $key=>$hcity): ?><option value="<?php echo ($hcity["id"]); ?>"
								<?php if($hcity["id"] == $basic['hopecid']): ?>selected<?php endif; ?>
								><?php echo ($hcity["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="expect_job" class="col-sm-1 control-label">期望职位</label>

					<div class="col-sm-4">
						<input class="form-control" id="expect_job" name="hopejob" value="<?php echo ($basic["hopejob"]); ?>" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="expect_salary" class="col-sm-1 control-label">期望薪资</label>

					<div class="col-sm-4">
						<select id="expect_salary" name="hopepay" class="form-control" style="width: 286px;">
							<?php if(is_array($paylist)): foreach($paylist as $key=>$plist): ?><option value="<?php echo ($plist["id"]); ?>"
								<?php if($plist["id"] == $basic['hopepay']): ?>selected<?php endif; ?>
								><?php echo ($plist["tagname"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="introduction" class="col-sm-1 control-label">自我描述</label>

					<div class="col-sm-9">
						<textarea id="introduction" name="desc" class="form-control" rows="8" placeholder="必填"><?php echo ($basic["desc"]); ?></textarea>
						<span class="help-block">自我评价、所获奖励、在线作品等</span>
					</div>
				</div>
				<div class="form-group">
					<div style="margin-left: 140px; margin-bottom: 20px;">
						<button type="submit" class="btn btn-primary">保存</button>
						&nbsp;
						<button type="button" class="btn btn-default" onclick="cancelUpdateAtomicItem('resume_expect');">取消</button>
					</div>
				</div>
				</form>
			</div>
			

			
			<div id="company">
				<div class="resume_title"><h2>工作经历</h2></div>
				
				<form class="form-horizontal ajaxForm" role="form" id="form_resume_company" method="post" action="<?php echo U('Resume/updateCompany');?>" style="display:none;">
					<input name="wid" id="work_id" value="0" type="hidden">

					<div class="form-group">
						<label for="company_name" class="col-sm-1 control-label">公司名称</label>

						<div class="col-sm-4">
							<input class="form-control" id="company_name" name="comname" placeholder="公司名称" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="job_name" class="col-sm-1 control-label">职位名称</label>

						<div class="col-sm-4">
							<input class="form-control" id="job_name" name="job" placeholder="如：产品经理" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="company_salary" class="col-sm-1 control-label">薪资</label>

						<div class="col-sm-4">
							<select id="company_salary" name="pay" class="form-control" style="width: 286px;">
								
								<?php if(is_array($paylist)): foreach($paylist as $key=>$plist): ?><option value="<?php echo ($plist["id"]); ?>"><?php echo ($plist["tagname"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="from_year_company" class="col-sm-1 control-label">起止日期</label>

						<div class="col-sm-9">

							<select id="from_year_company" name="syear" class="form-control">
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"><?php echo ($starty); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="from_month_company" name="smonth" class="form-control">
								
								<?php $__FOR_START_299243820__=1;$__FOR_END_299243820__=13;for($i=$__FOR_START_299243820__;$i < $__FOR_END_299243820__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;

							-

							<select id="to_year_company" name="tyear" class="form-control">
								<option value="0">至今</option>
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="to_month_company" name="tmonth" class="form-control">
								<option value="0">至今</option>
								
								<?php $__FOR_START_1351205428__=1;$__FOR_END_1351205428__=13;for($i=$__FOR_START_1351205428__;$i < $__FOR_END_1351205428__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="description_company" class="col-sm-1 control-label">工作描述</label>

						<div class="col-sm-9">
							<textarea id="description_company" name="wdesc" class="form-control" rows="5" placeholder=""><?php echo ($work["wdesc"]); ?></textarea>
							<span class="help-block">工作内容、工作表现等</span>
						</div>
					</div>
					<div class="form-group">
						<div style="margin-left: 140px; margin-bottom: 20px;">
							<button type="submit" class="btn btn-primary">保存</button>
							&nbsp;
							<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('company','');">取消</button>
						</div>
					</div>
				</form>
				
				<?php if(!empty($work)): if(is_array($work)): foreach($work as $key=>$w): ?><form class="form-horizontal ajaxForm" role="form" id="form_resume_company<?php echo ($w["id"]); ?>" method="post" action="<?php echo U('Resume/updateCompany');?>" style="display:none;">
							<input name="id" id="work_id" value="<?php echo ($w["id"]); ?>" type="hidden">

							<div class="form-group">
								<label for="company_name" class="col-sm-1 control-label">公司名称</label>

								<div class="col-sm-4">
									<input class="form-control" id="company_name" name="comname" placeholder="公司名称" type="text" value="<?php echo ($w["comname"]); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="job_name" class="col-sm-1 control-label">职位名称</label>

								<div class="col-sm-4">
									<input class="form-control" id="job_name" name="job" placeholder="如：产品经理" type="text" value="<?php echo ($w["job"]); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="company_salary" class="col-sm-1 control-label">薪资</label>

								<div class="col-sm-4">
									<select id="company_salary" name="pay" class="form-control" style="width: 286px;">
										
										<?php if(is_array($paylist)): foreach($paylist as $key=>$plist): ?><option value="<?php echo ($plist["id"]); ?>"<?php if($plist["id"] == $w['pay']): ?>selected<?php endif; ?>><?php echo ($plist["tagname"]); ?></option><?php endforeach; endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="from_year_company" class="col-sm-1 control-label">起止日期</label>

								<div class="col-sm-9">

									<select id="from_year_company" name="syear" class="form-control">
										
										<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"
											<?php if($starty == $w['syear']): ?>selected<?php endif; ?>
											><?php echo ($starty); ?></option><?php endforeach; endif; ?>
									</select>&nbsp;年&nbsp;

									<select id="from_month_company" name="smonth" class="form-control">
										
										<?php $__FOR_START_886181854__=1;$__FOR_END_886181854__=13;for($i=$__FOR_START_886181854__;$i < $__FOR_END_886181854__;$i+=1){ ?><option value="<?php echo ($i); ?>"
											<?php if($i == $w['smonth']): ?>selected<?php endif; ?>
											><?php echo ($i); ?></option><?php } ?>
									</select>&nbsp;月&nbsp;

									-

									<select id="to_year_company" name="tyear" class="form-control">
										<option value="0"
										<?php if($w["tyear"] == 0): ?>selected<?php endif; ?>
										>至今</option>
										
										<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"
											<?php if($stopy == $w['tyear']): ?>selected<?php endif; ?>
											><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
									</select>&nbsp;年&nbsp;

									<select id="to_month_company" name="tmonth" class="form-control">
										<option value="0"
										<?php if($w["tmonth"] == 0): ?>selected<?php endif; ?>
										>至今</option>
										
										<?php $__FOR_START_1506810908__=1;$__FOR_END_1506810908__=13;for($i=$__FOR_START_1506810908__;$i < $__FOR_END_1506810908__;$i+=1){ ?><option value="<?php echo ($i); ?>"
											<?php if($i == $w['tmonth']): ?>selected<?php endif; ?>
											><?php echo ($i); ?></option><?php } ?>
									</select>&nbsp;月&nbsp;
								</div>
							</div>
							<div class="form-group">
								<label for="description_company" class="col-sm-1 control-label">工作描述</label>

								<div class="col-sm-9">
									<textarea id="description_company" name="wdesc" class="form-control" rows="5" placeholder=""><?php echo ($w["wdesc"]); ?></textarea>
									<span class="help-block">工作内容、工作表现等</span>
								</div>
							</div>
							<div class="form-group">
								<div style="margin-left: 140px; margin-bottom: 20px;">
									<button type="submit" class="btn btn-primary">保存</button>
									&nbsp;
									<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('company', <?php echo ($w["id"]); ?>);">取消</button>
								</div>
							</div>
						</form><?php endforeach; endif; endif; ?>
				
				<ul id="list_resume_company" class="resume_item_list">
					
					<?php if(is_array($work)): foreach($work as $key=>$work): ?><li id="company_<?php echo ($work["id"]); ?>">
							<p>

							<h3><?php echo ($work["syear"]); ?>.<?php echo ($work["smonth"]); ?> -
								<?php if($work["tyear"] != 0): echo ($work["tyear"]); ?>.<?php echo ($work["tmonth"]); ?>
									<?php else: ?>
									至今<?php endif; ?>
								&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($work["comname"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($work["job"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;￥
							<?php if(is_array($paylist)): foreach($paylist as $key=>$pl): if($pl["id"] == $work['pay']): echo ($pl["tagname"]); endif; endforeach; endif; ?>
							</h3>
							<span class="right">
								<a href="javascript:;" onclick="editItem('company', '<?php echo ($work["id"]); ?>')" class="highlight">编辑</a>                                &nbsp;&nbsp;&nbsp;&nbsp;
	                            <a href="javascript:;" onclick="deleteItem('company', '<?php echo ($work["id"]); ?>');" class="highlight">删除</a>
							</span>
							</p>
							<p><?php echo ($work["wdesc"]); ?></p>
						</li><?php endforeach; endif; ?>
				</ul>
				
				<div class="" style="margin: 30px 20px;">
					<button id="add_btn_resume_company" type="button" class="btn btn-primary resume_btn_large" onclick="updateListItem('resume_company');" style="font-size:27px;"><i class="icon-plus"></i>&nbsp;添加</button>
				</div>
			</div>
			

			
			<div id="project">
				<div class="resume_title"><h2>项目经验</h2></div>
				
				<form class="form-horizontal ajaxForm" role="form" id="form_resume_project" method="post" action="<?php echo U('Resume/updateProject');?>" style="display:none;">
					<input name="id" id="project_id" value="0" type="hidden">

					<div class="form-group">
						<label for="project_name" class="col-sm-1 control-label">项目名称</label>

						<div class="col-sm-4">
							<input class="form-control" id="project_name" name="pname" placeholder="项目名称" type="text"></div>
					</div>
					<div class="form-group">
						<label for="position" class="col-sm-1 control-label">担任职务</label>

						<div class="col-sm-4">
							<input class="form-control" id="position" name="post" placeholder="如：产品经理" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="from_year_project" class="col-sm-1 control-label">起止日期</label>

						<div class="col-sm-9">
							<select id="from_year_project" name="syear" class="form-control">
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"><?php echo ($starty); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="from_month_project" name="smonth" class="form-control">
								
								<?php $__FOR_START_652349560__=1;$__FOR_END_652349560__=13;for($i=$__FOR_START_652349560__;$i < $__FOR_END_652349560__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;

							-

							<select id="to_year_project" name="tyear" class="form-control">
								<option value="0">至今</option>
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="to_month_project" name="tmonth" class="form-control">
								<option value="0">至今</option>
								
								<?php $__FOR_START_915381787__=1;$__FOR_END_915381787__=13;for($i=$__FOR_START_915381787__;$i < $__FOR_END_915381787__;$i+=1){ ?>4
									<option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="description_project" class="col-sm-1 control-label">项目描述</label>

						<div class="col-sm-9">
							<textarea id="description_project" name="prodesc" class="form-control" rows="5" placeholder=""></textarea>
							<span class="help-block">项目介绍、在线演示地址等</span>
						</div>
					</div>
					<div class="form-group">
						<div style="margin-left: 140px; margin-bottom: 20px;">
							<button type="submit" class="btn btn-primary">保存</button>
							&nbsp;
							<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('project','');">取消</button>
						</div>
					</div>
				</form>

				
				<?php if(!empty($project)): if(is_array($project)): foreach($project as $key=>$pro): ?><form class="form-horizontal ajaxForm" role="form" id="form_resume_project<?php echo ($pro["id"]); ?>" method="post" action="<?php echo U('Resume/updateProject');?>" style="display:none;">
							<input name="id" id="project_id" value="<?php echo ($pro["id"]); ?>" type="hidden">

							<div class="form-group">
								<label for="project_name" class="col-sm-1 control-label">项目名称</label>

								<div class="col-sm-4">
									<input class="form-control" id="project_name" name="pname" placeholder="项目名称" type="text" value="<?php echo ($pro["pname"]); ?>"></div>
							</div>
							<div class="form-group">
								<label for="position" class="col-sm-1 control-label">担任职务</label>

								<div class="col-sm-4">
									<input class="form-control" id="position" name="post" placeholder="如：产品经理" type="text" value="<?php echo ($pro["post"]); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="from_year_project" class="col-sm-1 control-label">起止日期</label>

								<div class="col-sm-9">
									<select id="from_year_project" name="syear" class="form-control">
										
										<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"
											<?php if($starty == $pro['syear']): ?>selected<?php endif; ?>
											><?php echo ($starty); ?></option><?php endforeach; endif; ?>
									</select>&nbsp;年&nbsp;

									<select id="from_month_project" name="smonth" class="form-control">
										
										<?php $__FOR_START_153522333__=1;$__FOR_END_153522333__=13;for($i=$__FOR_START_153522333__;$i < $__FOR_END_153522333__;$i+=1){ ?><option value="<?php echo ($i); ?>"
											<?php if($i == $pro['smonth']): ?>selected<?php endif; ?>
											><?php echo ($i); ?></option><?php } ?>
									</select>&nbsp;月&nbsp;

									-

									<select id="to_year_project" name="tyear" class="form-control">
										<option value="0"
										<?php if($pro["tyear"] == 0): ?>selected<?php endif; ?>
										>至今</option>
										
										<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"
											<?php if($stopy == $pro['smonth']): ?>selected<?php endif; ?>
											><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
									</select>&nbsp;年&nbsp;

									<select id="to_month_project" name="tmonth" class="form-control">
										<option value="0"
										<?php if($pro["tmonth"] == 0): ?>selected<?php endif; ?>
										>至今</option>
										
										<?php $__FOR_START_101909814__=1;$__FOR_END_101909814__=13;for($i=$__FOR_START_101909814__;$i < $__FOR_END_101909814__;$i+=1){ ?>4
											<option value="<?php echo ($i); ?>"
											<?php if($i == $pro['tmonth']): ?>selected<?php endif; ?>
											><?php echo ($i); ?></option><?php } ?>
									</select>&nbsp;月&nbsp;
								</div>
							</div>
							<div class="form-group">
								<label for="description_project" class="col-sm-1 control-label">项目描述</label>

								<div class="col-sm-9">
									<textarea id="description_project" name="prodesc" class="form-control" rows="5" placeholder=""><?php echo ($pro["prodesc"]); ?></textarea>
									<span class="help-block">项目介绍、在线演示地址等</span>
								</div>
							</div>
							<div class="form-group">
								<div style="margin-left: 140px; margin-bottom: 20px;">
									<button type="submit" class="btn btn-primary">保存</button>
									&nbsp;
									<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('project','<?php echo ($pro["id"]); ?>');">取消</button>
								</div>
							</div>
						</form><?php endforeach; endif; endif; ?>
				
				<ul id="list_resume_project" class="resume_item_list">
					<?php if(is_array($project)): foreach($project as $key=>$pro): ?><li id="project_<?php echo ($pro["id"]); ?>">
							<p>

							<h3><?php echo ($pro["syear"]); ?>.<?php echo ($pro["smonth"]); ?> -
								<?php if($pro["tyear"] != 0): echo ($pro["tyear"]); ?>.<?php echo ($pro["tmonth"]); ?>
									<?php else: ?>
									至今<?php endif; ?>
								&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($pro["pname"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($pro["post"]); ?>
							</h3>
							<span class="right">
								<a href="javascript:;" onclick="editItem('project','<?php echo ($pro["id"]); ?>');" class="highlight">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="javascript:;" onclick="deleteItem('project', '<?php echo ($pro["id"]); ?>');" class="highlight">删除</a>
							</span>
							</p>
							<p><?php echo ($pro["prodesc"]); ?></p>
						</li><?php endforeach; endif; ?>
				</ul>
				
				<div class="" style="margin: 30px 20px;">
					<button id="add_btn_resume_project" type="button" class="btn btn-primary resume_btn_large" onclick="updateListItem('resume_project');" style="font-size:27px;">
						<i class="icon-plus"></i>&nbsp;添加
					</button>
				</div>
			</div>
			

			
			<div id="education">
				<div class="resume_title"><h2>教育经历</h2></div>
				
				<form class="form-horizontal ajaxForm" role="form" id="form_resume_education" method="post" action="<?php echo U('Resume/updaeEducation');?>" style="display:none;">
					<input name="id" id="id" value="0" type="hidden">

					<div class="form-group">
						<label for="school_name" class="col-sm-1 control-label">学校名称</label>

						<div class="col-sm-4">
							<input class="form-control" id="school_name" name="school" placeholder="如：清华大学" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="major_name" class="col-sm-1 control-label">专业名称</label>

						<div class="col-sm-4">
							<input class="form-control" id="major_name" name="specialty" placeholder="如：计算机系" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="degree_education" class="col-sm-1 control-label">学历</label>

						<div class="col-sm-9">
							<select id="degree_education" name="seid" class="form-control">
								<?php if(is_array($eidlist)): foreach($eidlist as $key=>$eli): ?><option value="<?php echo ($eli["id"]); ?>"><?php echo ($eli["tagname"]); ?></if><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="from_year_education" class="col-sm-1 control-label">起止日期</label>

						<div class="col-sm-9">
							<select id="from_year_education" name="syear" class="form-control">
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"><?php echo ($starty); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="from_month_education" name="smonth" class="form-control">
								
								<?php $__FOR_START_2049242185__=1;$__FOR_END_2049242185__=13;for($i=$__FOR_START_2049242185__;$i < $__FOR_END_2049242185__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;

							-

							<select id="to_year_education" name="tyear" class="form-control">
								
								<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
							</select>&nbsp;年&nbsp;

							<select id="to_month_education" name="tmonth" class="form-control">
								
								<?php $__FOR_START_1561718876__=1;$__FOR_END_1561718876__=13;for($i=$__FOR_START_1561718876__;$i < $__FOR_END_1561718876__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>&nbsp;月&nbsp;
						</div>
					</div>
					<div class="form-group">
						<div style="margin-left: 140px; margin-bottom: 20px;">
							<button type="submit" class="btn btn-primary">保存</button>
							&nbsp;
							<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('education','');">取消</button>
						</div>
					</div>
				</form>
				
				<?php if(is_array($education)): foreach($education as $key=>$e): ?><form class="form-horizontal" role="form" id="form_resume_education<?php echo ($e["id"]); ?>" method="post" action="<?php echo U('Resume/updaeEducation');?>" style="display:none;">
						<input name="id" id="id" value="<?php echo ($e["id"]); ?>" type="hidden">

						<div class="form-group">
							<label for="school_name" class="col-sm-1 control-label">学校名称</label>

							<div class="col-sm-4">
								<input class="form-control" id="school_name" name="school" placeholder="如：清华大学" type="text" value="<?php echo ($e["school"]); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="major_name" class="col-sm-1 control-label">专业名称</label>

							<div class="col-sm-4">
								<input class="form-control" id="major_name" name="specialty" placeholder="如：计算机系" type="text" value="<?php echo ($e["specialty"]); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="degree_education" class="col-sm-1 control-label">学历</label>

							<div class="col-sm-9">
								<select id="degree_education" name="seid" class="form-control">
									<?php if(is_array($eidlist)): foreach($eidlist as $key=>$eli): ?><option value="<?php echo ($eli["id"]); ?>"
										<?php if($eli["id"] == $e['seid']): ?>selected<?php endif; ?>
										><?php echo ($eli["tagname"]); ?></if><?php endforeach; endif; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="from_year_education" class="col-sm-1 control-label">起止日期</label>

							<div class="col-sm-9">
								<select id="from_year_education" name="syear" class="form-control">
									
									<?php if(is_array($ssyear)): foreach($ssyear as $key=>$starty): ?><option value="<?php echo ($starty); ?>"
										<?php if($starty == $e['syear']): ?>selected<?php endif; ?>
										><?php echo ($starty); ?></option><?php endforeach; endif; ?>
								</select>&nbsp;年&nbsp;

								<select id="from_month_education" name="smonth" class="form-control">
									
									<?php $__FOR_START_1838095223__=1;$__FOR_END_1838095223__=13;for($i=$__FOR_START_1838095223__;$i < $__FOR_END_1838095223__;$i+=1){ ?><option value="<?php echo ($i); ?>"
										<?php if($i == $e['smonth']): ?>selected<?php endif; ?>
										><?php echo ($i); ?></option><?php } ?>
								</select>&nbsp;月&nbsp;

								-

								<select id="to_year_education" name="tyear" class="form-control">
									
									<?php if(is_array($ssyear)): foreach($ssyear as $key=>$stopy): ?><option value="<?php echo ($stopy); ?>"
										<?php if($stopy == $e['tyear']): ?>selected<?php endif; ?>
										><?php echo ($stopy); ?></option><?php endforeach; endif; ?>
								</select>&nbsp;年&nbsp;

								<select id="to_month_education" name="tmonth" class="form-control">
									
									<?php $__FOR_START_442801774__=1;$__FOR_END_442801774__=13;for($i=$__FOR_START_442801774__;$i < $__FOR_END_442801774__;$i+=1){ ?><option value="<?php echo ($i); ?>"
										<?php if($i == $e['tyear']): ?>selected<?php endif; ?>
										><?php echo ($i); ?></option><?php } ?>
								</select>&nbsp;月&nbsp;
							</div>
						</div>
						<div class="form-group">
							<div style="margin-left: 140px; margin-bottom: 20px;">
								<button type="submit" class="btn btn-primary">保存</button>
								&nbsp;
								<button type="button" class="btn btn-default" onclick="cancelUpdateListItem('education','<?php echo ($e["id"]); ?>');">取消</button>
							</div>
						</div>
					</form><?php endforeach; endif; ?>
				
				<ul id="list_resume_education" class="resume_item_list">
					<?php if(is_array($education)): foreach($education as $key=>$e): ?><li class="education" id="education_<?php echo ($e["id"]); ?>">
							<span><?php echo ($e["syear"]); ?>.<?php echo ($e["smonth"]); ?> - <?php echo ($e["tyear"]); ?>.<?php echo ($e["tmonth"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
							<span><?php echo ($e["school"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
							<span><?php echo ($e["specialty"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
							<span>
							<?php if(is_array($eidlist)): foreach($eidlist as $key=>$elist): if($elist["id"] == $e['seid']): echo ($elist['tagname']); endif; endforeach; endif; ?>
							</span>
							<span class="right">
								<a href="javascript:;" onclick="editItem('education', '<?php echo ($e["id"]); ?>');" class="highlight">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
	                            <a href="javascript:;" onclick="deleteItem('education', '<?php echo ($e["id"]); ?>');" class="highlight">删除</a>
	                        </span>
						</li><?php endforeach; endif; ?>
				</ul>
				
				<div class="" style="margin: 30px 20px;">
					<button id="add_btn_resume_education" type="button" class="btn btn-primary resume_btn_large" onclick="updateListItem('resume_education');" style="font-size:27px;"><i class="icon-plus"></i>&nbsp;添加
					</button>
				</div>
			</div>
			
		</div>
		
	</div>
	<div style="margin:30px 0;"></div>
</div>
<script type="text/javascript">
	seajs.use(['$','form-ajax','bootbox'],function(){
		var ajaxFrom = $('.ajaxForm');
		ajaxFrom.ajaxForm({
			dataType:'json',
			success:function(data){
				if(data.status > 0  && data.url){
					bootbox.alert(data.info,function(){
						window.location.href = data.url;
						return false;
					});
				}else{
					bootbox.alert({
						message:data.info,
						title: "提示信息"
					});
					return false;
				}
			}
		})
	});
	//基本信息编辑按钮
	function updateAtomicItem(item_name) {
		$("#form_" + item_name).show();
		$("#" + item_name).hide();
	}

	//基本信息取消按钮
	function cancelUpdateAtomicItem(item_name) {
		$("#" + item_name).show();
		$("#form_" + item_name).hide().resetForm();
	}

	//工作,项目,教育 添加按钮
	function updateListItem(item_name) {
		$("#form_" + item_name).slideDown().resetForm();
		$("#add_btn_" + item_name).hide();
		$("#form_" + item_name + " input:hidden").val('');
		$("#form_" + item_name + " input:text:first").focus();
	}

	//取消按钮
	function cancelUpdateListItem(item_name, item_id) {
		$("#form_resume_" + item_name + item_id).slideUp();
		$("#" + item_name + "_" + item_id).show();
		$("#add_btn_resume_" + item_name).show();

	}

	//编辑按钮
	function editItem(item_name, item_id) {
		$("#" + item_name + "_" + item_id).hide();
		$("#add_btn_resume_" + item_name).hide();
		$("#form_resume_" + item_name + item_id).slideDown();
	}

	//删除操作
	function deleteItem(item_name, item_id) {
		bootbox.setDefaults({locale:"zh_CN"});
		bootbox.confirm('确定要删除吗?',function(res) {
			if(res == true) {
				$.ajax({
					type : "post",
					url : "<?php echo U('Resume/delete');?>",
					data : "item=" + item_name + "&id=" + item_id,
					success : function (data) {
						if ( data ) {
							bootbox.alert('成功删除');
							$("#" + item_name + "_" + item_id).hide();
						} else {
							bootbox.alert('删除失败');
						}
					}
				})
			}
		})
	}

	//提交申请
	function doApply(job_id) {
		$.ajax({
			beforeSend : function () {
				var basic = $("#form_resume_basic [name='id']").val();
				var job = $("#form_resume_expect [name='desc']").val();
				if (basic == '') {
					bootbox.alert('请填写简历基本信息和求职意向后再申请');
					return false;
				};
				if (job == '') {
					bootbox.alert('请填写简历基本信息和求职意向后再申请');
					return false;
				}
			},
			type : "POST",
			data : "jobid="+job_id,
			url : "<?php echo U('Resume/doApply');?>",
			success : function (data) {
				if (data) {
					bootbox.alert('简历已成功送出',function(){
						location.href = "<?php echo U('History/index');?>";
						return false;
					})
				} else {
					bootbox.alert('投递失败,请重试或联系网站管理员');
				}
			}
		});
	}




</script>