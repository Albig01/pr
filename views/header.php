<header>
	<div class="div1" style="width: 10%;">
		<img src="<?php echo $$_SERVER['DOCUMENT_ROOT'] . 'image/digitaslbi-logo.png';?> " width="100" height="100">
	</div>
	<div class="div1" style="width: 10%;">
		<a href="<?php echo $$_SERVER['DOCUMENT_ROOT'] . '/pr';?>"> <H1 style="vertical-align: middle;">Home</H1></a>
	</div>
	<div class="div1" style="vertical-align: middle; width: 50%;">
		<?php foreach ($data1['cat'] as $cat){ ?>
		<a href="<?php echo mylink('category', $cat['id']); ?>" style="display: inline-block; padding: 10px;"><H1><?php echo $cat['name']; ?></H1></a>
		<?php } ?>
	</div>
	<div class="div1" style="vertical-align: middle;">
		<a href="/pr/index.php?route=information&information_id=3"> <H1 style="vertical-align: middle;">Информация о нас</H1></a>
	</div>
</header>