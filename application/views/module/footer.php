<?

	$info_categories = $this->m_posts_categories->items(null,1);



	$new_categories = $this->m_content_categories->items(null,1);



	$post_items = $this->m_post->items(null,1);

	$partner_items = $this->m_partner->items(null,1);

?>

<div class="cluster partner">

	<div class="container">

		<div class="title">

			<h3>ĐỐI TÁC</h3>

		</div>

		<div class="row">

			<? foreach ($partner_items as $partner_item) { ?>

			<div class="col-md-2">

				<div class="item-partner">

					<a <?=!empty($partner_item->url) ? 'href="'.$partner_item->url.'" target="_blank"' : '' ?>><img src="<?=$partner_item->banner?>" alt=""></a>

					<!-- <h5>phan duy anh</h5> -->

				</div>

			</div>

		<? } ?>

		</div>

	</div>

</div>

<div class="footer">

	<div class="cluster-footer">

		<div class="container">

			<div class="row">

				<div class="col-md-3 col-sm-6 col-xs-6">

					<h5 class="title">THÔNG TIN CHUNG</h5>

					<ul class="link-list">

						<li style=""><a class="transition" href="<?=site_url("gioi-thieu")?>">Giới thiệu</a></li>

						<? $c_info_categories = count($info_categories);

						for ($i=0; $i < $c_info_categories; $i++) { ?>

						<li style=""><a class="transition" href="<?=site_url("thong-tin-chung/{$info_categories[$i]->alias}")?>"><?=$info_categories[$i]->name?></a></li>

						<? } ?>

					</ul>

				</div>

				<div class="col-md-3 col-sm-6 col-xs-6">

					<h5 class="title">SẢN PHẨM CÔNG TY</h5>

					<ul class="link-list">

						<? $c_product_cate = count($product_categories);

						for ($i=0; $i < $c_product_cate; $i++) { ?>

						<li style=""><a class="transition" href="<?=site_url("san-pham/{$product_categories[$i]->alias}")?>"><?=$product_categories[$i]->name?></a></li>

						<? } ?>

					</ul>

				</div>

				<div class="col-md-3 col-sm-6 col-xs-6">

					<h5 class="title">TIN TỨC - SỰ KIỆN</h5>

					<ul class="link-list">

						<? foreach ($new_categories as $new_categorie) { ?>

						<li style=""><a class="transition" href="<?=site_url("tin-tuc-su-kien/{$new_categorie->alias}")?>"><?=$new_categorie->name?></a></li>

						<? } ?>

					</ul>

				</div>

				<div class="col-md-3 col-sm-6 col-xs-6">

					<h5 class="title">MẠNG XÃ HỘI </h5>

					<div class="socical-list">

						<div class="socical-item">

							<a <?=!empty($setting->facebook_url) ? "href='{$setting->facebook_url}' target='_blank'" : ''?>>

								<i class="fa fa-facebook" aria-hidden="true"></i>

							</a>

						</div>

						<div class="socical-item">

							<a <?=!empty($setting->googleplus_url) ? "href='{$setting->googleplus_url}' target='_blank'" : ''?>>

								<i class="fa fa-google" aria-hidden="true"></i>

							</a>

						</div>

						<div class="socical-item">

							<a <?=!empty($setting->twitter_url) ? "href='{$setting->twitter_url}' target='_blank'" : ''?>>

								<i class="fa fa-twitter" aria-hidden="true"></i>

							</a>

						</div>

						<div class="socical-item">

							<a <?=!empty($setting->youtube_url) ? "href='{$setting->youtube_url}' target='_blank'" : ''?>>

								<i class="fa fa-youtube" aria-hidden="true"></i>

							</a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="container">

		<div class="info-company">

			<div class="text-center">

				<h5 class="title" style="text-transform: uppercase;"><?=$setting->company_name?></h5>

				<p><?=$setting->company_address?></p>

				<div class="row">

					<div class="col-sm-6">

						<a class="pull-right text-color-gray" href="" title="">Email: <?=$setting->company_email?></a>

					</div>

					<div class="col-sm-6">

						<a class="pull-left text-color-gray" href="tel:<?=$setting->company_hotline?>" title="">Điện thoại: <?=$setting->company_hotline?></a>

					</div>

				</div>

				<p style="margin-top:10px">Giám đốc: ĐOÀN NGỌC THANH TRÚC</p>

				<!-- <p style="margin-top:10px">Giám đốc: Nguyễn Hồng Quân - Mã số DN: 031496071 - Sở Kế hoạch và Đầu tư Tỉnh AN GIANG cấp ngày: 17/10/2017</p> -->

			</div>

		</div>

	</div>

	<div class="copy-right text-center">

		Copyright © <?=date('Y')?> by PDA solution. All rights reserved.

	</div>

</div>

<div class="visible-xs">

	<a href="tel:<?=$setting->company_hotline?>">

		<div class="border-big-mobilephone"></div>

		<div class="border-small-mobilephone"></div>

		<div class="wrap-mobilephone">

			<i class="fa fa-phone" aria-hidden="true"></i>

		</div>

	</a>

</div>



<div id="fb-root"></div>

<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>

<script>jQuery(document).ready(function () {jQuery(".chat_fb").click(function() {jQuery('.fchat').toggle('slow');});});</script>

<div id="cfacebook">

<a href="javascript:;" class="chat_fb"><i class="fa fa-facebook-square"></i> Chat với chúng tôi</a>

<div class="fchat">

<div style="width:250px;" class="fb-page"

data-href="<?=$setting->facebook_url?>"

data-tabs="messages"

data-width="260"

data-height="280"

data-small-header="true">

<div class="fb-xfbml-parse-ignore">

<blockquote></blockquote>

</div>

</div> 

</div>





</div>

</div>