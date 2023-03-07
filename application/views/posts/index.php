<? $method = $this->router->fetch_class();?>
<div class="container">
	<ul class="nav nav-pills active-category-list">
		<li role="presentation" <?=empty($category) ? 'class="active-category"' : '' ?>><a href="<?=site_url("thong-tin-chung")?>">Tất cả</a></li>
		<? foreach ($categories as $categorie) { ?>
		<li role="presentation" <?=($category == $categorie->alias) ? 'class="active-category"' : '' ?>><a href="<?=site_url("thong-tin-chung/{$categorie->alias}")?>"><?=$categorie->name?></a></li>
		<? } ?>
	</ul>
	<div class="list-warpper">
		<? foreach ($items as $item) { ?>
			<div class="item">
				<div class="left-item">
					<a href="<?=site_url("thong-tin-chung/{$this->m_posts_categories->load($item->category_id)->alias}/{$item->alias}")?>" title="">
						<img src="<?=!empty($item->thumbnail) ? $item->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive transition" alt="<?=$item->title?>">
					</a>
				</div>
				<div class="right-item">
					<a href="<?=site_url("thong-tin-chung/{$this->m_posts_categories->load($item->category_id)->alias}/{$item->alias}")?>"><h5 class="limit-content-2-line transition"><?=$item->title?></h5></a>
					<p class="help-block"><?=$this->util->to_vn_date($item->updated_date)?></p>
					<p class="limit-content-3-line text-justify"><?=strip_tags($item->content)?></p>
				</div>
			</div>
		<? } ?>
	</div>
	<div class="text-center"><?=$pagination?></div>
</div>