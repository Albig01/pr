<?php //echo getHeader($data['title']); ?>
<div>
	<?php foreach($data as $key => $val){ ?>
		<p><?php echo mb_strtoupper($key, 'UTF8'); ?></p><br>
		<?php foreach($val as $news){ ?>
	<div><a href = "<?php echo $news['link']; ?>"><?php echo $news['sh_des']; ?></a></div>
	<?php }} ?>
</div>