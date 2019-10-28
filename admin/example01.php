<?php 
header("Content-Type: text/html; charset=utf-8");
include ("../blocks/bdZakaz.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
	<title> Панель управления </title>

	<!-- стили  -->
	<link href="../css/style.css"  type="text/css" rel="stylesheet">
	<link href="../css/styleAdmin.css"  type="text/css" rel="stylesheet">
	<!--  <link href="../css/wicart.css" type="text/css" rel="stylesheet">  -->

	<!-- скрипты  -->
	<script type="text/javascript" src="../js/jquery.js">   </script>
 <script type="text/javascript" src="../js/wicart.js">   </script>  
	<script type="text/javascript" src="../js/main.js"  >   </script>
	
	<!-- календарь  -->
	<link rel="STYLESHEET" type="text/css" href="rich_calendar/rich_calendar.css">
	<script language="JavaScript" type="text/javascript" src="rich_calendar/rich_calendar.js"></script>

	<script language="JavaScript" type="text/javascript" src="rich_calendar/rc_lang_en.js"></script>
	<script language="JavaScript" type="text/javascript" src="rich_calendar/rc_lang_ru01.js"></script>

	<script language="javascript" src="domready/domready.js"></script>
	
</head>

<body>



<div style="margin-left:100px;">
<input type="text" id="text_field" value="" /><input type="button" onclick="show_cal(this);" value="..." /><br>
</div>

<br>




<script language="JavaScript">

// user defined onchange handler
function cal_on_change_dummy(cal, object_code) {
	if (object_code == 'day') {
		alert('Date selected: ' + cal.get_formatted_date());
		cal.show_date();
	}
}


var cal_obj2 = null;

var format = '%j %M %Y %H:%i';

// show calendar
function show_cal(el) {

	if (cal_obj2) return;

var text_field = document.getElementById("text_field");

	cal_obj2 = new RichCalendar();
	cal_obj2.start_week_day = 2;
	cal_obj2.show_time = true;
	cal_obj2.language = 'ru';
	cal_obj2.user_onchange_handler = cal2_on_change;
	cal_obj2.user_onclose_handler = cal2_on_close;
	cal_obj2.user_onautoclose_handler = cal2_on_autoclose;

	cal_obj2.parse_date(text_field.value, format);

	cal_obj2.show_at_element(text_field, "adj_right-top");
	cal_obj2.change_skin('alt');

}

// user defined onchange handler
function cal2_on_change(cal, object_code) {
	if (object_code == 'day') {
		document.getElementById("text_field").value = cal.get_formatted_date(format);
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onclose handler
function cal2_on_close(cal) {
	if (window.confirm('Are you sure to close the calendar?')) {
		cal.hide();
		cal_obj2 = null;
	}
}

// user defined onclose handler (used in pop-up mode - when auto_close is true)
function cal2_on_autoclose(cal) {
	cal_obj2 = null;
}


// user defined onclose handler
function cal3_on_close(cal) {
}


// embed calendars in page when page is loaded as otherwise IE could fail
// loading the page
function rc_body_onload() {

var div_cal1 = document.getElementById("cal1_div");
var div_cal1_pos = RichCalendar.get_obj_pos(div_cal1);

var cal_obj = new RichCalendar();
	cal_obj.auto_close = false;
	cal_obj.user_onchange_handler = cal_on_change_dummy;
	cal_obj.show(div_cal1_pos[0]+20, div_cal1_pos[1]);


var cal3_td = document.getElementById('cal3_td');

var cal_obj3 = new RichCalendar();
	cal_obj3.auto_close = false;
	cal_obj3.user_onchange_handler = cal_on_change_dummy;
	cal_obj3.user_onclose_handler = cal3_on_close;
	cal_obj3.show_at_element(cal3_td, "child");

}

//window.onload = rc_body_onload;
DOMReady.onDOMReadyHandler = rc_body_onload;
DOMReady.listenDOMReady();

</script>




</body>

</html>