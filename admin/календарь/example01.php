<html>

<head>

	<title>Rich Calendar 1.0, Cross-browser calendar script</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

	<link rel="STYLESHEET" type="text/css" href="rich_calendar/rich_calendar.css">
	<script language="JavaScript" type="text/javascript" src="rich_calendar/rich_calendar.js"></script>

	<script language="JavaScript" type="text/javascript" src="rich_calendar/rc_lang_en.js"></script>
	<script language="JavaScript" type="text/javascript" src="rich_calendar/rc_lang_ru.js"></script>

	<script language="javascript" src="domready/domready.js"></script>

</head>

<body>




<h2>Examples</h2>

<h4>1. Absolute positioned calendar. No alignment settings. Pop-up mode off</h4>

<div id="cal1_div"></div>

<br><br><br><br><br><br><br><br><br><br><br><br>



<h4>2. Absolute positioned calendar. Position is calculated based on position of
the text field below. Alignment settings - &quot;adj_right-top&quot; (such
settings are also possible: &quot;-top&quot; and &quot;adj_right-&quot;!). User
defined handlers. Russian language. Skin 'alt'. User defined date format.
Week starts with Tuesday. Time is shown</h4>

<div style="margin-left:100px;">
<input type="text" id="text_field" value="" /><input type="button" onclick="show_cal(this);" value="..." /><br>
</div>

<br>



<h4>3. Relative positioned calendar. Added as a child to a table cell below.
Alignment settings - &quot;child&quot;. User defined handlers (do not allow to
close calendar)</h4>

<table border="1" cellpadding="0" cellspacing="0" style="border: 1px solid #00f; border-collapse:collapse;">
<tr>
	<td style="font-size:11px;" align="center">Calendar in the table cell below</td>
</tr>
<tr>
	<td id="cal3_td"></td>
</tr>
</table>

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