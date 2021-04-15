<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="utf-8"/>
	<title>后台</title>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<script>
		wolf = {};
		wolf.seajsBase = "/Public/Js/";
	</script>

	<style type="text/css">
		body{ background: #ef0000; }
		.form-bg{
			background: #ef0000;
		}
		.form-horizontal{
			background: #fff;
			padding-bottom: 40px;
			border-radius: 15px;
			text-align: center;
		}
		.form-horizontal .heading{
			display: block;
			font-size: 35px;
			font-weight: 700;
			padding: 35px 0;
			border-bottom: 1px solid #f0f0f0;
			margin-bottom: 30px;
		}
		.form-horizontal .form-group{
			padding: 0 40px;
			margin: 0 0 25px 0;
			position: relative;
		}
		.form-horizontal .form-control{
			background: #f0f0f0;
			border: none;
			border-radius: 20px;
			box-shadow: none;
			padding: 0 20px 0 45px;
			height: 40px;
			transition: all 0.3s ease 0s;
		}
		.form-horizontal .form-control:focus{
			background: #e0e0e0;
			box-shadow: none;
			outline: 0 none;
		}
		.form-horizontal .form-group i{
			position: absolute;
			top: 12px;
			left: 60px;
			font-size: 17px;
			color: #c8c8c8;
			transition : all 0.5s ease 0s;
		}
		.form-horizontal .form-control:focus + i{
			color: #ef0000;
		}
		.form-horizontal .fa-question-circle{
			display: inline-block;
			position: absolute;
			top: 12px;
			right: 60px;
			font-size: 20px;
			color: #808080;
			transition: all 0.5s ease 0s;
		}
		.form-horizontal .fa-question-circle:hover{
			color: #000;
		}
		.form-horizontal .main-checkbox{
			float: left;
			width: 20px;
			height: 20px;
			background: #fc1111;
			border-radius: 50%;
			position: relative;
			margin: 5px 0 0 5px;
			border: 1px solid #fc1111;
		}
		.form-horizontal .main-checkbox label{
			width: 20px;
			height: 20px;
			position: absolute;
			top: 0;
			left: 0;
			cursor: pointer;
		}
		.form-horizontal .main-checkbox label:after{
			content: "";
			width: 10px;
			height: 5px;
			position: absolute;
			top: 5px;
			left: 4px;
			border: 3px solid #fff;
			border-top: none;
			border-right: none;
			background: transparent;
			opacity: 0;
			-webkit-transform: rotate(-45deg);
			transform: rotate(-45deg);
		}
		.form-horizontal .main-checkbox input[type=checkbox]{
			visibility: hidden;
		}
		.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
			opacity: 1;
		}
		.form-horizontal .text{
			float: left;
			margin-left: 7px;
			line-height: 20px;
			padding-top: 5px;
			text-transform: capitalize;
		}
		.form-horizontal .btn{
			float: right;
			font-size: 14px;
			color: #fff;
			background: #ef0000;
			border-radius: 30px;
			padding: 10px 25px;
			border: none;
			text-transform: capitalize;
			transition: all 0.5s ease 0s;
		}
		@media only screen and (max-width: 479px){
			.form-horizontal .form-group{
				padding: 0 25px;
			}
			.form-horizontal .form-group i{
				left: 45px;
			}
			.form-horizontal .btn{
				padding: 10px 20px;
			}
		}
	</style>

	<script src="/Public/Js/global.js" type="text/javascript"></script>
	<script src="/Public/Js/libs/seajs/2.3.0/sea.js" type="text/javascript"></script>
	<script src="/Public/Js/config.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/Public/Js/admin/css/bootstrap.css"/>
	<link rel="stylesheet" href="/Public/Js/admin/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/Public/Js/admin/css/ace.min.css"/>
	<link rel="stylesheet" href="/Public/Js/admin/css/ace-rtl.min.css"/>
	<link rel="stylesheet" href="/Public/Js/admin/css/ace-skins.min.css"/>
</head>
<body>
<div class="navbar navbar-default" id="navbar" style="background-color: #b33333">
	<script type="text/javascript">
		seajs.use(["ace-extra"],function(ace){
			try {
				ace.settings.check('navbar', 'fixed')
			} catch (e) {
			}
		})
	</script>

	<div class="navbar-container" id="navbar-container" >
		<div class="navbar-header pull-left">
			<a href="<?php echo U('Index/index');?>" class="navbar-brand">
				<small >
					<i class="icon-home"></i>
					招聘后台管理系统
				</small>
			</a><!-- /.brand -->
		</div>
		<!-- /.navbar-header -->
		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="red">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo ($user["alias"]); ?>
								</span>
						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo U('setting/inbox');?>">
								<i class="icon-cog"></i>
								修改密码
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo U('Login/logout');?>">
								<i class="icon-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- /.ace-nav -->
		</div>
		<!-- /.navbar-header -->
	</div>
	<!-- /.container -->
</div>

<div class="main-container" id="main-container">
<script type="text/javascript">
	seajs.use(["ace-extra"], function (ace) {
		try {
			ace.settings.check('main-container', 'fixed')
		} catch (e) {
		}
	})
</script>

<div class="main-container-inner">
<a class="menu-toggler" id="menu-toggler" href="#">
	<span class="menu-text"></span>
</a>

<div class="sidebar" id="sidebar">
<script type="text/javascript">
	seajs.use(["ace-extra"], function (ace) {
		try {
			ace.settings.check('sidebar', 'fixed')
		} catch (e) {
		}
	})
</script>
<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success statistics" title="统计信息">
			<i class="icon-signal"></i>
		</button>

		<button class="btn btn-info change" title="修改网站信息">
			<i class="icon-pencil"></i>
		</button>

		<button class="btn btn-warning home"  title="前台首页">
			<i class="icon-home"></i>
		</button>

		<button class="btn btn-danger clear" title="清空缓存">
			<i class="icon-cog"></i>

		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div>
	<script>
		seajs.use(['$'],function($){
			$('button.home').click(function(){
				window.open("<?php echo U('Home/Index/index');?>");
			})
			$('button.clear').click(function(){
				$.ajax({
					url : "<?php echo U('Setting/clearCache');?>",
					success : function (data) {
						if ( data.status > 0 ) {
							bootbox.alert(data.info, function () {

							});
						} else {
							bootbox.alert({
								message : data.info,
								title : "提示信息"
							});
							return false;
						}
					}
				})
			})
			$('button.statistics').click(function(){

				$.ajax({
					url : "<?php echo U('Index/Index');?>",
					success : function (data) {
						window.location.href =  "<?php echo U('Index/Index');?>";
					}
				})
			})

			$('button.change').click(function() {
				$.ajax({
					url: "<?php echo U('Setting/Edit');?>",
					success: function (data) {
						window.location.href =  "<?php echo U('Setting/Edit');?>";
					}
				})
			})
		})
	</script>
</div>
<!-- #sidebar-shortcuts -->
<span id="dataphp"
      data-controller="<?php echo (CONTROLLER_NAME); ?>"
      data-action="<?php echo (ACTION_NAME); ?>"></span>

<ul class="nav nav-list">               
<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-cog"></i>
		<span class="menu-text"> 设置 </span>
		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu" id="setting">
		<li class="edit">
			<a href="<?php echo U('Setting/edit');?>" >
				<i class="icon-double-angle-right"></i>
				网站信息
			</a>
		</li>
		<li class="inbox">
			<a href="<?php echo U('setting/inbox');?>" >
				<i class="icon-double-angle-right"></i>
				修改密码
			</a>
		</li>
	</ul>
</li>
<li id="userman">
	<a href="#" class="dropdown-toggle">
		<i class="icon-group"></i>
		<span class="menu-text"> 用户管理</span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">

		<li>
			<a href="javascript:void(0)" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				用户组
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" id="user">
				<li class="index">
					<a href="<?php echo U('User/index');?>">
						<i class="icon-leaf"></i>
						用户列表
					</a>
				</li>
				<li class="add">
					<a href="<?php echo U('User/add');?>">
						<i class="icon-leaf"></i>
						添加用户
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:void(0)" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				管理组
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li class="admin">
					<a href="<?php echo U('Admin/index');?>">
						<i class="icon-leaf"></i>
						用户管理
					</a>
				</li>
				<li class="role">
					<a href="<?php echo U('Role/index');?>">
						<i class="icon-home"></i>
						角色管理
					</a>
				</li>
			</ul>
		</li>
	</ul>
</li>
<li id="catetag">
	<a href="#" class="dropdown-toggle">
		<i class="icon-list"></i>
		<span class="menu-text"> 分类/标签</span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu">
		<li>
			<a href="javascript:void(0)" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				分类管理
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" id="category">
				<li class="index">
					<a href="<?php echo U('Category/index');?>">
						<i class="icon-leaf"></i>
						浏览分类
					</a>
				</li>
				<li class="add">
					<a href="<?php echo U('Category/add');?>">
						<i class="icon-leaf"></i>
						添加分类
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:void(0)" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				标签管理
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" id="tag">
				<li class="index">
					<a href="<?php echo U('Tag/index');?>">
						<i class="icon-leaf"></i>
						浏览标签
					</a>
				</li>
				<li class="add">
					<a href="<?php echo U('Tag/add');?>">
						<i class="icon-leaf"></i>
						添加标签
					</a>
				</li>
			</ul>
		</li>
	</ul>
</li>
<li >
	<a href="javascript:void(0)" class="dropdown-toggle">
		<i class="icon-book"></i>
		<span class="menu-text"> 职位管理</span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu" id="job">
		<li class="index edit">
			<a href="<?php echo U('Job/index');?>" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				职位列表
			</a>
		</li>
	</ul>
</li>
<li >
	<a href="#" class="dropdown-toggle">
		<i class="icon-inbox"></i>
		<span class="menu-text"> 公司管理</span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu" id="company">
		<li class="index edit">
			<a href="<?php echo U('company/index');?>" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				公司列表
			</a>
		</li>
	</ul>
</li>
	
<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-comment"></i>
		<span class="menu-text"> 广告管理</span>

		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu" id="news">
		<li class="index">
			<a href="<?php echo U('News/index');?>" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				广告列表
			</a>
		</li>
		<li class="add">
			<a href="<?php echo U('News/add');?>" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				添加广告
			</a>
		</li>
	</ul>
</li>

<!-- 简历管理 start -->
<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-edit"></i>
		<span class="menu-text"> 简历管理</span>
		<b class="arrow icon-angle-down"></b>
	</a>
	<ul class="submenu" id="resume">
		<li class="index">
			<a href="<?php echo U('Resume/index');?>" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>
				所有简历
			</a>
		</li>
	</ul>
</li>
<!-- 简历管理 end -->
</ul>
<!-- /.nav-list -->

<div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
	seajs.use(["ace-extra"], function (ace) {
		try {
			ace.settings.check('sidebar', 'collapsed')
		} catch (e) {
		}
	})
	//左侧菜单栏 open+active
	seajs.use(['$'], function ($) {
		var controller = $("#dataphp").attr("data-controller").toLocaleLowerCase();
		var action = $("#dataphp").attr("data-action").toLocaleLowerCase();
		(function () {
			if ( action ) {
				$("#" + controller).find("." + action).addClass("active").siblings().removeClass("active");
				$("#" + controller).find("." + action).parents("li").addClass("active open").siblings().removeClass("active open");
			}
			//管理组特别处理
			var rbac = ['admin', 'role', 'node'];
			if ( rbac.toString().indexOf(controller) > -1 ) {
				$("."+controller).addClass("active").siblings().removeClass('active');
				$("."+controller).parents("li").addClass("active open").siblings().removeClass("active open");
			}
		})();
	})
</script>
</div>
<!--右侧内容 start-->
<div class="main-content">
	<!--面包屑 start-->
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			seajs.use(["ace-extra"], function (ace) {
				try {
					ace.settings.check('breadcrumbs', 'fixed')
				} catch (e) {
				}
			})
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="<?php echo U('Index/index');?>" style="color: #b33333">首页</a>
			</li>
		</ul>
		<!--面包屑 end-->
	</div>
<div class="page-content">
	<div class="page-header">
		<h1>
			用户管理
			<small>
				<i class="icon-double-angle-right"></i>
				<?php if((ACTION_NAME) == "edit"): ?>修改用户信息<?php else: ?>添加用户信息<?php endif; ?>
			</small>
		</h1>
	</div>
	<!-- /.page-header -->
	<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="tabbable">
					<ul class="nav nav-tabs" id="myTab">
						<li>
							<a href="<?php echo U('User/index');?>">
								<i class="green icon-home bigger-110"></i>
								用户列表
							</a>
						</li>
						<li class="active">
							<a >
								<i class="green icon-edit bigger-110"></i>
								<?php if((ACTION_NAME) == "edit"): ?>修改用户信息<?php else: ?>添加用户信息<?php endif; ?>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane in active">
							<form  id="ajaxForm" class="form-horizontal" action="<?php echo U('User/insert');?>" method="post" enctype="multipart/form-data">

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">用户类型</label>
									<div class="col-sm-2">
										<select class=" width-80 form-control" name="usertype">
											<option value="">全部分类</option>
											<option value="1">个人用户</option>
											<option value="2">企业用户</option>
										</select>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 账号 </label>
									<div class="col-sm-9">
										<input type="text"  name="username" placeholder="请输入账号" class="col-xs-10 col-sm-5" value=""/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 密码 </label>
									<div class="col-sm-9">
										<input type="password" name="password" class="col-xs-10 col-sm-5"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 用户昵称 </label>
									<div class="col-sm-9">
										<input type="text"  name="alias" class="col-xs-10 col-sm-5"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > email </label>
									<div class="col-sm-9">
										<input type="text"  name="email" class="col-xs-10 col-sm-5"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 电话/手机 </label>
									<div class="col-sm-9">
										<input type="text"  name="phone" class="col-xs-10 col-sm-5"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 上传头像 </label>
									<div class="col-sm-9">
										<input type="file"  name="photo" class="col-xs-10 col-sm-5"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" > 状态</label>
									<div class="col-sm-2">
										<input type="radio" name="status" class="ace" value="1" checked />
										<span class="lbl"> 正常 </span>
										<input  type="radio" name="status" class="ace"/>
										<span class="lbl"> 禁用 </span>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit">
											<i class="icon-ok bigger-110"></i>
											提交
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- PAGE CONTENT END -->
</div>
</div>
</div>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	seajs.use(['$','bootstrap-min','bootbox','form-ajax'],function($){
		var ajaxFrom = $('#ajaxForm');
		ajaxFrom.ajaxForm({
			dataType:'json',
			success:function(data){
				/*返回值包含状态，信息和要跳转的url*/
				if(data.status > 0  && data.url){
					window.location.href = data.url;
					return false;
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
</script>
<!-- TopButton start-->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
<!-- TopButton end-->
</div>
<!-- /.main-container -->

<!-- basic scripts 基本js-->
<script>
	seajs.use(['admin-common','typeahead-bs2','bootstrap-min','ace-elements','ace-min'])
</script>
<!-- inline scripts related to this page -->
</body>
</html>