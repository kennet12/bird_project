<div class="container">
	<h1 class="page-title"><?=$item->title?></h1>
	<div class="content">
		<? if(!empty($item->thumbnail)) { ?>
		<img src="<?=$item->thumbnail?>" class="img-responsive" alt="<?=$item->title?>"><br>
		<? } ?>
		<?=$item->content?>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>