
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
										<span class="input-group-text" id="basic-addon1">Câu Hỏi</span>
										<input type="text" id="question" name="question" value="<?=!empty($item->question)? $item->question :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Link Câu Hỏi</span>
										<input type="text" id="question" name="alias_question" value="<?=!empty($item->alias_question)? $item->alias_question :''?>" class="form-control">
									</div>
									<div class="input-group">
                                        <select name="category_id" id="category_id" class="form-control"
                                            required="required">
                                            <option value="">Danh Mục Câu Hỏi</option>
                                            <? foreach ($categories as $category) { 
												if($category->active == 1){ ?>
												
                                            <option value="<?=$category->id?>"><?=$category->name?></option>

                                            <? }} ?>
                                        </select>
                                        <script>
                                        $('#category_id').val('<?=!empty($item->category_id)? $item->category_id :''?>')
                                        </script>
                                    </div>
									<div class="form-group">
                                        <div class="input-group">
                                            <textarea  id ="name" style ="width : 100%" class="form-control tinymce" name="content" placeholder="Trả Lời"
                                                rows="5"><?=!empty($item->content)?$item->content:''?></textarea>
                                        </div>
                                    </div>
									<div class="input-group">
									<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="1" checked="checked" <?=!empty($item->active) ? 'checked="checked"' : ''?>>
													Hiện
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="0" <?=empty($item->active) ? 'checked="checked"' : ''?>>
													Ẩn
												</label>
											</div>
										</div>
								</div>
							</div>
							<div class="col-md-6"></div>
						</div>
						<div class="btn-subimt">
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

			if ($('#question').val() == '') {
				error.push('Vui lòng nhập tên câu hỏi.')
			}
			// if($('#name').val()==''){
			// 	error.push('Vui lòng nhập câu trả lời')
			// }

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