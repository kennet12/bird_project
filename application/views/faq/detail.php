<div class="container">
	<h1 class="page-title"><?=$item->name?></h1>
	<div class="content">
		<p class="help-block">Ngày đăng: <?=$this->util->to_vn_date($item->updated_date)?></p>
		<?=$faq_kq->content?>
	</div>
	<div class="wrap-relative-item">
		<div class="relative-item-title">
		<br/>
			<h4>TIN TỨC LIÊN QUAN</h4>
		</div>
		<div class="box-relative-item">
			<? foreach ($relative_items as $relative_item) { ?>
			<a href="<?=site_url("tin-tuc-su-kien/{$this->m_content_categories->load($relative_item->category_id)->alias}/{$relative_item->alias}")?>">
				<div class="relative-item">
					<?=$relative_item->title ?>
				</div>
			</a><br/>
			<? } ?>
			
		</div>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>