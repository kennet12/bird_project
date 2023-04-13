<? $method = $this->router->fetch_class();?>
<div class="container">
   <h1 class="page-title"><?=$title?></h1>
   <div class="row">
      <div class="col-md-2 ">
         <div id="shopify-section-nov-sidebar" class="shopify-section">
            <div class="list-filter-selected">
               <div class="filter-item_title align-items-center">
                  <a href="<?=site_url("hoi-dap")?>" class="nv-ml-auto">Tất cả câu hỏi</a>
               </div>
            </div>
            <div class="categories__sidebar sidebar-block sidebar-block__1">
               <div class="title-block mb-10">Danh Mục </div>
               <ul class="list-unstyled">
                  <? foreach($faq_categories as $faq_category){?> 
                  <li class="item mb-10">
                     <a href="<?=site_url("hoi-dap/{$faq_category->alias}")?>"> <?=$faq_category->name?></a>
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
            <? foreach ($faqs as $faq) {?>
            <div class="item">
               <div style="padding-bottom: 10px;" class="left-item">
                  <a  href="<?=site_url("hoi-dap/{$this->m_faq_categories->load($faq->category_id)->alias}/{$faq->alias_question}")?>" title="<?=$faq->question?>">
                  <img  src="<?=!empty($faq->thumbnail) ? $faq->thumbnail : IMAGES_DEFAULT ?>" class="img-responsive transition" alt="<?=$faq->question?>" style="width:100px;">
                  </a>
                  <a href="<?=site_url("hoi-dap/{$this->m_faq_categories->load($faq->category_id)->alias}/{$faq->alias_question}")?>">
                     <h5 style="padding-left: 20px;" class="limit-content-2-line transition"><?=$faq->question?></h5>
                  </a>
               </div>
               <div class="right-item">
                  <p class="help-block"><?=$this->util->to_vn_date($faq->updated_date)?></p>
                  <p class="limit-content-3-line text-justify"><?=strip_tags($faq->content)?></p>
               </div>
               <br>
            </div>
            <? } ?>
         </div>
      </div>
   </div>
   <br>
   <div class="text-center"></div>
</div>