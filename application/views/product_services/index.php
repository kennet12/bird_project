<? $method = $this->router->fetch_class();?>
<!-- <div class="container">
	<div class="wrapper-slider">
		<div class="row">
			<div class="col-md-7">
				<div class="owl-carousel owl-theme" >
					<? foreach ($new_items as $new_item) { ?>
					<div class="slider-list">
						<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($new_item->category_id)->alias}/{$new_item->alias}")?>">
							<img src="<?=!empty($new_item->thumbnail) ? $new_item->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive" alt="<?=$new_item->title?>">
							<div class="slider-content">
								<h4 class="limit-content-1-line"><?=$new_item->title?></h4>
								<p class="limit-content-2-line text-justify"><?=strip_tags($new_item->content)?></p>
							</div>
						</a>
					</div>
					<? } ?>
				</div>
				
			</div>
			<div class="col-md-5">
				<h4>DỊCH VỤ MỚI NHẤT</h4>
				<div class="slider-child-list">
					<? $i=0; foreach ($new_items as $new_item) { ?>
					<div class="child-item">
						<p class="time-child-item"><?=$this->util->to_vn_date($new_item->created_date)?></p>
						<span class="slider-icon transition icon-click-<?=$i?> hidden-xs"></span>
						<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($new_item->category_id)->alias}/{$new_item->alias}")?>">
							<div class="left-slider-child">
								<img src="<?=!empty($new_item->thumbnail) ? $new_item->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive transition" alt="<?=$new_item->title?>">
							</div>
							<div class="right-slider-child">
								<h5 class="limit-content-1-line transition"><?=$new_item->title?></h5>
								<p class="limit-content-2-line text-justify"><?=strip_tags($new_item->content)?></p>
							</div>
						</a>
					</div>
					<? $i++; } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:7000,
			margin:10,
			loop:true,
			lazyLoad: true,
			dots:false,
			startPosition:0
		});
		<? for ($i=0; $i < 3; $i++) { ?>
		$('.icon-click-<?=$i?>').click(function() {
			owl.trigger('to.owl.carousel',<?=$i?>,200);
		})
		<? } ?>
	});
</script> -->
<?// require_once(APPPATH."views/module/breadcrumb.php"); ?>
<div class="container">
	<h1 class="page-title">Sản phẩm dịch vụ</h1>
	<ul class="nav nav-pills active-category-list">
		<li role="presentation" <?=empty($category) ? 'class="active-category"' : '' ?>><a href="<?=site_url("san-pham-dich-vu")?>">Tất cả</a></li>
		<? foreach ($categories as $categorie) { ?>
		<li role="presentation" <?=($category == $categorie->alias) ? 'class="active-category"' : '' ?>><a href="<?=site_url("san-pham-dich-vu/{$categorie->alias}")?>"><?=$categorie->name?></a></li>
		<? } ?>
	</ul>
	<div class="row">
		<div class="col-md-8">
			<div class="list-warpper">
				<? foreach ($items as $item) { ?>
					<div class="item">
						<div class="left-item">
							<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>" title="">
								<img src="<?=!empty($item->thumbnail) ? $item->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive transition" alt="<?=$item->title?>">
							</a>
						</div>
						<div class="right-item">
							<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>"><h5 class="limit-content-2-line transition"><?=$item->title?></h5></a>
							<p class="help-block"><?=$this->util->to_vn_date($item->created_date)?></p>
							<p class="limit-content-3-line text-justify"><?=strip_tags($item->content)?></p>
						</div>
					</div>
				<? } ?>
			</div>
			<div class="text-center"><?=$pagination?></div>
		</div>
		<div class="col-md-4">
			<div class="wrapper-box">
				<div class="list-box">
					<div class="box-title">
						<h2>DỊCH VỤ XEM NHIỀU NHẤT</h2>
					</div>
					<ul>
						<? $i=1; foreach ($view_items as $view_item) { ?>
						<li class="box-item">
							<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($view_item->category_id)->alias}/{$view_item->alias}")?>" class="transition" title="">
								<div class="left-box-item transition">
									<?=$i?>
								</div>
								<div class="right-box-item">
									<h5 class="transition"><?=$view_item->title?></h5>
									<p class="help-block"><?=$this->util->to_vn_date($view_item->created_date)?></p>
								</div>
							</a>
						</li>
						<? $i++; } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>