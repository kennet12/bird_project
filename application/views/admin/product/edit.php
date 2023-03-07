<?
	$product_categories = $this->m_product_categories->items();
?>
<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">DANH MỤC: <?=$category->name?></h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right">Loại sản phẩm</td>
					<td>
						<select id="category_id" name="category_id" class="form-control">
							<? foreach ($product_categories as $value) { ?>
							<option value="<?=$value->id?>"><?=$value->name?></option>
							<? } ?>
						</select>
						<script type="text/javascript">
							$("#category_id").val("<?=$item->category_id?>");
						</script>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Tên sản phẩm</td>
					<td><input type="text" id="title" name="title" class="form-control" value="<?=!empty($item->title) ? $item->title : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL alias</td>
					<td><input type="text" id="alias" name="alias" class="form-control" value="<?=!empty($item->alias) ? $item->alias : ''?>" placeholder="Không bắt buộc nhập"></td>
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
					<td class="table-head text-right" width="10%">Giá</td>
					<td><input type="text" id="price" name="price" class="form-control" value="<?=!empty($item->price) ? $item->price : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Nội dung</td>
					<td><textarea id="content" name="content" class="tinymce form-control" rows="20"><?=!empty($item->content) ? $item->content : ''?></textarea></td>
				</tr>
				<tr>
					<td class="table-head text-right">Check Nổi bật</td>
					<td>
						<select id="check_bold" name="check_bold" class="form-control">
							<option value="0">Không</option>
							<option value="1">Nổi bật</option>
						</select>
						<script type="text/javascript">
							$("#check_bold").val("<?=$item->check_bold?>");
						</script>
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