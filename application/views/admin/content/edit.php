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
							<div class="col-md-5">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tiêu đề</span>
										<input type="text" name="title" value="<?=!empty($item->title)? $item->title :''?>" class="form-control">
									</div>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Url alias</span>
										<input type="text" name="alias" value="<?=!empty($item->alias)? $item->alias :''?>" class="form-control">
									</div>
									<div class="input-group">
										<select name="category_id" id="category_id" class="form-control" required="required">
											<option value="">Danh mục bài viết</option>
											<? foreach ($categories as $category) { ?>
											<option value="<?=$category->id?>"><?=$category->name?></option>
											<? } ?>
										</select>
										<script>
											$('#category_id').val('<?=!empty($item->category_id)? $item->category_id :''?>')
										</script>
									</div>
									<div class="form-group">
										<div class="input-group">
											<textarea class="form-control" name="description" placeholder="Mô tả" rows="5"><?=!empty($item->description)? $item->description :''?></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<label class="wrap-upload-banner" <?=!empty($item->thumbnail) ? 'style="background: url('. $item->thumbnail.')"' : ''?>') no-repeat">
												<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($item->title) ? $item->title : ''?>">
												<i class="fa fa-cloud-upload" aria-hidden="true"></i>
											</label>
										</div>
										<div class="col-6">
											<div class="radio">
												<label>
													<input type="radio" name="active" id="input" value="1" <?=!empty($item->active) ? 'checked="checked"' : ''?>>
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
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<div class="form-group">
										<textarea class="form-control tinymce" name="content" placeholder="Nội dung" rows="20"><?=!empty($item->content)? $item->content :''?></textarea>
									</div>
								</div>
							</div>
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
		$("#task").val('save');
		$('#form-post').submit();
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>