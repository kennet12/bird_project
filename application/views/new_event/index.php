<div class="page-width">
   <div class="container">
      <div class="row">
         <div class="sidebar sidebar-article col-lg-3 col-md-4 flex-xs-unordered">
            <div id="shopify-section-nov-sidebar-article" class="shopify-section">
               <div class="sidebar-block categories__sidebar sidebar-block__1 ">
                  <div class="title-block"><a href="<?=site_url("tin-tuc-su-kien")?>"><span>Tất Cả Tin Tức</span></a></div>
               </div>
               <div class="sidebar-block categories__sidebar sidebar-block__1 ">
                  <div class="title-block"><span>Danh mục</span></div>
                  <div class="block__content">
                     <?foreach($categories as $value){?> 
                     <div class="cateTitle">
                        <a class="cateItem " href="<?=site_url("tin-tuc-su-kien/{$value->alias}")?>"><?=$value->name;?></a>
                     </div>
                     <?}?>
                  </div>
               </div>
               <div class="sidebar-block recentpost__sidebar sidebar-block__2 ">
                  <div class="title-block">
                     <span>Bài viết gần đây</span>
                  </div>
                  <div class="block__content">
                     <div>
                        <?foreach($result_contet_recently as $value){?>
                           
                        <div class="post_groups d-flex">
                           <div class="post__image">
                              <a href="<?=site_url("tin-tuc-su-kien/{$value->category_alias}/{$value->alias}")?>" class="article__list-image-container">
                              <img class="article__list-image"  src="<?=!empty($value ->image)?$value ->image : ' '?>" alt="<?=$value->title;?> ">
                              </a>
                           </div>
                           <div class="post-item">
                              <div class="post__title limit-content-2-line"><a href="<?=site_url("tin-tuc-su-kien/{$value->category_alias}/{$value->alias}")?>" title="<?=$value->title?>"><?=$value->title?></a></div>
                              <div class="post__info">
                                 <span class="post__date">
                                 <i class="zmdi zmdi-calendar-note"></i><time datetime="2021-01-16T04:34:57Z"><?=$this->util->to_vn_date($value->created_date);?></time>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <?} ?>
						
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="blog_groups col-lg-9 col-md-8 flex-xs-first">
            <div id="shopify-section-blog-template" class="shopify-section">
               <div class="blog--list blog--grid-view">
                  <div class="title_block"><?=!empty($name_cate->name)?$name_cate->name:'Tin Tức Sự Kiện'?></div>
                  <div class="row">
						<?foreach ($items as $value){ ?>
							
						<div class="article--listing col-lg-12 mb-100">
							<div class="row">
                        <div class="col-md-3">
                           <div class="article__image">
                              <a href="<?=site_url("tin-tuc-su-kien/$value->category_alias/{$value->alias}")?>" class="article__list-image-container w-100">
                              <img class="article__list-image w-100" src="<?=!empty($value ->image)?$value ->image : ' '?>" alt="<?=$value->title;?> ">
                              </a>
                           </div>
                        </div>
                        <div class="col-md-9">
                           <div class="article-body">
                              <h2 class="article__title"><a href="<?=site_url("tin-tuc-su-kien/$value->category_alias/{$value->alias}")?>"><?=$value->title;?> </a></h2>
                                 <div class="article__info">
                                    <span class="article__date">
                                    <i class="zmdi zmdi-calendar-note"></i><time datetime="2021-01-16T04:34:57Z"><?=$this->util->to_vn_date($value->created_date);?></time>
                                    </span>
                                    <span class="article__author">
                                    <i class="zmdi zmdi-account"></i> <?=$value->updated_by->fullname;?>
                                    </span>
                                 </div>
                              <div class="article__excerpt limit-content-2-line">
                                 <?=strip_tags($value->content)?>								
                              </div>
                              <a href="<?=site_url("tin-tuc-su-kien/$value->category_alias/{$value->alias}")?>" class="article__readmore text-uppercase">Xem thêm</a>
                           </div>
                        </div>
                     </div>
						</div>
						<?}?>	
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="pagination__viewing">Trang <?=$page?> - <?=$page_num?> | <?=$total?> Tin tức</div>
                    <?=$pagination?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>