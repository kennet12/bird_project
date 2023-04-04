<div class="canvas-menu drawer-left">
    <div class="menu-m-lang clearfix">
        <ul class="sigin-list">
            <? if (empty($user_online)) { ?>
            <li class="sigin-item">
                <a href="<?=site_url('tai-khoan/dang-nhap')?>">
                Đăng nhập
                </a>
            </li>
            <li class="sigin-item">
                /
            </li>
            <li class="sigin-item">
                <a href="<?=site_url('tai-khoan/dang-ky-tai-khoan')?>">
                Đăng ký
                </a>
            </li>
            <? } else { ?>
            <li class="sigin-item">
                <a href="<?=site_url('tai-khoan/lich-su-don-hang')?>" style="font-size: 14px;font-weight: 500;color: #a87031;">
                <i class="zmdi zmdi-account-circle"></i> <?=$user_online->fullname;?>
                </a>
            </li>
            <? } ?>
        </ul>
    </div>
    <div class="canvas-header-box d-flex justify-content-center align-items-center">
        <div class="close-box"><i class="zmdi zmdi-close"></i></div>
    </div>
</div>
<div class="canvas-overlay"></div>