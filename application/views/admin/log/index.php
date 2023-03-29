<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h6><?=$title?></h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 log-tbl">
                <thead>
                <tr>
                    <th width="50px" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th width="150px" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hành động</th>
                    <th width="150px" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bảng</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    <th width="200px" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cập nhật</th>
                </tr>
                </thead>
                <tbody>
                    <? $i=1; foreach($items as $item) { ?>
                    <tr linkHref="<?=site_url("syslog/log/edit/{$item->id}")?>">
                        <td class="text-center"><?=$offset+$i?></td>
                        <td class="text-center">
                            <? if($item->status == 'ADD') { ?>
                                <span class="badge badge-sm bg-gradient-success">THÊM</span>
                            <? } else if ($item->status == 'UPDATE') { ?>
                                <span class="badge badge-sm bg-gradient-info">SỬA</span>
                            <? } else { ?>
                                <span class="badge badge-sm bg-gradient-danger">XÓA</span>
                            <? } ?>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <strong><?=$item->log_tbl?></strong>
                        </td>
                        <td class="text-center align-middle">
                            
                        </td>
                        <td class="text-center align-middle">
                            <i class="updated-date"><?=$this->util->to_vn_date($item->updated_date)?></i>
                            <strong class="updated-by"><?=$this->m_user->load($item->updated_by)->fullname?></strong>
                        </td>
                    </tr>
                    <? $i++;} ?>
                </tbody>
                <script>
                    $('.log-tbl td').click(function () {
                        window.location.href = $(this).parents('tr').attr('linkHref')
                    })
                </script>
            </table>
            </div>
            <div class="text-center"><?=$pagination?></div>
        </div>
        </div>
    </div>
</div>

