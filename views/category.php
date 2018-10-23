
<p><?php echo mb_strtoupper($data['title'], 'UTF8'); ?></p>
<div>
	<?php foreach($data['news'] as $news){ ?>
	<div><a href = "<?php echo $news['link']; ?>"><?php echo $news['sh_des']; ?></a></div>
	<?php } ?>
</div>
