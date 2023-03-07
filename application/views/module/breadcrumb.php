<? if ($this->util->slug($this->router->fetch_class()) != "home" && !empty($breadcrumb)) { ?>
<div class="breadcrumbs">
	<div class="container">
		<ul class="breadcrumb clearfix" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?=BASE_URL?>" class="active transition"><span itemprop="name">Trang chủ</span></a></li>
			<?
				foreach ($breadcrumb as $k => $v) {
					echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemscope itemtype="http://schema.org/Thing" itemprop="item" title="'.$k.'" href="'.$v.'" class="active transition"><span itemprop="name">'.$k.'</span></a></li>';
				}
			?>
		</ul>
	</div>
</div>
<? } ?>