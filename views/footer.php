<footer>
	
	<div class="div1" style="vertical-align: middle; width: 50%;">
		<?php foreach ($data1['cat'] as $cat){ ?>
		<a href="<?php echo mylink('category', $cat['id']); ?>" style="display: inline-block; padding: 10px;"><H1><?php echo $cat['name']; ?></H1></a>
		<?php } ?>
	</div>
	<div class="div1" style="vertical-align: middle;">
		<a href="/pr/index.php?route=information&information_id=1"> <H1 style="vertical-align: middle;">Контактная информация</H1></a>
	</div>
</footer>