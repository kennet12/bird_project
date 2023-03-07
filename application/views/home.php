<? require_once(APPPATH."views/module/slider.php"); ?>
<div class="cluster cluster-about ">
	<div class="container">
		<div class="row">
			<div class="col-md-6 wow bounceInLeft">
				<h2 class="">ĐÔI NÉT VỀ <span style="color: #00BCD4">MEKONG FISHMEAL</span></h2>
				<div style="text-align: justify;">
					<?=character_limiter(strip_tags($about->content), 1300)?>
				</div><br>
				<a href="<?=site_url('gioi-thieu')?>" class="btn btn-info">Xem thêm</a>
			</div>
			<div class="col-md-6 wow bounceInRight">
				<div class="images-about">
					<img style="margin-top: 25px;height: 320px;width: 100%;object-fit: contain;" src="<?=$about->thumbnail?>" class="img-responsive" alt="gioi-thieu">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cluster cluster-product">
	<div class="container">
		<div class="title">
			<h3>SẢN PHẨM CÔNG TY</h3>
			<!-- <div class="separator"></div> -->
		</div>
		<div class="row">
			<? $c_product = count($products);
			for ($i=0; $i < $c_product; $i++) { ?>
			<div class="col-md-3">
				<div class="item transition wow jello">
					<a href="<?=site_url("san-pham/{$this->m_product_categories->load($products[$i]->category_id)->alias}/{$products[$i]->alias}")?>" alt="<?=$products[$i]->title?>">
						<img src="<?=!empty($products[$i]->thumbnail) ? $products[$i]->thumbnail : IMAGES_DEFAULT?>" class="img-responsive transition" alt="<?=$products[$i]->title?>">
					<h4 class="limit-content-2-line transition "><?=$products[$i]->title?></h4>
					<p class="price">Giá: <?=!empty($products[$i]->price) ? $products[$i]->price : 'Liên hệ'?></p>
					<p class="limit-content-2-line text-justify"><?=strip_tags($products[$i]->content);?></p>
					</a>
				</div>
			</div>
			<? } ?>
		</div>
		<div class="text-center"><a href="<?=site_url("san-pham")?>" class="btn btn-info wow fadeInUp transition">XEM TẤT CẢ</a></div>
	</div>
</div>
<div class="cluster cluster-news">
	<div class="container">
		<div class="title">
			<h3>TIN TỨC - SỰ KIỆN</h3>
			<!-- <div class="separator"></div> -->
		</div>
		<div class="row">
			<? $c_new = count($news);
			for ($i=0; $i < $c_new; $i++) { ?>
			<div class="col-md-3">
				<div class="new-item transition <?=($i%2==0) ? 'wow bounceInUp' : 'wow bounceInDown' ?>">
					<a href="<?=site_url("tin-tuc-su-kien/{$this->m_content_categories->load($news[$i]->category_id)->alias}/{$news[$i]->alias}")?>" alt="<?=$news[$i]->title?>">
						<div class="border-images-new">
							<img src="<?=!empty($news[$i]->thumbnail) ? $news[$i]->thumbnail : IMAGES_DEFAULT?>" class="img-responsive transition" alt="<?=$news[$i]->title?>">
						</div>
						<p class='help-block'><?=$this->util->to_vn_date($news[$i]->updated_date)?></p>
						<h5 class="limit-content-2-line transition "><?=$news[$i]->title?></h5>
					</a>
				</div>
			</div>
			<? } ?>
		</div>
	</div>
</div>