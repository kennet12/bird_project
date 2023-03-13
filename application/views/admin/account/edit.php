<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<div class="form-box">
					<form id="form-post" action="" method="POST">
						<input type="hidden" name="task" id="task" class="form-control" value="">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tên Người Dùng</span>
										<input type="text" name="fullname" value="<?=!empty($user->fullname)? $user->fullname :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Mật Khẩu</span>
										<input type="text" name="gender" value="<?=!empty($user->password)? $user->password :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Email</span>
										<input type="text" name="gender" value="<?=!empty($user->email)? $user->email :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Giới Tính</span>
										<input type="text" name="Password" value="<?=!empty($user->gender)? $user->gender :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Số Điện Thoại</span>
										<input type="text" name="Password_text" value="<?=!empty($user->phone)? $user->phone  :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Địa Chỉ</span>
										<input type="text" name="Password_text" value="<?=!empty($user->address)? $user->address  :''?>" class="form-control">
									</div>
									<div class="row">
										<div class="col-6">
											<label class="wrap-upload-banner" <?=!empty($user->avatar) ? 'style="background: url('. $user->avatar.')"' : ''?>') no-repeat">
												<input type="file" name="avatar" id="file-upload" value="<?=!empty($user->fullname) ? $user->fullname : ''?>">
												<i class="fa fa-cloud-upload" aria-hidden="true"></i>
											</label>
										</div>
										<div class="col-6">
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="1" <?=!empty($parnerts->active) ? 'checked="checked"' : ''?>>
													Hiện
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="0" <?=empty($parnerts->active) ? 'checked="checked"' : ''?>>
													Ẩn
												</label>
											</div>
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
		$("#task").val('save');
		$('#form-post').submit();
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>