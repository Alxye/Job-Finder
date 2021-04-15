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
			
<div class="wei-user-admin-title-bar">
	<div id="apply-tab" class="container-nav-tabs-2">
		<ul class="nav nav-tabs-2" role="tablist">
			<li	<?php if(empty($_GET['status'])): ?>class="active"<?php endif; ?>
			><a href="<?php echo U('Apply/index');?>">全部简历</a></li>
			<li <?php if(($_GET['status']) == "1"): ?>class="active"<?php endif; ?>
			><a href="<?php echo U('Apply/index?status=1');?>">未处理简历&nbsp;<span
				class="text-highlight"></span></a></li>
			<li
			<?php if(($_GET['status']) == "3"): ?>class="active"<?php endif; ?>
			><a href="<?php echo U('Apply/index?status=3');?>">已通知面试&nbsp;<span
				class="text-default"></span></a></li>
			<li
			<?php if(($_GET['status']) == "4"): ?>class="active"<?php endif; ?>
			><a href="<?php echo U('Apply/index?status=4');?>">已发offer</a></li>
			<li
			<?php if(($_GET['status']) == "7"): ?>class="active"<?php endif; ?>
			><a href="<?php echo U('Apply/index?status=7');?>">不合适简历</a></li>
		</ul>
	</div>
</div>
<div class="hidden">
	<div class="status_1">
		<span class="status-x"><a class="text-primary" href="javascript:;">简历未读</a></span>
			<span class="action-x">
				<a class="btn btn-default btn-sm interview" data-status="3">
					<i class="fa fa-bullhorn"></i>&nbsp;通知面试
				</a>
				<a class="btn btn-default btn-sm action" data-status="7">
					<i class="fa fa-times"></i>&nbsp;不合适
				</a>
			</span>
	</div>
	<div class="status_2">
		<span class="status-x"><span class="label label-success">简历已读</span></span>
			<span class="action-x">
				<a class="btn btn-default btn-sm interview" data-status="3">
					<i class="fa fa-bullhorn"></i>&nbsp;通知面试
				</a>
				<a class="btn btn-default btn-sm action" data-status="7">
					<i class="fa fa-times"></i>&nbsp;不合适
				</a>
			</span>
	</div>
	<div class="status_3">
		<span class="status-x"><span class="label label-success">已通知面试</span></span>
			<span class="action-x">
			<div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
				<ul class="dropdown-menu btn-group-share">
					<li><a class="action" data-status="7">
						<i class="fa fa-times"></i>&nbsp;不合适
					</a>
					</li>
					<li><a class=" interview" data-status="4">
						<i class="fa fa-send-o"></i>&nbsp;发送offer
					</a>
					</li>
				</ul>
			</div>
			</span>
	</div>
	<div class="status_4">
		<span class="status-x"><span class="label label-success">待回应offer</span></span>
			<span class="action-x">
			<div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
				<ul class="dropdown-menu btn-group-share">
					<li>
						<a class=" action" data-status="5">
							<i class="fa fa-check"></i>&nbsp;接受offer
						</a>
					</li>
					<li>
						<a class=" action" data-status="6">
							<i class="fa fa-times"></i>&nbsp;拒绝offer
						</a>
					</li>
				</ul>
			</div>
			</span>
	</div>
	<div class="status_5">
		<span class="status-x"><span class="label label-primary">已接受offer</span></span>
			<span class="action-x">
			<div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
				<ul class="dropdown-menu btn-group-share">
					<li>
						<a class=" action" data-status="6">
							<i class="fa fa-times"></i>&nbsp;拒绝offer
						</a>
					</li>
				</ul>
			</div>
			</span>
	</div>
	<div class="status_6">
		<span class="status-x"><span class="label label-default">已拒绝offer</span></span>
			<span class="action-x">
			<div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
				<ul class="dropdown-menu btn-group-share">
					<li>
						<a class=" action" data-status="5">
							<i class="fa fa-check"></i>&nbsp;接受offer
						</a>
					</li>
				</ul>
			</div>
			</span>
	</div>
	<div class="status_7">
		<span class="status-x"><span class="label label-default">简历不合格</span></span>
			<span class="action-x">
			<div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
				<ul class="dropdown-menu btn-group-share">
					<li><a class="interview" data-status="3">
						<i class="fa fa-bullhorn"></i>&nbsp;通知面试
					</a></li>
				</ul>
			</div>
			</span>
	</div>
</div>
<table id="apply-list" class="table table-striped table-hover">
	<thead>
	<tr>
		<th>职位名称</th>
		<th style="width:100px;">个人简历</th>
		<th style="width:80px;">性别</th>
		<th style="width:80px;">年龄</th>
		<th style="width:80px;">学历</th>
		<th style="width:80px;">经验</th>
		<th>投递时间</th>
		<th>状态</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
	<?php if(is_array($apply)): foreach($apply as $key=>$v): ?><tr class="id" data-id="<?php echo ($v["id"]); ?>">
			<td style="white-space:nowrap;"><a class="text-primary" href="<?php echo U('Home/Job/item?jobid='.$v['jid']);?>" target="_blank" title="<?php echo ($v["jobname"]); ?>"><?php echo ($v["jobname"]); ?></a></td>
			<td><a class="text-primary" href="<?php echo U('User/Preview/index?uid='.$v['uid'].'&id='.$v['id']);?>" target="_blank"><?php echo ($v["info"]["truename"]); ?></a>
			</td>
			<td>
				<?php if(($v["info"]["sex"]) == "1"): ?>男
					<?php else: ?>
					女<?php endif; ?>
			</td>
			<td><?php echo age(date('Ymd',$v['info']['birthday']));?></td>
			<td><?php echo ($v["edu"]); ?></td>
			<td><?php echo ($v["year"]); ?></td>
			<td style="white-space:nowrap;"><?php echo tranTime($v['addtime']);?></td>
			<td class="v_status">
				<?php switch($v["status"]): case "1": ?><a class="text-primary" href="javascript:;">简历未读</a><?php break;?>
					<?php case "2": ?><span class="label label-success">简历已读</span><?php break;?>
					<?php case "3": ?><span class="label label-success">已通知面试</span><?php break;?>
					<?php case "4": ?><span class="label label-success">待回应offer</span><?php break;?>
					<?php case "5": ?><span class="label label-primary">已接受offer</span><?php break;?>
					<?php case "6": ?><span class="label label-default">已拒绝offer</span><?php break;?>
					<?php case "7": ?><span class="label label-default">简历不合格</span><?php break;?>
					<?php default: ?>
					默认情况<?php endswitch;?>
			<td style="white-space:nowrap;" class="v_action">
				<?php switch($v["status"]): case "1": case "2": ?><a class="btn btn-default btn-sm interview" data-status="3">
							<i class="fa fa-bullhorn"></i>&nbsp;通知面试
						</a>
						<a class="btn btn-default btn-sm action" data-status="7">
							<i class="fa fa-times"></i>&nbsp;不合适
						</a><?php break;?>
					<?php case "3": ?><div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu btn-group-share">
								<li><a class="action" data-status="7">
									<i class="fa fa-times"></i>&nbsp;不合适
								</a>
								</li>
								<li><a class="interview" data-status="4">
									<i class="fa fa-send-o"></i>&nbsp;发送offer
								</a>
								</li>
							</ul>
						</div><?php break;?>
					<?php case "4": ?><div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu btn-group-share">
								<li>
									<a class=" action" data-status="5">
										<i class="fa fa-check"></i>&nbsp;接受offer
									</a>
								</li>
								<li>
									<a class=" action" data-status="6">
										<i class="fa fa-times"></i>&nbsp;拒绝offer
									</a>
								</li>
							</ul>
						</div><?php break;?>
					<?php case "5": ?><div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu btn-group-share">
								<li>
									<a class=" action" data-status="6">
										<i class="fa fa-times"></i>&nbsp;拒绝offer
									</a>
								</li>
							</ul>
						</div><?php break;?>
					<?php case "6": ?><div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu btn-group-share">
								<li>
									<a class=" action" data-status="5">
										<i class="fa fa-check"></i>&nbsp;接受offer
									</a>
								</li>
							</ul>
						</div><?php break;?>
					<?php case "7": ?><div class="btn-group"><a class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;操作菜单&nbsp;<i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu btn-group-share">
								<li><a class="interview" data-status="3" >
									<i class="fa fa-bullhorn"></i>&nbsp;通知面试
								</a></li>
							</ul>
						</div><?php break; endswitch;?>
			</td>
		</tr><?php endforeach; endif; ?>
	</tbody>
	<script>
		seajs.use(["$", 'bootbox'], function ($) {
			$(document).on('click', 'a.action', function () {
				var ob = $(this);
				var id = ob.parents('tr.id').attr('data-id');
				var status = $(this).attr('data-status');
				$.ajax({
					url : "<?php echo U('Apply/update');?>",
					data : {id : id, status : status},
					type : "post",
					success : function (data) {
						if ( data.status > 0 ) {
							var status_x = $("div.status_" + status).find("span.status-x").html();
							var action_x = $("div.status_" + status).find("span.action-x").html();
							ob.parents("tr").find("td.v_status").html(status_x);
							ob.parents("tr").find("td.v_action").html(action_x);
						}
						bootbox.alert({
							message : data.info,
							title : "提示信息"
						});

					}
				})
			})
		})
	</script>
</table>
<?php if(empty($apply)): ?><div class="image-tip-cry">暂无符合条件的简历</div><?php endif; ?>
<div class="page hidden">
	<?php echo ($page); ?>
</div>
<script>

	seajs.use(['$', 'form-ajax'], function ($) {
		//send Mail
		$(document).on('click','a.interview',function () {
			var ob = $(this);
			var id = ob.parents('tr.id').attr('data-id');
			var status = $(this).attr('data-status');
			$.ajax({
				url : "<?php echo U('Apply/interviewForm');?>",
				data : {id : id, status :status},
				success : function (data) {
					$("div.mail").html(data);
					$("#modal").modal("show");
					$(document).off("click", "button.js-btn-send");
					$(document).on('click', 'button.js-btn-send', function () {
						$(this).addClass("disabled ").text('处理中...');
						var ajaxFrom = $('#ajaxForm');
						$.ajax({
							url : "<?php echo U('Apply/sendMail');?>",
							data : ajaxFrom.serialize(),
							success : function (data) {
								if ( data.status > 0 ) {
									$("div#modal").modal("hide");
									bootbox.alert(data.info);
									var status_x = $("div.status_" + status).find("span.status-x").html();
									var action_x = $("div.status_" + status).find("span.action-x").html();
									ob.parents("tr").find("td.v_status").html(status_x);
									ob.parents("tr").find("td.v_action").html(action_x);

								}

							}
						})

					})
				}
			});

		})
	})
</script>
<!-- 面试邀请 Modal -->
<div class="mail">

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