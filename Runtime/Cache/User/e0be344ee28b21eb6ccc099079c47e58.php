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
	.main input.form-control { width: 260px; display: inline; }
	.help-block { font-size: 12px; color: #666666; margin-left: 90px; }
</style>
<div class="h1_tit" style="margin-top:20px;">修改密码</div>
<div class="main">
	<div style="padding:20px 45px;">
		<div class="input_list">
			<form method="post" class="ajaxForm" action="<?php echo U('PersonalSet/password');?>">
				<ul>
					<li>
						<label>原密码：</label>
						<input type="password" id="old_password" name="old_password" class="form-control" value="" placeholder="原密码"><br>
					</li>
					<li>
						<label>新密码：</label>
						<input type="password" id="password" name="password" class="form-control" value="" placeholder="新密码"><br>
						<span class="help-block">新密码须至少6位</span></li>
					<li>
						<label>确认密码：</label>
						<input type="password" id="re_password" name="re_password" class="form-control" value="" placeholder="确认新密码"><br>
					</li>
					<li style="margin-left:90px">
						<input type="submit" class="btn btn-primary" value="保存">&nbsp;
						<input type="button" class="btn btn-default" value="取消" onclick="history.back(-1);">
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	seajs.use(['$','form-ajax','bootbox'],function(){
		var ajaxFrom = $('.ajaxForm');
		ajaxFrom.ajaxForm({
			dataType:'json',
			success:function(data){
				if(data.status > 0){
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
</script>
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>