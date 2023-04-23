<?require_once(APPPATH."views/module/notification.php");?> 
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
                     <span id='message'></span>
                  </div>
                  <div class="form_submit">
                     <input id="btn-save"  value="Submit" class="btn pure-button pure-button-primary">
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
   
//    $('#new_password, #confirm_new_password').on('keyup', function () {
//      if ($('#new_password').val() == $('#confirm_new_password').val()) {
//        $('#message').html('re-enter the correct password').css('color', 'green');
       $("#btn-save").click(function(){
        //    var error = [];
        //         if ($('#password').val() == '') {
        //            error.push('Vui lòng nhập mật khẩu .')
        //        }
   
        //        if ($('#new_password').val() == '') {
        //            error.push('<br>Vui lòng nhập mật khẩu mới.')
        //        }
        //        if ($('#confirm_new_password').val() == '') {
        //            error.push('<br>Vui lòng xác nhận lại mật khẩu.')
        //        }
             
        //        if (error.length == 0) {
                   $('#create_customer').submit();
            //    } else {
            //        messageBox('error','Đã xảy ra lỗi',error);
            //    }
       });
//      } else 
//        $('#message').html('re-enter wrong password').css('color', 'red');
//    });
    
   });
</script>