<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$title?></h6>
                <br>
                <a href="<?=site_url('syslog/contents/add')?>"><span class="badge badge-sm bg-gradient-success"><i
                            class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bài Viết
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tiêu Đề
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Trạng Thái</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                    Lượt Xem</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Hành Động</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?$i = 1; foreach ($contents as $content) { ?>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <span><?=$offset+$i?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="<?=TPL_URL_ADMIN?>images/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm"><a
                                                    href="<?=site_url("syslog/contents/edit/{$content->id}")?>"><?=$content->title?></a>
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?
										$category = $this->m_content_categories->load($content->category_id);
									?>
                                    <p class="text-center text-sm font-weight-bold mb-0"><?=$category->name?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <? if ($content->active == 1)  { ?>
                                    <span class="badge badge-sm bg-gradient-success">Hiện</span>
                                    <? } else { ?>
                                    <span class="badge badge-sm bg-gradient-secondary">Ẩn</span>
                                    <? } ?>
                                </td>
                                <td>
                                    <div class="text-center">
                                    <span class="text-xs font-weight-bold"><i class="fa-solid fa-eye"></i>
                                        <?=$content->view_num?></span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <ul class="text-center action">
                                        <li><a href="<?=site_url("syslog/contents/edit/{$content->id}")?>"><span
                                                    class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                                        <li><a class="btn-delete"
                                                linkHref="<?=site_url("syslog/contents/delete/{$content->id}")?>"><span
                                                    class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
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
$('.btn-delete').click(function() {
    if (confirm('Bạn có chắc muốn xóa không?') == true) {
        window.location.href = $(this).attr('linkHref');
    }
})
</script>