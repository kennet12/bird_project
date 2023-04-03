<?
	$method = $this->util->slug($this->router->fetch_class());
	$setting = $this->m_setting->load(1);

	$product_categories = $this->m_product_categories->items(null,1,null,null,'created_date','ASC');

	$new_categories = $this->m_content_categories->items(null,1,null,null,'created_date','ASC');

	$support_categories = $this->m_posts_categories->items(null,1,null,null,'created_date','ASC');

	$faq_categories = $this->m_faq_categories->items(null,1,null,null,'created_date','ASC');
?>
<header class="site-header sticky-menu" style="height: auto;">
	<div class="head-lang">
		<div class="container">
			<div class="d-none d-md-block">
				<div id="_desktop_currency_selector" class="currency-selector groups-selector">
					<ul id="currencies" class="list-inline">
					<li class="currency__item list-inline-item">
						<a href="https://www.yen-vietnam.com/tai-khoan/dang-nhap.html">	
						<span>Đăng nhập</span>
						</a>
					</li>
					<li class="currency__item list-inline-item">
						<a href="https://www.yen-vietnam.com/tai-khoan/dang-ky-tai-khoan.html">	
						<span>Đăng ký</span>
						</a>
					</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="header-top d-none d-md-block">
		<div class="container">
			<div class="row d-flex align-items-center position-relative">
				<div class="contentsticky_logo col-md-3">
					<div class="h2 site-header__logo mb-0" itemscope="" itemtype="http://schema.org/Organization">
					<a href="https://www.yen-vietnam.com" itemprop="url" class="site-header__logo-image">
					<img class="js img-fluid" src="<?=$setting->logo?>" style="width:80px" alt="Yen Viet Nam">
					</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contentsticky_search search_inline">
					<div class="site_search">
						<div class="site-header-pc search-active">
							<div class="search-button act"><i class="zmdi zmdi-search"></i></div>
							<div id="search_widget" class="site_header__search search-box">
								<form type="pc" action="https://www.yen-vietnam.com/tim-kiem.html" method="GET" class="frm-search" role="search" style="position: relative;">
								<input class="search-header__input" type="search" id="search-pc" name="search_text" placeholder="Nhập từ khóa muốn tìm" value="" aria-label="Search your product" autocomplete="off">
								<button class="search-header__submit text-center btn--link" type="submit">
								<span class="site-header__search-icon">
								Tìm kiếm										</span>
								</button>
								<ul class="search-results has-scroll" style="position: absolute; left: 0px; top: 44px; display: none;"></ul>
								<div class="list-keyword" style="display:none">
									<div class="title-search">
										<strong><i class="zmdi zmdi-key"></i> Từ khóa gợi ý</strong>
									</div>
									<div class="item" data="nha">
										<i class="zmdi zmdi-search"></i> nha											
									</div>
									<div class="item" data="trai cay">
										<i class="zmdi zmdi-search"></i> trai cay											
									</div>
									<div class="item" data="kiwi">
										<i class="zmdi zmdi-search"></i> kiwi											
									</div>
									<div class="item" data="ngũ cốc">
										<i class="zmdi zmdi-search"></i> ngũ cốc											
									</div>
									<div class="item" data="kẹo">
										<i class="zmdi zmdi-search"></i> kẹo											
									</div>
								</div>
								</form>
								<script>
								searchProduct('#search-pc','Từ khóa gợi ý','Không tìm thấy từ khóa','Kết quả sản phẩm đã tìm','Không tìm thấy sản phẩm','Xem thêm');
								</script>
							</div>
						</div>
					</div>
					</div>
				</div>
				<script>
					$(document).on('click', '.search-more', function () {
						$('.frm-search').submit(); 
					});
					$(document).on('click','.search-box .list-keyword > .item', function () { 
						var v = $(this).attr('data');
						var frm = $(this).parents('.frm-search');
						var t = frm.attr('type');
						if (t == 'm') {
							frm.find('#search-m').val(v);
						} else {
							frm.find('#search-pc').val(v);
						}
						frm.submit();
					});
					$(document).click(function(event) { 
						var $target = $(event.target);
						if(!$target.closest('.search-box').length && 
						$('.search-box').is(":visible")) {
							$('.search-box .list-keyword').hide();
						}        
					});
				</script>
				<div class="col-md-3 d-flex align-items-center content_right">
					<div class="contentsticky_cart nv-mr-10 nv-ml-auto">
					<a href="https://www.yen-vietnam.com/gio-hang.html">
						<div id="cart_block">
							<div class="header-cart d-flex align-items-center">
								<div class="site-header__cart">
								<span class="site-header__cart-icon" style="background: url(https://www.yen-vietnam.com/template/images/icon-cart-header.png) no-repeat;"></span>
								<span id="_desktop_cart_count" class="site-header__cart-count">
								<span id="CartCount"><span>0</span></span>
								</span>
								</div>
								<div class="nv-ml-20 d-none d-lg-block">
								<span class="title-cart">Giỏ hàng</span>
								</div>
							</div>
							<div id="_desktop_cart">
								<div id="cart-info" style=""></div>
							</div>
						</div>
					</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-bottom d-none d-md-block ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-2">
				<div class="header-verticalmenu">
				<div stt="2" class="vertical_dropdown active">
					<div class="title_vertical d-flex align-items-center">
						<i class="zmdi zmdi-menu"></i>
						<span class="nv-ml-20 nv-ml-md-10 d-none d-lg-block">Danh mục</span>
					</div>
				</div>
				<div style="display: block;" id="_desktop_vertical_menu" class="vertical_menu has-showmore" data-count_showmore="9" data-count_showmore_lg="6" data-textshowmore="See More" data-textless="See Less">
					<ul class="site-nav" id="SiteNav">
						<li class="site-nav--has-dropdown hasMegaMenu center">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-tinh-che.html" title="Tổ Yến Tinh Chế">
							<div class="icon_nav">
								<img class="img-fluid icon-menu" src="https://www.yen-vietnam.com/template/images/to-yen-tinh-che.svg" alt="image">
							</div>
							<div class="group_title">
								Tổ Yến Tinh Chế										
								<div class="sub_title_nav limit-content-2-line">Tổ chim yến thô sau khi lấy được ngâm vào nước sau đó loại bỏ lông chim yến và các tập chất và hông khô lại thành tổ....</div>
							</div>
							</a>
						</li>
						<li class="site-nav--has-dropdown hasMegaMenu center">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-tho.html" title="Tổ Yến Thô">
							<div class="icon_nav">
								<img class="img-fluid icon-menu" src="https://www.yen-vietnam.com/template/images/to-yen-tho.svg" alt="image">
							</div>
							<div class="group_title">
								Tổ Yến Thô										
								<div class="sub_title_nav limit-content-2-line">Tổ chim yến sau khi được lấy vẫn còn nguyên lông yến dính bên trong tổ chim yến....</div>
							</div>
							</a>
						</li>
						<li class="site-nav--has-dropdown hasMegaMenu center">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-rut-long.html" title="Tổ Yến Rút Lông">
							<div class="icon_nav">
								<img class="img-fluid icon-menu" src="https://www.yen-vietnam.com/template/images/to-yen-rut-long.svg" alt="image">
							</div>
							<div class="group_title">
								Tổ Yến Rút Lông										
								<div class="sub_title_nav limit-content-2-line">Tổ chim yến sau khi lấy sẽ được rút lông làm sạch không cần phải ngâm nước....</div>
							</div>
							</a>
						</li>
						<li class="site-nav--has-dropdown hasMegaMenu center last">
							<a href="https://www.yen-vietnam.com/san-pham/dong-trung-ha-thao.html" title="Đông Trùng Hạ Thảo">
							<div class="icon_nav">
								<img class="img-fluid icon-menu" src="https://www.yen-vietnam.com/template/images/dong-trung-ha-thao.svg" alt="image">
							</div>
							<div class="group_title">
								Đông Trùng Hạ Thảo										
								<div class="sub_title_nav limit-content-2-line">Đông trùng hạ thảo là một giống nấm mọc kí sinh trên một loài sâu non. Loài dược liệu này được cho là có tác dụng chống oxy hóa và chống viêm....</div>
							</div>
							</a>
						</li>
					</ul>
				</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-10">
				<div class="contentsticky_menu">
				<nav id="AccessibleNav">
					<ul class="site-nav list--inline " id="SiteNav">
						<li class="site-nav--has-dropdown menu-item" aria-controls="SiteNavLabel-cosmetic">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-tinh-che.html" class="site-nav__link site-nav__link--main">
							<span>Tổ Yến Tinh Chế</span>
							</a>
						</li>
						<li class="site-nav--has-dropdown menu-item" aria-controls="SiteNavLabel-cosmetic">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-tho.html" class="site-nav__link site-nav__link--main">
							<span>Tổ Yến Thô</span>
							</a>
						</li>
						<li class="site-nav--has-dropdown menu-item" aria-controls="SiteNavLabel-cosmetic">
							<a href="https://www.yen-vietnam.com/san-pham/to-yen-rut-long.html" class="site-nav__link site-nav__link--main">
							<span>Tổ Yến Rút Lông</span>
							</a>
						</li>
						<li class="site-nav--has-dropdown menu-item" aria-controls="SiteNavLabel-cosmetic">
							<a href="https://www.yen-vietnam.com/san-pham/dong-trung-ha-thao.html" class="site-nav__link site-nav__link--main">
							<span>Đông Trùng Hạ Thảo</span>
							</a>
						</li>
						<li class="site-nav--has-dropdown menu-item" aria-controls="SiteNavLabel-contact">
							<a href="https://www.yen-vietnam.com/lien-he.html" class="site-nav__link site-nav__link--main">
							<span>Liên hệ</span>
							</a>
						</li>
					</ul>
				</nav>
				</div>
			</div>
		</div>
	</div>
	</div>
</header>