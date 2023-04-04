<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
              <a href="<?=site_url("syslog/faq_categories/add")?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Danh Mục</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hiển Thị</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Cập Nhật</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?$i=1;foreach ($faq_categories as $faq)
                      {
                        ?>
                    <tr>
                    <td style="font-size: 13px;text-align: center;"><?=$offset+$i; ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $faq->name?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$faq->alias?></p>
                          </div>
                          
                        </div>  

                      </td>
                      
                      <td class="align-middle text-center text-sm">
                        <?  
                          if($faq->active == 1)
                          {?>
                             <span class="badge badge-sm bg-gradient-success " >Hiện</span>
                            <?
                          }
                          else
                          {?>
                            <span class="badge badge-sm bg-gradient-secondary">Ẩn</span>
                            <?
                          }
                        ?>
                      
                      </td>
                      <td class="align-middle text-center text-sm " >
                        <span class="text-secondary text-xs font-weight-bold"><?=$this->util->to_vn_date($faq->updated_date)?></span>
                        <strong class="updated-by"><?=$faq->updated_by->fullname?></strong>
                      </td>
                      <td style="text-align: center;">
                          <ul class="action">
                              <li><a href="<?=site_url("syslog/faq_categories/edit/{$faq->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                              <li><a class="btn-delete" linkHref="<?=site_url("syslog/faq_categories/delete/{$faq->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                          </ul>
                      </td>
                    </tr>
                    <? $i++; } ?>
                  </tbody>
                </table>
                <div class="text-center"><?=$pagination?></div>
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
     