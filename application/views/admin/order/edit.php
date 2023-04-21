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
										<span class="input-group-text" id="basic-addon1">Họ và tên</span>
										<input type="text" name="fullname" id="fullname" value="<?=!empty($item->fullname)? $item->fullname :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Email</span>
										<input type="text" id="email" name="email" value="<?=!empty($item->email)? $item->email :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Số DT</span>
										<input type="text" id="phone" name="phone" value="<?=!empty($item->phone)? $item->phone :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Địa chỉ</span>
										<input type="text" id="address" name="address" value="<?=!empty($item->address)? $item->address :''?>" class="form-control">
									</div>

									<div class="input-group">
										<textarea class="form-control" name="message" placeholder="Ghi chú" rows="3"><?=!empty($item->message)? $item->message :''?></textarea>
									</div>
									<h5 >Trạng thái</h5>
									<div class="row">
										<div class="col-6">
										
											<div class="">
												<div class="radio">
													<label>
														<input type="radio" name="status"  id="input" value="0" <?=empty($item->status)? 'checked="checked"':' ' ?> >
														Chờ duyệt
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="status" id="input"  value="1" <?=($item->status==1)? 'checked="checked"':'' ?> >
														Kiểm hàng
													</label>
												</div>
											</div></div>
										<div class="col-6">
											<div class="">
												<div class="radio">
													<label>
														<input type="radio" name="status" id="input" value="2" <?=($item->status==2)? 'checked="checked"':' ' ?>>
														Giao hàng
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="status" id="input" value="3" <?=($item->status==3)? 'checked="checked"':' ' ?>  >
														Hoàn thành
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Hình ảnh</th>
											<th>Tên SP</th>
											<th>SL</th>
											<th>Giá</th>
											<th>Tổng tiền</th>
										</tr>
									</thead>
									<tbody>
										<? $total=0; $i=1; foreach($details as $detail) { 
											$total += $detail->price*$detail->qty;
										?>
										<tr>
											<td><?=$i?></td>
											<td>
												<img src="<?=BASE_URL.$detail->thumbnail?>" class="img-responsive" width="100px">
											</td>
											<td><?=$detail->name?></td>
											<td><?=$detail->qty?></td>
											<td><?=number_format($detail->price,0,',','.')?></td>
											<td><?=number_format(($detail->price*$detail->qty),0,',','.')?></td>
										</tr>
										<? $i++;} ?>
									</tbody>
								</table>
								<div style="text-align: right;font-size: 35px;font-weight: bold;">
									<?=number_format($total,0,',','.')?>
								</div>
							</div>
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
	$('.fa-trash-can').click(function () {
		$(this).parents('.box-file-upload').find('.wrap-upload-banner').css({"background-image": "none"});
		$(this).parents('.box-file-upload').find('.file-upload').val('');
		$(this).parents('.box-file-upload').find('.type-edit').val(1);
	})
	$(".btn-save").click(function(){
		var error = [];

			if ($('#title').val() == '') {
				error.push('Vui lòng nhập tên tiêu đề.')
			}

			if ($('#price').val() == '') {
				error.push('Vui lòng nhập giá')
			}
			if ($('#qty').val() == '') {
				error.push('Vui lòng nhập Số lưọng')
			}
			if ($("#category_id").val() =='')
			{
				error.push('Vui lòng nhập lòng chọn lọai sản phẩm');
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