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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Bài viết</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hiển Thị</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Cập Nhật</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cập Nhật</th>

                </tr>
                </thead>
                <tbody>
                    <?php   
                    foreach($post_chuyen as $for_post_chuyen )
                    {?>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                <img src="<?=BASE_URL.$for_post_chuyen->thumbnail; ?>" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="<?=site_url("syslog/posts/edit/{$for_post_chuyen->id}")?>"><h6 class="mb-0 text-sm"><?=$for_post_chuyen->title;?></h6></a>
                                
                                <p class="text-xs text-secondary mb-0"><?=$for_post_chuyen->alias;?></p>
                                </div>
                            </div>
                        </td>
                        
                        <td class="align-middle text-center text-sm">
                            <?if($for_post_chuyen->active ==1)
                            {?>
                                <span class="badge badge-sm bg-gradient-success">Online</span>
                         <?}
                            else
                            {?>
                                <span class="badge badge-sm bg-gradient-danger">Online</span>
                        <?}?>
                            
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?=$this->util->to_vn_date($for_post_chuyen->updated_date)?></span>
                        </td>
                        <td class="align-middle">
                        <a href="<?=site_url("syslog/posts/edit/{$for_post_chuyen->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a>
                        <strong class="updated-by"><?=$for_post_chuyen->updated_by_user->fullname?></strong>
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
SELECT I.*, C.alias AS 'category_alias', '0' AS 'child_num' FROM m_faq AS I INNER JOIN m_faq_categories AS C ON (I.category_id = C.id) WHERE 1 = 1 AND I.deleted = '0' ORDER BY I.created_date DESC LIMIT 10 OFFSET 0