<?
	$setting = $this->m_setting->load(1);
?>

<div id="mapcanvas" style="height: 355px; width: 100%; margin-top:20px;" ></div>
<div class="container">
	<div class="contact">
		<div class="row">
			<div class="col-md-6">
				<h2 class="page-title">THÔNG TIN LIÊN HỆ</h2>
				<div class="contact-list">
					<div class="contact-item">
						<div class="contact-item-lt">
							<div class="bg-icon-contact">
								<i class="fa fa-map-marker text-color-red"></i>
							</div>
						</div>
						<div class="contact-item-rt">
							<p class="text-color-grey text-bold">Địa chỉ :</p>
							<p><?=$setting->company_address?></p>
						</div>
					</div>
					<div class="contact-item">
						<div class="contact-item-lt">
							<div class="bg-icon-contact">
								<i class="fa fa-phone text-color-red"></i>
							</div>
						</div>
						<div class="contact-item-rt">
							<p class="text-color-grey text-bold">Điện thoại :</p>
							<p><?=$setting->company_hotline?></p>
						</div>
					</div>
					<div class="contact-item">
						<div class="contact-item-lt">
							<div class="bg-icon-contact">
								<i class="fa fa-envelope text-color-red"></i>
							</div>
						</div>
						<div class="contact-item-rt">
							<p class="text-color-grey text-bold">Email :</p>
							<p><?=$setting->company_email?></p>
						</div>
					</div>
					<!-- <div class="contact-item">
						<div class="contact-item-lt">
							<div class="bg-icon-contact">
								<i class="fa fa-facebook text-color-red"></i>
							</div>
						</div>
						<div class="contact-item-rt">
							<p class="text-color-grey text-bold">Facebook :</p>
							<p><?=$setting->company_email?></p>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-md-6">
				<h2 class="page-title"><?=$setting->company_name?></h2>
				<div class="form-group">
					<label for="input-id" class="text-color-grey">Họ tên:</label><span class="text-color-red"> *</span>
					<input type="text" id="name" name="name" class="form-control no-rounded frm-contactsus" value="<?=empty($this->session->user->fullname) ? '' : $this->session->user->fullname?>">
				</div>
				<div class="form-group">
					<label for="input-id" class="text-color-grey">Email:</label><span class="text-color-red"> *</span>
					<input type="text" id="email" name="email" class="form-control no-rounded frm-contactsus" value="<?=empty($this->session->user->email) ? '' : $this->session->user->email?>">
				</div>
				<div class="form-group">
					<label for="input-id" class="text-color-grey">Số điện thoại:</label><span class="text-color-red"> *</span>
					<input type="text" id="phone" name="phone" class="form-control no-rounded frm-contactsus" value="<?=empty($this->session->user->phone) ? '' : $this->session->user->phone?>">
				</div>
				<div class="form-group">
					<label for="input-id" class="text-color-grey">Nội dung:</label><span class="text-color-red"> *</span>
					<textarea class="form-control no-rounded frm-contactsus" id="content" name="content" rows="5"></textarea>
				</div>
				<div class="form-group">
					<div class="g-recaptcha" data-theme="light" data-sitekey="<?=RECAPTCHA_KEY?>"></div>
				</div>
				<button type="submit" id="btn-send" class="btn btn-info" style="margin-bottom: 10px">Gửi liên hệ</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn-send").click(function(event) {
			event.preventDefault();
			var err = 0;
			var msg = [];

			clearFormError();

			if ($('#name').val() == "") {
				$('#name').addClass("error");
				err++;
				msg.push("Họ và Tên không được trống");
			} else {
				$('#name').removeClass("error");
			}

			if ($('#phone').val() == "") {
				$('#phone').addClass("error");
				err++;
				msg.push("Số điện thoại không được trống");
			} else {
				$('#phone').removeClass("error");
			}

			if ($('#email').val() == "") {
				$('#email').addClass("error");
				err++;
				msg.push("Email không được trống");
			}
			else {
				$('#email').removeClass("error");
			}

			if ($('#content').val() == "") {
				$('#content').addClass('error');
				err++;
				msg.push('Nội dung không được trống');
			}
			else {
				$('#content').removeClass('error');
			}
			if (!err) {
				var p ={};
				p['name']		= $('#name').val();
				p['phone']		= $('#phone').val();
				p['email']		= $('#email').val();
				p['content'] 	= $('#content').val();
				recaptcha		= $('#g-recaptcha-response').val();
				p['recaptcha']	= recaptcha;

				$.ajax({
					type: 'POST',
					url: '<?=site_url('lien-he/ajax-contact')?>',
					data: p,
					dataType: 'html',
					success: function(result) {
						result ? messageBox('INFO', 'Thành công', 'Gửi tin nhắn thành công') : messageBox('ERROR', 'Thất bại', 'Gửi tin nhắn không thành công');
						$('#message').val('');
					}
				});
			} else {
				showErrorMessage(msg);
			}
		});
	});
</script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?&key=AIzaSyDigCaYfSLVz0PhLL4P7s7D6kU5Kd63AEY&sensor=true"></script>
<script type="text/javascript">
$(document).ready(function() {
	var options = {
			scrollwheel: false,
			zoom:14,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var contentString = '<div id="contents">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<h1 id="firstHeading" class="firstHeading" style="color:#C52515"><?=$setting->company_name?></h1>'+
			'<div id="bodyContent">'+
			'<p><b>www.basa-mekong.com</b> là một website <b><?=$setting->company_name?></b><br>' +
			'<b>Điện thoai: </b>: <?=$setting->company_hotline?><br>'+
			'<b>Email: </b>: <?=$setting->company_email?><br><br>'+
			'<b>Địa chỉ: </b>: <?=$setting->company_address?></p>'+
			'</div>'+
			'</div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		var map = new google.maps.Map(document.getElementById("mapcanvas"), options);
		geoclient = new google.maps.Geocoder();
		geoclient.geocode({'address': '<?=$setting->company_address?>'}, function(results, status){
			if(status == google.maps.GeocoderStatus.OK){
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					title : '<?=$setting->company_name?>'
				});
			infowindow.open(map, marker);
			}
		});
});
</script>