<div id="shopify-section-cart-template" class="shopify-section cart-section">
   <div class="page-width book-cart-shop" data-section-id="cart-template" data-section-type="cart-template">
      <div class="container">
         <div class="section-header">
            <div class="title-block">Đặt hàng</div>
         </div>
         <form method="post" novalidate="" class="cart box-checkout">
            <div class="row data-sticky_parent">
               <div class="col-md-7 data-sticky_column mt-md-40">
                  <div class="cart__layout_right">
                     <div class="cart__heading">
                        <div><span class="total-qty"></span>  Thông tin đặt hàng</div>
                     </div>
                     <div class="grid info">
                        <div class="grid__item">
                           <input type="email" name="" id="input" class="form-control" value="" required="required" placeholder="Email" title="">
                           <div class="row">
                              <div class="col-md-6">
                                 <input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Họ tên" title="">
                              </div>
                              <div class="col-md-6">
                                 <input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Số điện thoại" title="">
                              </div>
                           </div>
                           <input type="text" name="" id="input" class="form-control" value="" required="required" placeholder="Địa chỉ nhận hàng" title="">
                           <textarea name="message" id="input" class="form-control" rows="3" placeholder="Ghi chú giao hàng"></textarea>
                        </div>
                        <div class="text-center">
                           <a href="<?=site_url("dat-hang/mua-hang")?>" class="btn-get-cart">Mua hàng</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="cart__layout_left carts">
                     <div class="cart__header d-xs-none">
                        <div class="row spacing-0">
                           <div class="col-md-1 label_product"></div>
                           <div class="col-md-5 label_product">Sản phẩm</div>
                           <div class="col-md-2 label_price">Giá</div>
                           <div class="col-md-2 label_quantity">SL</div>
                           <div class="col-md-2 label_total">Thành tiền</div>
                        </div>
                     </div>
                     <div class="cart__body">
                        <div id="f457c545a9ded88f18ecee47145a72c0" class="row spacing-0 align-items-center line2 cart-flex cart_item nv-pl-xs-15 nv-pr-xs-15">
                           <div class="col-md-1 cart__remove-wrapper text-center mb-xs-20">
                              
                           </div>
                           <div class="col-md-5 cart__image-wrapper d-flex align-items-center mb-xs-20">
                              <a href="#">
                              <img class="cart__image" src="./files/upload/image/product/49/691675.jpg">
                              </a>
                              <div class="cart__meta cart-flex-item">
                                 <div class="content-left">
                                    <div class="list-view-item__title">
                                       <a target="_blank" href="https://www.yen-vietnam.com/to-yen-tinh-che-loai-1.html">mỡ cá biển 1</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2 cart__price-wrapper mb-xs-20">
                              <div>
                                 <span class="money">150.000</span>
                              </div>
                           </div>
                           <div class="col-md-2 cart__update-wrapper mb-xs-20">
                              <strong>1</strong>
                           </div>
                           <div class="col-md-2 total">
                              <div class="product-subtotal">
                                 <span class="money price-0">3.000.000</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   function updateCart(element) {
      let rowId = element.parents('.cart__qty').attr("rowid_item")
      $.ajax({
         method:'POST',
         url: "<?=site_url("ajax-cap-nhat-san-pham")?>",
         data: {
            rowId: rowId,
            qty:element.val()
         },
         dataType: "json",
         success: function (response) {
            if (response) {
               const items= Object.entries(response[0])
               for (let i = 0; i < items.length; i++) {
                  $('#'+items[i][1].rowid).find('.product-subtotal > .money').html(formatDollar(items[i][1]['subtotal']))
               }
               $('.total-money').html(formatDollar(response[1]))
            }
         }
      })
   }
      $('.quantity').change(function(e) {
      let qty = $(this).val();
      if (qty < 1) {
         $(this).val(1)
      }
      updateCart($(this))
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

      updateCart($(this).parents('.cart__qty').find('.quantity'))
   })
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
</script>