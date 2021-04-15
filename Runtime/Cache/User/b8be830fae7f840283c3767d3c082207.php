<?php if (!defined('THINK_PATH')) exit();?><div class="footer">
	<div class="info">
		<div class="logo">
			<p>©2020&nbsp;zxx-job.com&nbsp;All Rights Reserved</p>
			<p>ICP备00000000号 | 000-123456789</p>
		</div>
		<div class="link">
			<a>Create By Zhao Xixi</a>
		</div>
		<div class="contact">
			<label>联系我</label>
			<br><br>
			<label>邮箱：944652593zxx@gmail.com</label>
		</div>
	</div>
	<hr/>
	<div class="friend">
		<?php if(is_array($links)): foreach($links as $key=>$v): ?><a href="<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><?php endforeach; endif; ?>
	</div>
</div>