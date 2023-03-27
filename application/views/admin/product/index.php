<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
			  <a href="<?=site_url('syslog/products/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Sản Phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh Mục Sản Phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái Sản Phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nổi Bật</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hiển Thị</th>
                      <th class="text-center text-secondary opacity-7">Cập Nhật Sản Phẩm</th>
                    </tr>
                  </thead>
                  <tbody>
                 
					  <? $i=1+$offset;  foreach($products as $product){ 
            ?>     
                    <tr>
                      <td style="font-size: 13px;text-align: center;"><?=$i; ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <a href="<?=site_url("syslog/products/edit/{$product->id}")?>">
                              <img src="<?=BASE_URL.$product->image?>" class="avatar avatar-sm me-3" alt="user1">
                            </a>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <a href="<?=site_url("syslog/products/edit/{$product->id}")?>"> <h6 class="mb-0 text-sm"><?=$product->title?></h6></a>
                            <p class="text-xs text-secondary mb-0"><?=$product->alias?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$product->price?></p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$product->product_category->name?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <?php if ($product->qty > 0)  { ?>
                        <p class="text-xs text-secondary mb-0">Số Lượng : <strong style="color:#f5365c ;"><?=$product->qty?></strong></p>
                        <span class="badge badge-sm bg-gradient-success">Còn Hàng</span>
                        
                      <?php } else { ?>
                        <span class="badge badge-sm bg-gradient-danger">Hết Hàng</span>
                      <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                      <?php if ($product->check_bold == 1)  { ?>
                        <span class="badge badge-sm bg-gradient-success">Bật</span>
                        
                      <?php } else { ?>
                        <span class="badge badge-sm bg-gradient-danger">Tắt</span>
                      <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                      <?php if ($product->active == 1)  { ?>
                        <span class="badge badge-sm bg-gradient-success">Hiện</span>
                        
                      <?php } else { ?>
                        <span class="badge badge-sm bg-gradient-danger">Ẩn</span>
                      <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                        <ul class="action">
                          <li><a href="<?=site_url("syslog/products/edit/{$product->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                          <li><a class="btn-delete" linkHref="<?=site_url("syslog/products/delete/{$product->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                        </ul>
                        <i class="updated-date"><?=$this->util->to_vn_date($product->updated_date)?></i>
                        <strong class="updated-by"><?=$product->updated_by->fullname?></strong>
                      </td>
                    </tr>
					<?$i++;}?>	
                  </tbody>
                </table>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      <script>
    $('.btn-delete').click(function(){
        if (confirm('Bạn có chắc muốn xóa không?') == true) {
            window.location.href = $(this).attr('linkHref');
        }
    })
</script>