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


<!--main start=============主体-->
<div class="container" style="margin-top: 0">
<div class="row">

	<br>
	<br>
	<?php if(empty($user)): ?><div class="col-xs-4 col-home-510 col-home-960-user-dashboard" style="float:right;">
			<div class="panel panel-simple panel-simple-border panel-user-dashboard js-login-panel" style="line-height: 40px; margin-top:10px;">
				<div class="panel-heading">用户登录</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo U('Home/Login/dologin');?>" id="ajaxForm[">
						<div class="form-group">
							<label for="username">帐号</label>
							<input type="text" class="form-control" id="name" name="username" placeholder="登录帐号"></div>
						<div class="form-group">
							<label for="password">密码</label>
							<input type="password" class="form-control" id="pass" name="password" placeholder="登录密码"></div>
						<div class="checkbox">
							<label><input type="checkbox" name="auto_login" value="1" checked="checked"/>&nbsp;下次自动登录</label>
						</div>
						<button type="submit" class="btn btn-block btn-primary js-btn-login">登录</button>
					</form>
					<div class="text-block text-right"><a href="<?php echo U('Home/Register/index');?>">免费注册</a></div>

				</div>
			</div>
		</div>
		<?php else: ?>

		<?php if($usertype == 1 ): ?><!--个人帐户-->
			<div class="col-xs-4 col-home-510 col-home-960-user-dashboard" style="float: right;">
				<div class="panel panel-simple panel-simple-border panel-user-dashboard">
					<div class="panel-heading">用户信息</div>
					<div class="panel-body">
						<div class="user-face center-block text-center" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="账号设置">
							<a href="<?php echo U('User/Resume/index');?>" target="_blank">
								<img class="img-border" src="/Public/images/default_user_face.jpg">
							</a>
						</div>
						<label class="text-block text-center" data-toggle="tooltip" data-placement="bottom" title="账号设置" style="margin: 10px 0px;">
							<a class="text-primary" href="<?php echo U('User/Resume/index');?>" target="_blank"><?php echo ($user['alias']); ?></a>
						</label>

						<div class="dashboard-menu-list">
							<a class="dashboard-menu js-btn-resume" href="<?php echo U('User/Resume/index');?>" target="_blank">
								<i class="fa fa-2x fa-file-word-o">
								</i>
								<span class="dashboard-menu-title">我的简历</span>
							</a>
							<a class="dashboard-menu js-btn-history" href="<?php echo U('User/History/index');?>" target="_blank">
								<i class="fa fa-2x fa-history">
								</i>
								<span class="dashboard-menu-title">申请历史</span>
							</a>
						</div>
						<div class="dashboard-menu-list">

							<a class="dashboard-menu js-btn-favorite" href="<?php echo U('User/Favorite/index');?>" target="_blank">
								<i class="fa fa-2x fa-star-o">
								</i>
								<span class="dashboard-menu-title">我的收藏</span>
							</a>
							<a class="dashboard-menu js-btn-subscribe" href="<?php echo U('/User/PersonalSet/index');?>" target="_blank">
								<i class="fa fa-2x fa-user">
								</i>
								<span class="dashboard-menu-title">账号设置</span>
							</a>
						</div>

					</div>
				</div>
			</div>

			<?php elseif($usertype == 2): ?><!--企业用户-->
			<div class="col-xs-4 col-home-510 col-home-960-user-dashboard" style="float: right;">
				<div class="panel panel-simple panel-simple-border panel-user-dashboard">
					<div class="panel-heading">用户信息</div>
					<div class="panel-body">
						<div class="wei-user-logo center-block" data-toggle="tooltip" data-placement="bottom" title="企业主页">
							<style>
								.user-face, .user-face img, .wei-user-logo, .wei-user-logo img {
									width: 108px;
									height: 108px;
								}
								.wei-user-logo {
									border: 1px solid #fff;
								}
							</style>
							<a href="<?php echo U('User/AccountSet/index');?>" target="_blank"><img class="img-border" src="/Public<?php echo ($company["logo"]); ?>"></a></div>
						<label class="text-block text-center" data-toggle="tooltip" data-placement="bottom" title="企业主页" style="margin: 10px 0px;">
							<a class="text-primary" href="<?php echo U('User/AccountSet/index');?>" target="_blank"><?php echo ($company['cname']); ?></a>
						</label>

						<div class="dashboard-menu-list">
							<a class="dashboard-menu js-btn-job-list" href="<?php echo U('User/Job/index');?>" target="_blank">
								<i class="fa fa-2x fa-list">
								</i>
								<span class="dashboard-menu-title">职位管理</span>
							</a>
							<a class="dashboard-menu notifier-number" href="<?php echo U('User/Apply/index');?>" target="_blank"
							   data-notifier-number="0">
								<i class="fa fa-2x fa-files-o">
								</i>
								<span class="dashboard-menu-title">简历管理</span>
							</a>
						</div>
						<div class="dashboard-menu-list">

							<a class="dashboard-menu js-btn-comment-list" href="<?php echo U('User/AccountSet/index');?>" target="_blank">
								<i class="fa fa-2x fa-gears">
								</i>
								<span class="dashboard-menu-title">帐号设置</span>
							</a>  <!-- notifier notifier-lg 控制新消息-->
							<a class="dashboard-menu" href="<?php echo U('User/company/index');?>" target="_blank">
								<i class="fa fa-2x fa-user"></i>
								<span class="dashboard-menu-title">企业资料</span></a>
						</div>
					</div>
				</div>
			</div><?php endif; endif; ?>

	<div class="job-category-widget " style="margin-top: 10px;">


		<div class=" col-home-960 col-home-960-banner" style="float: left;padding-left: 0px;width: 730px;margin-top: 0px;">
			<div class="banner-home   ">
				<div class=" carousel slide" data-ride="carousel" id="carousel-generic">
					<ol class="carousel-indicators">
						<li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-generic" data-slide-to="1"></li>
						<li data-target="#carousel-generic" data-slide-to="2"></li>
						<li data-target="#carousel-generic" data-slide-to="3"></li>
						<li data-target="#carousel-generic" data-slide-to="4"></li>
						<li data-target="#carousel-generic" data-slide-to="5"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php if(is_array($pic)): foreach($pic as $k=>$v): ?><div class="item <?php if(($k) == "0"): ?>active<?php endif; ?>">
								<a href="<?php echo U('Home/News/info?id='.$v['id']);?>" target="_blank"><img src="/Public<?php echo titleImgPath($v['id']);?>" alt="<?php echo ($v["title"]); ?>"></a>
							</div><?php endforeach; endif; ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

			<ul class="sub-banner-home" style="margin-top: 20px;">
				<li>
					<a target="_blank">
						<img src="/Public/images/sub_ban1.jpg" alt=""/>
					</a>
				</li>
				<li>
					<a target="_blank">
						<img src="/Public/images/sub_ban2.jpg" alt=""/>
					</a>
				</li>
				<li>
					<a  target="_blank">
						<img src="/Public/images/sub_ban3.jpg" alt=""/>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
	<br>
</div>
<script>
	seajs.use(['$', 'bootstrap3.0'], function ($) {
		$('.carousel').carousel()
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