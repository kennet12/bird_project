<div class="container">
	<div class=" faq">
		<h1 class="page-title">HỎI - ĐÁP</h1>
		<div class="list-warpper">
			<? foreach ($items as $item) { ?>
			<div class="item">
				<div class="left-faq">
					<img src="<?=!empty($this->m_user->load($item->updated_by)->avatar) ? $this->m_user->load($item->updated_by)->avatar : USER_DEFAULT?>" alt="">
				</div>
				<div class="right-faq">
					<a href="<?=site_url("hoi-dap/{$this->m_faq_categories->load($item->category_id)->alias}/{$item->alias_question}")?>" class="limit-content-1-line transition"><?=$item->question?></a>
					<p class="help-block"><?=$this->util->to_vn_date($item->updated_date)?></p>
					<p class="limit-content-2-line transition text-justify"><?=strip_tags($item->content)?></p>
				</div>
			</div>
			<? } ?>
		</div>
		<div class="text-center"><?=$pagination?></div>
	</div>
</div>