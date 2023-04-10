<div class="page-width">
	<div class="container">
		<div class="row">
			<div class="sidebar sidebar-article col-lg-3 col-md-4 flex-xs-unordered">
				<div id="shopify-section-nov-sidebar-article" class="shopify-section">
					<div class="sidebar-block categories__sidebar sidebar-block__1 ">
						<div class="title-block"><span>Tin Tức</span></div>
						<div class="block__content">
							<? foreach($categories as $cate) { ?>
							<div class="cateTitle">
								<a class="cateItem " href="<?=site_url("tin-tuc/{$cate->alias}")?>"><?=$cate->name?></a>
							</div>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="blog_groups col-lg-9 col-md-8 flex-xs-first">
				<div id="shopify-section-blog-template" class="shopify-section">
					<div class="blog--list blog--grid-view">
						<div class="title_block"><?=$title?></div>
						<div class="row">
							<? foreach($items as $item) {?>
							<div class="article--listing col-lg-12 mb-100">
								<div class="article__image">
									<a href="<?=site_url("tin-tuc/{$item->category_alias}/{$item->alias}")?>" class="article__list-image-container w-100">
										<img class="article__list-image w-100" src="<?=BASE_URL.$item->thumbnail?>" alt="<?=$item->{$prop['title']}?>">
									</a>
								</div>
								<div class="article-body">
									<h2 class="article__title"><a href="<?=site_url("tin-tuc/{$item->category_alias}/{$item->alias}")?>"><?=$item->{$prop['title']}?></a></h2>
									<div class="article__info">
										<span class="article__date">
											<i class="zmdi zmdi-calendar-note"></i><time datetime="2021-01-16T04:34:57Z"><?=date('d-m-Y',strtotime($item->created_date))?></time>
										</span>
										<span class="article__author">
											<i class="zmdi zmdi-account"></i> Nguyên Anh Fruit
										</span>
									</div>
									<div class="article__excerpt">
										<?=character_limiter(strip_tags($item->{$prop['description']}),300)?>
									</div>
									<a href="<?=site_url("tin-tuc/{$item->category_alias}/{$item->alias}")?>" class="article__readmore text-uppercase">Xem thêm</a>
								</div>
							</div>
							<? } ?>
						</div>
						<?=$pagination?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>