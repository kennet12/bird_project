<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?=$titles?></h6>
                <a href="<?=site_url('syslog/sliders/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình Ảnh
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chi Tiết</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Link Liên Kết</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Trạng Thái</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngày Cập Nhật</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  foreach($slider_chuyen as $slider_foreach)
							{
								?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="<?=BASE_URL.$slider_foreach->thumbnail; ?>" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?=$slider_foreach->title; ?></h6>
                                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0"><?=$slider_foreach->description; ?></p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0"><?=$slider_foreach->link?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
									<?
									if($slider_foreach->active ==1 )
									{
										?>
											<span class="badge badge-sm bg-gradient-success">Hiện</span>
										<?php
									} 
									else{
										?>
											<span class="badge badge-sm bg-gradient-secondary">Ẩn</span>
										<?php
									}
									?>
                                    
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $slider_foreach->updated_date;?></span>
                                </td>
                                <td class="align-middle">
                                <ul class="action">
                                            <li><a href="<?=site_url("syslog/sliders/edit/{$slider_foreach->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                                            <li><a class="btn-delete" linkHref="<?=site_url("syslog/sliders/delete/{$slider_foreach->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php }?>
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