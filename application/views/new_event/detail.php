<div class="container">
	<div class="row">
	<div class="col-md-2 ">
		<div id="shopify-section-nov-sidebar" class="shopify-section">
			<div class="list-filter-selected">
			<div class="filter-item_title align-items-center">
				<a href="<?=site_url("tin-tuc-su-kien")?>" class="nv-ml-auto">Tất cả Tin Tức</a>
			</div>
			</div>
			<div class="categories__sidebar sidebar-block sidebar-block__1">
			<div class="title-block mb-10">Danh Mục </div>
			<ul class="list-unstyled">
				<? foreach($categories as $categorie){?> 
				<li class="item mb-10">
					<a href="<?=site_url("tin-tuc-su-kien/{$categorie->alias}")?>"> <?=$categorie->name?></a>
				</li>
				<?}?>
			</ul>
			<script>
				$('.zmdi-caret-right').click(function(e){
					var stt = $(this).attr('stt');
					var cls = $(this).attr('cls');
					if (stt == '0'){
						$(this).addClass('active');
						$(this).attr('stt','1');
					} else {
						$(this).removeClass('active');
						$(this).attr('stt','0');
					}
					$('.'+cls).toggle('fast');
				})
			</script>
			</div>
			<script>
			$('.zmdi-caret-right').click(function(e) {
				$(this).parents('.item-sub').find('.childsub-item').toggle('fast');
			})
			</script>
		</div>
	</div>
	<div class="col-md-10">
		<div class="container">
			<h1 class="page-title"><?=$item->title?></h1>
			<div class="content">
			<p class="help-block">Ngày đăng: <?=$this->util->to_vn_date($item->updated_date)?></p>
			<?=$item->content?>
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
				</a>
				<br/>
				<? } ?>
			</div>
			</div>
			<? require_once(APPPATH."views/module/addthis.php"); ?>
		</div>
	</div>
	</div>
</div>