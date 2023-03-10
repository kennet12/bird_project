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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Sản Phẩm</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh Mục Sản Phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái Sản Phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lượt Xem</th>
                      <th class="text-center text-secondary opacity-7">Cập Nhật Sản Phẩm</th>
                    </tr>
                  </thead>
                  <tbody>
					<? foreach($products as $product){?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?=$product->thumbnail?>" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$product->title?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$product->alias?></p>
                          </div>
                        </div>
                      </td>
                      <td>
						<? 
						$category = $this->m_product_categories->load($product->category_id)
						?>
                        <p class="text-xs font-weight-bold mb-0"><?=$category->name?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <? if ($product->active == 1)  { ?>
                                    <span class="badge badge-sm bg-gradient-success">Còn Hàng</span>
                                    <? } else { ?>
                                    <span class="badge badge-sm bg-gradient-danger">Hết Hàng</span>
                                    <? } ?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><i class="fa-solid fa-eye"></i> <?=$product->view_num?></span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Cập nhật
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