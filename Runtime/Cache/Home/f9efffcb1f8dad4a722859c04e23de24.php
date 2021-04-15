<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>登录</title>
		<script>
			wolf = {};
			wolf.seajsBase = "/Public/Js/";
		</script>
		<script src="/Public/Js/global.js" type="text/javascript"></script>
		<script src="/Public/Js/libs/seajs/2.3.0/sea.js" type="text/javascript"></script>
		<script src="/Public/Js/config.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="/Public/Css/Common/index_aio.css">
		
	</head>
	<body style="background-color: #b33333;">
		<div class="container container-register">
			<div class="row">
				<a href="<?php echo U('Index/index');?>">
					<img class="img-link" src="/Public/images/website_logo.png" width="132" height="50"/>
				</a>
			</div>
			<div class="row row-register">
				<h2 class="text-center">登录</h2>
				<form id="ajaxForm" class="form-horizontal js-login-panel" role="form" method="post" action="<?php echo U('Login/dologin');?>">
					<div class="form-group">
						<label for="" class="col-sm-4 control-label control-label-required">账号</label>
						<div class="col-sm-5">
							<input id="username" class="form-control" type="text" name="username" value="<?php echo (cookie('username')); ?>" placeholder="账号">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-4 control-label control-label-required">密码</label>
						<div class="col-sm-5">
							<input id="password" class="form-control" type="password" name="password" value="<?php echo (cookie('password')); ?>" placeholder="密码">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-5">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="autologin" value="1" checked="checked"/>下次自动登录
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-5">
							<button type="submit" class="btn btn-block btn-primary js-btn-login">登录</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-5">
							<div class="btn btn-block btn-primary js-btn-login">
								<a href ="<?php echo U('Register/index');?>" style="color:white">注册账号</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- END .row-->
		</div>
		<script>
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
			})
		</script>
<!-- END .container-register -->
	</body>
</html>