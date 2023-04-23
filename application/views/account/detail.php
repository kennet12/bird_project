<div class="page-width container">
   <div id="shopify-section-nov-product-template" class="shopify-section">
      <div class="product-template__container tabdesc" itemscope itemtype="http://schema.org/Product" id="ProductSection-nov-product-template" data-section-id="nov-product-template" data-enable-history-state="true" data-type="product-template" data-wishlist-product>
         <meta itemprop="name" content="><?=$item->title?>">
         <meta itemprop="url" content="><?=$item->alias?>">
         <meta itemprop="image" content="<?=!empty($product_galleries[0]->thumbnail)?BASE_URL.$product_galleries[0]->thumbnail:''?>">
         <div class="TopContent mb-100 pb-xs-60">
            <div class="product-single row position-static">
               <div class="col-md-5 col-xs-12 position-static">
                  <div class="product-single__photos block_img_sticky">
                     <div class="proFeaturedImage">
                        <div class="block_content d-flex">
                           <img id="ProductPhotoImg" class="img-fluid <?=(!$this->util->detect_mobile())? 'image-zoom':'' ?>  img-responsive" src="<?=!empty($product_galleries[0]->thumbnail)?BASE_URL.$product_galleries[0]->thumbnail:''?>" alt="<?=$item->title?>"/>
                        </div>
                     </div>
                     <div id="productThumbs" class="mt-10">
                        <div class="thumblist" data-pswp-uid="1">
                           <div class="owl-carousel owl-theme" data-autoplay="false" data-autoplayTimeout="6000" data-items="5" data-margin="10" data-nav="false" data-dots="false" data-loop="false" data-items_tablet="4" data-items_mobile="5">
                              <? foreach($product_galleries as $product_gallery) {?>
                              <div class="thumbItem">
                                 <a href="javascript:void(0)" data-image="<?=BASE_URL.$product_gallery->thumbnail?>" data-zoom-image="<?=BASE_URL.$product_gallery->thumbnail?>" class="product-single__thumbnail">
                                    <img class="detail-img" src="<?=BASE_URL.$product_gallery->thumbnail?>" alt="<?=$item->title?>">
                                 </a>
                              </div>
                              <? } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="block_information position-static col-md-7 col-xs-12 mt-xs-30">
                  <div class="info_content">
                     <h1 itemprop="name" class="product-single__title"><?=$item->title?></h1>
                     <div class="product-single__meta">
                        <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                           <meta itemprop="priceCurrency" content="VND">
                           <link itemprop="availability" href="http://schema.org/InStock">
                           <div class="group-reviews has-border d-flex align-items-center pb-25" style="position:relative;">
                              <div class="detail-reviews">
                                 <span class="shopify-product-reviews-badge">
                                 <i class="start-icon zmdi zmdi-star-outline"></i><i class="start-icon zmdi zmdi-star-outline"></i><i class="start-icon zmdi zmdi-star-outline"></i><i class="start-icon zmdi zmdi-star-outline"></i><i class="start-icon zmdi zmdi-star-outline"></i>                                 </span>
                              </div>
                           </div>
                           <div class="available_product d-flex align-items-center">
                              <div class="available_name control-label">Trạng thái: </div>
                              <span class="product__available"><span class="in-stock">Còn hàng</span></span>
                           </div>
                           <div class="group-single__sku has-border">
                              <!-- <p itemprop="sku" class="product-single__sku">
                                 <span class="label control-label">SKU:</span>
                                 <span class="label-sku">YS000100386</span>
                              </p> -->
                              <p itemprop="cat" class="product-single__cat"><span class="label control-label">Danh mục:</span>
                                 <a href="<?=site_url("san-pham/{$category->alias}")?>"><?=$category->name?></a>
                              </p>
                              <!-- <p itemprop="origin" class="product-single__sku">
                                 <span class="label control-label">Xuất xứ:</span>
                                 <span class="label"></span>
                              </p> -->
                              <p style="display:none;" itemprop="price" class="product-single__sku">
                                 <span class="label"><?=!empty($item->price)?:0?></span>
                              </p>
                           </div>
                           <div class="product-single__shortdes mb-20" itemprop="description">
                              <p>Được kiểm tra hàng trước , bảo đảm đúng chất lượng.</p>
                           </div>
                        </div>
                     </div>
                     <p class="product-single__price product-single__price-nov-product-template d-flex align-items-center" price-pitemprop="description">
                        <span class="product-price__price product-price__price-nov-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-nov-product-template" class="money mr-10">
                        <span class="money" itemprop="price" content="<?=!empty($item->price)?number_format($item->price,'0',',','.'):'0'?>"><?=!empty($item->price)?number_format($item->price,'0',',','.'):'Liên Hệ'?></span>
                        </span>
                        </span>
                     </p>
                     <div class="selectorVariants">
                        <div class="group-quantity">
                           <span class="control-label">Số lượng:</span>
                           <div class="product-form__item product-form__item--quantity align-item-center mb-30">
                              <label for="Quantity" class="quantity-selector"></label>
                              <div class="quick_view_qty">
                                 <a class="quick_view-qty quick_view-qty-minus">-</a>
                                 <input type="number" id="Quantity" name="quantity" value="1" min="1" max="40" step="1" class="quantity-selector product-form__input" pattern="[0-9]*">
                                 <a class="quick_view-qty quick_view-qty-plus">+</a>
                              </div>
                              <div class="productWishList">
                                 <a href="#" status="0" id_item="5" class="removed-wishlist wishlist btnProductWishlist btnProductWishlist-5">
                                 <i class="zmdi zmdi-favorite"></i>
                                 <span class="wishlist-text">Sản phẩm yêu thích</span>
                                 </a>
                              </div>
                           </div>
                           <div class="product_option_sub">
                              <div class="product-form__item product-form__item--submit">
                                 <button title="vun-lon-dap-to" class="enable-cart btnAddToCart btn product-form__cart-submit mb-15">
                                 <span id="AddToCartText">
                                 Thêm vào giỏ                                 </span>
                                 </button>
                              </div>
                           </div>
                           <script type="text/javascript">
                              $('.btnAddToCart').click(function() {
                                 $.ajax({
                                    method: "POST",
                                    url: "<?=site_url("ajax-them-san-pham")?>",
                                    data: {
                                       productId: '<?=$item->id?>',
                                       qty: $('#Quantity').val()
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                       if (response) {
                                          messageBoxCart('Thêm vào giỏ','Hoàn thành','Sản phẩm của bạn đã được thêm vào giỏ','Tiếp tục mua sắm','Đặt hàng');
                                          $('#_desktop_cart_count').html('<span id="CartCount">'+Object.keys(response).length+'</span>');
                                          $('#qty_cart_item').html(Object.keys(response).length);
                                       } else {
                                          messageBox('ERROR','Thêm sản phẩm',' Thêm sản phẩm thất bại','Đóng')
                                       }
                                    }

                                 });
                              })
                           </script>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-single__tabs mt-100 mt-lg-60">
               <div class="block_nav d-flex justify-content-center">
                  <ul class="nav nav-tabs">
                     <li><a class="active" href="#proTabs1" data-toggle="tab">Mô tả</a></li>
                  </ul>
               </div>
               <div class="tab-content">
                  <div class="tab-pane active" id="proTabs1">
                     <article><?=$item->content?></article>
                  </div>
               </div>
            </div>
            <div class="BottomContent ProductRelated block_margin" style="margin-top: 50px;">
               <div class="block_padding">
                  <div class="title_block mb-0">
                     <span>Sản phẩm liên quan</span>
                  </div>
                  <div class="block__content">
                     <div class="grid grid--view-items">
                        <div class="owl-relatedproduct owl-carousel owl-drag owl-loaded" data-autoplay="false" data-autoplaytimeout="6000" data-items="5" data-nav="true" data-dots="false" data-loop="true" data-items_tablet="3" data-items_mobile="2" data-margin="30">
                           <div class="owl-stage-outer">
                              <div class="owl-stage" style="transform: translate3d(-1200px, 0px, 0px); transition: all 0s ease 0s; width: 4320px;">
							            <? foreach($related_product as $related) { ?>
                                 <div class="owl-item cloned" style="width: 210px; margin-right: 30px;">
                                    <div class="item item-product">
                                       <div class="thumbnail-container has-multiimage has_variants">
                                          <a class="w-100" href="<?=site_url("san-pham/{$category->alias}/{$related->alias}")?>">
                                          <img class="w-100 img-fluid product__thumbnail" src="<?=BASE_URL.$related->image?>" alt="<?=$related->title?>">
                                          </a>
                                          <div class="badge_sale">
                                          </div>
                                       </div>
                                       <div class="product__info text-center">
                                          <div class="product__title">
                                             <a class="limit-content-1-line" href="<?=site_url("san-pham/{$category->alias}/{$related->alias}")?>"><?=$related->title?></a>
                                          </div>
                                          <div class="product__review">
                                             <div class="rating"><span class="shopify-product-reviews-badge" data-id="6153538011328"></span></div>
                                          </div>
                                          <div class="product__price">
                                             <span class="product-price__price product-price__sale">
                                            <a href="<?=site_url("lien-he")?>"> <span class="money"><?=!empty($related->price)?number_format($related->price,0,',','.'): "Liên Hệ"?></span></a>
                                             </span>
                                          </div>
                                          <a class="btn btnAddToCart btnChooseVariant enable-cart" href="<?=site_url("san-pham/{$category->alias}/{$related->alias}")?>">
                                          <i class="zmdi zmdi-zoom-in"></i>
                                          <span>Xem chi tiết</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <? } ?>
                              </div>
                           </div>
                           <!-- <div class="owl-nav">
                              <div class="owl-prev"><i class="zmdi zmdi-caret-left"></i></div>
                              <div class="owl-next"><i class="zmdi zmdi-caret-right"></i></div>
                           </div>
                           <div class="owl-dots disabled"></div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   addLike('.btnProductWishlist');
   <? if (!empty($_GET['loai'])) { ?>
      $(document).ready(function (e) {
         var item = $('.<?="typename-{$_GET['loai']}"?>');
         if(item[0] != undefined) {
            $(item).find('input[type=radio][name=typename]').attr('checked',true);
            let price = item.find('.sub-price').attr('price');
            let max_qty = parseInt(item.attr('qty'));
            let data_src = item.attr('data-src');
            if (data_src!=''){
               data_src = '<?=BASE_URL?>'+data_src;
               $('#ProductPhotoImg').attr('src',data_src);
               $('.zoomImg').attr('src',data_src);
            }
            if(price != undefined) { 
               let sale = parseFloat(item.find('input').attr('sale'));
               price = parseFloat(price);
               $('#Quantity').attr('max',max_qty);
               $('#Quantity').val(1);
               let = money = formatDollar(price*(1-(sale*0.01)));
               if(max_qty!=0){
                  $('.btnAddToCart').removeClass('disable-cart');
                  $('.btnAddToCart').addClass('enable-cart');
                  $('.product__available').html('<span class="in-stock">Còn hàng</span>');
               }else{
                  $('.btnAddToCart').removeClass('enable-cart');
                  $('.btnAddToCart').addClass('disable-cart');
                  $('.product__available').html('<span class="out-stock">Hết hàng</span>');
               }
               let str_price = '<span class="product-price__price product-price__price-nov-product-template product-price__sale product-price__sale--single">';
                     str_price += '<span id="ProductPrice-nov-product-template" itemprop="price" content="'+money+'" class="money mr-10">';
                        str_price += '<span class="money">'+money+'</span>';
                     str_price += '</span>';
                  str_price += '</span>';
               if (sale!=0) 
                  str_price += '<s id="ComparePrice-nov-product-template"><span class="money">'+formatDollar(price)+'</span></s>';
               $('.price-product-detail').html(str_price);
            }
         }
      });
   <? } ?>
   
   $(document).on('click','.quick_view-qty',function() {
      var opera = $(this).html();
      var val = parseInt($('#Quantity').val());
      let min = parseInt($('#Quantity').attr('min'));
      let max = parseInt($('#Quantity').attr('max'));
      if (opera == '+'){
         if (val < max)
         val += 1;
      } else {
         if (val > 1)
         val -= 1;
      }
      $('#Quantity').val(val);
   });
   
   $(document).on('change','#Quantity',function() {
      let min = parseInt($(this).attr('min'));
      let max = parseInt($(this).attr('max'));
      let val = parseInt($(this).val());
      if (val<min)$(this).val(min);else if (val>max)$(this).val(max);
   });
   
   $(document).on('click','.get-item',function() {
      let price = $(this).find('.sub-price').attr('price');
      let max_qty = parseInt($(this).attr('qty'));
      let data_src = $(this).attr('data-src');
      if (data_src!=''){
         data_src = '<?=BASE_URL?>'+data_src;
         $('#ProductPhotoImg').attr('src',data_src);
         $('.zoomImg').attr('src',data_src);
      }
      if(price != undefined) { 
         let sale = parseFloat($(this).find('input').attr('sale'));
         price = parseFloat(price);
         $('#Quantity').attr('max',max_qty);
         $('#Quantity').val(1);
         let = money = formatDollar(price*(1-(sale*0.01)));
         if(max_qty!=0){
            $('.btnAddToCart').removeClass('disable-cart');
            $('.btnAddToCart').addClass('enable-cart');
            $('.product__available').html('<span class="in-stock">Còn hàng</span>');
         }else{
            $('.btnAddToCart').removeClass('enable-cart');
            $('.btnAddToCart').addClass('disable-cart');
            $('.product__available').html('<span class="out-stock">Hết hàng</span>');
         }
         let str_price = '<span class="product-price__price product-price__price-nov-product-template product-price__sale product-price__sale--single">';
               str_price += '<span id="ProductPrice-nov-product-template" itemprop="price" content="'+money+'" class="money mr-10">';
                  str_price += '<span class="money">'+money+'</span>';
               str_price += '</span>';
            str_price += '</span>';
         if (sale!=0) 
            str_price += '<s id="ComparePrice-nov-product-template"><span class="money">'+formatDollar(price)+'</span></s>';
         $('.price-product-detail').html(str_price);
      }
   });
   
   $('.p-typename').click(function() { 
      let st = $(this).attr('stt');
      $('.p-subtypename').css('display','none');
      $('.subtypename-'+st).css('display','block');
   });
   
   $('.image-youtube > .bg').click(function(e){
      var key = $(this).attr('key');
      $('.image-youtube').remove();
      var str = '<div class="embed-responsive embed-responsive-16by9">';
      str += '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+key+'?autoplay=1" id="video" allow="autoplay" allowfullscreen></iframe></div>';
      $('.tab-video-youtube').html(str);
   });
</script>