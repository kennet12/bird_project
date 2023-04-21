<?
  $method = $this->router->fetch_method();
  $admin = $this->session->userdata('admin');
  $kq_setting = $this->m_setting->load(1);
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="<?=BASE_URL.$kq_setting->logo; ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold" style="font-size: 9px !important;"><?=$kq_setting->company_name;?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height:auto !important">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?=($method == 'users') ? 'active' : ''?>" href="<?=site_url("syslog/users")?>" style = "color :#EE0000;">
            <i class="fa-solid fa-user"></i>
            <span class="nav-link-text ms-1">Thành viên</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'product_category') ? 'active' : ''?>" href="<?=site_url("syslog/product_category")?> "  style = "color :#FF9900;">
          <i class="fa-solid fa-list"></i>
            <span class="nav-link-text ms-1">Danh Mục Sản Phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'products') ? 'active' : ''?>" href="<?=site_url("syslog/products")?>" style = "color :#FF9900;">
          <i class="fa-solid fa-shop"></i>
            <span class="nav-link-text ms-1">Sản Phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'content_category') ? 'active' : ''?>" href="<?=site_url("syslog/content_category")?>" style = "color :#33CC00;">
          <i class="fa-solid fa-list"></i>
            <span class="nav-link-text ms-1">Danh mục tin tức</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'contents') ? 'active' : ''?>" href="<?=site_url("syslog/contents")?>" style = "color :#33CC00;">
            <i class="fa-solid fa-book-open"></i>
            <span class="nav-link-text ms-1">Tin tức</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'faq_categories') ? 'active' : ''?>" href="<?=site_url("syslog/faq_categories")?>"style = "color :#3366CC;">
          <i class="fa-solid fa-list"></i>
            <span class="nav-link-text ms-1">Danh mục hỏi đáp</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'faq') ? 'active' : ''?>" href="<?=site_url("syslog/faq")?>"style = "color :#3366CC;">
          <i class="fa-solid fa-person-circle-question"></i>
            <span class="nav-link-text ms-1">Hỏi đáp</span>
          </a>
        </li>
        <? if (in_array($admin->user_type, [USR_ADMIN, USR_SUPPER_ADMIN])) { ?>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'order') ? 'active' : ''?>" href="<?=site_url("syslog/order")?>"style = "color :#996699;">
          <i class="fa-solid fa-handshake-simple"></i>
            <span class="nav-link-text ms-1">Đơn hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'report') ? 'active' : ''?>" href="<?=site_url("syslog/report")?>"style = "color :#996699;">
          <i class="fa-solid fa-handshake-simple"></i>
            <span class="nav-link-text ms-1">Báo cáo</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'partners') ? 'active' : ''?>" href="<?=site_url("syslog/partners")?>"style = "color :#996699;">
          <i class="fa-solid fa-handshake-simple"></i>
            <span class="nav-link-text ms-1">Đối Tác</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'sliders') ? 'active' : ''?>" href="<?=site_url("syslog/sliders")?>"style = "color :#FF3300;">
          <i class="fa-solid fa-sliders"></i>
            <span class="nav-link-text ms-1">Slider</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'contacts') ? 'active' : ''?>" href="<?=site_url("syslog/contacts")?>"style = "color :#FF6699;">
          <i class="fa-solid fa-address-card"></i>
            <span class="nav-link-text ms-1">Liên hệ</span>
          </a>
        </li>
        <? } ?>
        <? if (in_array($admin->user_type, [USR_SUPPER_ADMIN])) { ?>
          <li class="nav-item">
          <a class="nav-link <?=($method == 'posts') ? 'active' : ''?>" href="<?=site_url("syslog/posts")?>"style = "color :#CC6633;">
          <i class="fa-solid fa-signs-post"></i>
            <span class="nav-link-text ms-1">Bài Viết</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'setting') ? 'active' : ''?>" href="<?=site_url("syslog/setting")?>"style = "color :#663333;">
          <i class="fa-solid fa-gear"></i>
            <span class="nav-link-text ms-1">Cài đặt</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($method == 'log') ? 'active' : ''?>" href="<?=site_url("syslog/log")?>"style = "color :#666600;">
          <i class="fa-solid fa-clock-rotate-left"></i>
            <span class="nav-link-text ms-1">Log</span>
          </a>
        </li>
        <? } ?>
      </ul>
    </div>
    
  </aside>