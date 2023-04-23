<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><?=$title?></h6>
			        <form action="" method="GET">
                <div style="clear:both;">
                  <a style="float:left" href="<?=site_url('syslog/products/add')?>"><span class="badge badge-sm bg-gradient-success"><i class="fa-solid fa-plus"></i> Thêm</span></a>
                  <div style="width: 300px; float:right">
                    <input style="width: 200px;display: inline-block;" value="<?=$report_date?>" name="report_date" class="form-control datepicker" placeholder="Chọn thời gian" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    <button style="margin-bottom: 0;" type="submit" class="btn btn-success">Báo cáo</button>
                  </div>
                  <script type="text/javascript">
                    if (document.querySelector('.datepicker')) {
                      flatpickr('.datepicker', {
                        mode: "range"
                      });
                    }
                  </script>
                </div>
              </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="report" style="padding:25px">
                  <div class="row">
                    <div class="col-md-4" style="color:#fb6340">
                      <span>Tổng đơn: <?=$total?></span>
                    </div>
                    <div class="col-md-4"  style="color:#11cdef">
                      <span>Tổng SL: <?=$total_qty?></span>
                    </div>
                    <div class="col-md-4"  style="color:#2dce89">
                      <span>Tổng tiền: <?=number_format($total_price,0,',','.')?></span>
                    </div>
                  </div>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ tên</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số DT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tổng tiền</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody>
                 
					  <? $i=1+$offset;  foreach($items as $item){ 
            ?>     
                    <tr>
                      <td style="font-size: 13px;text-align: center;"><?=$i; ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <a> <h6 class="mb-0 text-sm"><?=$item->fullname?></h6></a>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$item->email?></p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$item->phone?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if ($item->status == 0)  { ?>
                        <span class="badge bg-gradient-danger">Chờ duyệt</span>
                        <?php } else if ($item->status == 1)  { ?>
                          <span class="badge bg-gradient-warning">Kiểm hàng</span>
                        <?php } else if ($item->status == 2)  { ?>
                          <span class="badge bg-gradient-info">Giao hàng</span>
                        <?php } else if ($item->status == 3) { ?>
                          <span class="badge bg-gradient-success">Hoàn thành</span>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?=number_format($item->sub_total,0,',','.')?></p>
                      </td>
                      <td class="align-middle text-center">
                        <ul class="action">
                          <li><a href="<?=site_url("syslog/order/edit/{$item->id}")?>"><span class="badge badge-sm bg-gradient-info">Xem chi tiết</span></a></li>
                          <li><a class="btn-delete" linkHref="<?=site_url("syslog/order/delete/{$item->id}")?>"><span class="badge badge-sm bg-gradient-danger">Hủy đơn</span></a></li>
                        </ul>
                        <i class="updated-date"><?=$this->util->to_vn_date($item->created_date)?></i>
                        <strong class="updated-by"><?=$item->username?></strong>
                      </td>
                    </tr>
					<?$i++;}?>	
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