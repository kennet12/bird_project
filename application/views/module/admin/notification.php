<?
	if (!empty($this->session->flashdata("error"))) {
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<span class="alert-text"><strong>Thất bại!</strong> <?=$this->session->flashdata("error")?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?
	}
	else if (!empty($this->session->flashdata("success"))) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<span class="alert-text"><strong>Thành công!</strong> <?=$this->session->flashdata("success")?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?
	}
?>