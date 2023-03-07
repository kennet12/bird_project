<?
	
	$admin = $this->session->userdata("admin");
	$method = $this->router->fetch_method();
	$product_categories = $this->m_product_categories->items();
	$new_categories = $this->m_content_categories->items();
	$info = new stdClass();
	$info->user_types = array(USR_SUPPER_ADMIN, USR_ADMIN);
	$user_onlines = $this->m_user->users($info);
	$posts_categories = $this->m_posts_categories->items();
	$faq_categories = $this->m_faq_categories->items(null,1);
?>
<div class="header">
	<div class="header-top">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<div class="clearfix">
							<div class="pull-left">
								<span class="header-sitename"><?=SITE_NAME?></span><br>
								<span class="header-title">Administration</span>
							</div>
							<div class="pull-left">
								<span class="caret"></span>
							</div>
						</div>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="<?=(($method=='users')?'active':'')?>"><a href="<?=site_url("syslog/users")?>">Thành viên</a></li>
						<li class="dropdown <?=in_array($method, array('product','product_categories')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/product-categories")?>">Danh mục</a></li>
								<li role="separator" class="divider"></li>
								<? foreach ($product_categories as $product_categorie) { ?>
								<li><a href="<?=site_url("syslog/product/$product_categorie->alias")?>"><?=$product_categorie->name?></a></li>
								<? } ?>
							</ul>
						</li>
						<li class="dropdown <?=in_array($method, array('news','new_categories')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức - sự kiện <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/new-categories")?>">Danh mục</a></li>
								<li role="separator" class="divider"></li>
								<? foreach ($new_categories as $new_categorie) { ?>
								<li><a href="<?=site_url("syslog/news/$new_categorie->alias")?>"><?=$new_categorie->name?></a></li>
								<? } ?>
							</ul>
						</li>
						<li class="dropdown <?=in_array($method, array('posts','posts_categories')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thông tin chung <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/posts-categories")?>">Danh mục</a></li>
								<li role="separator" class="divider"></li>
								<? foreach ($posts_categories as $posts_categorie) { ?>
								<li><a href="<?=site_url("syslog/posts/$posts_categorie->alias")?>"><?=$posts_categorie->name?></a></li>
								<? } ?>
							</ul>
						</li>
						<li class="dropdown <?=in_array($method, array('about')) ? 'active' : ''?>">
							<a href="<?=site_url("syslog/about")?>" class="navbar-link" class="dropdown-toggle" >Giới thiệu </a>
						</li>
						<li class="dropdown <?=($method=='partner') ? 'active' : ''?>">
							<a href="<?=site_url('syslog/partner')?>">Banner đối tác</a>
						</li>
						<li class="<?=(($method=='slide')?'active':'')?>"><a href="<?=site_url("syslog/slide")?>">Slide</a></li>
						<li class="dropdown <?=in_array($method, array('faq','faq_categories')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hỏi - đáp <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/faq-categories")?>">Danh mục</a></li>
								<li role="separator" class="divider"></li>
								<? foreach ($faq_categories as $faq_category) { ?>
								<li><a href="<?=site_url("syslog/faq/$faq_category->alias")?>"><?=$faq_category->name?></a></li>
								<? } ?>
							</ul>
						</li>
						<li class="<?=(($method=='contact')?'active':'')?>"><a href="<?=site_url("syslog/contact")?>">Liên hệ</a></li>
						<li class="<?=(($method=='settings')?'active':'')?>"><a href="<?=site_url("syslog/settings")?>">Cài đặt Web</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="navbar-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$this->session->admin->fullname?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/logout")?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
							</ul>
						</li>
						<?
							foreach ($user_onlines as $user_online) {
								if (($user_online->id != $this->session->admin->id) && (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("-30 minutes")))) {
						?>
						<li>
							<a href="#" title="<?=$user_online->fullname?>">
								<? if (!empty($user_online->avatar)) { ?>
								<img class="img-circle" src="<?=$user_online->avatar?>" width="20px">
								<? } else { ?>
								<img class="img-circle" src="<?=IMG_URL?>no-avatar.gif" width="20px">
								<? } ?>
								<? if (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("-10 minutes"))) { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: #5cb85c;"></i></sup>
								<? } else if (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("-20 minutes"))) { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: orange;"></i></sup>
								<? } else { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: #afafaf;"></i></sup>
								<? } ?>
							</a>
						</li>
						<?
								}
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>