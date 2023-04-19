<div id="shopify-section-cart-template" class="shopify-section cart-section">
   <div class="page-width book-cart-shop" data-section-id="cart-template" data-section-type="cart-template">
      <div class="container">
         <div class="section-header">
            <div class="title-block">Giỏ hàng</div>
         </div>
         <form action="/cart" method="post" novalidate="" class="cart">
            <div class="row data-sticky_parent">
               <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                  <div class="cart__layout_left">
                     <div class="cart__header d-xs-none">
                        <div class="row spacing-0">
                           <div class="col-md-1 label_remove"></div>
                           <div class="col-md-5 label_product">Sản phẩm</div>
                           <div class="col-md-2 label_price">Giá</div>
                           <div class="col-md-2 label_quantity">SL</div>
                           <div class="col-md-2 label_total">Thành tiền</div>
                        </div>
                     </div>
                     <div class="cart__body">
                        <? foreach($carts as $cart) { ?>
                        <div id="<?=$cart['rowid']?>" class="row spacing-0 align-items-center line2 cart-flex cart_item nv-pl-xs-15 nv-pr-xs-15">
                           <div class="col-md-1 cart__remove-wrapper text-center mb-xs-20">
                              <a href="#" class="cart__remove">
                                 <i class="zmdi zmdi-delete" rowid_item="<?=$cart['rowid']?>" id_item="<?=$cart['id']?>"></i>
                              </a>
                           </div>
                           <div class="col-md-5 cart__image-wrapper d-flex align-items-center mb-xs-20">
                              <a href="#">
                              <img class="cart__image" src=".<?=$cart['thumbnail']?>">
                              </a>
                              <div class="cart__meta cart-flex-item">
                                 <div class="content-left">
                                    <div class="list-view-item__title">
                                       <a target="_blank" href="https://www.yen-vietnam.com/to-yen-tinh-che-loai-1.html"><?=$cart['name']?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2 cart__price-wrapper mb-xs-20">
                              <div>
                                 <span class="money"><?=number_format($cart['price'],0,',','.')?></span>
                              </div>
                           </div>
                           <div class="col-md-2 cart__update-wrapper mb-xs-20">
                              <div class="cart__qty">
                                 <input type="button" class="js-qty__adjust minus js-qty__adjust--minus" value="-" max="150" cost="1800000" price="1800000" id_item="11" sale="0" stt="0">
                                 <input class="cart__qty-input qty quantity quantity-0 quantity-11" value="<?=$cart['qty']?>" cost="1800000" price="1800000" id_item="11" sale="0" stt="0">
                                 <input type="button" class="js-qty__adjust plus js-qty__adjust--plus" value="+" max="150" cost="1800000" price="1800000" id_item="11" sale="0" stt="0"> 
                              </div>
                           </div>
                           <div class="col-md-2 total">
                              <div class="product-subtotal">
                                 <span class="money price-0"><?=number_format($cart['subtotal'],0,',','.')?></span>
                              </div>
                           </div>
                        </div>
                        <? } ?>
                     </div>
                  </div>
               </div>
               <script>
                $('.zmdi-delete').click(function() {
                    let cf = confirm('Bạn có chắc xóa sản phẩm này không?')
                    if (cf) {
                        var rowId = $(this).attr('rowid_item')
                        $.ajax({
                            method:'POST',
                            url: "<?=site_url("ajax-xoa-san-pham")?>",
                            data: {
                                rowId: rowId,
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response) {
                                    var subtotal = parseInt($('#'+rowId).find('.product-subtotal > .money').html().replaceAll('.',''))
                                    var total = parseInt($('.total-money').html().replaceAll('.',''))
                                    $('.total-money').html(formatDollar(total-subtotal))

                                    $('#_desktop_cart_count').html('<span id="CartCount">'+Object.keys(response).length+'</span>');
                                    $('#qty_cart_item').html(Object.keys(response).length);

                                    $('#'+rowId).remove();
                                }
                            }
                        })
                    }
                })
                $('.quantity').change(function(e) {
                    let qty = $(this).val();
                    if (qty < 1) {
                        $(this).val(1)
                    }
                })
                $('.js-qty__adjust').click(function(e){
                    let t = $(this).val();
                    let qty = parseInt($(this).parents('.cart__qty').find('.quantity').val());
                    if (t == '+'){
                        qty += 1;
                    } else {
                        if (qty > 1)
                        qty -= 1;
                    }
                    $(this).parents('.cart__qty').find('.quantity').val(qty);
                })
               </script>
               <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 data-sticky_column mt-md-40">
                  <div class="cart__layout_right">
                     <div class="cart__heading">
                        <div><span class="total-qty"></span>  sản phẩm trong giỏ</div>
                     </div>
                     <div class="grid">
                        <div class="grid__item">
                           <div class="cart__total d-flex align-items-center justify-content-between">
                              <span class="cart__subtotal-title">Tổng tiền:</span>
                              <span class="cart__subtotal"><span class="total-money money"><?=number_format($this->cart->total(),'0',',','.')?></span></span>
                           </div>
                           <br>
                           <div id="threshold_bar_popup">
                              <div class="threshold_it">
                                 <div class="ic_threshold_bar">
                                    <i class="zmdi zmdi-truck"></i>
                                 </div>
                                 <div class="threshold_bar">
                                    <span class="animate" style="width:25%!important">25%</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box-confirm-cart">
                           <input type="checkbox" class="confirm-cart" name="Đồng ý điều khoản mua hàng" value="confirm">
                           <label for="Đồng ý điều khoản mua hàng">Đồng ý điều khoản mua hàng</label>
                        </div>
                     </div>
                  </div>
                  <a href="https://www.yen-vietnam.com/dat-hang.html" class="btn-get-cart">Đặt hàng</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>