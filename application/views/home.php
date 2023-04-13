<div id="shopify-section-16107024524da282a5" class="shopify-section index-section section-link-list">
   <div class="distance pt-xs-40 pb-xs-40" data-section-id="16107024524da282a5" data-section-type="nov-slick">
      <div class="container">
         <div class="section-content">
            <div class="row">
               <div class="col-md-5"></div>
               <div class="col-md-7">
                     <div class="text-center">
                        <div class="title_block" style="color:#ff9901">
                           <span>Ưu Đãi Của Chúng Tôi</span>
                           <span class="sub_title">Những thông tin ưu đãi, khuyến mãi và truy ân khách hàng</span>
                        </div>
                     </div>
                     <div class="row nov-slick-carousel"
                     data-autoplay="true" 
                     data-autoplayTimeout="1000" 
                     data-loop="true"
                     data-dots="true"
                     data-nav="false" 
                     data-row="1"
                     data-items_xl="1"
                     data-items="1" 
                     data-items_lg_tablet="1" 
                     data-items_tablet="1" 
                     data-items_mobile="1"
                     data-items_mobile_xs="1">
                     <!-- <?// foreach($brands as $brand) { ?>
                     <div class="col">
                        <div class="block_content text-center">
                           <a href="<?//=site_url("{$alias['product']}")."?constraint={$brand->alias}"?>">
                              <p class="name-content d-block"><span class="left-icon">&#786; &#786;</span><?//=$brand->{$prop['content']}?> <span class="right-icon">&#787; &#787;</span></p>
                           </a>
                        </div>
                     </div>
                     <?// } ?> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <style>
      #shopify-section-16107024524da282a5 .distance {
      padding-top: 95px;
      padding-bottom: 65px;
      }
      <? if(!$this->util->detect_mobile()) {  ?>
      #shopify-section-16107024524da282a5 .section-content {
         padding-top: 85px;
         padding-bottom: 90px;
         background-image: url("https://www.yen-vietnam.com/template/images/bg-bird-nest.jpg");
         border-radius: 26px;
         background-repeat: no-repeat;
         background-position: center top;
         background-size: cover;
         
      }
      #shopify-section-16107024524da282a5 .name-content .left-icon {
         position: absolute;
         left: 0;
         font-size: 70px;
         top: -20px;
         color: #ff9901;   
      }
      #shopify-section-16107024524da282a5 .name-content .right-icon {
         position: absolute;
         right: -45px;
         font-size: 70px;
         bottom: -60px;
         color: #ff9901;
      }
      <? } else { ?>
      #shopify-section-16107024524da282a5 .section-content {
         padding-top: 85px;
         padding-bottom: 90px;
         background-repeat: no-repeat;
         background-position: center top;
         background-size: cover;
         
      }
      #shopify-section-16107024524da282a5 .name-content .left-icon {
         position: absolute;
         left: 12px;
         font-size: 70px;
         top: -20px;
         color: #ff9901;   
      }
      #shopify-section-16107024524da282a5 .name-content .right-icon {
         position: absolute;
         right: -30px;
         font-size: 70px;
         bottom: -60px;
         color: #ff9901;
      }
      <? } ?>
      #shopify-section-16107024524da282a5 .name-content {
      color: #7b4e19;
      position: relative;
      font-size: 30px;
      max-width: 540px;
      font-weight: bold;
      }
      #shopify-section-16107024524da282a5 .desc {
      color: #666666;
      }
   </style>
</div>
<div id="shopify-section-1" class="shopify-section index-section section-product-slider">
   <style>
      #shopify-section-1 .distance {
      padding-top: 30px;
      padding-bottom: 60px;
      }
   </style>
   <div class="distance pb-xs-20 container" data-section-id="1" data-section-type="nov-slick">
      <div class="text-left mb-55 d-flex align-items-center">
         <div class="title_block mb-0">
            <span>Tất cả sản phẩm</span>
            <span class="sub_title" style = " font-size : 15px">Cá ba sa, không những giàu chất dinh dưỡng mà còn là món ăn tinh thần của bà con Đồng Bằng Sông Cửu Long</span>
         </div>
         <div class="nv-ml-auto">
            <span class="custombutton prev_custom d-xs-none">
            <i class="zmdi zmdi-chevron-left"></i>
            </span>
            <span class="custombutton next_custom d-xs-none">
            <i class="zmdi zmdi-chevron-right"></i>
            </span>
         </div>
      </div>
      <div class="block_padding">
         <div class="grid--view-items row nov-slick-carousel"
            data-autoplay="true" 
            data-autoplayTimeout="6000" 
            data-loop="false"
            data-margin="" 
            data-dots="false" 
            data-nav="false" 
            data-row="1" 
            data-row_mobile="2"
            data-items="5" 
            data-items_lg_tablet="4" 
            data-items_tablet="3" 
            data-items_mobile="2"
            data-items_mobile_xs="2"
            data-custombutton="true"
            >
            <? foreach ($products as $product) { ?>
            <div class="block">
               <div>
                  <div class="item col">
                     <div class="item-product">
                        <div class="thumbnail-container has-multiimage">
                           <a class="w-100" href="<?=site_url("san-pham/{$product->category_alias}/{$product->alias}")?>">
                              <img class="w-100 img-fluid product__thumbnail" src="<?=!empty($product ->image)?$product ->image : ' '?> ?> " >
                           </a>
                        </div>
                        <div class="product__info text-center">
                           <div class="product__title">
                              <a href="<?=site_url("san-pham/{$product->alias}")?>" class="limit-content-1-line"><?=$product->title?></a>
                           </div>
                           <div class="product__price">
                              <a href="<?=site_url("lien-he")?>"><?=!empty($product->price)?number_format($product->price,0,',','.'):'Liên Hệ'?></a>
                           </div>
                           <a class="btn btnAddToCart btnChooseVariant" href="<?=site_url("san-pham/{$product->category_alias}/{$product->alias}")?>">
                              <i class="zmdi zmdi-zoom-in"></i>   
                              <span>Xem chi tiết</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <? } ?>
         </div>
      </div>
   </div>
</div>
<div id="shopify-section-1610792388f3d700f4" class="shopify-section index-section section-product-slider">
   <style>
      #shopify-section-1610792388f3d700f4 .distance {
      padding-top: 85px;
      padding-bottom: 90px;
      background-image: url("https://www.yen-vietnam.com/template/images/sl_122020_39050_21.jpg");
      background-repeat: no-repeat;
      background-position: center top;
      background-size: cover;
      }
   </style>
   <div class="distance grid_2" data-section-id="1610792388f3d700f4" data-section-type="nov-slick">
      <div class="container">
         <div class="text-left mb-55 d-flex align-items-center">
            <div class="title_block">
               <span style="color:#573816;text-shadow: 0px 2px 2px #fff, 0px -2px 2px white, -2px 0px 2px white, 2px 0px 2px white;"><?=$this->m_product_categories->load(12)->name?></span>
            </div>
            <div class="nv-ml-auto">
               <span class="custombutton prev_custom d-xs-none">
               <i class="zmdi zmdi-chevron-left"></i>
               </span>
               <span class="custombutton next_custom d-xs-none">
               <i class="zmdi zmdi-chevron-right"></i>
               </span>
            </div>
         </div>
         <div class="block_margin">
            <div class="block_padding">
               <div class="grid--view-items row nov-slick-carousel"
                  data-autoplay="true" 
                  data-autoplayTimeout="6000" 
                  data-loop="false"
                  data-margin="" 
                  data-dots="false" 
                  data-nav="false" 
                  data-row="1" 
                  data-row_mobile="2"
                  data-items="4" 
                  data-items_lg_tablet="3" 
                  data-items_tablet="3" 
                  data-items_mobile="2"
                  data-items_mobile_xs="2"
                  data-custombutton="true"
                  >
                  <? foreach ($products_category_12 as $value) { ?>
                  <div class="block">
                     <div>
                        <div class="item col">
                           <div class="item-product">
                              <div class="thumbnail-container has-multiimage">
                                 <a class="w-100" href="<?=site_url("san-pham/{$value->category_alias}/{$value->alias}")?>">
                                 <img class="w-100 img-fluid product__thumbnail" src="<?=!empty($value ->image)?$value ->image : ' '?>" alt="<?=$value->alias?>">
                                 </a>
                              </div>
                              <div class="product__info text-center">
                                 <div class="product__title">
                                    <a href="<?=site_url("san-pham/{$value->alias}")?>" class="limit-content-1-line"><?=$value->title?></a>
                                 </div>
                                 <div class="product__price">
                                    <a href="<?=site_url("lien-he")?>"><?=!empty($value->price)?number_format($value->price,0,',','.'):'Liên Hệ'?></a>
                                 </div>
                                 <a class="btn btnAddToCart btnChooseVariant" href="<?=site_url("san-pham/{$value->category_alias}/{$value->alias}")?>">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                    <span>Xem chi tiết</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <? } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="shopify-section-16107913992949ad3f" class="shopify-section index-section section-product-slider">
   <style>
      #shopify-section-16107913992949ad3f .distance {
      padding-top: 100px;
      padding-bottom: 30px;
      }
      #shopify-section-16107913992949ad3f .nov-sh-image-1 img {
         height: 374px;
         object-fit: cover;
         border-radius: 25px;
      }
   </style>
   <div class="distance container" data-section-id="16107913992949ad3f" data-section-type="nov-slick">
      <div class="row">
         <? if(!$this->util->detect_mobile()) {  ?>
         <div class="col-xl-4 col-lg-5 mb-md-60">
            <div class="row spacing-10">
               <div class="nov-sh-image-1 col-md-4 col-lg-12">
                  <a class="w-100" href="#">
                  <img class="w-100 mb-20" src="https://www.yen-vietnam.com/template/images/banner-bird-nest.jpeg">
                  </a>
               </div>
               <div class="nov-sh-image-1 col-md-4 col-lg-12">
                  <a class="w-100" href="#">
                  <img class="w-100" src="https://www.yen-vietnam.com/template/images/banner-cordyceps.jpg">
                  </a>
               </div>
            </div>
         </div>
         <? } ?>
         <div class="col-xl-8 col-lg-7">
            <div class="text-left mb-55 d-flex align-items-center">
               <div class="title_block mb-0">
                  <span><?=$this->m_product_categories->load(3)->name?> - <?=$this->m_product_categories->load(6)->name?></span>
               </div>
               <div class="nv-ml-auto">
                  <span class="custombutton prev_custom d-xs-none">
                  <i class="zmdi zmdi-chevron-left"></i>
                  </span>
                  <span class="custombutton next_custom d-xs-none">
                  <i class="zmdi zmdi-chevron-right"></i>
                  </span>
               </div>
            </div>
            <div class="block_padding">
               <div class="list--view-items row nov-slick-carousel"
                  data-autoplay="true" 
                  data-autoplayTimeout="6000" 
                  data-loop="false"
                  data-margin="" 
                  data-dots="false" 
                  data-nav="false" 
                  data-row="3" 
                  data-row_mobile="3"
                  data-items="2" 
                  data-items_lg_tablet="1" 
                  data-items_tablet="1" 
                  data-items_mobile="1"
                  data-items_mobile_xs="1"
                  data-custombutton="true"
                  >
                  <? foreach($products_category_3_6 as $value) { ?>
                  <div class="item col">
                     <div class="item-product align-items-center">
                        <div class="row">
                           <div class="col-6">
                              <div class="thumbnail-container has-multiimage">
                                 <a href="<?=site_url("san-pham/{$value->category_alias}/{$value->alias}")?>">
                                 <img class="img-fluid product__thumbnail" src="<?=!empty($value ->image)?$value ->image : ' '?>" alt="<?=$value->alias ?>">
                                 </a>
                              </div>
                           </div>
                           <div class="col-6 d-flex align-items-center">
                              <div class="product__info">
                                 <div class="block_product_info">
                                    <a class="limit-content-2-line product__title" href="<?=site_url("san-pham/{$value->category_alias}/{$value->alias}")?>"><?=$value->title?></a>
                                    <div class="product__price">
                                      <a href="<?=site_url("lien-he")?>"> <?=!empty($value->price)?number_format($value->price):'Liên Hệ'?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <? } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>