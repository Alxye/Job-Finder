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


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo U('Company/index');?>" class="text-label small">全部企业</a></li>
            <li class="active small"><a href="<?php echo U('Company/index');?>" class="text-label small"></a><?php echo ($comitem['industryid']); ?>
            </li>
            <li class="active small">企业详细信息</li>
        </ol>
    </div>
    <style>
        .wei-user-logo {
            border: 1px solid #fff;
        }
    </style>
    <div class="row wei-user-heading">
        <div class="col-sm-2 wei-user-logo"><img class="img-border" src="/Public<?php echo ($comitem['logo']); ?>"
                                                 alt="<?php echo ($comitem['cname']); ?>Logo"></div>
        <div class="col-sm-10"><h3 class="title ellipsis"><?php echo ($comitem['cname']); ?></h3>
            <p class="abstract text-label ellipsis"><?php echo ($comitem['one']); ?></p>
        </div>


        <div class="col-sm-15">

            <a class="btn btn-lg btn-default" id="oncollect" href="javascript:void(0);">
                <i id="collectpic" class="
							<?php if(empty($collect)): ?>fa fa-star-o text-highlight
							<?php else: ?>
								fa text-highlight fa-star<?php endif; ?>
							">
                </i>
            </a>

            <script type="text/javascript">
                seajs.use(['$', 'bootbox'], function ($) {

                    var uid = "<?php echo ($_SESSION['user']['id']); ?>";
                    var jid = "<?php echo ($comitem["id"]); ?>";

                    $("#oncollect").click(function () {
                        //先判断是否登录
                        if (uid > 0) {
                            //判断是否收藏
                            $.ajax({
                                type: "post",
                                url: "<?php echo U('collect');?>",
                                dataType: "html",
                                data: {'uid': uid, 'comid': jid},
                                success: function (data) {
                                    if(data==4){
                                        alert("企业帐户，不能收藏职位！");
                                    }else if ( data == 1 ) {
                                        alert("收藏成功！");
                                        //清空原先的文字信息
                                        $("#collect").empty();
                                        //设置显示提示信息
                                        $("#collect").attr({style : "width:100px;display:block;position: absolute; top: 50px;"}).html("");
                                        $("#collectpic").attr({class : "fa text-highlight fa-star"});
                                        setTimeout(function () {
                                            $("#collect").attr({style : "width:100px;display:none;position: absolute; top: 50px;"}).html("");
                                        }, 1500);
                                    } else if ( data == 3 ) {
                                        alert("取消收藏成功！");
                                        $("#collect").empty();
                                        //设置显示提示信息
                                        $("#collect").attr({style : "width:100px;display:block;position: absolute; top: 50px;"}).html("");
                                        $("#collectpic").attr({class : "fa fa-star-o text-highlight"});
                                        setTimeout(function () {
                                            $("#collect").attr({style : "width:100px;display:none;position: absolute; top: 50px;"}).html("");
                                        }, 1500);
                                    } else {
                                        alert("收藏失败！");
                                        //清空原先的文字信息
                                        $("#collect").empty();
                                        //设置显示提示信息
                                        $("#collect").attr({style : "width:100px;display:block;position: absolute; top: 50px;"}).html("");
                                        $("#collectpic").attr({class : "fa fa-star-o text-highlight"});
                                        setTimeout(function () {
                                            $("#collect").attr({style : "width:100px;display:none;position: absolute; top: 50px;"}).html("");
                                        }, 1500);
                                    }
                                }
                            });
                        } else {
                            bootbox.confirm('您还未登录，请登录后再收藏', function (result) {
                                if (result) {
                                    window.location.href = "<?php echo U('Home/Login/login');?>";
                                    return false;
                                }
                            });
                        }
                    })

                });
            </script>
            <label class="text text-primary" id="collect"
                   style="width:100px;display:none;position: absolute; top: 50px;">收藏成功</label>

        </div>

    </div>

</div>
<div class="container-fluid container-nav-tabs-2">
    <div class="container">
        <ul class="nav nav-tabs-2" role="tablist">
            <li class="active"><a href="#introduction">企业主页</a></li>
            <li><a href="#job_list">全部职位</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-9 col-2-left">
            <div id="introduction"><h4>
                企业介绍
            </h4>

                <p class="fat-line"><?php echo ($comitem['description']); ?></p>
                <hr/>
            </div>
            <div id="job_list">
                <?php if(empty($jobother)): ?><h4>本公司其他职位</h4>
                    <br>
                    <p class="text-primary text-center js-comment-empty">暂未发布职位</p>
                    <?php else: ?>
                    <h4>全部职位</h4>
                    <ul class="job-list-simple">
                        <?php if(is_array($jobother)): foreach($jobother as $key=>$vo): ?><li class="job-item">
                                <a href="<?php echo U('Home/Job/item?jobid='.$vo['id']);?>">
                                    <span class="text-highlight salary">￥<?php echo ($vo["payid"]); ?></span>
                                    <span class="title"><?php echo ($vo["name"]); ?></span>
                                    <p class="text-label"><?php echo ($vo["year"]); ?>工作经验&nbsp;
                                        <?php echo ($vo["eid"]); ?>学历</p></a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <hr/><?php endif; ?>
            </div>
        </div>
        <div class="col-xs-3 col-2-right">
            <div class="panel panel-simple">
                <br>
                <br>
                <div class="panel-heading"><h4>
                    企业信息
                </h4></div>
                <div class="panel-body">
                    <p>
                        <i class="fa fa-fixed-size fa-home"></i>&nbsp;
                        <span class="text-label"><?php echo ($comitem['cname']); ?></span>
                    </p>

                    <p>
                        <i class="fa fa-fixed-size fa-tags"></i>&nbsp;
                        <span class="text-label">
                            <?php echo ($comitem['sizeid']); ?>&nbsp;
                            <?php echo ($comitem['attrid']); ?>&nbsp;
                            <?php echo ($comitem['industryid']); ?></span>
                    </p>

                    <p>
                        <i class="fa fa-fixed-size fa-link"></i>&nbsp;
                        <a class="text-primary" href="" target="_blank" rel="nofollow"><?php echo ($comitem['website']); ?></a>
                    </p>

                    <p>
                        <i class="fa fa-fixed-size fa-map-marker"></i>&nbsp;
                        <span class="text-label"><?php echo ($comitem['address']); ?></span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <!--热门企业 start-->
                
                <!--热门企业 end-->
            </div>
        </div>
    </div>
</div>
<hr/>
<!--footer start=============底部-->
<?php echo W('Common/Public/footer');?>
<!--footer end=============底部-->
<script>
	seajs.use(['common']);
</script>
</body>
</html>