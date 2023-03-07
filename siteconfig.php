<?php
// WEB ROOT URI
define("PROTOCOL",			"http://localhost/");
define("BASE_URL",			PROTOCOL."quytindungphuhoa");
define("TPL_URL",			BASE_URL."/template/");
define("IMG_URL",			TPL_URL."images/");
define("CSS_URL",			TPL_URL."css/");
define("JS_URL",			TPL_URL."js/");

define("USR_URL",			BASE_URL."/member/login.html");
define("USR_TPL_URL",		BASE_URL."/template/account/");
define("USR_IMG_URL",		USR_TPL_URL."images/");
define("USR_CSS_URL",		USR_TPL_URL."css/");
define("USR_JS_URL",		USR_TPL_URL."js/");

define("ADMIN_URL",			BASE_URL."/syslog/login.html");
define("ADMIN_TPL_URL",		BASE_URL."/template/admin/");
define("ADMIN_IMG_URL",		ADMIN_TPL_URL."images/");
define("ADMIN_CSS_URL",		ADMIN_TPL_URL."css/");
define("ADMIN_JS_URL",		ADMIN_TPL_URL."js/");
define("ADMIN_AGENT_ID",	"VN_QTD_PH");
define("ADMIN_ROW_PER_PAGE",15);

define("CACHE_TIME",		30);
define("CACHE_RAND",		date("YmdH"));
define("BOOKING_PREFIX",	"VOA");
define("BOOKING_PREFIX_EX",	"EX-".BOOKING_PREFIX."-");
define("BOOKING_PREFIX_PO",	"PO-".BOOKING_PREFIX."-");
define("ROW_PER_PAGE",		5);

// WEB DATABASE
define("HOSTNAME",			"localhost");
define("USERNAME",			"root");
define("PASSWORD",			"");
define("DATABASE",			"db_phuhoa");
define("DRIVER",			"mysqli");
// USER TYPES
define("USR_USER",			1);
define("USR_MOD",			0);
define("USR_ADMIN",			-1);
define("USR_SUPPER_ADMIN",	-2);

// USER DEFINE
define("SITE_NAME", 		"Quỹ Tín Dụng Phú Hoà");

// Google reCaptcha
define("RECAPTCHA_KEY",		"6LdMZRgTAAAAAKCPUM5JD0x3dKpepqjuUVS0h2DM");
define("RECAPTCHA_SECRET",	"6LdMZRgTAAAAAClnNWokq-O2NnN6SDEsni4P3BQP");

// Google+ API
define("GOOGLE_KEY",		"1016427659580-b9k8si9eqbdma8m9lnitak6h4bcpg8oe.apps.googleusercontent.com");

// Facebook API
define("FB_KEY",			"1262899223739716");
?>