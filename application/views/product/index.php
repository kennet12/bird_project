<div class="container">
	<div class=" product-index-page">
		<h1 class="page-title">SẢN PHẨM</h1>
		<ul class="nav nav-pills active-category-list">
			<li role="presentation" <?=empty($category) ? 'class="active-category"' : '' ?>><a href="<?=site_url("san-pham")?>">Tất cả</a></li>
			<? foreach ($categories as $categorie) { ?>
			<li role="presentation" <?=($category == $categorie->alias) ? 'class="active-category"' : '' ?>><a href="<?=site_url("san-pham/{$categorie->alias}")?>"><?=$categorie->name?></a></li>
			<? } ?>
		</ul>
		<? $i=0; foreach ($items as $item) { ?>
		<div class="product-item">
			<div class="img">
				<a href="<?=site_url("san-pham/{$categorie->alias}/{$item->alias}")?>"><img src="<?=$item->thumbnail?>" alt=""></a>
			</div>
			<div class="caption <?=($i%2==0) ? 'right' : 'left'?>">
				<a href="<?=site_url("san-pham/{$categorie->alias}/{$item->alias}")?>"><h5 class="transition"><?=$item->title?></h5></a>
				<p><?=character_limiter(strip_tags($item->content), 150)?></p>
			</div>
		</div>
		<? $i++; } ?>
		<!-- <div class="row">
			<? foreach ($items as $item) { ?>
			<div class="col-md-3">
				<div class="product-item transition">
					<a href="<?=site_url("san-pham/{$this->m_product_categories->load($item->category_id)->alias}/{$item->alias}")?>" title="<?=$item->title?>">
						<img src="<?=!empty($item->thumbnail) ? $item->thumbnail : IMAGES_DEFAULT ?>" class="transition" alt="<?=$item->title?>">
						<div class="product-info">
							<h5 class="limit-content-2-line transition"><?=$item->title?></h5>
							<p class="price">Giá: <?=!empty($item->price) ? $item->price : 'Liên hệ'?></p>
							<p class="limit-content-2-line text-justify"><?=strip_tags($item->content)?></p>
						</div>
					</a>
				</div>
			</div>
			<? } ?>
		</div> -->
		<div class="text-center"><?=$pagination?></div>
	</div>
</div>
