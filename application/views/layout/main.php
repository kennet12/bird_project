<!DOCTYPE html>
<html lang="vi">
	<head>
		<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>style.css?cr=<?=CACHE_RAND?>" />
		<? require_once(APPPATH."views/module/head_html.php"); ?>
	</head>
	<body>
		<header>
			<? require_once(APPPATH."views/module/header.php"); ?>
		</header>
		<nav>
			<? require_once(APPPATH."views/module/menu.php"); ?>
		</nav>
		<? require_once(APPPATH."views/module/notification.php"); ?>
		<section>
			<div class="container">
				<? require_once(APPPATH."views/module/breadcrumb.php"); ?>
			</div>
			<?=$content?>
		</section>
		<footer>
			<? require_once(APPPATH."views/module/footer.php"); ?>
		</footer>
	</body>
</html>
