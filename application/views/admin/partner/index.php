<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Đối Tác</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày Hợp Tác</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Kết Thúc Hợp Đồng</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      foreach($partner as $partners) {?>
                  <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?=$partners->banner?>" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$partners->name?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=date('d/m/Y',strtotime($partners->created_date))?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <? if ($partners->active == 1)  { ?>
                        <span class="badge badge-sm bg-gradient-success">Hoạt động</span>
                      <? } else { ?>
                        <span class="badge badge-sm bg-gradient-secondary">Khóa</span>
                      <? } ?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=date('d/m/Y',strtotime($partners->updated_date))?></span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <?}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>