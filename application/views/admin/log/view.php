<div class="row">
	<!-- data_curent -->
	
	<div class="col-6">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Nội dung cũ</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
					<? if ($item->status == 'UPDATE' || $item->status == 'DELETE') { ?>
					<table class="table align-items-center mb-0">
						<tbody>
							<? foreach ($content_old as $key => $value) { ?>
							<tr>
								<td width="200px">
									<p class="text-xs font-weight-bold mb-0"><?=$key?> :</p>
								</td>
								<td>
									<p><?=$value?> </p>
								</td>
							</tr>
							<? } ?>
						</tbody>
					</table>
					<? } else { ?>
					<table class="table align-items-center mb-0">
						<tbody>
							<? foreach ($content as $key => $value) { ?>
							<tr>
								<td width="200px">
									<p class="text-xs font-weight-bold mb-0"><?=$key?> :</p>
								</td>
								<td></td>
							</tr>
							<? } ?>
						</tbody>
					</table>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- data_new -->
	<div class="col-6">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Nội dung</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
					<? if ($item->status == 'UPDATE' || $item->status == 'ADD') { ?>
					<table class="table align-items-center mb-0">
						<tbody>
							<? foreach ($content as $key => $value) { ?>
							<tr>
								<td width="200px">
									<p class="text-xs font-weight-bold mb-0"> <span <?=!empty($change_log[$key])?'style="background:yellow"':''?>><?=$key?></span> :</p>
								</td>
								<td>
									<p><?=$value?> </p>
								</td>
							</tr>
							<? } ?>
						</tbody>
					</table>
					<? } else { ?>
					<table class="table align-items-center mb-0">
						<tbody>
							<? foreach ($content_old as $key => $value) { ?>
							<tr>
								<td width="200px">
									<p class="text-xs font-weight-bold mb-0"> <span <?=!empty($change_log[$key])?'style="background:yellow"':''?>><?=$key?></span> :</p>
								</td>
								<td></td>
							</tr>
							<? } ?>
						</tbody>
					</table>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
</div>
