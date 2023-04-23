<div style="background: #fff;padding: 20px 0;">
<div class="row justify-content-center">
    <div class="col-8 col-xs-12">
        <div class="form-vertical">
            <form method="post" action="" id="create_customer" accept-charset="UTF-8">
            <div class="title_block"><span>Change password</span></div>
            <div class="block-form-login">
                <div class="form-group novform-password">
                    <input type="password" name="password" id="password" placeholder="Current password.">
                </div>
                <div class="form-group novform-password">
                    <input type="password" name="new_password" id="new_password" class="" placeholder="New password.">
                </div>
                <div class="form-group novform-password">
                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="" placeholder="Confirm password">
                </div>
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

<script>
$(document).ready(function() {

    $(".btn-save").click(function(){
        // var error = [];

        // if ($('#username').val() == '') {
        //             error.push('Vui lòng Email.')
        //         }
        //         if ($('#phone').val() == '') {
        //             error.push('Vui lòng nhập số điện thoại.')
        //         }
        //     if ($('#address').val() == '') {
        //             error.push('Vui lòng nhập địa chỉ.')
        //         }
        //     if (error.length == 0) {
                $('#create_customer').submit();
            // } else {
            //     messageBox('error','Đã xảy ra lỗi',error);
            // }
    });
 
});
</script>