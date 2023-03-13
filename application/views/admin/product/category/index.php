<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
<<<<<<< HEAD
              <br>
                <a href="<?=site_url('syslog/products/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
=======
              <a href="<?=site_url('syslog/product_category/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
>>>>>>> 567fa6824a6e2ed80bea9fa4df3beca14a0b8145
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Danh Mục</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Cập Nhật</th>
                      <th class="text-center text-uppercase  opacity-7">Cập Nhật Sản Phẩm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($product_category_chuyen as $for_product_category)
                      {
                        ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $for_product_category->name?></h6>
                          </div>
                          
                        </div>  

                      </td>
                      
                      <td class="align-middle text-center text-sm">
                        <?php  
                          if($for_product_category->active == 1)
                          {?>
                             <span class="badge badge-sm bg-gradient-success">Hiện</span>
                            <?php
                          }
                          else
                          {?>
                            <span class="badge badge-sm bg-gradient-danger">Ẩn</span>
                            <?php
                          }
                        ?>
                      
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=date("d-m-Y", strtotime($for_product_category->updated_date));  ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <ul class="action" >
                        <li><a href="<?=site_url("syslog/product_category/edit/{$for_product_category->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                         <li><a class="btn-delete" linkHref="<?=site_url("syslog/product_category/delete/{$for_product_category->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                      </ul>
                      </td>
                    </tr>
                    <?php } ?>
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
     