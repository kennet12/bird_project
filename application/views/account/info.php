<div class="page-width pb-30 ">
    <div class="container">
    <div class="nav-account">
	<div class="list clearfix">
		<div class="item ">
			<a href="<?=site_url("tai-khoan/lich-su-don-hang")?>">Lịch sử đặt hàng</a>
		</div>
		<div class="item active">
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
            <div class="form-vertical">
                <form method="post" action="" id="create_customer" accept-charset="UTF-8">
					<div class="title_block"><span>Thông tin tài khoản</span></div>
					<div class="block-form-login">
						<div class="form-group novform-firstname">
							<input type="text" name="fullname" id="fullname" placeholder="Fullname" value="<?=(!empty($infos->fullname)?$infos->fullname:'')?>">
						</div>
						<div>
							<div class="radio" style="display:inline-block">
								<label style="font-size: 13px">
									<input type="radio" name="gender" style="margin:7px 0 14px 0;" value="1" <?=($infos->gender==1)? 'checked="checked"':' ' ?>>
									Nam								</label>
							</div>
							<div class="radio" style="margin-left: 12px;display:inline-block">
								<label style="font-size: 13px">
									<input type="radio" name="gender" style="margin:7px 0 14px 0;" value="2" <?=($infos->gender==2)? 'checked="checked"':' ' ?>>
									Nữ								</label>
							</div>
						</div>

						<div class="form-group novform-password">
                        <input type="date" name="birthday" id="birthday" class="" placeholder="Birthday" value="<?=date('Y-m-d',strtotime($infos->birthday))?>">
						</div>
						<div class="form-group novform-phone">
							<input type="text" name="phone" id="phone" placeholder="Phone" value="<?=(!empty($infos->phone)?$infos->phone:'')?>">
						</div>
						<div class="form-group novform-password">
							<input type="text" name="address" id="address" class="" placeholder="Address" value="<?=(!empty($infos->address)?$infos->address:'')?>">
						</div>
						<br>
						<div class="form_submit">
							<input id="btn-save" value="Submit" class="btn">
						</div>
					</div>
					<input type="hidden" id="task" name="task" value="">
                </form>
            </div>
        </div>
    </div>
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