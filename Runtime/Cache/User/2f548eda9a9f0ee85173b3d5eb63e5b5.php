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
			
	<link rel="stylesheet" type="text/css" href="/Public/Css/Common/bootstrap-switch.min.css">
	<div class="wei-user-admin-title-bar">
		<div class="container-nav-tabs-2">
			<ul class="nav nav-tabs-2" role="tablist">
				<li <?php if(empty($_GET['status'])): ?>class='active'<?php endif; ?>> <a href="<?php echo U('Job/index');?>">全部职位</a></li>
				<li <?php if(($_GET['status']) == "1"): ?>class='active'<?php endif; ?>><a href="<?php echo U('Job/index?status=1');?>">正在热招</a></li>
				<li <?php if(($_GET['status']) == "2"): ?>class='active'<?php endif; ?>><a href="<?php echo U('Job/index?status=2');?>">已关闭职位</a></li>
			</ul>
		</div>
		<div class="btn-toolbar btn-toolbar-inline">
			<div class="btn-group">
				<a href="<?php echo U('Job/add');?>" class="btn btn-primary">发布职位</a>
			</div>
		</div>
	</div>
	<table class="table table-hover table-striped">
		<thead>
		<tr>
			<th style="width:160px;">职位名称</th>
			<th style="width:80px;">招聘</th>
			<th style="width:80px;">申请</th>
			<th style="width:160px;">发布时间</th>
			<th style="width:160px;">刷新时间</th>
			<th style="width:70px;">状态</th>
			<th style="width:180px;">操作</th>
		</tr>
		</thead>
		</tbody>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr >
				<td>
					<a class="text-primary" href="<?php echo U('Home/Job/item?jobid='.$v['id']);?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["name"]); ?></a>
				</td>
				<td><?php echo ($v["num"]); ?>人</td>
				<td><?php echo ($v["apply"]); ?>人</td>
				<td><?php echo date('Y-m-d H:i',$v['addtime']);?></td>
				<td class="refresh_time"><?php echo tranTime($v['edittime']);?></td>
				<td>
					<input name="switch" type="checkbox" data-size="small" data-on-text="开启" data-off-text="关闭" data-on-color="success" data-off-color="danger"
					<?php if(($v["status"]) == "1"): ?>checked<?php endif; ?> data-id="<?php echo ($v["id"]); ?>">
				</td>
				<td style="white-space:nowrap;">
					<a href="<?php echo U('Apply/index?jid='.$v['id']);?>" class="btn btn-default">
						<i class="fa fa-file-text"></i>
						简历
					</a>
					<a href="javascript:void(0);" class="btn btn-default flush <?php if(($v["status"]) == "2"): ?>disabled<?php endif; ?>" data-url="<?php echo U('Job/flush?id='.$v['id']);?>">
						<i class="fa fa-refresh"></i>
						刷新</a>
					<a href="<?php echo U('Job/edit?id='.$v['id']);?>" class="btn btn-default">
						<i class="fa fa-pencil"></i>
						编辑
					</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<?php if(empty($list)): ?><h3 class="text-center min-height-300" style="margin-top: 100px;">
			您尚未发布职位&nbsp;<a class="text-primary" href="<?php echo U('Job/add');?>">立即发布</a>
		</h3><?php endif; ?>
	<div class="page hidden">
		<?php echo ($show); ?>
	</div>
	<script>
		seajs.use(['$','bootstrap-switch'],function($){
			$("[name='switch']").bootstrapSwitch().on('switchChange', function(e, data) {
				var id = $(this).attr('data-id');
				var status = data.value ? 1 : 2;
				if(data.value){
					$(this).parents('tr').find("a.flush").removeClass('disabled');
				}else{
					$(this).parents('tr').find("a.flush").addClass('disabled');
				}
				$.ajax({
					url:"<?php echo U('Job/update');?>",
					data:{status:status ,id:id},
					type:'post',
					success:function(data){
						if(!data.status){
							alert(data.info);
						}
					}
				})
			});
			$("a.flush").click(function(){
				var ob = $(this);
				if(!ob.hasClass("disabled")){
					if ( confirm("确定要刷新职位吗？") ) {
						$.ajax({
							url : ob.attr("data-url"),
							success : function (data) {
								bootbox.alert({
									message : data.info,
									title : "提示信息"
								});
								return false;
							}
						})
					}
				}
			});
		})
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