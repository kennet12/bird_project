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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                                        <input type="text" name="title"
                                            value="<?=!empty($item->title)? $item->title :''?>" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Url alias</span>
                                        <input type="text" name="alias"
                                            value="<?=!empty($item->alias)? $item->alias :''?>" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <select name="category_id" id="category_id" class="form-control"
                                            required="required">
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
                                            <textarea class="form-control" name="description" placeholder="Mô tả"
                                                rows="5"><?=!empty($item->description)? $item->description :''?></textarea>
                                        </div>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" id="input" value="1"
                                                <?=!empty($item->active) ? 'checked="checked"' : ''?>>
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" id="input" value="0"
                                                <?=empty($item->active) ? 'checked="checked"' : ''?>>
                                            Ẩn
                                        </label>
                                    </div>
                                    <div class="row">
                                        <?	
										for ($i=0; $i <2 ; $i++) { 
                                          if(!empty( $item->id)){
											$info = new stdClass();
											$info->content_id = $item->id;
											$info->stt = $i;
											$image = $this->m_content_gallery->items($info);
                                          }
									?>
                                        <div class="col-md-6">
                                            <div class="box-file-upload">
                                            <label class="wrap-upload-banner image-<?=$i?>" <?=!empty($image[0]->thumbnail) ? 'style="background: url('.BASE_URL. $image[0]->thumbnail.')"' : ''?>') no-repeat">
										    <input type="file" name="thumbnail_<?=$i?>" class="file-upload" stt="<?=$i?>" value="">
										    <input type="hidden" name="type_edit_<?=$i?>" class="type-edit" value="0">
										    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
									        </label>
                                                </label>
                                                <i class="fa-regular fa-trash-can"></i>
                                            </div>
                                        </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="form-group">
                                        <textarea class="form-control tinymce" name="content" placeholder="Nội dung"
                                            rows="20"><?=!empty($item->content)? $item->content :''?></textarea>
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
    $(".btn-save").click(function() {
        $("#task").val('save');
        $('#form-post').submit();
    });
    $(".btn-cancel").click(function() {
        submitButton("cancel");
    });
});
</script>