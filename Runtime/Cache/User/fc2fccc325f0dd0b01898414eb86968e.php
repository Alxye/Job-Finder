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
	.background-block .horizontal-flow {
	margin-top: 15px;
	}
	.image-tip-cry{
		background:url(/thinkphp/Public/images/tips_cry.png) 25% 0/67px 100px no-repeat;
		height:100px;
		line-height:100px;
		margin:50px auto;
		padding-left:33%;
		color:#b8c4ce;
		font-size:28px
	}
</style>
<span>&nbsp;</span>

<div class="container">
	<div class="row"><h3>申请历史</h3></div>
</div>
<div class="container-fluid container-nav-tabs-2">
	<div class="container">
		<ul class="nav nav-tabs-2" role="tablist">
			<li class="<?php if($ac == 1): ?>active<?php endif; ?>"><a href="<?php echo U('History/index');?>">全部申请</a></li>
			<li class="<?php if($ac == 2): ?>active<?php endif; ?>"><a href="<?php echo U('History/isread');?>">简历已读</a></li>
			<li class="<?php if($ac == 3): ?>active<?php endif; ?>"><a href="<?php echo U('History/interview');?>">面试中</a></li>
			<li class="<?php if($ac == 4): ?>active<?php endif; ?>"><a href="<?php echo U('History/offer');?>">接到offer</a></li>
			<li class="<?php if($ac == 5): ?>active<?php endif; ?>"><a href="<?php echo U('History/accept');?>">已接受的offer</a></li>
			<li class="<?php if($ac == 6): ?>active<?php endif; ?>"><a href="<?php echo U('History/refuse');?>">已拒绝的offer</a></li>
			<li class="<?php if($ac == 7): ?>active<?php endif; ?>"><a href="<?php echo U('History/bad');?>">不合适</a></li>
		</ul>
	</div>
</div>
<div class="container min-height-500">
	<?php if(empty($history)): ?><div class="image-tip-cry" style="margin-bottom:300px;">暂时没有符合条件的申请</div><?php endif; ?>
	<?php if(!empty($history)): ?><ul id="apply-list" class="list-group list-group-simple list-group-simple-fat">
			<?php if(is_array($history)): foreach($history as $key=>$h): ?><li id="applied_job_id_73986" class="list-group-item js-apply"><i class="fa fa-files-o"></i>&nbsp;
					您申请过的职位&nbsp;
					<a class="text-primary" href="<?php echo U('Home/Job/item?jobid='.$h['jid']);?>" target="_blank"><?php echo ($h["comname"]); ?>&nbsp;/&nbsp;<?php echo ($h["jobname"]); ?></a>&nbsp;
					<?php if($h["status"] == 1): ?>简历状态为<?php else: ?>简历状态变为<?php endif; ?>&nbsp;
					<a class="<?php if($h["status"] < 5): ?>text-success<?php else: ?>text-danger<?php endif; ?> js-pop-btn" href="javascript:;"><?php echo ($h["statusval"]); ?>&nbsp;</a>
					<span class="text-muted pull-right"><?php echo ($h["addtime"]); ?></span>
				</li><?php endforeach; endif; ?>
		</ul><?php endif; ?>
	<!--
	<?php if(!empty($histroy)): ?><div class="page">
			<span class="pre">{上一页}</span> <span class="next">{下一页}</span> <span class="total">{第 页/共 页}</span>
		</div><?php endif; ?> -->

</div>
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>