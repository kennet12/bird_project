<div class="container">
	<h1 class="page-title" style="color: #91BC24"><?=$item->title?></h1>
	<img src="<?=$item->thumbnail?>" class="img-responsive product-image" alt="<?=$item->title?>" style="margin-bottom: 10px;">
	<div class="price">Giá: <?=!empty($item->price) ? $item->price : 'Liên hệ'?></div>
	<strong>Nội dung: </strong>
	<div class="content">
		<?=$item->content?>
	</div>
	<div class="wrap-relative-item">
		<div class="relative-item-title">
			<h4>SẢN PHẨM LIÊN QUAN</h4>
		</div>
		<div class="box-relative-item">
			<div class="row">
				<? foreach ($relative_items as $relative_item) { ?>
				<div class="col-md-3">
					<div class="product-relative-item">
						<a href="<?=site_url("san-pham/{$this->m_product_categories->load($relative_item->category_id)->alias}/{$relative_item->alias}")?>">
							<img src="<?=!empty($relative_item->thumbnail) ? $relative_item->thumbnail : IMAGES_DEFAULT?>" alt="<?=$relative_item->title?>">
							<h6 class="limit-content-2-line transition"><?=$relative_item->title?></h6>
						</a>
					</div>
				</div>
				<? } ?>
			</div>
		</div>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>