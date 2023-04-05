<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
              <a href="<?=site_url('syslog/faq/add')?>"><span class="badge badge-sm bg-gradient-success"><i
                            class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Câu Hỏi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?$i=1;foreach($faqs as $faq) {?>
                    <tr>
                      <td>
                        <div class="text-center">
                          <span><?=$offset+$i?></span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><a href="<?=site_url("syslog/faq/edit/{$faq->id}")?>"><?=$faq->question?></a></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?if($faq->active ==1){?>

                        <span class="badge badge-sm bg-gradient-success">Hiện</span>

                        <?} else {?>
                          <span class="badge badge-sm bg-gradient-secondary">Ẩn</span>
                          <?}?> 
                      </td>
                      <td class="align-middle text-center">
                        <ul class ="action">
                          <li><a href="<?=site_url("syslog/faq/edit/{$faq->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                          <li><a href="<?=site_url("syslog/faq/delete/{$faq->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xoá</span></a></li>
                        </ul>
                        <i class="text-secondary text-xs font-weight-bold"><?=$this->util->to_vn_date($faq->updated_date)?></i>
                        <strong class="updated-by"><?=$faq->updated_by->fullname?></strong>
                      </td>
                    </tr>
                    <?$i++; }?>
                  </tbody>
                </table>
                <div class="text-center"><?=$pagination?></div>
              </div>
            </div>
          </div>
        </div>
      </div>