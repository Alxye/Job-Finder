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


<div class="container" style="margin-top: 100px;margin-bottom: 280px;">
	<br>
	<div class="row"><h3>账号设置</h3></div>
	<br>
	<br>

	<form class="form-horizontal" method="post" action="<?php echo U('PersonalSet/update');?>"  id="ajaxForm">
		<div class="form-group">
			<label class="col-sm-2 control-label control-label-required" for="login_name">
				登录账户名&nbsp;
			</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="login_name" name="login_name" value="<?php echo ($userinfo["username"]); ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label control-label-required" for="alias">
				用户昵称&nbsp;
			</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="alias" name="alias" value="<?php echo ($userinfo["alias"]); ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label control-label-required">密码</label>

			<div class="col-sm-5">
				<p class="form-control-static">******&nbsp;
					<a href="<?php echo U('PersonalSet/editPassword');?>" class="text-primary">修改</a>
				</p>
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-2 control-label control-label-required" for="email">
				电子邮件&nbsp;
			</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="email" name="email" value="<?php echo ($userinfo["email"]); ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label control-label-required" for="phone">
				联系电话&nbsp;
			</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="phone" name="phone" value="<?php echo ($userinfo["phone"]); ?>">
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
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>