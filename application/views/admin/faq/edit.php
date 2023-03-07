<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title"><?=$category->name?></h1>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Câu hỏi</td>
					<td><input type="text" id="question" name="question" class="form-control" value="<?=!empty($item->question) ? $item->question : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL câu hỏi alias</td>
					<td><input type="text" id="alias_question" name="alias_question" class="form-control" value="<?=!empty($item->alias_question) ? $item->alias_question : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Trả lời</td>
					<td><textarea id="content" name="content" class="tinymce form-control" rows="20"><?=!empty($item->content) ? $item->content : ''?></textarea></td>
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
	$(".btn-save").click(function(){
		submitButton("save");
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>