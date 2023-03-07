<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mail_tpl {

	function template($content)
	{
		return '<!DOCTYPE html>
				<html lang="en-US">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					</head>
					<body style="font-family: Arial,Tahoma,sans-serif; font-size: 12px; padding: 30px; background-color: #F1F1F1;">
						<table width="100%" style="background-color: #FFF; border: 1px solid #DDD; border-collapse: collapse;">
							<tr>
								<td style="padding: 30px 30px 15px; border-bottom: 1px solid #DDD;">
									<a href="'.BASE_URL.'" target="_blank"><img src="'.IMG_URL.'visa-vietnam.png"></a>
								</td>
							</tr>
							<tr>
								<td style="padding: 30px;">
									'.$content.'
								</td>
							</tr>
							<tr>
								<td style="padding: 30px; border-top: 1px solid #DDD;">
									<table>
										<tr><td colspan="3"><strong>'.COMPANY.'</strong></td></tr>
										<tr><td><strong>Address</strong></td><td>:</td><td>'.ADDRESS.'</td></tr>
										<tr><td><strong>Hotline</strong></td><td>:</td><td>'.HOTLINE.'</td></tr>
										<tr><td><strong>Email</strong></td><td>:</td><td><a style="color: inherit;" href="mailto:'.MAIL_INFO.'" target="_blank">'.MAIL_INFO.'</a></td></tr>
										<tr><td><strong>Website</strong></td><td>:</td><td><a style="color: inherit;" href="'.BASE_URL.'" target="_blank">www.'.strtolower(SITE_NAME).'</a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</body>
				</html>';
	}
	
	function register_successful($tpl_data)
	{
		$content = '<p>Dear <strong>'.$tpl_data["FULLNAME"].'</strong>,</p>
					<br>
					<p>Congratulations! Your account has been successfully created.</p>
					<p>Thanks for joining the millions of people around the world who love Vietnam and rely on us to support your Vietnam visa on arrival making your trip simple.</p>
					<p>You can <u><a style="color: inherit;" href="'.site_url("member").'">login</a></u> with the registered email now.</p>
					<p>Please do not reply to this email. To get in touch with us, click <u><a style="color: inherit;" href="'.site_url("contact").'">Contact us</a></u>.</p>';
		return $this->template($content);
	}
	
	function forgot_password($tpl_data)
	{
		$content = '<p>Dear <strong>'.$tpl_data["FULLNAME"].'</strong>,</p>
					<br>
					<p>We have received forgot password request for your account.</p>
					<p>Please return to the <u><a style="color: inherit;" href="'.BASE_URL.'">'.SITE_NAME.'</a></u> website and try to login using the following information:</p>
					<p>Email: '.$tpl_data["EMAIL"].'</p>
					<p>Password: '.$tpl_data["PASSWORD"].'</p>
					<p>Please do not hesitate to contact us if you have any problem!</p>';
		return $this->template($content);
	}
	
	function visa_info($tpl_data)
	{
		$CI =& get_instance();
		$CI->load->library('util');
		$CI->load->model('m_visa_fee');
		
		$travelers = $tpl_data["TRAVELERS"];
		$group_size = sizeof($travelers);
		
		$nationality_group = array();
		for ($i=0; $i<$group_size; $i++) {
			$nationality = $travelers[$i]["nationality"];
			if (array_key_exists($nationality, $nationality_group)) {
				$nationality_group[$nationality] = $nationality_group[$nationality] + 1;
			} else {
				$nationality_group[$nationality] = 1;
			}
		}
		
		$service_fee_group = array();
		$service_fee = '<tr><td>Visa service fee</td><td> : </td><td>'.$tpl_data["TOTAL_SERVICE_FEE"].' USD</td></tr>';
		foreach ($nationality_group as $nationality => $count) {
			$visa_fee = $CI->m_visa_fee->cal_visa_fee($tpl_data["VISA_TYPE"], $group_size, $tpl_data["PROCESSING_TIME"], $nationality, $tpl_data["VISIT_PURPOSE"]);
			//$service_fee .= '<tr><td>Visa service fee for '.$nationality.'</td><td> : </td><td>'.$visa_fee->service_fee.' USD/pax</td></tr>';
			$service_fee_group[$nationality] = $visa_fee->service_fee;
		}
		
		$processing_time = "";
		if ($tpl_data["PROCESSING_TIME"] != "Normal") {
			$processing_time .= '<tr><td>Processing ('.$tpl_data["PROCESSING_TIME"].')</td><td> : </td><td>'.$tpl_data["RUSH_FEE"].' USD/pax</td></tr>';
		}
		
		$private_visa = "";
		if (!empty($tpl_data["PRIVATE_VISA"])) {
			$private_visa = '<tr><td>Private letter</td><td> : </td><td>'.$tpl_data["PRIVATE_VISA_FEE"].' USD/letter</td></tr>';
		}
		
		$full_package = "";
		if ($tpl_data["FULL_PACKAGE"]) {
			$full_package .= '<tr><td>Visa stamping fee</td><td> : </td><td>'.$tpl_data["STAMPING_FEE"].' USD/pax</td></tr>';
			$full_package .= '<tr><td>Airport fast check-in</td><td> : </td><td>'.$tpl_data["FULL_PACKAGE_FC_FEE"].' USD/pax</td></tr>';
		}
		
		$car_pickup = "";
		if ($tpl_data["CAR_PICKUP"]) {
			$car_pickup = '<tr><td>Car pick-up</td><td> : </td><td>'.$tpl_data["CAR_PICKUP_FEE"].' USD</td></tr>';
		}
		
		$airport_fast_checkin = "";
		if ($tpl_data["AIRPORT_FAST_CHECKIN"] == 1) {
			$airport_fast_checkin = '<tr><td>Airport fast check-in</td><td> : </td><td>'.$tpl_data["AIRPORT_FAST_CHECKIN_FEE"].' USD</td></tr>';
		}
		else if ($tpl_data["AIRPORT_FAST_CHECKIN"] == 2) {
			$airport_fast_checkin = '<tr><td>VIP fast check-in</td><td> : </td><td>'.$tpl_data["AIRPORT_FAST_CHECKIN_FEE"].' USD</td></tr>';
		}
		
		$discount = "";
		if ($tpl_data["VIPDISCOUNT"]) {
			$discount .= '<tr><td>VIP discount</td><td> : </td><td>-'.$tpl_data["VIPDISCOUNT"].' USD</td></tr>';
		}
		if ($tpl_data["SERVICE_FEE_DISCOUNT"]) {
			$discount .= '<tr><td>Visa service fee discount</td><td> : </td><td>-'.$tpl_data["SERVICE_FEE_DISCOUNT"].' USD</td></tr>';
		}
		if ($tpl_data["DISCOUNT"]) {
			$discount .= '<tr><td>Promotion discount</td><td> : </td><td>-'.$tpl_data["DISCOUNT"].' USD</td></tr>';
		}
		
		$flight_number = "";
		if (!empty($tpl_data["FLIGHT_NUMBER"])) {
			$flight_number = '<tr><td>Flight number</td><td> : </td><td>'.$tpl_data["FLIGHT_NUMBER"].'</td></tr>';
		}
		$arrival_time  = "";
		if (!empty($tpl_data["ARRIVAL_TIME"])) {
			$arrival_time  = '<tr><td>Arrival time</td><td> : </td><td>'.$tpl_data["ARRIVAL_TIME"].'</td></tr>';
		}
		
		$trl_lines = "";
		$style = 'style="border: 1px solid #DDDDDD;"';
		for ($i=0; $i<$group_size; $i++) {
			$trl_lines .= '<tr><td align="center" '.$style.'>'.($i+1).'</td><td '.$style.'>'.$travelers[$i]["fullname"].'</td><td align="center" '.$style.'>'.$travelers[$i]["gender"].'</td><td align="center" '.$style.'>'.date("M/d/Y", strtotime($travelers[$i]["birthday"])).'</td><td align="center" '.$style.'>'.$travelers[$i]["nationality"].'</td><td align="center" '.$style.'>'.$travelers[$i]["passport"].'</td><td align="center" '.$style.'>'.date("M/d/Y",strtotime($tpl_data["ARRIVAL_DATE"])).'</td><td align="center" '.$style.'>'.$tpl_data["ARRIVAL_PORT"].'</td><td align="center" '.$style.'>'.$tpl_data["VISA_TYPE"].'</td><td align="center" '.$style.'>'.$service_fee_group[$travelers[$i]["nationality"]].' USD</td></tr>';
		}
		
		return '<table width="100%" style="border-collapse: collapse;">
					<tr>
						<td style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; padding: 10px 15px;">
							<strong>Vietnam Visa Application Details</strong>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid #DDDDDD; padding: 10px 15px;">
							<p><strong>Visa Options</strong></p>
							<table style="margin-left: 30px;">
								<tr><td>Type of visa</td><td> : </td><td>'.$tpl_data["VISA_TYPE"].'</td></tr>
								<tr><td>Purpose of visit</td><td> : </td><td>'.$tpl_data["VISIT_PURPOSE"].'</td></tr>
								<tr><td>Arrival airport</td><td> : </td><td>'.$tpl_data["ARRIVAL_PORT"].'</td></tr>
								<tr><td>Arrival date</td><td> : </td><td>'.date("M/d/Y",strtotime($tpl_data["ARRIVAL_DATE"])).'</td></tr>
								<tr><td>Exit date</td><td> : </td><td>'.date("M/d/Y",strtotime($tpl_data["EXIT_DATE"])).'</td></tr>
								'.$flight_number.$arrival_time.'
								<tr><td>Number of applicants</td><td> : </td><td>'.$group_size.'</td></tr>
								'.$service_fee.'
								'.$processing_time.'
								'.$private_visa.$full_package.$airport_fast_checkin.$car_pickup.$discount.'
								<tr><td colspan="3" style="border-top: 1px dotted #CCCCCC; height: 1px;"></td></tr>
								<tr><td><b>Total services charge</b></td><td> : </td><td><b>'.$tpl_data["TOTAL_FEE"].' USD</b></td></tr>
							</table>
							<br>
							<p><strong>Passport Details</strong></p>
							<table width="100%">
								<tr>
									<td style="padding-left: 30px;">
										<table width="100%" cellpadding="4" cellspacing="0" style="border: 1px solid #DDDDDD; border-collapse: collapse; margin: 0px;">
											<tr>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">No.</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: left; vertical-align: middle;">Full name</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Gender</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Date of birth</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Nationality</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Passport number</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Arrival date</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Arrival airport</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Type of visa</th>
												<th style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; font-weight: normal; text-align: center; vertical-align: middle;">Service fee</th>
											</tr>
											'.$trl_lines.'
										</table>
									</td>
								</tr>
							</table>
							<br>
							<p><strong>Contact Information</strong></p>
							<table style="margin-left: 30px;">
								<tr><td>Full name</td><td> : </td><td>'.$tpl_data["CONTACT_TITLE"].'. '.$tpl_data["CONTACT_FULLNAME"].'</td></tr>
								<tr><td>Email</td><td> : </td><td><a style="color: inherit;" href="mailto:'.$tpl_data["PRIMARY_EMAIL"].'">'.$tpl_data["PRIMARY_EMAIL"].'</a></td></tr>
								<tr><td>Secondary email</td><td> : </td><td><a style="color: inherit;" href="mailto:'.$tpl_data["SECONDARY_EMAIL"].'">'.$tpl_data["SECONDARY_EMAIL"].'</a></td></tr>
								<tr><td>Phone number</td><td> : </td><td><a style="color: inherit;" href="tel:'.$tpl_data["CONTACT_PHONE"].'">'.$tpl_data["CONTACT_PHONE"].'</a></td></tr>
								<tr><td>Special request</td><td> : </td><td>'.$tpl_data["SPECIAL_REQUEST"].'</td></tr>
							</table>
						</td>							
					</tr>
				</table>';
	}

	function visa_payment_successful($tpl_data)
	{
		$CI =& get_instance();
		$CI->load->library('util');
		
		$confirm = "";
		$todo = "";
		if (!$tpl_data["FULL_PACKAGE"]) {
			$todo .= '<li>Prepare USD in cash for stamping fee at the airport: <font color="red">'.$CI->m_visa_fee->cal_visa_fee($tpl_data["VISA_TYPE"])->stamp_fee.' USD/person</font></li>';
		} else {
			$confirm .= '<li>Because you did apply full package with us, NO fee will be charged at the arrival airport anymore.</li>';
		}
		
		if ($tpl_data["PROCESSING_TIME"] == "Urgent") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are successful to apply visa online and paid for '.$tpl_data["PROCESSING_TIME"].' case.</li>
										<li>We will process and send you the visa approved letter in 4 to 8 working hours via email. If you need visa right away, you can reply this email or call us at: <font color="red">'.HOTLINE.'</font></li>
										<li>Please send us the correct flight number and arrival time if you have fast track or car pick up service to avoid missing service.</li>
										'.$confirm.'
									</ul>
								</p>
								<p>
									<strong><u>Thing to do:</u></strong>
									<ul style="list-style-type: decimal;">
										<li>Print out the visa approved letter which will be sent to your email.</li>
										<li>Prepare 2 photos (size 4x6cm) or you can take photos at the airport with 5USD/person</li>
										'.$todo.'
										<li>Print and fill out Immigration form <a style="color: red;" href="'.BASE_URL.'/files/download/entry-and-exit-form.pdf">download here</a> (to avoid wasting your time at the arrival airport).</li>
									</ul>
								</p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Emergency") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are successful to apply visa online and paid for '.$tpl_data["PROCESSING_TIME"].' case.</li>
										<li>We will process and send you the visa approved letter in 1 to 4 working hours via email. If you need visa right away, you can reply this email or call us at: <font color="red">'.HOTLINE.'</font></li>
										<li>You must reply this is email with the correct flight number and arrival time.</li>
										'.$confirm.'
									</ul>
								</p>
								<p>
									<strong><u>Thing to do:</u></strong>
									<ul style="list-style-type: decimal;">
										<li>Print out the visa approved letter which will be sent to your email.</li>
										<li>Prepare 2 photos (size 4x6cm) or you can take photos at the airport with 5USD/person</li>
										'.$todo.'
										<li>Print and fill out Immigration form <a style="color: red;" href="'.BASE_URL.'/files/download/entry-and-exit-form.pdf">download here</a> (to avoid wasting your time at the arrival airport).</li>
									</ul>
								</p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Holiday") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are successful to apply visa online and paid for '.$tpl_data["PROCESSING_TIME"].' case.</li>
										<li>You must reply this is email with the correct flight number and arrival time.</li>
										<li>Holiday visa is valid for single entry 15 days in HCM airport, 30 days in Hanoi. If you need multiple entries, you have to delay to next Monday.</li>
										<li>We will process and send you the visa approved letter in 1 to 2 working hours via email. If you need visa right away, you can reply this email or call us at: <font color="red">'.HOTLINE.'</font>. Some time your visa is denied, all money will refund to your account.</li>
									</ul>
								</p>
								<p>
									<strong><u>Thing to do:</u></strong>
									<ul style="list-style-type: decimal;">
										<li>We will send you the visa letter for boarding the airplane only. <font color="red">Not for using at the arrival airport</font>.</li>
										<li>Prepare 2 photos (size 4x6cm) or you can take photos at the airport with price 5USD/person</li>
										<li>All the fee you are paid and our person at the arrival airport will take care visa for you.</li>
										<li>Print and fill out Immigration form <a style="color: red;" href="'.BASE_URL.'/files/download/entry-and-exit-form.pdf">download here</a> (to avoid wasting your time at the arrival airport).</li>
									</ul>
								</p>
								<p><font color="red">You must read and clear all instructions above. Reply and confirm you did read this email.</font></p>';
		}
		else {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are successful to apply visa online and paid for '.$tpl_data["PROCESSING_TIME"].' case.</li>
										<li>We will process and send you the visa approved letter in 24 to 48 hours via email. If you need visa right away, you can reply this email or call us at: <font color="red">'.HOTLINE.'</font></li>
										<li>Please send us the correct flight number and arrival time if you have fast track or car pick up service to avoid missing service.</li>
										'.$confirm.'
									</ul>
								</p>
								<p>
									<strong><u>Thing to do:</u></strong>
									<ul style="list-style-type: decimal;">
										<li>Print out the visa approved letter which will be sent to your email. Please check your email and make sure your email is correctly.</li>
										<li>Prepare 2 photos (size 4x6cm) or you can take photos at the airport with price 5USD/person</li>
										'.$todo.'
										<li>Print and fill out Immigration form <a style="color: red;" href="'.BASE_URL.'/files/download/entry-and-exit-form.pdf">download here</a> (to avoid wasting your time at the arrival airport).</li>
									</ul>
								</p>';
		}
		
		$content = '<p>Dear <b>'.$tpl_data["FULLNAME"].'</b>,</p>
					<p>Thank you for your application at <strong><a style="color: inherit;" href="'.strtolower(SITE_NAME).'">'.strtolower(SITE_NAME).'</a></strong>. Your application ID is <strong>'.BOOKING_PREFIX.$tpl_data["BOOKING_ID"].'</strong></p>
					<p>Please be informed that your transaction has been completed and your Visa Application has been sent successfully to our Visa Department. Kindly <u><a style="color: inherit;" href="'.site_url("contact").'">contact us</a></u> to get a receipt for your purchase.</p>
					'.$processing_time.'
					<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport.</font></p>
					<p><strong>Please double check your application and kindly notify us IMMEDIATELY if you catch any errors</strong>. We will not be liable for and not response with any troubles if you give us incorrect passport information.</p>
					'.$this->visa_info($tpl_data).'
					<h3><strong>Cancellation and Refund Policy</strong></h3>
					<table width="100%" bgcolor="#F8F8F8">
						<tr>
							<td style="padding: 0px 15px;">
								<p><strong><u>Refundable:</u></strong></p>
								<ul>
									<li>Visa service fees: will be refunded full amount if: denied application(s) by Vietnam Immigration Department, website owner mistake, or you must contact us for cancel maximum 1 hour after applying visa form.</li>
									<li>Fast-track: website owner mistake or not coming to welcome you at the airport or you must contact us at least 24 hours before your departure.</li>
									<li>Stamping fee: FULL refund if you will not arrive Vietnam or cancel visa.</li>
								</ul>
								<p><strong><u>Non refundable:</u></strong></p>
								<ul>
									<li>Mistake(s) from applicant(s), so you must check to make sure all information are correct after applying visa.</li>
									<li>Your application is processing or service delivery (via email) or any changes after service is completed.</li>
								</ul>
							</td>
						</tr>
					</table>
					<br>
					<p>Should you have any further questions, please do not hesitate to contact us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u>.</p>
					<p>Please add our email address <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> in your address book to guarantee to receive our emails in your inbox.</p>';
		return $this->template($content);
	}
	
	function visa_payment_failure($tpl_data)
	{
		$visa_for = ((stripos(strtolower($tpl_data["VISIT_PURPOSE"]), "business") === false) ? "tourist" : "business");
		
		$todo = "";
		if (!$tpl_data["FULL_PACKAGE"]) {
			$todo .= '<li><i>All the service fee is EXCLUDING stamping fee at the airport.</i></li>';
		} else {
			$todo .= '<li>Because you did apply full package with us, NO fee will be charged at the arrival airport anymore.</li>';
		}
		
		if ($tpl_data["PROCESSING_TIME"] == "Urgent") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying for '.$visa_for.' visa in URGENT case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">4 – 8 working hours</font>.</strong></p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Emergency") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying for '.$visa_for.' visa in EMERGENCY case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">30 minutes – 4 working hours</font>. If you wish to receive the Approval Letter right away, please inform us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u> soonest to be supported. Otherwise, the processing time will be as mentioned.</strong></p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Holiday") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying for '.$visa_for.' visa in HOLIDAY case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										<li><i>All the service fee is including stamping fee for Government at the airport.</i></li>
									</ul>
								</p>
								<p>
									<font style="color: red;">* Please note:</font>
									<ul>
										<li>This confirmation email is not visa approval letter for you to get visa sticker at the airport, we will send visa letter after you settle the payment.</li>
										<li>You must send us correct flight number and arrival time</li>
										<li>Please note that Vietnam visa in Holiday case is only valid from 15 days to 90 days of stay with single/multiple entries which depends on the Vietnam Immigration Department.</li>
									</ul>
								</p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">30 minutes – 4 working hours</font>. If you wish to receive the Approval Letter right away, please inform us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u> soonest to be supported. Otherwise, the processing time will be as mentioned.</strong></p>';
		}
		else {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying for '.$visa_for.' visa in NORMAL case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport. We will send visa letter after you settle the payment.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">'.(($visa_for=="tourist")?"2 working days":"3 working days").'</font>.</strong></p>';
		}
		
		$content = '<p>Dear <b>'.$tpl_data["FULLNAME"].'</b>,</p>
					<p>Thank you for your application at <strong><a style="color: inherit;" href="'.strtolower(SITE_NAME).'">'.strtolower(SITE_NAME).'</a></strong>. Your application ID is <strong>'.BOOKING_PREFIX.$tpl_data["BOOKING_ID"].'</strong></p>
					<p><font style="color: red;"><strong>Unfortunately, your payment was NOT completed successfully. Please try again shortly.</strong></font></p>
					<p>Please be informed that your Visa Application has been sent successfully to our Visa Department. To process the visa, please <u><a style="color: inherit;" href="'.site_url("payment").'">settle the payment</a></u> as soon as possible. In case you did make payment and receive successful payment confirmation email from us, kindly ignore this email.</p>
					'.$processing_time.'
					<p><strong>Please double check your application and kindly notify us IMMEDIATELY if you catch any errors</strong>. We will not be liable for and not response with any troubles if you give us incorrect passport information.</p>
					'.$this->visa_info($tpl_data).'
					<br>
					<p>Should you have any further questions, please do not hesitate to contact us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u>.</p>
					<p>Please add our email address <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> in your address book to guarantee to receive our emails in your inbox.</p>';
		return $this->template($content);
	}
	
	function visa_payment_remind($tpl_data)
	{
		$visa_for = ((stripos(strtolower($tpl_data["VISIT_PURPOSE"]), "business") === false) ? "tourist" : "business");
		
		$todo = "";
		if (!$tpl_data["FULL_PACKAGE"]) {
			$todo .= '<li><i>All the service fee is EXCLUDING stamping fee at the airport.</i></li>';
		} else {
			$todo .= '<li>Because you did apply full package with us, NO fee will be charged at the arrival airport anymore.</li>';
		}
		
		if ($tpl_data["PROCESSING_TIME"] == "Urgent") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying '.$visa_for.' visa in URGENT case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport. We will send visa letter after you settle the payment.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">4 – 8 working hours</font>.</strong></p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Emergency") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying '.$visa_for.' visa in EMERGENCY case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport. We will send visa letter after you settle the payment.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">30 minutes – 4 working hours</font>. If you wish to receive the Approval Letter right away, please inform us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u> soonest to be supported. Otherwise, the processing time will be as mentioned.</strong></p>';
		}
		else if ($tpl_data["PROCESSING_TIME"] == "Holiday") {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying '.$visa_for.' visa in HOLIDAY case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										<li><i>All the service fee is including stamping fee for Government at the airport.</i></li>
									</ul>
								</p>
								<p>
									<font style="color: red;">* Please note:</font>
									<ul>
										<li>This confirmation email is not visa approval letter for you to get visa sticker at the airport, we will send visa letter after you settle the payment.</li>
										<li>You must send us correct flight number and arrival time</li>
										<li>Please note that Vietnam visa in Holiday case is only valid from 15 days to 90 days of stay with single/multiple entries which depends on the Vietnam Immigration Department.</li>
									</ul>
								</p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">30 minutes – 4 working hours</font>. If you wish to receive the Approval Letter right away, please inform us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u> soonest to be supported. Otherwise, the processing time will be as mentioned.</strong></p>';
		}
		else {
			$processing_time = '<p>
									<strong><u>This email to confirm that:</u></strong>
									<ul>
										<li>You are applying '.$visa_for.' visa in NORMAL case to Vietnam and we did receive your information. However, you have not paid yet. Therefore, your visa has not been approved yet.</li>
										<li>You can call us at '.HOTLINE.' if any concerns or trouble regarding payment and Vietnam visa information.</li>
										'.$todo.'
									</ul>
								</p>
								<p><font style="color: red;">NOTE: This confirmation email is NOT visa approval letter to get visa sticker at the airport. We will send visa letter after you settle the payment.</font></p>
								<p><strong>After receiving payment, the visa Approval Letter will be sent to your email within <font style="color: red;">'.(($visa_for=="tourist")?"2 working days":"3 working days").'</font>.</strong></p>';
		}
		
		$content = '<p>Dear <b>'.$tpl_data["FULLNAME"].'</b>,</p>
					<p>Thank you for your application at <strong><a style="color: inherit;" href="'.strtolower(SITE_NAME).'">'.strtolower(SITE_NAME).'</a></strong>. Your application ID is <strong>'.BOOKING_PREFIX.$tpl_data["BOOKING_ID"].'</strong></p>
					<p>Please be informed that your Visa Application has been sent successfully to our Visa Department. To process the visa, please <u><a style="color: inherit;" href="'.site_url("payment").'">settle the payment</a></u> as soon as possible. In case you did make payment, kindly ignore this email.</p>
					'.$processing_time.'
					<p><strong>Please double check your application and kindly notify us IMMEDIATELY if you catch any errors</strong>. We will not be liable for and not response with any troubles if you give us incorrect passport information.</p>
					'.$this->visa_info($tpl_data).'
					<br>
					<p>Should you have any further questions, please do not hesitate to contact us via <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> or <u><a style="color: inherit;" href="tel:'.HOTLINE.'">'.HOTLINE.'</a></u>.</p>
					<p>Please add our email address <u><a style="color: inherit;" href="mailto:'.MAIL_INFO.'">'.MAIL_INFO.'</a></u> in your address book to guarantee to receive our emails in your inbox.</p>';
		return $this->template($content);
	}
	
	function payment_online_info($tpl_data)
	{
		return '<table width="100%" style="border-collapse: collapse;">
					<tr>
						<td style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; padding: 10px 15px;">
							<strong>Payment Details</strong>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid #DDD; padding: 10px 15px;">
							<table>
								<tr><td>Full Name</td><td> : </td><td>'.$tpl_data["FULLNAME"].'</td></tr>
								<tr><td>Primary Email</td><td> : </td><td><a style="color: inherit;" href="mailto:'.$tpl_data["PRIMARY_EMAIL"].'">'.$tpl_data["PRIMARY_EMAIL"].'</a></td></tr>
								<tr><td>Application ID</td><td> : </td><td>'.$tpl_data["APPLICATION_ID"].'</td></tr>
								<tr><td>Amount</td><td> : </td><td>'.$tpl_data["AMOUNT"].' USD</td></tr>
								<tr><td>Note for Payment</td><td> : </td><td>'.$tpl_data["NOT_4_PAYMENT"].'</td></tr>
							</table>
						</td>
					</tr>
				</table>';
	}

	function payment_online_successful($tpl_data)
	{
		$content = '<p>Dear: <b>'.$tpl_data["FULLNAME"].'</b></p>
					<p>Thanks for booking with us!</p>
					<p>This is confirmation from us to show that you are successful in payment online. We will have double check and send you a letter later.</p>
					<p>Payment successful via <b>'.$tpl_data["PAYMENT_METHOD"].'</b> payment gate.</p>
					<p>Total amount for service charge: <b>'.$tpl_data["AMOUNT"].'</b> USD.</p>
					<p><strong>Please double check for making sure your information is correctly as in your passport. Any change after visa approved will be charged!</strong></p>
					'.$this->payment_online_info($tpl_data);
		return $this->template($content);
	}
	
	function payment_online_failure($tpl_data)
	{
		$content = '<p>Dear: <b>'.$tpl_data["FULLNAME"].'</b></p>
					<p>Thanks for booking with us!</p>
					<p>This is confirmation from us to show that you was not successful in payment online. Because you can not settle the payment with our system. May your credit card issue some where and you are way from there. Or some reasons for security.</p>
					<p>Payment unsuccessful via <b>'.$tpl_data["PAYMENT_METHOD"].'</b> payment gate.</p>
					<p>If you wish to pay via Paypal, You can pay us directly to account: '.PAYPAL_PAYMENT.'</p>
					<p>Total amount for service charge: <b>'.$tpl_data["AMOUNT"].'</b> USD.</p>
					<p><strong>Please double check for making sure your information is correctly as in your passport. Any change after visa approved will be charged!</strong></p>
					'.$this->payment_online_info($tpl_data);
		return $this->template($content);
	}
	
	function payment_online_remind($tpl_data)
	{
		$content = '<p>Dear: <b>'.$tpl_data["FULLNAME"].'</b></p>
					<p>Thanks for booking with us!</p>
					<p>This is confirmation from us to show that you are making new payment online with us.</p>
					<p>Payment method: <b>'.$tpl_data["PAYMENT_METHOD"].'</b></p>
					<p>Total amount for service charge: <b>'.$tpl_data["AMOUNT"].'</b> USD.</p>
					<p>You can pay us via Paypal address: '.PAYPAL_PAYMENT.'</p>
					<p>For secure reason, we accept payment from third party only as: www.paypal.com or Western Union or Bank transfer. (Please do not send us your credit cards detail)</p>
					<p><strong>Please double check for making sure your information is correctly as in your passport. Any change after visa approved will be charged!</strong></p>
					'.$this->payment_online_info($tpl_data);
		return $this->template($content);
	}
	
	function check_status($tpl_data)
	{
		$content = '<table width="100%" style="border-collapse: collapse;">
						<tr>
							<td style="border: 1px solid #516F97; background-color: #516F97; color: #FFFFFF; padding: 10px 15px;">
								<strong>Request Support Details</strong>
							</td>
						</tr>
						<tr>
							<td style="border: 1px solid #DDD; padding: 10px 15px;">
								<table>
									<tr><td>Primary Email</td><td> : </td><td><a style="color: inherit;" href="mailto:'.$tpl_data["PRIMARY_EMAIL"].'">'.$tpl_data["PRIMARY_EMAIL"].'</a></td></tr>
									<tr><td>Secondary Email</td><td> : </td><td><a style="color: inherit;" href="mailto:'.$tpl_data["SECONDARY_EMAIL"].'">'.$tpl_data["SECONDARY_EMAIL"].'</a></td></tr>
									<tr><td>Full Name</td><td> : </td><td>'.$tpl_data["FULLNAME"].'</td></tr>
									<tr><td>Passport</td><td> : </td><td>'.$tpl_data["PASSPORT"].'</td></tr>
									<tr><td>Message</td><td> : </td><td>'.$tpl_data["MESSAGE"].'</td></tr>
								</table>
							</td>
						</tr>
					</table>';
		return $this->template($content);
	}
}