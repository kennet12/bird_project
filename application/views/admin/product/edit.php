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
						<div class="col-md-1">
						</div>
							<div class="col-md-10">
								<div class="form-group"><td class="table-head text-right">Loại sản phẩm</td>
									<div class="input-group invalid">
									<td>
										<select id="category_id" name="category_id" class="form-control">
											<? foreach($product_categories as $product_categories_value )
											{
												?>
													<option value="<?=$product_categories_value->id?>"><?=$product_categories_value->name?></option>
												<?
											}
											?>
											<script type="text/javascript">
												$("#category_id").val("<?=$item->category_id?>");
											</script>
											
										</select>
										
									</td>
									</div>
									<div class="input-group invalid">
										<span class="input-group-text" id="basic-addon1">Tên Sản Phẩm</span>
										<input type="text" name="title" id="title" value="<?=!empty($kq_product_item->title)? $kq_product_item->title :''?>" class="form-control">
										<span class="form-message"></span>
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

									<div class="form-group"><span >Chi Tiết Sản Phẩm</span>
										<div class="input-group">
											<textarea class="form-control" id="description" name="description"  placeholder="<?=!empty($kq_product_item->description)? $kq_product_item->description :'Mô Tả'?>" rows="5"></textarea>
										</div>
									</div>
									
									<div class="row">
									<div class="col-6"><span >Ảnh Sản Phẩm</span>
									<label class="wrap-upload-banner" <?=!empty($kq_product_item->thumbnail) ? 'style="background: url('.BASE_URL. $kq_product_item->thumbnail.')"' : ''?>') no-repeat">
												<input type="file" name="thumbnail" id="file-upload" value="">
												<i class="fa fa-cloud-upload" aria-hidden="true"></i>
											</label>
										</div>
										<div class="col-3">
										<span >Sản Phẩm nổi bật</span>
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
										<div class="col-3">
										<span >Trạng Thái Sản Phẩm</span>
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
						</div>
						<div class="col-md-1">
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

			if ($('#link').val() == '') {
				error.push('Vui lòng nhập Link')
			}
			if ($('#description').val() == '') {
				error.push('Vui lòng nhập nội dung.')
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