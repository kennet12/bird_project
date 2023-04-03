<?
	$info = new stdClass();
	$info->type = 'slide';
	$slides = $this->m_slide->items($info,1);
?>
<div class="slider container" qty="3">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-slide col-md-9">
			<div class="shopify-section index-section section-slideshow distance" style="padding-top: 30px;">
				<div data-section-type="slideshow-section" class="slideshow position-relative special">
				<div class="main-slider slick-initialized slick-slider slick-dotted" data-autoplay="true" data-speed="5000" data-arrows="false" data-dots="true">
					<div class="slick-list draggable">
						<div class="slick-track" style="opacity: 1; width: 2610px;">
							<div class="item image slide-image slide-item-1 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 870px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 600ms cubic-bezier(0.87, 0.03, 0.41, 0.9) 0s;" tabindex="-1" role="tabpanel" id="slick-slide40" aria-describedby="slick-slide-control40">
							<img width="100%" height="auto" src="https://www.yen-vietnam.com/images/slide/4/thumb/banner-danh-muc-dohavi.jpeg" class="image-entity" alt="slidershow">
							</div>
							<div class="item image slide-image slide-item-2 slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 870px; position: relative; left: -870px; top: 0px; z-index: 999; opacity: 1;" tabindex="0" role="tabpanel" id="slick-slide41" aria-describedby="slick-slide-control41">
							<img width="100%" height="auto" src="https://www.yen-vietnam.com/images/slide/2/thumb/1647517686banner-anphucduong.jpeg" class="image-entity" alt="slidershow">
							</div>
							<div class="item image slide-image slide-item-3 slick-slide" data-slick-index="2" aria-hidden="true" style="width: 870px; position: relative; left: -1740px; top: 0px; z-index: 998; opacity: 0; transition: opacity 600ms cubic-bezier(0.87, 0.03, 0.41, 0.9) 0s;" tabindex="-1" role="tabpanel" id="slick-slide42" aria-describedby="slick-slide-control42">
							<img width="100%" height="auto" src="https://www.yen-vietnam.com/images/slide/1/thumb/ym-nguyento-banner-1.jpeg" class="image-entity" alt="slidershow">
							</div>
						</div>
					</div>
					<ul class="slick-dots" style="display: block;" role="tablist">
						<li class="" role="presentation"><button type="button" role="tab" id="slick-slide-control40" aria-controls="slick-slide40" aria-label="1 of 3" tabindex="-1">1</button></li>
						<li role="presentation" class="slick-active"><button type="button" role="tab" id="slick-slide-control41" aria-controls="slick-slide41" aria-label="2 of 3" tabindex="0" aria-selected="true">2</button></li>
						<li role="presentation" class=""><button type="button" role="tab" id="slick-slide-control42" aria-controls="slick-slide42" aria-label="3 of 3" tabindex="-1">3</button></li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('.vertical_dropdown').click(function(e){
	let stt = $(this).attr('stt');
	let qty = $('.slider').attr('qty');
	let w = 0;
	if (stt == '2') {
	$('.slider').find('.col-slide').addClass('col-md-12');
	$('.slider').find('.col-slide').removeClass('col-md-9');
	$('.slider .main-slider .item').css('width','1170px');
	$(this).attr('stt',1);
	w = 1170;
	} else {
	$('.slider').find('.col-slide').addClass('col-md-9');
	$('.slider').find('.col-slide').removeClass('col-md-12');
	$('.slider .main-slider .item').css('width','870px');
	$(this).attr('stt',2);
	w = 870;
	}
	let wid = 0;
	let wid_track = 0;
	for(let i = 1;i <= qty;i++){
	$('.slider .main-slider .slide-item-'+i).css('left',wid+'px');
	wid -= w;
	wid_track += w;
	}
	$('.slider .main-slider .slick-track').css('width',wid_track+'px');
})
</script>  