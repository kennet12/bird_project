<div class="page-width pb-30 ">
<div class="container">
<div class="nav-account">
   <div class="list clearfix">
      <div class="item active">
         <a href="<?=site_url("tai-khoan/lich-su-don-hang")?>">Lịch sử đặt hàng</a>
      </div>
      <div class="item ">
         <a href="<?=site_url("tai-khoan/info")?>">Cập nhật thông tin</a>
      </div>
      <div class="item ">
         <a href="<?=site_url('tai-khoan/change-pass')?>">Đổi mật khẩu</a>
      </div>
   </div>
</div>
<div style="background: #fff;padding: 20px 0;">
    <div class="row justify-content-center">
        <div class="col-8 col-xs-12">
        <?
            $status_arr = [
               '0' => 'Chờ duyệt',
               '1' => 'Kiểm hàng',
               '2' => 'Giao hàng',
               '3' => 'Hoàn thành',
            ];
            foreach($orders as $order) { ?>
            <div class="form-vertical">
               <div class="order-status">
                  <div class="status status-<?=$order->status?>">
                     <?=$status_arr[$order->status]?>
                  </div>
               </div>
               <table class="orders">
                  <tr>
                     <td width="100px">Mã đơn hàng:</td>
                     <td><strong><?='BSMK00'.$order->id?></strong></td>
                  </tr>
                  <tr>
                     <td width="100px">Tên khách hàng:</td>
                     <td><strong><?=$order->fullname?></strong></td>
                  </tr>
                  <tr>
                     <td width="100px">Email:</td>
                     <td><?=$order->email?></td>
                  </tr>
                  <tr>
                     <td width="100px">Số điện thoại:</td>
                     <td><?=$order->phone?></td>
                  </tr>
                  <tr>
                     <td width="100px">Địa chỉ:</td>
                     <td><?=$order->address?></td>
                  </tr>
                  <? if(!empty($order->message)) { ?>
                  <tr>
                     <td width="100px">Ghi chú:</td>
                     <td><?=$order->message?></td>
                  </tr>
                  <? } ?>
               </table>
               <div class="order-detail">
                  <table>
                     <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Tên SP</th>
                        <th>Giá</th>
                        <th>SL</th>
                        <th>Thành tiền</th>
                     </tr>
                     <? $total = 0; $i=1; foreach($order->order_details as $order_detail) { 
                        $total += $order_detail->price*$order_detail->qty;
                     ?>
                     <tr>
                        <td><?=$i++?></td>
                        <td><img src="<?=BASE_URL.$order_detail->thumbnail?>" alt=""></td>
                        <td><?=$order_detail->name?></td>
                        <td><?=number_format($order_detail->price,0,',','.')?></td>
                        <td><?=$order_detail->qty?></td>
                        <td><?=number_format($order_detail->price*$order_detail->qty,0,',','.')?></td>
                     </tr>
                     <? } ?>
                  </table>
               </div>
               <div style="text-align: right;font-size: 18px;">
                     Tổng tiền: <strong><?=number_format($total,0,',','.')?></strong>
               </div>
            </div>
            <? } ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

 $(".btn").click(function(){
     var error = [];

     if ($('#username').val() == '') {
				error.push('Vui lòng Email.')
			}
			if ($('#phone').val() == '') {
				error.push('Vui lòng nhập số điện thoại.')
			}
         if ($('#address').val() == '') {
				error.push('Vui lòng nhập địa chỉ.')
			}
         if (error.length == 0) {
             $('#create_customer').submit();
         } else {
             messageBox('error','Đã xảy ra lỗi',error);
         }
 });
 
});
</script>