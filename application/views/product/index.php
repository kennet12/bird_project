<div class="page-width">
   <div class="container">
      <div class="row">
         <div class="sidebar sidebar-collection col-lg-3 col-md-4 flex-xs-unordered">
            <div class="collection_vn pt-md-30 mb-md-40">
               <div class="collection_title">Tất cả sản phẩm</div>
            </div>
            <div id="shopify-section-nov-sidebar" class="shopify-section">
               <div class="close-filter"><i class="zmdi zmdi-close"></i></div>
               <div class="list-filter-selected">
                  <div class="filter-item_title align-items-center">
                     <a href="<?=site_url("san-pham")?>" class="nv-ml-auto"><i class="zmdi zmdi-delete"></i>Tất cả sản phẩm</a>
                  </div>
               </div>
               <div class="categories__sidebar sidebar-block sidebar-block__1">
                  <div class="title-block mb-10">Danh Mục </div>
                  <ul class="list-unstyled">
                      <? foreach($result_revice_category as $result_category){?> 
                        <li class="item mb-10">
                        
                           <a href="<?=site_url("san-pham/{$result_category->alias}")?>" title="<?=$result_category->name?>"><?=$result_category->name?></a>
                        
                        </li>
                     <?}?>
                  </ul>
                  <script>
                     $('.zmdi-caret-right').click(function(e){
                        var stt = $(this).attr('stt');
                        var cls = $(this).attr('cls');
                        if (stt == '0'){
                           $(this).addClass('active');
                           $(this).attr('stt','1');
                        } else {
                           $(this).removeClass('active');
                           $(this).attr('stt','0');
                        }
                        $('.'+cls).toggle('fast');
                     })
                  </script>
               </div>
               <script>
                  $('.zmdi-caret-right').click(function(e) {
                     $(this).parents('.item-sub').find('.childsub-item').toggle('fast');
                  })
               </script>
            </div>
         </div>
         <div class="col-lg-9 col-md-12 flex-xs-first">
            <div id="shopify-section-collection-template" class="shopify-section">
               <div data-section-id="collection-template" data-section-type="collection-template" data-panigation="12">
                  <div class="row collection-view-items view_3 grid--view-items">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sortPagiBar d-md-flex align-items-center">
                           <div class="filter_button d-lg-none h_sidebar" style="font-size: 25px;margin-bottom: 10px;">
                              <i class="zmdi zmdi-format-subject"></i>
                              Menu
                           </div>
                           <div class="filters-toolbar__item d-flex align-items-center">
                              <div class="pagination__viewing">
                                 Trang 1 - 20 | 40 Sản phẩm
                              </div>
                              <div class="gridlist-toggle">
                                 <a href="#" id="grid-3" title="Grid View 3" data-type="view_3" class="active"><i class="zmdi zmdi-apps"></i></a>
                                 <a href="#" id="grid-2" title="Grid View 2" data-type="view_2"><i style="transform: rotate(90deg);" class="zmdi zmdi-view-module"></i></a>
                                 <a href="#" id="list" title="List View" data-type="list"><i class="zmdi zmdi-view-list"></i></a>
                              </div>
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" value="a" aria-expanded="true">
                              <? 
                              if(!empty($_GET['sort'])) {
                                 if ($_GET['sort'] == 'price-desc') {
                                    echo 'Tăng dần';
                                 } else if ($_GET['sort'] == 'price-asc') {
                                    echo 'giảm dần';
                                 }
                              } else {
                                 echo 'Sắp sếp';
                              }
                              ?>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right text-right">
                                 <div class="drop-item active" status="sort" data-value="">Sắp xếp</div>
                                 <div class="drop-item" id="price-desc" status="sort" data-value="price-desc"><?='Tăng dần'?></div>
                                 <div class="drop-item" id="price-asc" status="sort" data-value="price-asc"><?='giảm dần'?></div>
                              </div>   
                           </div>
                        </div>
                     </div>
                     <?
                    foreach($result_products as $result_product){
                     ?>
                     <div class="nov-wrapper-product col" data-colors="blue,red,orange,green,pink" data-materials="" data-sizes="small,medium,large,ultra" data-tags="apple,m,pink,upsell" data-price="3.00">
                        <div class="item-product">
                           <div class="thumbnail-container has-multiimage has_variants">
                              <a href="<?=site_url("san-pham/{$result_product->alias}/{$result_product->id}")?>" style="margin-top: 10px;">
                                 <img class="w-100 img-fluid product__thumbnail" src="<?=!empty($result_product ->image)?$result_product ->image : ' '?>" alt="">
                              </a>
                           </div>
                           <div class="product__info">
                              <div class="block_product_info">
                                 
                                 <div class="product__title">
								         	<a href="#" class="limit-content-1-line"><?=$result_product ->title; ?></a>
                                 </div>
                                 <div class="product__price">
								         	<span class="product-price__price product-price__sale">
                                    <span class="money"><?=!empty($result_product ->price)?number_format($result_product ->price,0,',','.')." VND" : "Liên Hệ "?></span>
                                    
                                    </span>
                                 </div>
                                 <div class="desc mt-15"><?=character_limiter($result_product ->content,250)?></div>
                              </div>
                              <div class="group_buttons_bottom">
                                 <div class="group-buttons">
                                    <a class="btn btnAddToCart btnChooseVariant" href="<?=site_url("san-pham/{$result_product->alias}/{$result_product->id}")?>">
                                       <i class="zmdi zmdi-zoom-in"></i>
                                       <span>Xem chi tiết</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
					      <? } ?>
                     <!------------------------------------------------------>
                  </div>
                  <!-----pagination---->
                  <?=$pagination?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
	addLike('.btnProductWishlist');
   $('#price-desc').click(function(){
      // window.location.href = $(this).attr('linkHref');
    })
    $('#price-asc').click(function(){
      // window.location.href = $(this).attr('linkHref');
    })
</script>