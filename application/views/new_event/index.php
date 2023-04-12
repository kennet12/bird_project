<? $method = $this->router->fetch_class();?>
<div class="container">
   <h1 class="page-title">TIN TỨC</h1>
   <div class="row">
      <div class="col-md-2 ">
         <div id="shopify-section-nov-sidebar" class="shopify-section">
            <div class="list-filter-selected">
               <div class="filter-item_title align-items-center">
                  <a href="<?=site_url("tin-tuc-su-kien")?>" class="nv-ml-auto">Tất cả Tin Tức</a>
               </div>
            </div>
            <div class="categories__sidebar sidebar-block sidebar-block__1">
               <div class="title-block mb-10">Danh Mục </div>
               <ul class="list-unstyled">
                  <? foreach($categories as $categorie){?> 
                  <li class="item mb-10">
                     <a href="<?=site_url("tin-tuc-su-kien/{$categorie->alias}")?>"> <?=$categorie->name?></a>
                  </li>
                  <?}?>
               </ul>
               <script>
                  $('.zmdi-caret-right').click(function(e){
                     var stt = $(this).attr('stt');
                     var cls = $(this).attr('cls');
                     if (stt == '0'){
                        $(this).addClass('active');
                        $(this).attr('stt','1');
                     } else {
                        $(this).removeClass('active');
                        $(this).attr('stt','0');
                     }
                     $('.'+cls).toggle('fast');
                  })
               </script>
            </div>
            <script>
               $('.zmdi-caret-right').click(function(e) {
                  $(this).parents('.item-sub').find('.childsub-item').toggle('fast');
               })
            </script>
         </div>
      </div>
      <div class="col-md-10">
         <div class="list-warpper">
            <? foreach ($items as $item) {?>
            <div class="item">
               <div style="padding-bottom: 10px;" class="left-item">
                  <a  href="<?=site_url("tin-tuc-su-kien/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>" title="">
                  <img  src="<?=!empty($item->thumbnail) ? $item->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive transition" alt="<?=$item->title?>" style="width:100px;">
                  </a>
                  <a href="<?=site_url("tin-tuc-su-kien/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>">
                     <h5 style="padding-left: 20px;" class="limit-content-2-line transition"><?=$item->title?></h5>
                  </a>
               </div>
               <div class="right-item">
                  <p class="help-block"><?=$this->util->to_vn_date($item->updated_date)?></p>
                  <p class="limit-content-3-line text-justify"><?=strip_tags($item->content)?></p>
               </div>
               <br>
            </div>
            <? } ?>
         </div>
      </div>
   </div>
   <br>
   <div class="text-center"><?=!empty($pagination)?$pagination:''?></div>
</div>