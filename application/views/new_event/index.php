<? $method = $this->router->fetch_class();?>
<div class="container">
   <h1 class="page-title">TIN TỨC</h1>
   <div class="row">
      <div class="col-md-2 ">
			<div class="sidebar sidebar-collection ">
				<ul class="shopify-section " id="shopify-section list-unstyled" style="padding-left: 0;
				margin-bottom: 0;
				list-style: none;">
				<li role="presentation" <?=empty($category) ? 'class="active-category item mb-10"' : '' ?>><a href="<?=site_url("tin-tuc-su-kien")?>">Tất cả</a></li>
				<? foreach ($categories as $categorie) { ?>
				<li role="presentation" <?=( $categorie->alias) ? 'class="active-category item mb-10"' : '' ?>><a href="<?=site_url("tin-tuc-su-kien/{$categorie->alias}")?>"><i class="fa-solid fa-newspaper"></i> <?=$categorie->name?></a></li>
				<? } ?>
			</ul>
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
               </div><br>
            </div>
            <? } ?>
			
         </div>
      </div>
   </div>
   <br>
   <div class="text-center"><?=!empty($pagination)?$pagination:''?></div>
</div>
