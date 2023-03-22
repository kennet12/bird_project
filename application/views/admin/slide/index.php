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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">STT
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên Slide
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô Tả
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Link
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng Thái
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cập Nhật Slide
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1+$offset;  foreach($slider_chuyen as $slider_foreach)
							{
								?>
                            <tr>
                                <td style="font-size: 13px;text-align: center;"><?=$i; ?></td>
                               
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="<?=BASE_URL.$slider_foreach->thumbnail; ?>"
                                                class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm"><?=$slider_foreach->title; ?></h6>
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
                                <td >
                                    <ul class="action">
                                        <li><a href="<?=site_url("syslog/sliders/edit/{$slider_foreach->id}")?>"><span class="badge badge-sm bg-gradient-info">Sửa</span></a></li>
                                        <li><a class="btn-delete" linkHref="<?=site_url("syslog/sliders/delete/{$slider_foreach->id}")?>"><span class="badge badge-sm bg-gradient-danger">Xóa</span></a></li>
                                    </ul>
                                    <i class="updated-date"><?=$this->util->to_vn_date($slider_foreach->updated_date)?></i>
                                     <strong class="updated-by"><?=$slider_foreach->updated_by->fullname?></strong>
                                </td>
                              
                            </tr>
                            <?php $i++; }?>
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