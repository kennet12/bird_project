<div class="container">
	<h1 class="page-title"><?=$item->title?></h1>
	<div class="content">
		<? if(!empty($item->thumbnail)) { ?>
			<img src="<?=$item->thumbnail?>" class="img-responsive" alt="<?=$item->title?>" style="margin-bottom: 10px;">
		<? } ?>
		<?=$item->content?>
	</div>
	<div class="wrap-relative-item">
		<div class="relative-item-title">
			<h4>TIN LIÊN QUAN</h4>
		</div>
		<div class="box-relative-item">
			<? foreach ($relative_items as $relative_item) { ?>
			<a href="<?=site_url("thong-tin-chung/{$this->m_posts_categories->load($relative_item->category_id)->alias}/{$relative_item->alias}")?>">
				<div class="relative-item">
					<?=$relative_item->title ?>
				</div>
			</a>
			<? } ?>
		</div>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>