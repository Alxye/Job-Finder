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
</style>
<?php if($_GET['cid'] != ''): ?><!--发布职位-->
<div class="col-xs-15 col-md-10 wei-user-admin-content"><h3 class="wei-user-admin-title-bar">发布职位</h3>

	<div class="icon-job-post-step step-2" style="display: block"></div>
	<form class="form-horizontal" method="post" action="<?php echo U('Job/insert');?>" id="jobForm">
		<input type="hidden" name="cid" value="<?php echo ($_GET['cid']); ?>">
		<div class="form-group">
			<label class="col-sm-2 control-label">职位分类&nbsp;<span>*</span></label>

			<div class="col-sm-10"><p class="form-control-static">
				<span><?php echo cateBread($_GET['cid']);?></span>&nbsp;
				<a href="<?php echo U('Job/add');?>" class="text-primary">重新选择</a></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">
				职位名称&nbsp;<span>*</span>
			</label>

			<div class="col-sm-5">
				<input class="form-control" type="text" name="name" value="" placeholder="必填"></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">
			月薪&nbsp;<span>*</span>
		</label>

			<div class="col-sm-5 form-inline">
				<input class="form-control" style="width:80px;" type="text" name="payid" value="" placeholder="数字">&nbsp;K&nbsp;
				<span>（1K = 1000元）</span><span class="help-block"></span></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">招聘人数&nbsp;<span>*</span></label>

			<div class="col-sm-5 form-inline">
				<input class="form-control" style="width: 60px; " type="text" name="num" value="" placeholder="数字">&nbsp;
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">所在城市&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="cityid">
				<?php if(is_array($city)): foreach($city as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" ><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">最低学历&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="eid">
				<?php if(is_array($edu)): foreach($edu as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">最低工作年限&nbsp;<span>*</span></label>

			<div class="col-sm-5"><select class="form-control" name="year">
				<?php if(is_array($year)): foreach($year as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
			</select></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">岗位职责&nbsp;<span>*</span></label>

			<div class="col-sm-8">
				<textarea class="form-control" rows="8" cols="30" name="duty" placeholder="必填（无需包含“岗位职责”、“主要职责”等字样）"></textarea>
				<span class="help-block">无需包含“岗位职责”、“主要职责”等字样</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="requirement">任职要求&nbsp;<span>*</span></label>

			<div class="col-sm-8">
				<textarea class="form-control" rows="8" cols="30" id="requirement" name="request" placeholder="必填（无需包含“任职要求”、“要求”等字样）"></textarea><span class="help-block">无需包含“任职要求”、“要求”等字样</span>
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">&nbsp;</label>

			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">发布</button>
				&nbsp;
				<button type="button" class="btn btn-default" onclick="history.go(-1)">取消</button>
			</div>
		</div>
	</form>

</div>
<?php elseif($_GET['id'] != ''): ?>
<!--填写标题-->
<div class="col-xs-15 col-md-10 wei-user-admin-content"><h3 class="wei-user-admin-title-bar">设置标题</h3>
	<div class="icon-job-post-step step-3" style="display: block"></div>
	<form class="form-horizontal" id="jobForm" method="post" action="<?php echo U('job/update');?>" >
		<input type="hidden" name='id' value="<?php echo ($_GET['id']); ?>"/>
		<input type="hidden" name='done' value="add"/>
		<div class="form-group"><label class="col-sm-2 control-label" >职位名称</label>
			<div class="col-sm-10">
				<label class="checkbox" style="padding-left:0px;">
				<span ><?php echo ($name); ?></span></label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="thread_title">标题&nbsp;<span>*</span></label>
			<div class="col-sm-8">
				<input class="form-control" type="text" name="title" value="" placeholder="必填"></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">完成</button>
				&nbsp;
			</div>
		</div>
	</form>
	<script>
	</script>
</div>
<?php else: ?>
<!--选择分类-->
<div class="col-xs-15 col-md-10 wei-user-admin-content">
	<style type="text/css">
		select {
			width: 220px;
			border: 1px solid #cccccc;
			background-color: #ffffff;
		}

	</style>
	<h3 class="wei-user-admin-title-bar">职位分类</h3>
	<div class="icon-job-post-step step-1" style="display: block"></div>
	<form class="form-horizontal" id="form" method="get" action="<?php echo U('Job/add');?>">
		<input type="hidden" id="cid" name="cid" value="">
		<div class="form-group"><label class="col-sm-2 control-label">职位分类&nbsp;<span>*</span></label>
			<div class="col-sm-10">
				<select size="10" id="category_1">
					<?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select> &nbsp;
				<select size="10" id="category_2"></select> &nbsp;
  			<div></div></div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">已选定分类</label>

			<div class="col-sm-10">
				<label class="checkbox" style="padding-left:0px;">
						<span id="category_name">
							<span>未选定</span>
						</span>
				</label>
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">&nbsp;</label>

			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">选定分类</button>
				&nbsp;
				<button type="button" class="btn btn-default" onclick="history.go(-1)">取消</button>
			</div>
		</div>
	</form>
	<script>
		seajs.use(['$'], function ($) {
			var cates = {};
			$.ajax({
				url : "<?php echo U('Job/getCate');?>",
				datatype : "json",
				async : false,
				success : function (data) {
					if ( data ) {
						cates = data;
					}
				}
			})
			$("#category_1").change(function () {
				$("#category_2").find("option").remove();
				//$("#category_3").find("option").remove();
				for (var i = 0; i < cates.length; i++) {
					if ( cates[i].id == $(this).val() && cates[i].children.length > 0 ) {
						var cate_2 = cates[i].children;
						for (var j = 0; j < cate_2.length; j++) {
							$("#category_2").attr("data-pid", cate_2[j].pid);
							$("#category_2").append("<option value='" + cate_2[j].id + "'>" + cate_2[j].name + "</option>");
						}
					}
				}
			});
			// $("#category_2").change(function () {
			// 	$("#category_3").find("option").remove();
			// 	for (var i = 0; i < cates.length; i++) {
			// 		if ( cates[i].id == $(this).attr("data-pid") ) {
			// 			var cate_2 = cates[i].children;
			// 			for (var x = 0; x < cate_2.length; x++) {
			// 				if ( $(this).val() == cate_2[x].id && cate_2[x].children.length > 0 ) {
			// 					var cate_3 = cate_2[x].children;
			// 					for (var j = 0; j < cate_3.length; j++) {
			// 						$("#category_3").attr("data-pid", cate_3[j].pid);
			// 						$("#category_3").append("<option value='" + cate_3[j].id + "'>" + cate_3[j].name + "</option>");
			// 					}
			// 				}
			// 			}
			//
			// 		}
			// 	}
			// })
			$("#category_2").change(function () {
				$("input#cid").val($(this).val());
				var txt = $(this).find("option:selected").text();
				$("#category_name").html('<span class="label label-danger">' + txt + '</span>');
			})
			$("form#form").submit(function () {
				if ( !$("input#cid").val() ) {
					alert("请选择分类");
					return false;
				}
			})
		});
	</script>
</div><?php endif; ?>
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