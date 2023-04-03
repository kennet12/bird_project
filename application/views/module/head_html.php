<?
$setting = $this->m_setting->load(1);
$meta_info = new stdClass();
$meta_info->url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$configured_metas = $this->m_meta->items($meta_info, 1);

if (empty($meta['title'])) {
	$meta['title'] = $setting->company_name;
}
if (empty($meta['keywords'])) {
	$meta['keywords'] = $setting->tags;
}
if (empty($meta['description'])) {
	$meta['description'] = "CTY Mekong Fishmeal, nơi bạn có thể đặt niềm tin, kinh doanh các sản phẩm bột cá và dầu cá đáng tin cậy, hỗ trợ khách hàng tận tình";
}
if (empty($meta['author'])) {
	$meta['author'] = SITE_NAME;
}

if (!empty($configured_metas)) {
	$configured_meta = array_shift($configured_metas);
	$meta['title'] = $configured_meta->title;
	$meta['keywords'] = $configured_meta->keywords;
	$meta['description'] = $configured_meta->description;
	$meta['addition_tags'] = $configured_meta->addition_tags;
}
?>
<title><?=$meta['title']?></title>
<style>
	body {transition: opacity ease-in 0.2s; } 
	body[unresolved] {opacity: 0; display: block; overflow: hidden; position: relative; } 
</style>
<title>Yến Việt Nam</title>
<meta name="google" content="notranslate">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="must-revalidate">
<meta http-equiv="Expires" content="03/04/2023 - 20:46:26 GMT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Yến Việt Nam chuyên cung cấp các loại thực phẩm chức năng cao cấp.">
<meta name="keywords" content="Yến sào, Yến việt nam, Tổ yến, Đông trùng hạ thảo">
<link rel="canonical" href="<?=BASE_URL?>">
<link rel="preload" href="<?=BASE_URL?>/template/images/bird-nest.jpeg" as="image" media="(max-width: 600px)" type="image/jpeg">
<meta property="og:title" content="Yến Việt Nam | Yến Việt Nam">
<meta property="og:description" content="Yến Việt Nam chuyên cung cấp các loại thực phẩm chức năng cao cấp.">
<meta property="og:image" content="<?=BASE_URL?>/template/images/bird-nest.jpeg">
<meta property="og:url" content="<?=BASE_URL?>/">
<meta property="og:site_name" content="yenvietnam.com">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:type" content="website">
<meta property="og:locale" content="vi_VN">
<meta name="robots" content="index,follow">
<meta name="googlebot" content="index,follow">
<meta name="author" content="Yến Việt Nam">
<meta name="google-site-verification" content="HEh7pVJ5ODYj59f4t9NqWvMq1spvCvaIVF_UI4UMJU4">
<link rel="SHORTCUT ICON" href="<?=BASE_URL?>/favicon.ico?v=<?=date('Ymdhis')?>">
<link rel="manifest" href="<?=BASE_URL?>/manifest.json">
<link rel="icon" sizes="192x192" href="<?=BASE_URL?>/template/images/launcher/192x192.jpg?v=<?=date('Ymdhis')?>">
<link rel="icon" sizes="128x128" href="<?=BASE_URL?>/template/images/launcher/128x128.jpg?v=<?=date('Ymdhis')?>">
<link rel="apple-touch-icon" sizes="128x128" href="<?=BASE_URL?>/template/images/launcher/128x128.jpg?v=<?=date('Ymdhis')?>">
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?=BASE_URL?>/template/images/launcher/128x128.jpg?v=<?=date('Ymdhis')?>">
<link href="<?=CSS_URL?>bootstrap.min.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>common.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>owl.carousel.min.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>owl.theme.default.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>slick.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>jquery.mmenu.all.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>layout.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>theme.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>responsive.css?v=<?=date('Ymdhis')?>" rel="stylesheet" type="text/css" media="all">
<script>
	var theme = {
	strings: {
		addressNoResults: "Nguyễn Hữu Tiến, Tây Thạnh, Tân Phú",
	},
	}
</script>
<script src="<?=JS_URL?>jquery.min.js?v=<?=date('Ymdhis')?>" type="text/javascript"></script>
<script src="<?=JS_URL?>vendor.js?v=<?=date('Ymdhis')?>" defer="defer"></script>
<script src="<?=JS_URL?>history.js?v=<?=date('Ymdhis')?>" type="text/javascript"></script>
<script src="<?=JS_URL?>jquery.owl.carousel.min.js?v=<?=date('Ymdhis')?>" defer="defer"></script>
<script src="<?=JS_URL?>jquery.mmenu.all.min.js?v=<?=date('Ymdhis')?>" defer="defer"></script>
<script src="<?=JS_URL?>util.js?v=<?=date('Ymdhis')?>" type="text/javascript"></script>
<script src="<?=JS_URL?>theme.js?v=<?=date('Ymdhis')?>" defer="defer"></script>
<script src="<?=JS_URL?>global.js?v=<?=date('Ymdhis')?>" defer="defer"></script>

<script type="text/javascript">
	var BASE_URL = "<?=BASE_URL?>";
</script>