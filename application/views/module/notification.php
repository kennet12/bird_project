<script>
$(document).ready(function() {
	<? if ($this->session->flashdata("error")) { ?>
		messageBox("ERROR", "Error", '<?=$this->session->flashdata("error")?>');
	<? } else if ($this->session->flashdata("success")) { ?>
		messageBox("SUCCESS", "Success", '<?=$this->session->flashdata("success")?>');
	<? } else if ($this->session->flashdata("info")) { ?>
		messageBox("INFO", "Information", '<?=$this->session->flashdata("info")?>');
	<? } ?>
});
</script>