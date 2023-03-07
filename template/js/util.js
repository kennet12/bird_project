
function clearFormError()
{
	$("form input:text").removeClass("error");
	$("form input:password").removeClass("error");
	$("form select").removeClass("error");
	$("form textarea").removeClass("error");
}

function daysInMonth(m, y) // m is 0 indexed: 0-11
{
	switch (m) {
		case 1 :
			return (y % 4 == 0 && y % 100) || y % 400 == 0 ? 29 : 28;
		case 8 : case 3 : case 5 : case 10 :
			return 30;
		default :
			return 31;
	}
}

function isEmail(text)
{
	var pattern = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[\\w]$";
	var regex = new RegExp(pattern);
	return regex.test(text);
}

function checkNumber(input)
{
	var pattern="0123456789";
	var len = input.value.length;
	if (len != 0) {
		var index = 0;
		while ((index < len) && (len != 0)) {
			if (pattern.indexOf(input.value.charAt(index)) == -1)
			{
				if (index == len-1) {
					input.value=input.value.substring(0,len-1);
				} else if(index == 0) {
					input.value=input.value.substring(1,len);
				} else {
					input.value=input.value.substring(0,index)+input.value.substring(index+1,len);index=0;len=input.value.length;
				}
			}
			else {
				index++;
			}
		}
	}
}

function confirmBox(title, message, callback, params)
{
	if (!$("#confirm-dialog").length) {
		$("body").append('<div id="confirm-dialog" class="modal-warning modal fade" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Modal title</h4></div><div class="modal-body"><p>&hellip;</p></div><div class="modal-footer"><button type="button" class="btn btn-default btn-confirm-dialog-ok">OK</button> <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></div></div></div></div>');
	}
	
	$("#confirm-dialog").find(".modal-title").html(title);
	$("#confirm-dialog").find(".modal-body").html(message);
	
	$("#confirm-dialog").find(".btn-confirm-dialog-ok").click(function(event) {
		var fn = window[callback];
		if (!(params instanceof Array)) {
			params = [params];
		}
		if (typeof fn === "function") {
			fn.apply(null, params);
		}
		$("#confirm-dialog").modal("hide");
	});
	
	$("#confirm-dialog").modal();
}

function messageBox(type, title, message)
{
	if (!$("#dialog").length) {
		$("body").append('<div id="dialog" class="modal-error modal fade" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Modal title</h4></div><div class="modal-body"><p>&hellip;</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>');
	}
	
	$("#dialog").removeClass("modal-error");
	$("#dialog").removeClass("modal-info");
	$("#dialog").removeClass("modal-warning");
	
	if (type == "INFO") {
		$("#dialog").addClass("modal-info");
	} else if (type == "WARNING") {
		$("#dialog").addClass("modal-warning");
	} else {
		$("#dialog").addClass("modal-error");
	}
	
	$("#dialog").find(".modal-title").html(title);
	$("#dialog").find(".modal-body").html(message);
	$("#dialog").modal();
}

function showErrorMessage(arrMsg)
{
	var errmsg = "<p>Your information containning errors. Please review and correct the field(s) marked in red then submit again.</p>";
	errmsg += "<ul>";
	for (var i=0; i<arrMsg.length; i++) {
		errmsg += "<li>"+arrMsg[i]+"</li>";
	}
	errmsg += "</ul>";
	messageBox("ERROR", "Error", errmsg);
}