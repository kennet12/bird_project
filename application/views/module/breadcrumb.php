<? if ($this->util->slug($this->router->fetch_class()) != "trang-chu" && !empty($breadcrumb)) { ?>
<section id="NovFakeBreadcrumbs" class="d-none d-md-block">
	<div class="container">
		<ul class="fakebreadcrumbs list-inline" >
			<?
			foreach ($breadcrumb as $k => $v) {
				echo '<li class="list-inline-item"><a title="'.$k.'" href="'.$v.'"><span>'.$k.'</span></a></li>';
				}
			?>
		</ul>
	</div>
</section>
<section id="NovBreadcrumbs" class="d-none">
	<div class="container">
		<ol class="breadcrumb list-inline" >
			<?
			foreach ($breadcrumb as $k => $v) {
				echo '<li class="list-inline-item"><a title="'.$k.'" href="'.$v.'"><span>'.$k.'</span></a></li>';
				}
			?>
		</ol>
	</div>
</section>
<? } ?>