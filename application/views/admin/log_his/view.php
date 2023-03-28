<div class="row">
		<!-- data_curent -->

		<div class="col-6">
			<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Data Current</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
				<table class="table align-items-center mb-0">
					<thead>
						<tr>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Slide</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô Tả</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thời Gian</th>

							<th class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
					<tr>
						
						<td>
							<div class="d-flex px-2 py-1">
								<div>
								<img src="<?=empty($previous->thumbnail)? 'Null' : BASE_URL.$previous->thumbnail ?>" class="avatar avatar-sm me-3" alt="user1">
								</div>
								<div class="d-flex flex-column justify-content-center">
								<h6 class="mb-0 text-sm">  <?=empty($previous->title)? ' Null' : $previous->title ?></h6>
								</div>
							</div>
						</td>

						<td>
							<p class="text-xs font-weight-bold mb-0"> <?=empty($previous->description)? ' Null' : $previous->description ?></p>
						</td>

						<td class="align-middle text-center text-sm">
							<p class="text-xs font-weight-bold mb-0"><?=empty($previous->link)? ' Null' : $previous->link ?></p>
						</td>

						<td class="align-middle text-center">
							<span class="text-secondary text-xs font-weight-bold"><? if(empty($previous->active)? ' Null' : $previous->active)
							{
								if($previous->active =="1")
								{
									echo "Hiện";
								}
								else
								{
									echo "Ẩn";
								}
							} ?></span>
						</td>
						<td class="align-middle text-center text-sm">
							<p class="text-xs font-weight-bold mb-0"><?=empty($this->util->to_vn_date($previous->updated_date))? ' Null' : $this->util->to_vn_date($previous->updated_date) ?></p>
						</td>
					</tr>
					</tbody>
				</table>
				</div>
			</div>
			</div>
		</div>

		<!-- data_new -->
		<div class="col-6">
			<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Data News</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
				<table class="table align-items-center mb-0">
					<thead>
						<tr>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên Slide</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô Tả</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thời Gian</th>

							<th class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
					<tr>
						
						<td>
							<div class="d-flex px-2 py-1">
								<div>
								<img src="<?=empty($after->thumbnail)?'' : BASE_URL.$after->thumbnail ?>" class="avatar avatar-sm me-3" alt="user1">
								</div>
								<div class="d-flex flex-column justify-content-center">
								<h6 class="mb-0 text-sm">  <?=empty($after->title)? ' Null' : $after->title ?> </h6>
								</div>
							</div>
						</td>

						<td>
							<p class="text-xs font-weight-bold mb-0"> <?=empty($after->description)? ' Null' : $after->description ?></p>
						</td>

						<td class="align-middle text-center text-sm">
							<p class="text-xs font-weight-bold mb-0"><?=empty($after->link)? ' Null' : $after->link ?></p>
						</td>

						<td class="align-middle text-center">
							<span class="text-secondary text-xs font-weight-bold"><? if(empty($after->active)? ' Null' : $after->active)
							{
								if($after->active =="1")
								{
									echo "Hiện";
								}
								else
								{
									echo "Ẩn";
								}
							} ?></span>
						</td>
						<td class="align-middle text-center text-sm">
							<p class="text-xs font-weight-bold mb-0"><?=empty($this->util->to_vn_date($after->created_date))? ' Null' : $this->util->to_vn_date($after->created_date) ?></p>
						</td>
					</tr>
					</tbody>
				</table>
				</div>
			</div>
			</div>
		</div>
	
</div>
