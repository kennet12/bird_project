<div class="container">
	<h1 class="page-title"><?=$item->title?></h1>
	<div class="row">
		<div class="col-md-8">
			<p class="help-block" style="margin-top: 0">Ngày đăng: <?=$this->util->to_vn_date($item->created_date)?></p>
			<div class="content"><?=$item->content?></div>
		</div>
		<div class="col-md-4">
			<div class="wrapper-box">
				<div class="list-box">
					<div class="box-title">
						<h2>TIN TỨC LIÊN QUAN</h2>
					</div>
					<ul>
						<? $i=1; foreach ($relative_items as $relative_item) { ?>
						<li class="box-item">
							<a href="<?=site_url("san-pham-dich-vu/{$this->m_content_categories->load($relative_item->category_id)->alias}/{$relative_item->alias}")?>" class="transition" title="">
								<div class="left-box-item transition">
									<?=$i?>
								</div>
								<div class="right-box-item">
									<h5 class="transition"><?=$relative_item->title?></h5>
									<p class="help-block"><?=$this->util->to_vn_date($relative_item->created_date)?></p>
								</div>
							</a>
						</li>
						<? $i++; } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>