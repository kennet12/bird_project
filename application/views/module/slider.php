<?
	$info = new stdClass();
	$info->type = 'slide';
	$slides = $this->m_slide->items($info,1);
?>
<div class="slider">
	<div class="owl-carousel owl-theme">
		<? foreach ($slides as $slide) { ?>
		<div class="item slide-item" style="background-image: url(<?=$slide->thumbnail?>);">
			<div class="container">
				<? if(!empty($slide->link)) { ?>
				<div class="wrap-content-slider">
					<h5 class="title"><?=$slide->title?></h5>
					<p><?=$slide->description?></p>
					<a href="<?=$slide->link?>" class="btn btn-info">XEM CHI TIẾT </a>
				</div>
				<? } ?>
			</div>
		</div>
		<? } ?>
	</div>
</div>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
		loop:true,
		nav:true,
		autoplay:true,
		items:1,
		dots:false,
		nav:false,
		center:true
	})
</script>