<div class="cluster">
	<div class="container-fluid">
		<? if (empty($setting) || !sizeof($setting)) { ?>
		<h1 class="page-title">Settings</h1>
		<p class="help-block">Item not found.</p>
		<? } else { ?>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<h1 class="page-title">Tùy chỉnh website</h1>
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Logo</td>
					<td><input type="text" id="logo" name="logo" class="form-control" value="<?=$setting->logo?>" onclick="openKCFinder4Textbox(this)"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Name</td>
					<td><input type="text" id="company_name" name="company_name" class="form-control" value="<?=$setting->company_name?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Logan</td>
					<td><input type="text" id="company_name" name="company_logan" class="form-control" value="<?=$setting->company_logan?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Address</td>
					<td><input type="text" id="company_address" name="company_address" class="form-control" value="<?=$setting->company_address?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Email</td>
					<td><input type="text" id="company_email" name="company_email" class="form-control" value="<?=$setting->company_email?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Hotline</td>
					<td><input type="text" id="company_hotline" name="company_hotline" class="form-control" value="<?=$setting->company_hotline?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Tollfree</td>
					<td><input type="text" id="company_tollfree" name="company_tollfree" class="form-control" value="<?=$setting->company_tollfree?>"></td>
				</tr>
			</table>
			<h1 class="page-title">Social Links</h1>
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Facebook</td>
					<td><input type="text" id="facebook_url" name="facebook_url" class="form-control" value="<?=$setting->facebook_url?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Google+</td>
					<td><input type="text" id="googleplus_url" name="googleplus_url" class="form-control" value="<?=$setting->googleplus_url?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Twitter</td>
					<td><input type="text" id="twitter_url" name="twitter_url" class="form-control" value="<?=$setting->twitter_url?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Youtube</td>
					<td><input type="text" id="youtube_url" name="youtube_url" class="form-control" value="<?=$setting->youtube_url?>"></td>
				</tr>
			</table>
			<h1 class="page-title">Cloud</h1>
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tags</td>
					<td><input type="text" id="tags" name="tags" class="form-control" value="<?=$setting->tags?>" maxlength="255"></td>
				</tr>
			</table>
			<div>
				<button class="btn btn-sm btn-primary btn-save">Cập nhật</button>
				<button class="btn btn-sm btn-default btn-cancel">Hủy</button>
			</div>
		</form>
		<? } ?>
	</div>
</div>

<script>
$(document).ready(function() {
	$(".btn-save").click(function(){
		submitButton("save");
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>