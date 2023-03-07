<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">Banner đối tác</h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tên đối tác</td>
					<td><input type="text" id="name" name="name" class="form-control" value="<?=!empty($item->name) ? $item->name : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL liên kết</td>
					<td><input type="text" id="url" name="url" class="form-control" value="<?=!empty($item->url) ? $item->url : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Hình ảnh</td>
					<td>
						<label class="wrap-upload-banner" style="background: url('<?=!empty($item->banner) ? $item->banner : ''?>') no-repeat">
							<input type="file" name="banner" id="file-upload" value="<?=!empty($item->name) ? $item->name : ''?>">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
						</label>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right"></td>
					<td>
						<select id="active" name="active" class="form-control">
							<option value="1">Hiện</option>
							<option value="0">Ẩn</option>
						</select>
						<script type="text/javascript">
							$("#active").val("<?=$item->active?>");
						</script>
					</td>
				</tr>
			</table>
			<div class="text-right">
				<button class="btn btn-sm btn-primary btn-save">Lưu</button>
				<button class="btn btn-sm btn-default btn-cancel">Hủy</button>
			</div>
		</form>
		<br>
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
		submitButton("save");
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>