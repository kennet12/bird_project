<!DOCTYPE html>
<html lang="vi-VN" translate="no">
   <head><? require_once(APPPATH."views/module/head_html.php"); ?></head>
   <body class="home-template has-fixed-navbar">
      <header class="site-header sticky-menu" style="height: auto;">
         <? require_once(APPPATH."views/module/header.php"); ?>
      </header>
      <div id="header-sticky" class="d-none d-md-block" style="background-color: #ffffff; padding: 3px 0">
         <div class="container">
            <div class="row align-items-center justify-content-between">
               <div class="contentstickynew_logo col-xl-2 col-lg-2 col-md-2"></div>
               <div class="contentstickynew_menu col-xl-8 col-lg-8 col-md-8 text-center"></div>
               <div class="contentstickynew_cart col-xl-2 col-lg-2 col-md-2 d-flex justify-content-end"></div>
            </div>
         </div>
      </div>
      <main id="<?=$this->util->slug($this->router->fetch_class())?>" class="main-content page-container drawer-page-content">
      <? require_once(APPPATH."views/module/breadcrumb.php"); ?>  
         <?=$content?>
      </main>
      <div id="shopify-section-nov-footer" class="shopify-section nov-footer">
         <footer><? require_once(APPPATH."views/module/footer.php"); ?></footer>
      </div>
      <? require_once(APPPATH."views/module/menu_mobile.php"); ?>
   </body>
</html>