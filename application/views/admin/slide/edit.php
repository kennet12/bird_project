<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">TẠO SLIDE</h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tiêu đề</td>
					<td><input type="text" id="title" name="title" class="form-control" value="<?=!empty($item->title) ? $item->title : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Hình ảnh</td>
					<td>
						<label class="wrap-upload-banner" style="background: url('<?=!empty($item->thumbnail) ? $item->thumbnail : ''?>') no-repeat">
							<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($item->name) ? $item->name : ''?>">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
						</label>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL (đường dẫn)</td>
					<td><input type="text" id="link" name="link" class="form-control" value="<?=!empty($item->link) ? $item->link : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Miêu tả</td>
					<td><textarea name="description" id="description" class="form-control" rows="3" required="required"><?=!empty($item->description) ? $item->description : ''?></textarea></td>
				</tr>
				<tr>
					<td class="table-head text-right">Trạng thái</td>
					<td>
						<select id="active" name="active" class="form-control">
							<option value="1">Hiện</option>
							<option value="0">Ẩn</option>
						</select>
						<script type="text/javascript">
							$("#active").val("<?=!empty($item->active) ? $item->active : 1 ?>");
						</script>
					</td>
				</tr>
			</table>
			<div class="pull-right">
				<button class="btn btn-sm btn-primary btn-save">Lưu</button>
				<button class="btn btn-sm btn-default btn-cancel">Huỷ</button>
			</div>
		</form>
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
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
	$(".btn-save").click(function(e) {
		e.preventDefault();
		
		var err = 0;
		var msg = [];
		
		clearFormError();
		
		if ($("#title").val() == "") {
			$("#title").addClass("error");
			err++;
			msg.push("Tiêu đề không được trống.");
		} else {
			$("#title").removeClass("error");
		}

		if ($("#file-upload").val() == "") {
			err++;
			msg.push("Vui lòng chọn file.");
		}
		
		if ($("#content").val() == "") {
			err++;
			msg.push("Nội dung không được để trống.");
		}
		
		if (!err) {
			$("#task").val("save");
			$("#frm-admin").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>
</script>