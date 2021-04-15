<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<meta name="keywords" content="<?php echo ($site["seo_keywords"]); ?>">
	<meta name="description" content="<?php echo ($site["seo_content"]); ?>">
	<title><?php echo ($site["seo_title"]); ?></title>
	<script>
		wolf = {};
		wolf.seajsBase = "/Public/Js/";
	</script>
	<script src="/Public/Js/global.js" type="text/javascript"></script>
	<script src="/Public/Js/libs/seajs/2.3.0/sea.js" type="text/javascript"></script>
	<script src="/Public/Js/libs/jquery-plugin/imgliquid-min.js" type="text/javascript"></script>
	<script src="/Public/Js/config.js" type="text/javascript"></script>
	<?php if((CONTROLLER_NAME == 'Company') OR (CONTROLLER_NAME == 'Preview') OR (CONTROLLER_NAME == 'PersonalSet')): ?><link rel="stylesheet" type="text/css" href="/Public/Css/Common/public.css"/>
		<link rel="stylesheet" type="text/css" href="/Public/Css/Common/index_aio.css">
		<?php else: ?>
		<link rel="stylesheet" type="text/css" href="/Public/Css/Common/index_aio.css">
		<link rel="stylesheet" type="text/css" href="/Public/Css/Common/public.css"/><?php endif; ?>
	<link rel="stylesheet" type="text/css" href="/Public/Css/Common/common.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Js/libs/Font-Awesome-3.2.1/css/font-awesome.css"/>
</head>

<body>

<!--header start-->
<?php echo W('Common/Public/nav');?>
<!--header end-->


<style>
	.wei-user-logo,.wei-user-logo img {
		width: 108px;
		height: 108px;
	}
</style>
<!--主要内容开始-->
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo U('Home/Company/index');?>" class="text-label small">全部企业</a></li>
			<li><a href="<?php echo U('Home/Company/index');?>" class="text-label small">其他</a></li>
			<li class="active small">企业详细信息</li>
		</ol>
	</div>
	<style>
		.wei-user-logo {
			border: 1px solid #fff;
		}
	</style>
	<div class="row wei-user-heading">
		<div class="pull-left wei-user-logo"><img class="img-border"
		                                          src="/Public<?php echo ($company["logo"]); ?>"
		                                          alt="<?php echo ($company["cname"]); ?>"></div>
		<h3 class="title ellipsis"><?php echo ($company["cname"]); ?></h3>

		<p class="abstract text-label ellipsis"><?php echo ($company["one"]); ?></p>

		<div class="pull-left"><a class="btn btn-sm btn-default" href="<?php echo U('company/index');?>"><i class="fa"><img src="/Public/images/xiugai.png"/></i>&nbsp;修改资料</a></div>
	</div>
</div>
<div class="container-fluid container-nav-tabs-2">
	<div class="container">
		<ul class="nav nav-tabs-2" role="tablist">
			<li><a href="<?php echo U('Home/Company/item?comid='.$company['id']);?>">企业主页</a></li>
			<li><a href="<?php echo U('Home/Company/item?comid='.$company['id']).'#job_list';?>">全部职位</a></li>
			<li class="active"><a>管理</a></li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row wei-user-admin-container">
		<!--右侧菜单-->
		<div class="col-xs-3 col-md-2 sidebar-menu">
			<ul class="list-group">
				<!--data-notifier-number="new" 此句控制new小图标-->
				<li class="list-group-item notifier-number" data-notifier-number="">
					<a class="text-label" href="<?php echo U('User/Job/index');?>" id="Job">
						<i class="fa fa-2x"><img src="/Public/images/zhiwei2.gif"/></i>职位管理</a>
				</li>
				<li class="list-group-item notifier-number" data-notifier-number="<?php echo ($apply_num); ?>">
					<a class="text-label" href="<?php echo U('User/Apply/index');?>"  id="Apply">
						<i class="fa fa-2x"><img src="/Public/images/jianli2.gif"/></i>简历管理</a>
				</li>
				<!--notifier notifier-lg 这两个类名控制橙色小圆点-->
				<li class="list-group-item">
					<a class="text-label" href="<?php echo U('User/company/index');?>" id="Company">
						<i class="fa fa-2x"><img src="/Public/images/qiye2.gif"/></i>企业资料</a>
				</li>
				<li class="list-group-item">
					<a class="text-label" href="<?php echo U('User/AccountSet/index');?>" id="AccountSet">
						<i class="fa fa-2x"><img src="/Public/images/zhanghao2.gif"/></i>账号设置</a>
				</li>
			</ul>
		</div>
		<!--右侧内容-->
		<div class="col-xs-15 col-md-10 wei-user-admin-content">
			
	<div class="col-xs-15 col-md-10 wei-user-admin-content">
		<div class="wei-user-admin-title-bar">
			<div class="container-nav-tabs-2">
				<ul class="nav nav-tabs-2" role="tablist">
					<li class="active" ><a>资料修改</a></li>
				</ul>
			</div>
		</div>
		<form class="form-horizontal" method="post" action="<?php echo U('AccountSet/set');?>"  id="ajaxForm">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="old_password">原密码&nbsp;<span>*</span>
				</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" id="old_password" name="old_password" value="" placeholder="必填">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="password">新密码&nbsp;<span>*</span>
				</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" id="password" name="password" value="" placeholder="必填">
					<span class="help-block">密码长度为6-12位字符</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="re_password">重复新密码&nbsp;
					<span>*</span>
				</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" id="re_password" name="re_password" value="" placeholder="必填">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">电子邮件&nbsp;
					<span>*</span>
				</label>
				<div class="col-sm-5">
					<input class="form-control" type="email" id="email" name="email" value="" placeholder="必填">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">&nbsp;</label>
				<div class="col-sm-5">
					<button type="submit" class="btn btn-primary">提交</button>
					&nbsp;
					<button type="button" class="btn btn-default" onclick="history.go(-1)">取消</button>
				</div>
			</div>
		</form>
		<script>
		seajs.use(['$','form-ajax','bootbox'],function($){
			var ajaxFrom = $('#ajaxForm');
			ajaxFrom.ajaxForm({
				dataType:'json',
				success:function(data){
					bootbox.alert({
						message:data.info,
						title: "提示信息"
					});
					return false;
				}
			})
		})
		</script>
	</div>

		</div>
		</div>
	</div>
<script>
	seajs.use(["$"],function($){
		var controller = "<?php echo (CONTROLLER_NAME); ?>";
		$("a#"+controller).addClass("text-primary").removeClass("text-label");
	})
</script>
<!--main end=============主体-->
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>