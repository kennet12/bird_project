<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title?></h6>
                <a href="<?=site_url('syslog/contacts/add')?>"><span class="badge badge-sm bg-gradient-success"><i
                            class="fa-solid fa-plus"></i> Thêm</span></a>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ và
                                    Tên</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Email</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nội dung</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngày Gửi</th>

                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                          foreach($contact_chuyen as $contact_for) 
                          {
                          ?>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">

                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"></h6>
                                            <p class="text-xs text-secondary mb-0"><?= $contact_for->name;?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?=$contact_for->email; ?></p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0"><?=$contact_for->phone; ?></p>
                                </td>

                                <td>
                                    <textarea style="border: none;" name="" id="" cols="30"
                                        rows="3"><?=$contact_for->content; ?></textarea>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold"><?= date("d-m-Y",strtotime($contact_for->created_date))?></span>
                                </td>
                                <td class="align-middle">
                                    <ul class="action">
                                        <li>
                                            <a href="<?=site_url("syslog/contacts/edit/{$contact_for->id}")?>"><span
                                                    class="badge badge-sm bg-gradient-info">Sửa</span></a>
                                        </li>

                                        <li><a class="btn-delete"
                                                linkHref="<?=site_url("syslog/contacts/delete/{$contact_for->id}")?>"><span
                                                    class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>

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
    $('.btn-delete').click(function() {
        if (confirm('Bạn có chắc muốn xóa không?') == true) {
            window.location.href = $(this).attr('linkHref');
        }
    })
</script>