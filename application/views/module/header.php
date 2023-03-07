<?
	$method = $this->util->slug($this->router->fetch_class());
	$setting = $this->m_setting->load(1);

	$product_categories = $this->m_product_categories->items(null,1,null,null,'created_date','ASC');

	$new_categories = $this->m_content_categories->items(null,1,null,null,'created_date','ASC');

	$support_categories = $this->m_posts_categories->items(null,1,null,null,'created_date','ASC');

	$faq_categories = $this->m_faq_categories->items(null,1,null,null,'created_date','ASC');
?>
<div class="header visible-lg">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="header-logo">
					<img src="<?=$setting->logo?>" class="img-responsive" alt="basa-mekong">
				</div>
			</div>
			<div class="col-md-7">
				<div class="header-title"><?=$setting->company_name?></div>
				<p class="text-center" style="font-family: 'Dancing Script', cursive;font-size: 22px;color: orangered;">" <?=$setting->company_logan?>"</p>
				<p class="text-center" style="font-size: 14px;"><?=$setting->company_address?></p>
			</div>
			<div class="col-md-3">
				<div class="wrap-search">
					<div class="info-search">TÌM KIẾM THÔNG TIN : </div>
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
				</div>
				<div class="text-color-red header-date-time"></div>
			</div>
		</div>
	</div>
</div>
<div class="header-mobile hidden-lg">
	<div class="container">
		<div class="mobile">
			<div class="logo-mobile">
				<img src="<?=$setting->logo?>" class="" alt="Image">
			</div>
			<div class="name-mobile">
				<h2><?=$setting->company_name?></h2>
				<div class="text-center header-date-time"></div>
			</div>
			<div class="icon-mobile">
				<i class="fa fa-chevron-down icon-menu-mobile transition" status ="0"></i>
			</div>
		</div>
	</div>
</div>

<div class="wrapper-menu-mobile hidden-lg">
	<div class="menu-mobile">
		<ul class="list-menu-mobile" style="display: none;">
			<li <?=($method=='home') ? 'class="active-mobile"' : '' ?>><a href="<?=BASE_URL?>">Trang chủ</a></li>
			<li <?=($method=='gioi-thieu') ? 'class="active-mobile"' : '' ?>><a href="<?=site_url('gioi-thieu')?>">Giới thiệu</a></li>
			<? $count=count($product_categories); for ($i=0; $i < $count; $i++) { ?>
			<li <?=($this->uri->segment(2)=="{$product_categories[$i]->alias}") ? 'class="active-mobile"' : '' ?>><a href="<?=site_url("san-pham/{$product_categories[$i]->alias}")?>"><?=$product_categories[$i]->name?></a></li>
			<? } ?>
			<li <?=($method=='tin-tuc-su-kien') ? 'class="active-mobile"' : '' ?>><a href="<?=site_url("tin-tuc-su-kien")?>">Tin tức - sự kiện </a><i class="fa fa-chevron-down icon-sub-menu-mobile transition" status ="0"></i>
				<ul class="list-sub-menu-mobile" style="display: none;">
					<? foreach ($new_categories as $new_categorie) { ?>
					<li><a href="<?=site_url("tin-tuc-su-kien/{$new_categorie->alias}")?>"><?=$new_categorie->name?></a></li>
					<? } ?>
				</ul>
			</li>
			<li <?=($method=='hoi-dap') ? 'class="active-mobile"' : '' ?>><a href="<?=site_url("hoi-dap")?>">Hỏi - đáp </a><i class="fa fa-chevron-down icon-sub-menu-mobile transition" status ="0"></i>
				<ul class="list-sub-menu-mobile" style="display: none;">
					<? foreach ($faq_categories as $faq_categorie) { ?>
					<li><a href="<?=site_url("hoi-dap/{$faq_categorie->alias}")?>"><?=$faq_categorie->name?></a></li>
					<? } ?>
				</ul>
			</li>
			<li <?=($method=='lien-he') ? 'class="active-mobile"' : '' ?>><a href="<?=site_url("lien-he")?>">Liên hệ</a></li>
			<li data-toggle="modal" data-target="#myModal" class="hidden-lg <?=($method=='lien-he') ? 'active-mobile' : '' ?>"><a>Tìm kiếm</a></li>
		</ul>
	</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header bg-modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?=$setting->company_name?></h4>
			</div>
			<div class="modal-body">
				<script>
					(function() {
						var cx = '008883834005743023571:px-cfkwwblu';
						var gcse = document.createElement('script');
						gcse.type = 'text/javascript';
						gcse.async = true;
						gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(gcse, s);
					})();
				</script>
				<gcse:search></gcse:search>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.reset-box-sizing, .reset-box-sizing *, .reset-box-sizing *:before, .reset-box-sizing *:after, .gsc-inline-block {
		-webkit-box-sizing: content-box;
		-moz-box-sizing: content-box;
		box-sizing: content-box;
	}
	input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus, .gsc-search-button {
		box-sizing: content-box;
		line-height: normal;
	}
	.gsc-orderby-container, .gcsc-branding, .gsc-adBlock, .gsc-adBlockVertical {
		display: none;
	}
	.gsc-result-info, .cse .gsc-control-cse, .gsc-control-cse {
		padding-left: 0px;
		padding-right: 0px;
	}
	.gsc-table-result, .gsc-thumbnail-inside, .gsc-url-top {
		padding-left: 0px;
		padding-right: 0px;
	}
	.gsc-results .gsc-cursor-box {
		margin-left: 0px;
		margin-right: 0px;
	}
	.gsst_a {
		padding-top: 6px;
		padding-right: 0px;
	}
	input.gsc-search-button, input.gsc-search-button:focus {
		border-color: #08B3FF;
		background-color: #08B3FF;
	}
	input.gsc-search-button:hover {
		background-color: #029de0;
		border-color: #08B3FF;
	}
</style>
<script type="text/javascript">
	$(document).on('click', '.icon-menu-mobile', function(event) {
		event.preventDefault();
		var st = parseInt($(this).attr('status'));
		if (st == 0){
			$(this).css('transform', 'rotate(-180deg)');
			$(this).attr('status', '1');
		} else {
			$(this).css('transform', 'rotate(0deg)');
			$(this).attr('status', '0');
		}
		$('.list-menu-mobile').slideToggle();
	});
	$(document).on('click', '.icon-sub-menu-mobile', function(event) {
		event.preventDefault();
		var st = parseInt($(this).attr('status'));
		if (st == 0){
			$(this).css('transform', 'rotate(-180deg)');
			$(this).attr('status', '1');
		} else {
			$(this).css('transform', 'rotate(0deg)');
			$(this).attr('status', '0');
		}
		$(this).next().slideToggle();
	});

	var result;
	function equal_small(data){
		if (data < 10){
			result = '0'+data;
		} else {
			result = data;
		}
		return result;
	}
	var i = 0
	setInterval(function(){
		var time = new Date().getTime();
		var arr_day = ['Chủ Nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7'];
		var val_day = new Date(time).getDay();
		var date 	= equal_small(new Date(time).getDate());
		var month 	= equal_small(new Date(time).getMonth()+1);
		var year 	= new Date(time).getFullYear();
		var hour 	= equal_small(new Date(time).getHours());
		var minutes = equal_small(new Date(time).getMinutes());
		var seconds = equal_small(new Date(time).getSeconds());
		$('.header-date-time').html(arr_day[val_day]+', '+hour+':'+minutes+':'+seconds+' - '+date+'/'+month+'/'+year)
		i++;
	},1000);
</script>