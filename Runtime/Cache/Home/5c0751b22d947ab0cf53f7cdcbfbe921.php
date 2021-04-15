<?php if (!defined('THINK_PATH')) exit();?><style>
	.wei-user-logo-hot img {
		width: 88px;
		height: 88px;
	}
</style>
<div class="box">
	<div class="box-title">热招企业</div>
	<ul class="box-hot-wei-user">
		<?php if(is_array($hotcompany)): foreach($hotcompany as $key=>$vo): ?><li class="wei-user-logo wei-user-logo-hot">
			<a href="<?php echo U('Company/item');?>?comid=<?php echo ($vo["id"]); ?>" target="_blank" title="<?php echo ($vo["cname"]); ?>">
				<img src="/Public<?php echo ($vo["logo"]); ?>" alt="<?php echo ($vo["cname"]); ?>"/>
			</a>
		</li><?php endforeach; endif; ?>
	</ul>
</div>