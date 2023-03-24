
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title;?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
				<div class="form-box">
					<form id="form-post" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="task" id="task" class="form-control" value="">
						<div class="row">
						<div class="col-md-1">
						</div>
							<div class="col-md-10">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tiêu đề</span>
										<input type="text" name="title" id="title" value="<?=!empty($slider_chuyen_item->title)? $slider_chuyen_item->title :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">link liên kết</span>
										<input type="text" name="link" value="<?=!empty($slider_chuyen_item->link)? $slider_chuyen_item->link:'' ?>" class="form-control">
									</div>
									<div class="form-group">
										<div class="input-group">
											<textarea class="form-control" id="description" name="description" placeholder="Mô tả" rows="5"><?=!empty($slider_chuyen_item->description)? $slider_chuyen_item->description :''?></textarea>
										</div>
									</div>
									
									
									<div class="row">
									<div class="col-6">
											<label class="wrap-upload-banner" <?=!empty($slider_chuyen_item->thumbnail) ? 'style="background: url('.BASE_URL. $slider_chuyen_item->thumbnail.')"' : ''?>') no-repeat">
												<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($slider_chuyen_item->title) ? $slider_chuyen_item->title : ''?>">
												<i class="fa fa-cloud-upload" aria-hidden="true"></i>
											</label>
										</div>
										<div class="col-2"></div>
										<div class="col-4">
											
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="1" <?=!empty($slider_chuyen_item->active)? 'checked="checked"':' ' ?>>
													Hiện
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="0" <?=empty($slider_chuyen_item->active)? 'checked="checked"':' ' ?> >
													Ẩn
												</label>
											</div>
										</div>
									</div>
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

			if ($('#title').val() == '') {
				error.push('Vui lòng nhập tên tiêu đề.')
			}
			if ($('#description').val() == '') {
				error.push('Vui lòng nhập mô tả.')
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