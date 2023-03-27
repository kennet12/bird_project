
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
						<div class="col-md-1">
						</div>
							<div class="col-md-10">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tên Câu Hỏi</span>
										<input type="text" id="title" name="name" value="<?=!empty($item->name)? $item->name: ""?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Link Câu Hỏi</span>
										<input type="text" id="alias" name="alias" value="<?=!empty($item->alias)? $item->alias: ""?>"" class="form-control">
									</div>
									
									<div class="input-group">
									<div class="radio">
												<label>
													<input type="radio" name="active" id="input"  value="1"<?=!($item->active) ? 'checked="checked"' : ''?>>
													Hiện
												</label>
											</div>	
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="0"<?=empty($item->active) ? 'checked="checked"' : ''?>>
													Ẩn
												</label>
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
	$(".btn-save").click(function(){
		var error = [];

			if ($('#title').val() == '') {
				error.push('Vui lòng nhập tên câu hỏi.')
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
</script>