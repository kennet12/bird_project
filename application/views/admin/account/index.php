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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tài
                                    khoản
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Số điện thoại</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Trạng thái</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngày sinh</th>
                                <th class="text-center text-secondary opacity-7">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($users as $user) {  ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="<?=BASE_URL.$user->avatar?>" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?=$user->fullname?></h6>
                                            <p class="text-xs text-secondary mb-0"><?=$user->email?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?=$user->phone?></p>
                                    <p class="text-xs text-secondary mb-0">
                                        <?
                                        $array_gender = [
                                          '1' => 'Nam',
                                          '2' => 'Nữ',
                                          '3' => 'Giới tính thứ 3'];
                                        echo $array_gender[$user->gender];
                                      ?>
                                    </p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <? if ($user->active == 1)  { ?>
                                    <span class="badge badge-sm bg-gradient-success">Hoạt động</span>
                                    <? } else { ?>
                                    <span class="badge badge-sm bg-gradient-secondary">Khóa</span>
                                    <? } ?>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold"><?=date('d/m/Y',strtotime($user->birthday))?></span>
                                </td>
                                <td class="text-center align-middle">
                                    <ul class="action">
                                        <li><a href="<?=site_url("syslog/users/edit/{$user -> id}")?>"><span
                                                    class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                                        <li><a class="btn-delete"
                                                linkHref="<?=site_url("syslog/users/delete/{$user -> id}")?>"><span
                                                    class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <? } ?>
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