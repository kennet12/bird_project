<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">TẠO BIỂU MẪU - TÀI LIỆU</h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tiêu đề</td>
					<td><input type="text" id="title" name="title" class="form-control" value="<?=!empty($item->title) ? $item->title : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">File upload</td>
					<td>
						<label class="custom-file-upload">
							<input type="file" name="file_upload" id="file-upload" value="">
							Chọn file upload
						</label>
						<div class="boder-file-upload">
							<i class="fa <?=$this->util->font_file(!empty($item->type) ? $item->type : null);?>" style="font-size: 160px;padding: 17px 0;" aria-hidden="true"></i>
							<p class="file-name"><?=!empty($item->file_name) ? $item->file_name : 'Chưa có file'?></p>
						</div>
						<i class="help-block">Upload file (.rar .zip .doc .docx .xls .xlsx .csv .pdf)</i>
					</td>
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
	$('#file-upload').change(function(event) {
		var file_name = $(this).val().replace(/^.*\\/, "");
		var allow_type = file_name.split('.')[1].toLowerCase();
		if (allow_type == 'rar' || allow_type == 'zip' || allow_type == 'doc' ||
			allow_type == 'docx' || allow_type == 'xls' || allow_type == 'xlsx' ||
			allow_type == 'csv' || allow_type == 'pdf')
		{
			var file_name_current = $('.file-name').html();
			if (file_name_current != '' && file_name_current != 'Chưa có file'){
				var allow_type_current = file_name_current.split('.')[1].toLowerCase();
				$('.fa').removeClass(font_file(allow_type_current));
			}
			$('.fa').addClass(font_file(allow_type));
			$('.file-name').html(file_name);
			$('.fa').removeClass('fa-file-o');
		} else {
			alert('Upload file (.rar .zip .doc .docx .xls .xlsx .csv .pdf)');
		}
	});
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