
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
						<div class="col-md-1">
						</div>
							<div class="col-md-10">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tên Danh Mục</span>
										<input type="text" id="title" name="title" value="<?=!empty($product_category_chuyen->name)? $product_category_chuyen->name :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Alias</span>
										<input type="text" id="alias" name="alias" value="<?=!empty($product_category_chuyen->alias)? $product_category_chuyen->alias :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Chi Tiết</span>
										<input type="text" id="description" name="description" value="<?=!empty($product_category_chuyen->description)? $product_category_chuyen->description :''?>" class="form-control">
									</div>
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="input-group">
												<label class="wrap-upload-banner" <?=!empty($product_category_chuyen->thumbnail) ? 'style="background: url('.BASE_URL. $product_category_chuyen->thumbnail.')"' : ''?>') no-repeat">
													<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($product_category_chuyen->title) ? $slider_chuyen_item->title : ''?>">
													<i class="fa fa-cloud-upload" aria-hidden="true"></i>
												</label>
											</div>
										</div>
										
										<div class="col-md-6">

												<span>Hiển thị Danh Mục</span>
												<div class="radio">
													<label>
														<input type="radio" name="active" id="input" value="1" checked="checked" <?=!empty($iteproduct_category_chuyenm->active) ? 'checked="checked"' : ''?>>
														Hiện
													</label>
												</div>

												<div class="radio">
													<label>
														<input type="radio" name="active" id="input" value="0" <?=empty($product_category_chuyen->active) ? : ''?>>
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
				error.push('Vui lòng nhập chi tiết.')
			}
			if ($('#file-upload').val() == '') {
				error.push('Vui lòng nhập hình ảnh.')
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