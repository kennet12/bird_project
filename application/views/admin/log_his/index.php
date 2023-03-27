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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit Item</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time Update Final</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View More</th>
                </tr>
                </thead>
                <tbody>
                <?foreach($loghistory_chuyen as $for_log) {?>
                <tr>
                    <td><span class="text-secondary text-xs font-weight-bold">1</span></td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                            <img src="<?=$for_log->list_id_user->avatar?>" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$for_log->list_id_user->fullname; ?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$for_log->list_id_user->email; ?></p>
                            </div>
                        </div>
                    </td>
                  
                    <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"><?=$for_log->item_log; ?></span>
                    </td>
                    <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?=$this->util->to_vn_date($for_log->created_date) ?></span>
                    </td>
                    <td class="align-middle  text-center">
                    <a href="<?=site_url("syslog/loghistory/view/{$for_log->id}")?>"><span class="badge badge-sm bg-gradient-info">View</span></a>
                    </td>
                </tr>
                <?}?>
                </tbody>
            </table>
            </div>
            <div class="text-center"><?=$pagination?></div>
        </div>
        </div>
    </div>
</div>

