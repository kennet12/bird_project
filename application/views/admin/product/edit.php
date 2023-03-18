<?
	$product_categories = $this->m_product_categories->items();
?>
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
							<div class="col-md-6">
							<div class="form-group">
									<div class="input-group invalid">
									<select id="category_id" name="category_id" class="form-control">
										<option value="">Loại sản phẩm</option>
										<? foreach($product_categories as $product_categories_value )
										{
											if($product_categories_value->active==1)
											{
												?>
												<option value="<?=$product_categories_value->id?>"><?=$product_categories_value->name?></option>
											<?
											}
										}
										?>
										<script type="text/javascript">
											$("#category_id").val("<?=$kq_product_item->category_id?>");
										</script>
										
									</select>
									</div>
									<div class="input-group invalid">
										<span class="input-group-text" id="basic-addon1">Tên Sản Phẩm</span>
										<input type="text" name="title" id="title" value="<?=!empty($kq_product_item->title)? $kq_product_item->title :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Giá</span>
										<input type="text" id="price" name="price" value="<?=!empty($kq_product_item->price)? $kq_product_item->price :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Alias</span>
										<input type="text" id="alias" name="alias" value="<?=!empty($kq_product_item->alias)? $kq_product_item->alias :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Nội Dung</span>
										<input type="text" id="content" name="content" value="<?=!empty($kq_product_item->content)? $kq_product_item->content :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Lượt Xem</span>
										<input type="text" id="view_num" name="view_num" value="<?=!empty($kq_product_item->view_num)? $kq_product_item->view_num :''?>" class="form-control">
									</div>
									<div class="row">
										<div class="col-6">
										<strong >Sản Phẩm nổi bật</strong>
											<div class="check_bold1">
												<div class="radio">
													<label>
														<input type="radio" name="check_bold" checked="checked" id="input" value="1" <?=!empty($kq_product_item->check_bold)? 'checked="checked"':' ' ?> >
														Hiện
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="check_bold" id="input" value="0" <?=empty($kq_product_item->active)? 'checked="checked"':' ' ?> >
														Ẩn
													</label>
												</div>
											</div></div>
										<div class="col-6">
										<strong >Trạng Thái Sản Phẩm</strong>
											<div class="check_active">
												<div class="radio">
													<label>
														<input type="radio" name="active" checked="checked" id="input" value="1" <?=!empty($kq_product_item->active)? 'checked="checked"':' ' ?>>
														Hiện
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="active" id="input" value="0" <?=empty($kq_product_item->active)? 'checked="checked"':' ' ?>  >
														Ẩn
													</label>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<textarea class="form-control tinymce" id="description" name="description"  placeholder="Chi tiết sản phẩm" rows="5"></textarea>
							</div>
						</div>
						<br>
						<strong>Ảnh Sản Phẩm</strong>
						<div class="row">
							<? for ($i=0; $i < 4; $i++) { 
								$info = new stdClass();
								$info->product_id = $kq_product_item->id;
								$info->stt = $i;
								$image = $this->m_product_gallery->items($info);
							?>
							<div class="col-md-3">
								<div class="box-file-upload">
									<label class="wrap-upload-banner image-<?=$i?>" <?=!empty($image[0]->thumbnail) ? 'style="background: url('.BASE_URL. $image[0]->thumbnail.')"' : ''?>') no-repeat">
										<input type="file" name="thumbnail_<?=$i?>" class="file-upload" stt="<?=$i?>" value="">
										<input type="hidden" name="type_edit_<?=$i?>" class="type-edit" value="0">
										<i class="fa fa-cloud-upload" aria-hidden="true"></i>
									</label>
									<i class="fa-regular fa-trash-can"></i>
								</div>
							</div>
							<? } ?>
						</div>
						<div class="text-center">
							<button type="button" id="btn-save" class="btn-save btn bg-gradient-success">Cập nhật</button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function() {
	$(".file-upload").change(function() {
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				let stt = $(input).attr('stt');

				$('.image-'+stt).css({
					"background-image": "url('"+e.target.result+"')"
				});
				$('.image-'+stt+' > .type-edit').val(1);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
	$('.fa-trash-can').click(function (e) {
		$(this).parents('.box-file-upload').find('.wrap-upload-banner').css({"background-image": "none"});
		$(this).parents('.box-file-upload').find('.file-upload').val('');
		$(this).parents('.box-file-upload').find('.type-edit').val(1);
	})
	$(".btn-save").click(function(){
		var error = [];

			// if ($('#title').val() == '') {
			// 	error.push('Vui lòng nhập tên tiêu đề.')
			// }

			// if ($('#link').val() == '') {
			// 	error.push('Vui lòng nhập Link')
			// }
			// if ($('#description').val() == '') {
			// 	error.push('Vui lòng nhập nội dung.')
			// }

			// if (error.length == 0) {
				$("#task").val('save');
				$('#form-post').submit();
			// } else {
			// 	messageBox('error','Đã xảy ra lỗi',error);
			// }

			});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>