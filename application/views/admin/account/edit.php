<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">Tạo thành viên</h1>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tài khoản</td>
					<td><input type="text" id="email" name="email" class="form-control" value="<?=!empty($user->email) ? $user->email : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Mật khẩu</td>
					<td><input type="password" id="password_text" name="password_text" class="form-control" value="<?=!empty($user->password_text) ? $user->password_text : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Ảnh đại diện</td>
					<td><input type="text" id="avatar" name="avatar" class="form-control" value="<?=!empty($user->avatar) ? $user->avatar : ''?>" onclick="openKCFinder4Textbox(this)" placeholder="Click here and select a file double clicking on it"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Tên thành viên</td>
					<td><input type="text" id="fullname" name="fullname" class="form-control" value="<?=!empty($user->fullname) ? $user->fullname : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right"></td>
					<td>
						<select id="user_type" name="user_type" class="form-control">
							<option value="-1">Admin</option>
							<option value="-2">Super Admin</option>
						</select>
						<script type="text/javascript">
							$("#user_type").val("<?=$user->user_type?>");
						</script>
					</td>
				</tr>
			</table>
			<div class="text-right">
				<button class="btn btn-sm btn-primary btn-save">Lưu</button>
				<button class="btn btn-sm btn-default btn-cancel">Hủy</button>
			</div>
		</form>
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