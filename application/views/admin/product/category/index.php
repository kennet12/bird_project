<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
              <a href="<?=site_url('syslog/product_category/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Danh Mục</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hiển Thị</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Cập Nhật</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cập Nhật Sản Phẩm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   $i=1+$offset;
                      foreach ($product_category_chuyen as $for_product_category)
                      {
                        ?>
                    <tr>
                    <td style="font-size: 13px;text-align: center;"><?=$i; ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                          <a href="<?=site_url("syslog/sliders/edit/{$for_product_category->id}")?>"><h6 class="mb-0 text-sm"><?= $for_product_category->name?></h6></a>
                          </div>
                          
                        </div>  

                      </td>
                      
                      <td class="align-middle text-center text-sm">
                        <?php  
                          if($for_product_category->active == 1)
                          {?>
                             <span class="badge badge-sm bg-gradient-success " >Hiện</span>
                            <?php
                          }
                          else
                          {?>
                            <span class="badge badge-sm bg-gradient-danger hide">Ẩn</span>
                            <?php
                          }
                        ?>
                      
                      </td>
                      <td class="align-middle text-center text-sm " >
                        <span class="text-secondary text-xs font-weight-bold"><?=$this->util->to_vn_date($for_product_category->updated_date)?></span>
                      </td>
                      <td style="text-align: center;">
                          <ul class="action">
                              <li><a href="<?=site_url("syslog/sliders/edit/{$for_product_category->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                              <li><a class="btn-delete" linkHref="<?=site_url("syslog/sliders/delete/{$for_product_category->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                          </ul>
                       
                            <strong class="updated-by"><?=$for_product_category->updated_by->fullname?></strong>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
              <div class="text-center"><?=$pagination?></div>
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
     