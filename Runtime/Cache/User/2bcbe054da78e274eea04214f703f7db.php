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
<style type="text/css">    #update_profile_form .form-group:last-child {
	margin-bottom: 0px;
}
#upload_logo_form .form-group:first-child {
	margin-bottom: 20px;
}
#logo {
	position: relative;
}
#logo a {
	position: absolute;
	bottom: 0;
	left: 200px;
}
#logo_img {
	width: 180px;
	height: 180px;
}
#logo-edit-btn {
	width: 180px;
	height: 30px;
	line-height: 30px;
	color: #FFF;
	text-align: center;
	background-color: rgba(0, 0, 0, 0.3);
	position: absolute;
	left: 0;
	bottom: 0;
	cursor: pointer;
}
#logo_select {
	text-align: center;
}
#logo_select h1 {
	margin: 0 0 0 30px;
	text-align: left;
}
#logo_select > div {
	padding: 10px 30px;
}
#logo_select img {
	width: 310px;
}
#logo_select .preview_face {
	float: left;
	position: relative;
	width: 180px;
	height: 180px;
	overflow: hidden;
	margin-left: 10px;
}
</style>
<div class="wei-user-admin-title-bar">
	<div class="container-nav-tabs-2">
		<ul class="nav nav-tabs-2" role="tablist">
			<li class="active"><a href="javascript:void(0)">企业信息</a></li>
		</ul>
	</div>
</div>
<form class="form-horizontal" id="basic_form" method="post" action="<?php echo U('company/update');?>" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="name"><span>*</span>&nbsp;企业名称</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" id="name" name="cname" value="<?php echo ($data["cname"]); ?>" placeholder="与营业执照一致的企业全名">
		</div>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label" for="city_id"><span>*</span>&nbsp;所在城市</label>

		<div class="col-sm-5">
			<select class="form-control" name="nowcid" id="city_id" >
				<?php if(is_array($city)): foreach($city as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["nowcid"]) == $v["id"]): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
		</select></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="address">详细地址</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" id="address" name="address" value="<?php echo ($data["address"]); ?>" placeholder="详细地址">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="size"><span>*</span>&nbsp;企业规模</label>
		<div class="col-sm-5">
			<select class="form-control" name="sizeid" id="size">
			<?php if(is_array($size)): foreach($size as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["sizeid"]) == $v["id"]): ?>selected<?php endif; ?> ><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
		</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" ><span>*</span>&nbsp;公司性质</label>
		<div class="col-sm-5">
			<select class="form-control" name="attrid" >
			<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["attrid"]) == $v["id"]): ?>selected<?php endif; ?> ><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="industry_id"><span>*</span>&nbsp;所属行业</label>
		<div class="col-sm-5">
			<select class="form-control" name="industryid" id="industry_id">
			<?php if(is_array($industry)): foreach($industry as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($data["industryid"]) == $v["id"]): ?>selected<?php endif; ?> ><?php echo ($v["tagname"]); ?></option><?php endforeach; endif; ?>
		</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="abstract"><span>*</span>&nbsp;一句话亮点介绍</label>
		<div class="col-sm-7">
			<input class="form-control" type="text" id="abstract" name="one" value="<?php echo ($data["one"]); ?>" placeholder="如：团队优势、福利待遇、办公环境等">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="description"><span>*</span>&nbsp;企业介绍</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="6" id="description" name="description" placeholder=""><?php echo ($data["description"]); ?></textarea>
			<span class="help-block">
				介绍文案
			</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="website">企业网站</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" id="website" name="website" value="<?php echo ($data["website"]); ?>" placeholder="公司网站或公司官方微博地址">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="contact_name"><span>*</span>&nbsp;联系人</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" id="contact_name" name="contact" value="<?php echo ($data["contact"]); ?>" placeholder="联系人姓名">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="contact_phone"><span>*</span>&nbsp;联系方式</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" id="contact_phone" name="phone" value="<?php echo ($data["phone"]); ?>" placeholder="手机或座机">
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button id="submit-btn" type="submit" class="btn btn-lg btn-highlight btn-min-width-100" >保存</button>
			&nbsp;
		</div>
	</div>
</form>
<script>
	seajs.use(['$', 'form-ajax','bootstrap3.0','bootbox'], function ($) {

		$('button.cancel').click(function(){
			$('#origin_face_img').imgAreaSelect({
				remove : true
			});
			$('#origin_face_img + div').remove();
			$("#logo_select").modal("hide");
		})

		$("button#submit-btn").click(function(){
				var ajaxFrom = $('#basic_form');
				$.ajax({
					url:ajaxFrom.attr('action'),
					type:ajaxFrom.attr('method'),
					data:ajaxFrom.serialize(),
					success:function(data){
						bootbox.alert({
							message:data.info,
							title: "提示信息"
						});
						return false;
					}
				})
				return false;
		});
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