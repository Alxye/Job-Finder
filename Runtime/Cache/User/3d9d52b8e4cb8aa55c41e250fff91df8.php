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
			
<style>
	.icon-job-post-step {
		background-size: 965px 31px;
		background-repeat: no-repeat;
		background-position: 25% 0;
		width: 965px;
		height: 31px;
		margin: 0 auto;
	}
</style>
<div class="col-xs-15 col-md-10 wei-user-admin-content"><h3 class="wei-user-admin-title-bar">编辑职位</h3>
	<form class="form-horizontal" method="post" action="<?php echo U('Job/update');?>" id="jobForm">
		<input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
		<input type="hidden" name="cid" value="<?php echo ($data['cid']); ?>">
		<div class="form-group">
			<label class="col-sm-2 control-label">职位分类&nbsp;<span>*</span></label>

			<div class="col-sm-10"><p class="form-control-static">
				<span><?php echo cateBread($data['cid']);?></span>&nbsp;
				<a href="<?php echo U('Job/selcate?id='.$_GET['id']);?>" class="text-primary">重新选择</a></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">
				标题党&nbsp;<span>*</span>
			</label>

			<div class="col-sm-5">
				<input class="form-control" type="text" name="title" value="<?php echo ($data["title"]); ?>" placeholder="必填"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">
				职位名称&nbsp;<span>*</span>
			</label>

			<div class="col-sm-5">
				<input class="form-control" type="text" name="name" value="<?php echo ($data["name"]); ?>" placeholder="必填"></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">
			月薪&nbsp;<span>*</span>
		</label>

			<div class="col-sm-5 form-inline">
				<input class="form-control" style="width:80px;" type="text" name="payid" value="<?php echo ($data["payid"]); ?>" placeholder="数字">&nbsp;K&nbsp;
				<span>（1K = 1000元）</span><span class="help-block"></span></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">招聘人数&nbsp;<span>*</span></label>

			<div class="col-sm-5 form-inline">
				<input class="form-control" style="width: 60px; " type="text" name="num" value="<?php echo ($data["num"]); ?>" placeholder="数字">&nbsp;
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">所在城市&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="cityid">
				<?php if(is_array($city)): foreach($city as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["cityid"]) == $v["id"]): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">最低学历&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="eid">
				<?php if(is_array($edu)): foreach($edu as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["eid"]) == $v["id"]): ?>selected<?php endif; ?>><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">最低工作年限&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="year">
				<?php if(is_array($year)): foreach($year as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["year"]) == $v["id"]): ?>selected<?php endif; ?>><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">岗位职责&nbsp;<span>*</span></label>

			<div class="col-sm-8">
				<textarea class="form-control" rows="8" cols="30" name="duty" placeholder="必填（无需包含“岗位职责”、“主要职责”等字样）"><?php echo ($data["duty"]); ?></textarea>
				<span class="help-block">无需包含“岗位职责”、“主要职责”等字样</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="requirement">任职要求&nbsp;<span>*</span></label>

			<div class="col-sm-8">
				<textarea class="form-control" rows="8" cols="30" id="requirement" name="request" placeholder="必填（无需包含“任职要求”、“要求”等字样）"><?php echo ($data["request"]); ?></textarea><span class="help-block">无需包含“任职要求”、“要求”等字样</span>
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">&nbsp;</label>

			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">保存</button>
				&nbsp;
				<button type="button" class="btn btn-default" onclick="history.go(-1)">取消</button>
			</div>
		</div>
	</form>

</div>
<script>
	seajs.use(['$', 'bootbox', 'form-ajax'], function () {
		$(function () {
			var ajaxFrom = $('#jobForm');
			ajaxFrom.ajaxForm({
				dataType : 'json',
				success : function (data) {
					if ( data.status > 0 && data.url ) {
						window.location.href = data.url;
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
	});
</script>

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