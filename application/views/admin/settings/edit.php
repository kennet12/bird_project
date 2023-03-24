
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
						<div class="card-header pb-0">
							<h6><?=$customized;?></h6>
						</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tên Công Ty</span>
										<input type="text" name="company_name" id="company_name" value="<?=!empty($kq_setting->company_name)? $kq_setting->company_name :''?>" class="form-control">
									</div>
									
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Logan</span>
										<input type="text" name="company_logan" id="company_logan" value="<?=!empty($kq_setting->company_logan)? $kq_setting->company_logan :''?>" class="form-control">
									</div>
									
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Address</span>
										<input type="text" name="company_address" id="company_address" value="<?=!empty($kq_setting->company_address)? $kq_setting->company_address :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Email</span>
										<input type="text" name="company_email" id="company_email" value="<?=!empty($kq_setting->company_email)? $kq_setting->company_email :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Hotline</span>
										<input type="text" name="company_hotline" id="company_hotline" value="<?=!empty($kq_setting->company_hotline)? $kq_setting->company_hotline :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tollfree</span>
										<input type="text" name="company_tollfree" id="company_tollfree" value="<?=!empty($kq_setting->company_tollfree)? $kq_setting->company_tollfree :''?>" class="form-control">
									</div>
										
								</div>
							</div>
							<!-- ------------------------------------------------------------- -->
							<div class="card-header pb-0">
								<h6><?=$social_links;?></h6>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Facebook</span>
										<input type="text" name="facebook_url" id="facebook_url" value="<?=!empty($kq_setting->facebook_url)? $kq_setting->facebook_url :''?>" class="form-control">
									</div>
									
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Google+</span>
										<input type="text" name="googleplus_url" id="googleplus_url" value="<?=!empty($kq_setting->googleplus_url)? $kq_setting->googleplus_url :''?>" class="form-control">
									</div>
									
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Twitter</span>
										<input type="text" name="twitter_url" id="twitter_url" value="<?=!empty($kq_setting->twitter_url)? $kq_setting->twitter_url :''?>" class="form-control">
									</div>

									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Youtube</span>
										<input type="text" name="youtube_url" id="youtube_url" value="<?=!empty($kq_setting->youtube_url)? $kq_setting->youtube_url :''?>" class="form-control">
									</div>

								</div>
							</div>
							<!-- ------------------------------------------------------------- -->
							<div class="card-header pb-0">
								<h6><?=$cloud;?></h6>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">Tags</span>
										<input type="text" name="tags" id="tags" value="<?=!empty($kq_setting->tags)? $kq_setting->tags :''?>" class="form-control">
									</div>
									<?
											$tags = explode(",", $kq_setting->tags);
											foreach ($tags as $tag) {
												?>
												<span class="label label-primary" style="background-color: #FFFF66;"><?=trim($tag)?></span>&nbsp;
												<?
											}
										?>
										
								</div>
							</div>
						</div>

						
							<div class="col-md-6">
								<span >Logo</span>
								<label class="wrap-upload-banner" <?=!empty($kq_setting->logo) ? 'style="width:55%;background: url('.BASE_URL. $kq_setting->logo.') "' : ''?>') no-repeat">
									<input type="file" name="logo" id="file-upload" value="<?=!empty($kq_setting->company_name) ? $kq_setting->company_name : ''?>">
									<i class="fa fa-cloud-upload" aria-hidden="true"></i>
								</label>
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