<div class="page-width">
   <div class="container">
      <div class="row">
         <div class="sidebar sidebar-article col-lg-3 col-md-4 flex-xs-unordered">
            <div id="shopify-section-nov-sidebar-article" class="shopify-section">
               <div class="sidebar-block categories__sidebar sidebar-block__1 ">
                  <div class="title-block"><span>hỏi & đáp</span></div>
                  <div class="block__content">
                     <?foreach($categories as $value){?>
                     <div class="cateTitle">
                        <a class="cateItem " href="<?=site_url("hoi-dap/{$value->alias}")?>"><?=$value->name?></a>
                     </div>
                     <?}?>
                  </div>
               </div>
               <div class="sidebar-block recentpost__sidebar sidebar-block__2 ">
                  <div class="title-block">
                     <span>câu hỏi gần đây</span>
                  </div>
				  <?foreach($item_recently as $item){?>
                  <div class="block__content">
                     <div>
                        <div class="post_groups d-flex">
                           <div class="post-item">
                              <div class="post__title limit-content-2-line"><a href="<?=site_url("hoi-dap/{$item->category_alias}/{$item->alias_question}")?>" title="<?=$item->question?>"><?=$item->question?></a></div>
                              <div class="post__info">
                                 <span class="post__date">
                                 <i class="zmdi zmdi-calendar-note"></i><time datetime="2021-01-16T04:34:57Z"><?=$this->util->to_vn_date($item->updated_date)?></time>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <?}?>
               </div>
            </div>
         </div>
         <div class="blog_groups col-lg-9 col-md-8 flex-xs-first">
            <div id="shopify-section-blog-template" class="shopify-section">
               <div class="blog--list blog--grid-view">
                  <div class="title_block"><?=!empty($category->name)?$category->name:'hỏi đáp'?></div>
                  <div class="row">
                     <?foreach($items as $item){?>
                     <div  style = "margin-bottom: 30px !important" class="article--listing col-lg-12 mb-100">
                        <div class="article-body">
                           <h2 class="article__title"><a href="<?=site_url("hoi-dap/{$item->category_alias}/{$item->alias_question}")?>"><?=$item->question?> </a></h2>
                           <div class="article__info">
                              <span class="article__date">
                              <i class="zmdi zmdi-calendar-note"></i><time datetime="2021-01-16T04:34:57Z"><?=$this->util->to_vn_date($item->updated_date)?></time>
                              </span>
                              <span class="article__author">
                              <i class="zmdi zmdi-account"></i><?=$this->m_user->load($item->updated_by)->fullname?>
                              </span>
                           </div>
                           <div class="article__excerpt limit-content-2-line">
                              <?=$item->content?>
                           </div>
                           <a href="<?=site_url("hoi-dap/{$item->category_alias}/{$item->alias_question}")?>" class="article__readmore text-uppercase">Xem thêm</a>
                        </div>
                     </div>
                     <?}?>
                     <a href="<?=site_url("hoi-dap/{$item->category_alias}/{$item->alias_question}")?>" class="article__readmore text-uppercase">Xem thêm</a>
					</div>
                  <div class="d-flex align-items-center">
                     <div class="pagination__viewing">Trang 1 - 16 | 46 Tin tức</div>
                     <ul class="pagination d-flex justify-content-end align-items-center">
                        <li class="pagination__text active"><span>1</span></li>
                        <li class="pagination__text"><a href="https://www.yen-vietnam.com/tin-tuc.html?page=2" data-ci-pagination-page="2">2</a></li>
                        <li class="pagination__text"><a href="https://www.yen-vietnam.com/tin-tuc.html?page=3" data-ci-pagination-page="3">3</a></li>
                        <li class="pagination__text"><a href="https://www.yen-vietnam.com/tin-tuc.html?page=2" data-ci-pagination-page="2" rel="next"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        <li class="d-none d-sm-inline">
                           <div class="pagination__btn"><span class="icon__fallback-text"><a href="https://www.yen-vietnam.com/tin-tuc.html?page=16" data-ci-pagination-page="16">Trang cuối</a></span></div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>