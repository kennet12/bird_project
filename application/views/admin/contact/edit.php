
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title;?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<div class="form-box">
					<form id="form-post" action="" method="POST">
						<input type="hidden" name="task" id="task" class="form-control" value="">
						<div class="row">
						<div class="col-md-1">
						</div>
							<div class="col-md-10">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Họ và Tên  </span>
										<input type="text" id="title" name="title" value="<?=!empty($contact_chuyen_item->name)? $contact_chuyen_item->name :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Email</span>
										<input type="text" id="email" name="email" value="<?=!empty($contact_chuyen_item->email)? $contact_chuyen_item->email:'' ?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Phone</span>
										<input type="text" id="phone" name="phone" value="<?=!empty($contact_chuyen_item->phone)? $contact_chuyen_item->phone:'' ?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Nôi Dung</span>
										<input type="text" id="content" name="content" value="<?=!empty($contact_chuyen_item->content)? $contact_chuyen_item->content:'' ?>" class="form-control">
									</div>
								</div>
							</div>
						
						<div class="col-md-1">
						</div>
						<div class="text-center">
							<button type="button" class="btn-save btn bg-gradient-success">Cập nhật</button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
	$("#file-upload").change(function() {
		readURL(this);
	});
	
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.wrap-upload-banner').css({
					"background-image": "url('"+e.target.result+"')"
				});
				$('.wrap-upload-banner > i').css({
					"color": "rgba(52, 73, 94, 0.38)"
				});
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(".btn-save").click(function(){
		var error = [];

			if ($('#name').val() == '') {
				error.push('Vui lòng nhập tên tiêu đề.')
			}

			if ($('#email').val() == '') {
				error.push('Vui lòng nhập Email')
			}
			if ($('#content').val() == '') {
				error.push('Vui lòng nhập nội dung.')
			}
			if ($('#phone').val() == '') {
				error.push('Vui lòng nhập số điện thoại.')
			}

			if (error.length == 0) {
				$("#task").val('save');
				$('#form-post').submit();
			} else {
				messageBox('error','Đã xảy ra lỗi',error);
			}

			});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>