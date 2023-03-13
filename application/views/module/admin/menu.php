<?
  $method = $this->router->fetch_method();
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="<?=TPL_URL_ADMIN?>images/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?=($method == 'users') ? 'active' : ''?>" href="<?=site_url("syslog/users")?>">
            <i class="fa-solid fa-user"></i>
            <span class="nav-link-text ms-1">Thành viên</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'contents') ? 'active' : ''?>" href="<?=site_url("syslog/contents")?>">
            <i class="fa-solid fa-book-open"></i>
            <span class="nav-link-text ms-1">Bài Viết</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'partners') ? 'active' : ''?>" href="<?=site_url("syslog/partners")?>">
          <i class="fa-solid fa-handshake-simple"></i>
            <span class="nav-link-text ms-1">Đối Tác</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'products') ? 'active' : ''?>" href="<?=site_url("syslog/products")?>">
          <i class="fa-brands fa-product-hunt"></i>
            <span class="nav-link-text ms-1">Sản Phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'product_category') ? 'active' : ''?>" href="<?=site_url("syslog/product_category")?>">
          <i class="fa-solid fa-list"></i>
            <span class="nav-link-text ms-1">Danh Mục Sản Phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'sliders') ? 'active' : ''?>" href="<?=site_url("syslog/sliders")?>">
          <i class="fa-solid fa-image"></i>
            <span class="nav-link-text ms-1">Slider</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'contacts') ? 'active' : ''?>" href="<?=site_url("syslog/contacts")?>">
          <i class="fa-solid fa-address-card"></i>
            <span class="nav-link-text ms-1">Liên hệ</span>
          </a>
        </li>
          <li class="nav-item">
          <a class="nav-link <?=($method == 'product_category') ? 'active' : ''?>" href="<?=site_url("syslog/product_category")?>">
          <i class="fa-solid fa-list"></i>
            <span class="nav-link-text ms-1">Danh Mục Sản Phẩm</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="<?=TPL_URL_ADMIN?>images/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
    </div>
  </aside>