<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
              <a href="<?=site_url('syslog/partners/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Đối Tác</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày Hợp Tác</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Kết Thúc Hợp Đồng</th>
                      <th class="text-center text-secondary opacity-7">Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <? $i = 1; foreach($partners as $partner) {?>
                  <tr>
                    <td>
                      <div class="text-center">
                        <span><?=$offset+$i?></span>
                      </div>
                    </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?=BASE_URL.$partner->banner?>" class="avatar avatar-sm me-3" alt="user1">  
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$partner->name?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=date('d/m/Y',strtotime($partner->created_date))?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <? if ($partner->active == 1)  { ?>
                        <span class="badge badge-sm bg-gradient-success">Hiện</span>
                      <? } else { ?>
                        <span class="badge badge-sm bg-gradient-secondary">Ẩn</span>
                      <? } ?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=date('d/m/Y',strtotime($partner->updated_date))?></span>
                      </td>
                      <td class="text-center align-middle">
                      <ul class="action">
                                        <li><a href="<?=site_url("syslog/partners/edit/{$partner -> id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                                        <li><a class="btn-delete" linkHref="<?=site_url("syslog/partners/delete/{$partner -> id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                       </ul>
                      </td>
                    </tr>
                    <?$i++ ;}?>
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