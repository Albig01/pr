<div class="cont">
	<?php foreach($data['news'] as $news){ ?>
	<div>
		<h3><?php echo $news['sh_des']; ?></h3>
		<br>
		<img src="<?php echo $news['image']; ?>">
		<br>
		<p><?php echo $news['text']; ?></p>
	</div>
	<?php } ?>
</div>
