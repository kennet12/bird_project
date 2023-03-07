<?php
// WEB ROOT URI
define("PROTOCOL",			"https://");
define("BASE_URL",			PROTOCOL."www.basa-mekong.com");
define("TPL_URL",			BASE_URL."/template/");
define("IMG_URL",			TPL_URL."images/");
define("CSS_URL",			TPL_URL."css/");
define("JS_URL",			TPL_URL."js/");

define("USR_URL",			BASE_URL."/member/login.html");
define("USR_TPL_URL",		BASE_URL."/template/account/");
define("USR_IMG_URL",		USR_TPL_URL."images/");
define("USR_CSS_URL",		USR_TPL_URL."css/");
define("USR_JS_URL",		USR_TPL_URL."js/");

define("USER_DEFAULT",		IMG_URL."avatar-default.png");
define("IMAGES_DEFAULT",	IMG_URL."images-default.jpg");

define("ADMIN_URL",			BASE_URL."/syslog/login.html");
define("ADMIN_TPL_URL",		BASE_URL."/template/admin/");
define("ADMIN_IMG_URL",		ADMIN_TPL_URL."images/");
define("ADMIN_CSS_URL",		ADMIN_TPL_URL."css/");
define("ADMIN_JS_URL",		ADMIN_TPL_URL."js/");
define("ADMIN_AGENT_ID",	"BASA_MK");
define("ADMIN_ROW_PER_PAGE",15);

define("CACHE_TIME",		30);
define("CACHE_RAND",		date("YmdH"));
define("ROW_PER_PAGE",		6);

// WEB DATABASE
define("HOSTNAME",			"localhost");
define("USERNAME",			"csduyandy_db");
define("PASSWORD",			"nevermorepda1ss");
define("DATABASE",			"csduyandy_db");
define("DRIVER",			"mysqli");    

// USER TYPES
define("USR_USER",			1);
define("USR_MOD",			0);
define("USR_ADMIN",			-1);
define("USR_SUPPER_ADMIN",	-2);

// USER DEFINE
define("SITE_NAME", 		"CÔNG TY TNHH SX TM XNK GIANG LONG");

// Google reCaptcha
define("RECAPTCHA_KEY",		"6LcTp0kaAAAAAG8r4wGO3aThh6jBemheHBhuTnfr");
define("RECAPTCHA_SECRET",	"6LcTp0kaAAAAAG-JXIb_hPfoF1-ewGFEqwyJmcPM");

// Google+ API
define("GOOGLE_KEY",		"1016427659580-b9k8si9eqbdma8m9lnitak6h4bcpg8oe.apps.googleusercontent.com");

// Facebook API
define("FB_KEY",			"1262899223739716");
?>