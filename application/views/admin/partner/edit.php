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
										<span class="input-group-text" id="basic-addon1">Tên Đối Tác</span>
										<input type="text" id ="name" name="name" value="<?=!empty($partners->name)? $partners->name :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Url</span>
										<input type="text" name="url" value="<?=!empty($partners->url)? $partners->url :''?>" class="form-control">
									</div>
									<div class="row">
										<div class="col-6">
											<label class="wrap-upload-banner" <?=!empty($partners->banner) ? 'style="background: url('.BASE_URL. $partners->banner.')"' : ''?>') no-repeat">
												<input type="file" name="banner" id="file-upload" value="<?=!empty($partners->name) ? $partners->name : ''?>">
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
								</div>
							</div>
						</div>
							<button type="button" class="btn-save btn bg-gradient-success">Cập nhật</button>
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
			error.push('Vui lòng nhập tên.')
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