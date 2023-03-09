<!DOCTYPE html>
<html lang="en">
<head>
<? require_once(APPPATH."views/module/admin/head_html.php"); ?>
</head>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <? require_once(APPPATH."views/module/admin/menu.php"); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <? require_once(APPPATH."views/module/admin/header.php"); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
		<!-- Content -->
		  <?=$content?>
		<!-- End content -->
		<? require_once(APPPATH."views/module/admin/footer.php"); ?>
    </div>
  </main>
  <? require_once(APPPATH."views/module/admin/plugin.php"); ?>
  <!--   Core JS Files   -->
  <script src="<?=TPL_URL_ADMIN?>js/core/popper.min.js"></script>
  <script src="<?=TPL_URL_ADMIN?>js/core/bootstrap.min.js"></script>
  <script src="<?=TPL_URL_ADMIN?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=TPL_URL_ADMIN?>js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=TPL_URL_ADMIN?>js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>