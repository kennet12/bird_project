<div class="container">
	<h1 class="page-title">Biểu mẫu - tài liệu</h1>
	<div class="row">
		<div class="col-md-9">
			<div class="list-warpper">
				<? foreach ($items as $item) { ?>
					<div class="item">
						<div class="left-document">
							<i class="fa <?=$this->util->font_file($item->type)?>" aria-hidden="true"></i>
						</div>
						<div class="middle-document">
							<h5 class="limit-content-2-line transition"><?=$item->title?></h5>
							<p class="help-block"><?=$this->util->to_vn_date($item->created_date)?></p>
						</div>
						<div class="right-document">
							<a class="btn-download btn btn-info" file-path="<?=$item->file_path?>" file-name="<?=$item->file_name?>"><i class="fa fa-download" aria-hidden="true"></i> Tải xuống</a>
							<p>(<?=$item->file_size?>KB)</p>
						</div>
					</div>
				<? } ?>
			</div>
			<div class="text-center"><?=$pagination?></div>
		</div>
		<div class="col-md-3">
			<div class="wrapper-box">
				<div class="list-box">
					<div class="box-title">
						<h2>SẢN PHẨM - DỊCH VỤ</h2>
					</div>
					<ul>
						<? foreach ($service_cates as $service_cate) { ?>
						<li class="box-cate">
							<a href="<?=site_url("san-pham-dich-vu/{$service_cate->alias}")?>" class="transition" title=""><?=$service_cate->name?></a>
						</li>
						<? } ?>
					</ul>
				</div>
			</div>
			<div class="wrapper-box">
				<div class="list-box">
					<div class="box-title">
						<h2>TIN TỨC - SỰ KIỆN</h2>
					</div>
					<ul>
						<? foreach ($new_cates as $new_cate) { ?>
						<li class="box-cate">
							<a href="<?=site_url("tin-tuc-su-kien/{$new_cate->alias}")?>" class="transition" title=""><?=$new_cate->name?></a>
						</li>
						<? } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<? require_once(APPPATH."views/module/addthis.php"); ?>
</div>
<script type="text/javascript">
	$(document).on('click', '.btn-download', function(event){
		var file_path 	= $(this).attr('file-path');
		var file_name 	= $(this).attr('file-name');
		var cf = confirm('Bạn có muốn tải file '+file_name+' về không ?');
		if (cf){
			$.post('<?=site_url('bieu-mau-tai-lieu/tai-van-ban')?>',{"file_path": file_path,"file_name": file_name},function(data){window.location.href = data;});
		}
		
	});
</script>