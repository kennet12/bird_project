<!DOCTYPE html>
<html lang="en-US">
	<head>
		<? require_once(APPPATH."views/module/head_html.php"); ?>
		<link rel="stylesheet" type="text/css" href="<?=USR_CSS_URL?>account.css" />
	</head>
	<body>
		<? require_once(APPPATH."views/module/header.php"); ?>
		<? require_once(APPPATH."views/module/breadcrumb.php"); ?>
		<? require_once(APPPATH."views/module/notification.php"); ?>
		<?=$content?>
		<? require_once(APPPATH."views/module/footer.php"); ?>
	</body>
</html>
