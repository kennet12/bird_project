<div class="page-width">
   <div class="container">
      <div class="row">
         <div class="sidebar sidebar-collection col-lg-3 col-md-4 flex-xs-unordered">
            <div class="collection_vn pt-md-30 mb-md-40">
               <div class="collection_title">Tat ca </div>
            </div>
            <div id="shopify-section-nov-sidebar" class="shopify-section">
               <div class="close-filter"><i class="zmdi zmdi-close"></i></div>
               <div class="list-filter-selected">
                  <div class="filter-item_title align-items-center">
                     <a href="#" class="nv-ml-auto"><i class="zmdi zmdi-delete"></i>Tất cả sản phẩm</a>
                  </div>
               </div>
               <div class="categories__sidebar sidebar-block sidebar-block__1">
                  <div class="title-block mb-10">Danh Mục</div>
                  <ul class="list-unstyled">
                     <li class="item mb-10">
                        <a href="#" title="danh muc 1">danh muc 1</a>
                     </li>
					 <li class="item mb-10">
                        <a href="#" title="danh muc 1">danh muc 1</a>
                     </li>
					 <li class="item mb-10">
                        <a href="#" title="danh muc 1">danh muc 1</a>
                     </li>
					 <li class="item mb-10">
                        <a href="#" title="danh muc 1">danh muc 1</a>
                     </li>
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
                                 <div class="drop-item" status="sort" data-value="price-desc"><?='Tăng dần'?></div>
                                 <div class="drop-item" status="sort" data-value="price-asc"><?='giảm dần'?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?
                     for ($i=0;$i<16;$i++) {
                     ?>
                     <div class="nov-wrapper-product col" data-colors="blue,red,orange,green,pink" data-materials="" data-sizes="small,medium,large,ultra" data-tags="apple,m,pink,upsell" data-price="3.00">
                        <div class="item-product">
                           <div class="thumbnail-container has-multiimage has_variants">
                              <a href="#">
                                 <img class="w-100 img-fluid product__thumbnail" src="https://www.yen-vietnam.com/files/upload/product/YS000100622/thumb/du-an-moi928.jpg" alt="">
                              </a>
                           </div>
                           <div class="product__info">
                              <div class="block_product_info">
                                 <div class="cate">
                                    <a href="#" title="Bread">danh muc san pham</a>
                                 </div>
                                 <div class="product__title">
								 	<a href="#" class="limit-content-1-line">ten san phẩm</a>
                                 </div>
                                 <div class="product__price">
								 	<span class="product-price__price product-price__sale">
                                      <span class="money"><?=number_format(1000000,0,',','.')?></span>
                                    </span>
                                 </div>
                                 <div class="desc mt-15"><?=character_limiter('Protein: 58% Chất béo: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: tối đa 100 ASH: tối đa 21 - 24% Không nhiễm Melamine',250)?></div>
                              </div>
                              <div class="group_buttons_bottom">
                                 <div class="group-buttons">
                                    <a class="btn btnAddToCart btnChooseVariant" href="#">
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
                  <?//=$pagination?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
	addLike('.btnProductWishlist');
</script>