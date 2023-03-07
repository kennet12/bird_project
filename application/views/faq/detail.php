<div class="container">
	<div class="faq">
		<h1 class="page-title"><?=$item->question?></h1>
		<p class="help-block" style="margin-top: 0">Ngày đăng: <?=$this->util->to_vn_date($item->updated_date)?></p>
		<strong>Trả lời: </strong>
		<div class="content"><?=$item->content?></div>
		<div class="wrap-relative-item">
			<div class="relative-item-title">
				<h4>HỎI ĐÁP KHÁC</h4>
			</div>
			<div class="box-relative-item">
				<? foreach ($relative_items as $relative_item) { ?>
				<a href="<?=site_url("hoi-dap/{$this->m_faq_categories->load($relative_item->category_id)->alias}/{$relative_item->alias_question}")?>">
					<div class="relative-item">
						<?=$relative_item->question ?>
					</div>
				</a>
				<? } ?>
			</div>
		</div>
		<? require_once(APPPATH."views/module/addthis.php"); ?>
	</div>
</div>