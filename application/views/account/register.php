<div class="container">
<div class="row justify-content-center">
    <div class="col-8 col-xs-12">
        <div class="form-vertical">
            <? if ($this->session->flashdata("error")) { ?>
                <div class="alert alert-warning" role="alert">
                <p class="alert-message">
                    <?=$this->session->flashdata("error");?>
                </p>
                </div>
            <? } else if ($this->session->flashdata("success")) {  ?>
                <div class="alert alert-success" role="alert">
                    <p class="alert-message">
                        <?=$this->session->flashdata("success");?>
                    </p>
                    </div>
             <? } ?>
            <form method="post" action="" id="create_customer" accept-charset="UTF-8">
                <input type="hidden" name="form_type" value="create_customer"><input type="hidden" name="utf8" value="✓">
                <div class="title_block"><span>Đăng ký tài khoản</span></div>
                <div class="block-form-login">
                    <div class="form-group novform-firstname">
                        <input type="text" name="new_fullname" id="new_fullname" placeholder="Họ và tên" value="">
                    </div>
                    <div class="form-group novform-email">
                        <input type="email" name="new_email" id="new_email" class="" placeholder="Email" value="">
                    </div>
                    <div class="form-group novform-phone">
                        <input type="text" name="new_phone" id="new_phone" placeholder="Số diện thoại" value="">
                    </div>
                    <div class="form-group novform-password">
                        <input type="password" name="new_password" id="new_password" class="" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group novform-password">
                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="" placeholder="Xác nhận lại mật khẩu">
                    </div>
                    <div class="form-checkbox novform-newsletter">
                        <div class="bank_login">Nếu bạn đã có tài khoản, vui lòng <a href="<?=site_url('tai-khoan')?>">đăng nhập tại đây</a>
                        </div>
                    </div>
                    <div class="form_submit">
                        <a style="color:#fff" id="btn-signup" class="btn">Đăng ký</a>
                    </div>
                </div>
                <input type="hidden" id="task" name="task" value="">
            </form>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {

	$('#btn-signup').click(function() {
		var err = 0;
		var msg = [];

		clearFormError();

		function validatePhone(new_phone) {
			var a = $('#new_phone').val();
			var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			if (filter.test(a)) {
				return true;
			}
			else {
				return false;
			}
		}

		if ($("#new_fullname").val() == "") {
			$("#new_fullname").addClass("error");
			err++;
			msg.push("Nhập họ và tên");
		} else {
			$("#new_fullname").removeClass("error");
		}

		if ($("#new_email").val() == "") {
			$("#new_email").addClass("error");
			err++;
			msg.push("Nhập email");
		} else {
			$("#new_email").removeClass("error");
		}

		if ($("#new_phone").val() == "") {
			$("#new_phone").addClass("error");
			err++;
			msg.push("Nhập số điện thoại");
		} else {
			if (validatePhone('new_phone') == false) {
				$("#new_phone").addClass("error");
				err++;
				msg.push("Sai định dạng số điện thoại");
			}
			else {
				$("#new_phone").removeClass("error");
			}

		}

		if ($("#new_password").val() == "") {
			$("#new_password").addClass("error");
			err++;
			msg.push("Vui lòng nhập password");
		} else if ($("#new_password").val().length < 6) {
			$("#new_password").addClass("error");
			err++;
			msg.push("Mật khâu có độ dài it nhất 6 ký tự");
		} else {
			$("#new_password").removeClass("error");
		}

		if ($("#new_password").val().length && $("#confirm_new_password").val() != $("#new_password").val()) {
			$("#confirm_new_password").addClass("error");
			err++;
			msg.push("Nhập lại xác nhận mật khẩu");
		} else {
			$("#confirm_new_password").removeClass("error");
		}

		if (!err) {
			$('#btn-signup').prop("disabled", true);
			$("#task").val("register");
			$("#create_customer").submit();
		} else {
			showErrorMessage('Đăng nhập thất bại','Đã xã ra lôi', msg, 'Đóng');
		}
	});
});
</script>