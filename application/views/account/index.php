<div class="container">
   <div class="row justify-content-center">
      <div class="col-8 col-xs-12 overflow-hidden">
         <?
            if ($this->session->flashdata("error")) {
         ?>
            <div class="alert alert-warning" role="alert">
               <p class="alert-message">
                  <?=$this->session->flashdata("error");?>
               </p>
            </div>
         <?
            }
         ?>
         <div id="CustomerLoginForm" class="form-vertical">
         <form id="customer_login" name="frm-login" role="form" action="<?=site_url("tai-khoan/index")?>" method="POST" accept-charset="UTF-8">
         <input type="hidden" id="task" name="task" value="">
               <input type="hidden" name="form_type" value="customer_login"><input type="hidden" name="utf8" value="✓">
               <div class="title_block"><span class="text-bold">Đăng nhập</span></div>
               <div class="block-form-login">
                  <div class="title_form"><span>Nhập email và password của bạn:</span></div>
                  <div class="form-group novform-email">
                  <input type="text" name="username" id="username" class="form-control" value="" placeholder="Tên đăng nhập hoặc email">
                  </div>
                  <div class="form-group novform-password">
               <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu">
                     <div class="hide_show_password" style="display: block;">
                        <span class="show"><i class="zmdi zmdi-eye-off"></i></span>
                     </div>
                  </div>
               
                  <div class="bank_register">Nếu bạn chưa có tài khoản vui lòng nhấp vào
                     <a href="<?=site_url("tai-khoan/register")?>">Tạo tài khoản </a>
                  </div>
                  <div class="form_submit">
                  <button type="button" id="btn-login" class="btn">Đăng nhập</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script>
   $(document).ready(function() {

      $(".hide_show_password").click(function(){
      
         var check =  document.getElementById("password")
         if(check.type=='password')
         {
            check.type = "text"
         }
         else if(check.type=='text')
         {
            check.type = "password"
         }

      });


      $(".btn").click(function(){
         var error = [];

            if ($('#username').val() == '') {
               error.push('Vui lòng Email.')
            }
            if ($('#password').val() == '') {
               error.push('Vui lòng nhập Pass.')
            }

            if (error.length == 0) {
               $("#task").val('save');
               $('#customer_login').submit();
            } else {
               messageBox('error','Đã xảy ra lỗi',error);
            }
      });
      
   });
   </script>
</div>