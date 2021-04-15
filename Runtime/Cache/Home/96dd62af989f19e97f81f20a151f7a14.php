<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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
<div class="container">
	<div class="row">
		<div class="col-md-9" role="main">
			<div class="row job-section">
				<div class="job-section-nav"><span>找到&nbsp;<span class="cOrange"><?php echo ($count); ?></span>&nbsp;个相关企业</span></div>
				<script type="text/javascript">
					function Filter(a,b){
						var $ = function(e){return document.getElementById(e);}
						var ipts = $('filterForm').getElementsByTagName('input'),result=[];
						for(var i=0,l=ipts.length;i<l;i++){
							if(ipts[i].getAttribute('to')=='filter'){
								result.push(ipts[i]);
							}
						}
						if($(a)){
							$(a).value = b;
							for(var j=0,len=result.length;j<len;j++){
								if(result[j].value==''){
									result[j].parentNode.removeChild(result[j]);
								}
							}
							document.forms['filterForm'].submit();
						}
						return false;
					}
				</script>
				<form id="filterForm" action="<?php echo U('Home/Company/index');?>" method="GET">
					<input to="filter" type="hidden" id="nowcid" name="nowcid" value="<?php echo ($nowcid); ?>" />
					<input to="filter" type="hidden" id="industryid" name="industryid" value="<?php echo ($industryid); ?>" />
					<input to="filter" type="hidden" id="sizeid" name="sizeid" value="<?php echo ($sizeid); ?>" />
					<input to="filter" type="hidden" id="attrid" name="attrid" value="<?php echo ($attrid); ?>" />
					<input to="filter" type="hidden" id="orderid" name="orderid" value="<?php echo ($orderid); ?>" />
				</form>
				<div class="job-section-body">
					<!--分类搜索 start=============-->
					<div class="job_search"><!-- 按城市搜索 -->
						<dl class="page_sort">
							<dt>城市</dt>
							<dd <?php if(empty($nowcid)): ?>class='on'<?php endif; ?>><a href="javascript:Filter('nowcid',0);">全部</a></dd>
							<?php if(is_array($citylist)): foreach($citylist as $key=>$v): ?><dd <?php if(($nowcid) == $v["id"]): ?>class='on'<?php endif; ?>>
								<a href="javascript:Filter('nowcid','<?php echo ($v["id"]); ?>');"><?php echo ($v["name"]); ?></a></dd><?php endforeach; endif; ?>
						</dl>
						<!-- 按行业搜索 -->
						<dl class="page_sort">
							<dt>行业</dt>
							<dd <?php if(empty($industryid)): ?>class='on'<?php endif; ?>><a href="javascript:Filter('industryid',0);">全部</a></dd>
							<!-- 遍历输出所有行业标签 -->
							<?php if(is_array($trade)): foreach($trade as $key=>$v): ?><dd <?php if(($industryid) == $v["id"]): ?>class='on'<?php endif; ?>>
								<a href="javascript:Filter('industryid','<?php echo ($v["id"]); ?>');"><?php echo ($v["tagname"]); ?></a></dd><?php endforeach; endif; ?>
						</dl>
						<!-- 按规模搜索 -->
						<dl class="page_sort">
							<dt>规模</dt>
							<dd <?php if(empty($sizeid)): ?>class='on'<?php endif; ?>><a href="javascript:Filter('sizeid',0);">全部</a></dd>
							<?php if(is_array($size)): foreach($size as $key=>$v): ?><dd <?php if(($sizeid) == $v["id"]): ?>class='on'<?php endif; ?>>
									<a href="javascript:Filter('sizeid','<?php echo ($v["id"]); ?>');" ><?php echo ($v["tagname"]); ?></a></dd><?php endforeach; endif; ?>
						</dl>
						<!-- 按性质搜索 -->
						<dl class="page_sort">
							<dt>性质</dt>
							<dd <?php if(empty($attrid)): ?>class='on'<?php endif; ?>><a href="javascript:Filter('attrid',0);">全部</a></dd>
							<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><dd <?php if(($attrid) == $v["id"]): ?>class='on'<?php endif; ?>>
									<a href="javascript:Filter('attrid','<?php echo ($v["id"]); ?>');" ><?php echo ($v["tagname"]); ?></a></dd><?php endforeach; endif; ?>
						</dl>
					</div>
					<!--分类搜索 end=============-->
					<div class="sortbar"><span class="right">共&nbsp;<span class="cOrange"><?php echo ($count); ?></span>&nbsp;个靠谱企业</span>
						<ul class="sortbar_btns">
							<li>
							<a href="javascript:Filter('orderid','id_desc');">
								最新<span class="ico_sortbar_btns
					<?php if(($orderid) == "id_desc"): ?>ico_sortbar_btns_btm2<?php else: ?>ico_sortbar_btns_btm1<?php endif; ?>"></span></a></li>
							<li>
								<a href="javascript:Filter('orderid','level_desc');">
									热门<span class="ico_sortbar_btns
					<?php if(($orderid) == "level_desc"): ?>ico_sortbar_btns_btm2<?php else: ?>ico_sortbar_btns_btm1<?php endif; ?>"></span></a></li>
							<li>
								<a href="javascript:Filter('orderid','sizeid_desc');">规模
					<span class="ico_sortbar_btns
					<?php if(($orderid) == "sizeid_desc"): ?>ico_sortbar_btns_btm2<?php else: ?>ico_sortbar_btns_btm1<?php endif; ?>""></span></a></li>
						</ul>
					</div>
					<style>
						.wei-user-list .wei-user-logo img {
							width: 88px;
							height: 88px;
						}
					</style>
					<ul class="wei-user-list">
						<?php if(is_array($company)): foreach($company as $key=>$vo): ?><li style="position: relative;">
								<div class="wei-user-logo left">
									<a href="<?php echo U('Company/item');?>?comid=<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["cname"]); ?>">
										<img src="/Public<?php echo ($vo["logo"]); ?>" alt="<?php echo ($vo["cname"]); ?>Logo"/>
									</a>
								</div>
								<p style="font-size: 14px;margin-bottom: 3px;"><a href="<?php echo U('Company/item');?>?comid=<?php echo ($vo["id"]); ?>" target="_blank" title="NASDAQ:JRJC"><?php echo ($vo["cname"]); ?></a></p>

								<p class="text-muted" style="margin-bottom: 3px; color:#999999;">
									<span><?php echo ($vo["one"]); ?></span>
								</p>

								<p class="text-muted" style="margin-bottom: 3px;color:#999999;">
									<span>所在城市：<?php echo ($vo["nowcid"]); ?></span>
									<span style="">公司性质：<?php echo ($vo["attrid"]); ?></span>
									<span>公司规模：<?php echo ($vo["sizeid"]); ?></span>
									<span>所在行业：<?php echo ($vo["industryid"]); ?></span>
								</p>

								<p style="margin-bottom: 3px;">
									<?php if(is_array($vo["job"])): foreach($vo["job"] as $key=>$j): ?><span>
											<a href="<?php echo U('Job/item');?>?jobid=<?php echo ($j["id"]); ?>" target="_blank"><?php echo ($j["name"]); ?></a>
										</span><?php endforeach; endif; ?>
								</p>
							</li><?php endforeach; endif; ?>
					</ul>
					<?php if(empty($company)): ?><div class="empty_search_tip" style="text-align: center">
							<img src="/Public/images/no_job.png"><span>暂时没找到相关企业</span></div><?php endif; ?>
					<!--分页 start-->
					<div class="pages"><?php echo ($page); ?></div>
					<!--分页 end-->
				</div>
				<!--分类搜索 end=============-->
			</div>
		</div>
		<div class="col-md-3">
			<!--热门企业 start-->
			<?php echo W('Common/Public/hotcompany');?>
			<!--热门企业 end-->
		</div>
	</div>
</div>
<!--main end=============主体-->
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>