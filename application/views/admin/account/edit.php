<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<div class="form-box">
					<form id="form-post" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="task" id="task" class="form-control" value="">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tên Người Dùng</span>
										<input type="text" id="fullname" name="fullname" value="<?=!empty($user->fullname)? $user->fullname :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Số Điện Thoại</span>
										<input type="text" id="phone" name="phone" value="<?=!empty($user->phone)? $user->phone  :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Địa Chỉ</span>
										<input type="text" name="address" value="<?=!empty($user->address)? $user->address  :''?>" class="form-control">
									</div>
									<div class="row">
										<div class="col-md-6">
											<div>Giới tính </div>
											<div class="radio">
												<label>
													<input type="radio" name="gender" id="input" value="1" <?=!empty($user->gender) ? 'checked="checked"' : ''?>>
													Nam
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="gender" id="input" value="0" <?=empty($user->gender) ? 'checked="checked"' : ''?>>
													Nữ
												</label>
											</div>
										</div>
										<div class="col-md-6">
											<div>Trạng thái</div>
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="1" <?=!empty($user->active) ? 'checked="checked"' : ''?>>
													Hoạt động
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="0" <?=empty($user->active) ? 'checked="checked"' : ''?>>
													Khóa
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<label class="wrap-upload-banner" <?=!empty($user->avatar) ? 'style="background: url('.BASE_URL. $user->avatar.')"' : ''?>') no-repeat">
												<input type="file" name="avatar" id="file-upload" value="<?=!empty($user->fullname) ? $user->fullname : ''?>">
												<i class="fa fa-cloud-upload" aria-hidden="true"></i>
											</label> 
										</div>
									</div>
									<div class="text-center">
									<button type="button" class="btn-save btn bg-gradient-success">Cập nhật</button>
									</div>
								</div>
							</div>
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

		if ($('#fullname').val() == '') {
			error.push('Vui lòng nhập tên.')
		}

		if ($('#phone').val() == '') {
			error.push('Vui lòng nhập số điện thoại.')
		}

		if (error.length == 0) {
			$("#task").val('save');
			$('#form-post').submit();
		} else {
			messageBox('error','Đã xảy ra lỗi',error); // success
		}
		
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>