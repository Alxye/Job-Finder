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


<h1 class="h1_tit" style="padding-top:20px">我的职业收藏</h1>
<style type="text/css">    .job-list .right {
    padding-right: 15px;
}

.job-list li {
    position: relative;
}

.job-list li .close-button {
    position: absolute;
    right: 5px;
    top: 5px;
}

.job-list li:last-child {
    border-bottom: none;
}
</style>
<div class="main">
    <div style="padding: 10px;">
        <h3 id="empty_tip" class="text-primary"
            style="text-align: center; margin: 160px 0; display:<?php if(!empty($job)): ?>none<?php endif; ?>;">暂无任何职位收藏</h3>
        <ul class="job-list">
            <?php if(is_array($job)): foreach($job as $key=>$job): ?><li id="<?php echo ($job["rand"]); ?>">
                    <div class="right"><strong>￥<?php echo ($job["payid"]); ?></strong></div>
                    <div class="wei-user-logo left imgLiquid_bgSize imgLiquid_ready"
                         style=" background-size: contain; background-position: 50% 50%; background-repeat: no-repeat;">
                        <a href="<?php echo U('Home/Company/item?comid='.$job['comid']);?>" target="_blank" title=""
                           style="display: block; width: 100%; height: 100%;">

                            <img src="/thinkphp/Public<?php echo ($job["logo"]); ?>" alt="Logo" style="display;">
                        </a>
                    </div>
                    <div class="job-title">
					<span class="text-muted small">
						[<a href="<?php echo U('Home/Job/item?jobid='.$job['id']);?>"><?php echo ($job["name"]); ?></a>]
                    </span>
                        <a href="<?php echo U('Home/Job/item?jobid='.$job['id']);?>" target="_blank" title="<?php echo ($job["title"]); ?>"><?php echo ($job["title"]); ?></a>
                    </div>
                    <p>
					<span>
						<a class="muted" href="<?php echo U('Home/Company/item?comid='.$job['comid']);?>" target="_blank"
                           title="<?php echo ($job["cname"]); ?>"><?php echo ($job["cname"]); ?></a>
					</span>
                        <span class="text-muted">更新于：<?php echo ($job["edittime"]); ?></span>
                        <span class="text-muted"><?php echo ($job["workyear"]); ?>工作经验</span>
                        <span class="text-muted"><?php echo ($job["edu"]); ?></span>
                    </p>

                    <div class="close-button">
                        <a href="javascript:;" data-job-id="" onclick="delItem(<?php echo ($job["id"]); ?>,<?php echo ($job["rand"]); ?>)"><i
                                class="icon icon-remove"></i></a>
                    </div>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>

<h1 class="h1_tit" style="padding-top:20px">我的企业收藏</h1>
<div class="main">
    <div style="padding: 10px;">
        <h3 id="empty_tip" class="text-primary"
            style="text-align: center; margin: 160px 0; display:<?php if(!empty($company)): ?>none<?php endif; ?>;">暂无任何企业收藏</h3>
        <ul class="job-list">
            <?php if(is_array($company)): foreach($company as $key=>$company): ?><li id="<?php echo ($company["rand"]); ?>">
                    <div class="wei-user-logo left imgLiquid_bgSize imgLiquid_ready"
                         style=" background-size: contain; background-position: 50% 50%; background-repeat: no-repeat;">
                        <a href="<?php echo U('Home/Company/item?comid='.$company['comid']);?>" target="_blank" title=""
                           style="display: block; width: 100%; height: 100%;">

                            <img src="/thinkphp/Public<?php echo ($company["logo"]); ?>" alt="Logo" style="">
                        </a>
                    </div>
                    <div class="company-title">
      <span class="text-muted small">
         [<a href="<?php echo U('Home/Company/item?companyid='.$company['id']);?>"><?php echo ($company["name"]); ?></a>]
                 </span>
                        <a href="<?php echo U('Home/Company/item?companyid='.$company['id']);?>" target="_blank"
                           title="<?php echo ($company["title"]); ?>"><?php echo ($company["cname"]); ?></a>
                    </div>
                    <p>
                        <span class="text-muted">所在城市：<?php echo ($company["city"]); ?></span>
                        <span class="text-muted">所在行业：<?php echo ($company["industryid"]); ?></span>
                    </p>

                    <div class="close-button">
                        <a href="javascript:;" data-company-id="" onclick="delItem(<?php echo ($company["id"]); ?>,<?php echo ($company["rand"]); ?>)"><i
                                class="icon icon-remove"></i></a>
                    </div>
                </li><?php endforeach; endif; ?>


        </ul>
    </div>
</div>

<script type="text/javascript">
    function delItem($item_id, $rand) {
        bootbox.confirm('确定要取消收藏?', function (res) {
            if (res == true) {
                $.ajax({
                    url: "<?php echo U('User/Favorite/deleteItem');?>",
                    data: 'jid=' + $item_id,
                    type: 'post',
                    success: function (data) {
                        if (data) {
                            $('#' + $rand).hide();
                        } else {
                            bootbox.alert('请求失败,请稍后再试');
                        }
                    }
                });
            }
        });

    }
</script>
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>