<!DOCTYPE html>
<html lang="en-US">
	<head>
		<? require_once(APPPATH."views/module/head_html.php"); ?>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?=ADMIN_CSS_URL?>admin.css" />
		<script type="text/javascript" src="<?=ADMIN_JS_URL?>admin.js"></script>
	</head>
	<body>
		<? require_once(APPPATH."views/module/admin/header.php"); ?>
		<? require_once(APPPATH."views/module/admin/breadcrumb.php"); ?>
		<? require_once(APPPATH."views/module/admin/notification.php"); ?>
		<?=$content?>
		<? require_once(APPPATH."views/module/admin/footer.php"); ?>
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
		<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script type="text/javascript">
			function openKCFinderBrowse(field_name, url, user_id, id) {
				window.KCFinder = {
					callBack: function(url) {
						field_name.value = url;
						window.KCFinder = null;
					}
				};
				var popUp = window.open('<?=BASE_URL?>/files/browse.php?type=' + field_name + '&dir='+ field_name + '/' + url, 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
				var pollTimer = window.setInterval(function() {
					if (popUp.closed !== false) {
						window.clearInterval(pollTimer);
						
						var p = {};
						p["user_id"] = user_id;
						p["id"] = id;
						p["field"] = field_name;
						
						jQuery.noConflict();
						(function($){
							$.ajax({
								type : 'POST',
								data : p,
								url : "<?=site_url('syslog/ajax_get_booking_download_files')?>",
								success : function(data){
									$(".file-path-"+id).html(data);
								},
								async:false
							}); 
						})(jQuery);
					}
				}, 200);
			}
			
			function openKCFinder4Textbox(field) {
				window.KCFinder = {
					callBack: function(url) {
						field.value = url;
						window.KCFinder = null;
					}
				};
				window.open('<?=BASE_URL?>/files/browse.php?type=image&dir=files/public', 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
			}
			
			tinymce.init({
				selector: '.tinymce',
				theme: 'modern',
				convert_urls: false,
				plugins: [
					'advlist table autolink lists link image charmap print preview hr anchor pagebreak',
					'searchreplace wordcount visualblocks visualchars code fullscreen',
					'insertdatetime media nonbreaking save table contextmenu directionality',
					'emoticons template paste textcolor colorpicker textpattern imagetools'
				],
				toolbar: 'insertfile undo redo | removeformat | styleselect | fontselect fontsizeselect | bold italic | forecolor backcolor | table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code',
				content_css: [
					'<?=CSS_URL?>style.css',
					'<?=CSS_URL?>bootstrap.css'
				],
				file_browser_callback: function(field, url, type, win) {
					tinymce.activeEditor.windowManager.open({
						file: '<?=BASE_URL?>/files/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
						title: 'File Manager',
						width: 700,
						height: 500,
						inline: true,
						close_previous: false
					}, {
						window: win,
						input: field
					});
					return false;
				}
			});
		</script>
	</body>
</html>
