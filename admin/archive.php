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
	 <link href="../css/wicart.css" type="text/css" rel="stylesheet">  

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
	
<body class="archive">

	
	<div id="container">
		<div id="robofood" class="border">
			<h1 >Панель управления</h1>
		</div>
		
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Архив заказов </h2>

		<div id="contentWrap">
				
			<!-- боковая панель -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>
		
		
			<!-- основная колонка  -->
			<div id="mainCol">

			

	<div id="archDel">  
		<form action="deleteArchive.php" method="post" enctype="multipart/form-data" name="form1">
			<div class="childArchDel"> Удаление из архива: </div>
			
			<select name="selArchDel" class="childArchDel" id="selArchDel">
				<option value="nothing"></option>
				<option value="allZakaz">все заказы</option>
				<option value="byDate">по дате</option>
			</select>
			
			<div class="childArchDel" id="calendars"> с  <input type="text"  class="dateField" id="dateFrom" value="" /><input type="button" onclick="show_cal(this, 'dateFrom');" value="..." /> 
																 по  <input type="text" class="dateField" id="dateTo" value="" /><input type="button" onclick="show_cal(this, 'dateTo');" value="..." /> 
			</div>
	
		<!-- <div class="childArchDel">  -->
			<input type="submit" name="butDelArch" id="butDelArch" value="Удалить">
		<!-- </div>  -->
</form>		
	</div>
		
			
			
<?php
// Скрипт постраничной навигации НАЧАЛО

// количество записей, выводимых на одной странице
$recordNum = 10;
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysqli_query($connect, "SELECT COUNT(*) FROM allzakazy WHERE `status` = 'completed'");
$temp = mysqli_fetch_array($result);
$posts = $temp[0];

// Находим общее число страниц
$total = (($posts - 1) / $recordNum) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);

// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $recordNum - $recordNum;
// Выбираем $recordNum сообщений начиная с номера $start		
$rrr = $start. " " .$recordNum;
//echo $rrr; exit();

//$result = mysqli_query("SELECT * FROM allzakazy WHERE `status` = 'completed' ORDER BY id DESC LIMIT $start, $recordNum",$db);
$result = mysqli_query($connect, "SELECT * FROM allzakazy WHERE `status` = 'completed' ORDER BY id DESC LIMIT $start, $recordNum");

// Скрипт постраничной навигации КОНЕЦ
?>




			<?php
	//$result = mysqli_query ("SELECT * FROM zakaz WHERE `status` = 'started'",$db);
	if (!$result) {echo "Архив пуст";  exit();}
	$myrow = mysqli_fetch_array ($result); 
	
	if (mysqli_num_rows($result) < 1)
	{echo "Архив пуст01";  exit();}

	?>
			
				<?php
				//$start = 0;
				do {
					$start++;
					//$catId = $myrow['id'];
					//$catName = $myrow['title'];
					//$imgPath = $myrow['img'];
				
					$zakazId = $myrow['id'];
					$robotNum = $myrow['robot'];
					$totalSum = $myrow['totalSum'];
					$timeStart = $myrow['timeStart'];
					
					//$dateParts=explode('-', $timeStart);
					//$toSql=$dateParts[1];
					//$productYield = $myrow['yield'];
					//$productOrder = $myrow['zakaz'];
					?>
				<div id="zakaz-<?php echo "$zakazId"; ?>" >
						<div class="addSortPanel"> 
							<div class="addElem">  <?php echo "$start) "; ?> Время заказа - <?php echo "$timeStart"; ?> </div>
							<div class="sortElem"> Стол № <?php echo "$robotNum"; ?></div>
						</div>	
			
				<table class="tableList">
					<tr class="tHeader">
						<td class="tNum"> № </td>
						<td class="tTitle"> Наименование </td>
						<td class="tYield"> Выход </td>
						<td class="tCount"> Количество </td>
						<td class="tPrice"> Цена </td>
						
					</tr>

					<?php
					$result01 = mysqli_query ($connect, "SELECT * FROM zakazProducts WHERE `zakaz` = '$zakazId'");
					$myrow01 = mysqli_fetch_array ($result01); 
					if (mysqli_num_rows($result01) < 1)
					{ /*echo "Текущих заказов нет";*/  continue;}
					
					
					$num = 0;
					do {
						$num++;
							$productId = $myrow01['id'];
							$productTitle = $myrow01['title'];
							$productPrice = $myrow01['price'];
							$productYield = $myrow01['yield'];
							$productCount = $myrow01['count'];
					?>
					<tr>
						<td id="id-<?php echo "$zakazId";    ?>" class="tNum"   >  <?php echo "$num";          ?> </td>
						<td id="title-<?php echo "$zakazId"; ?>" class="tTitle" >  <?php echo "$productTitle"; ?> </td>
						<td id="price-<?php echo "$zakazId"; ?>" class="tYield" >  <?php echo "$productYield"; ?> </td>
						<td id="but-<?php echo "$zakazId";   ?>" class="tCount" >  <?php echo "$productCount"; ?> </td>
						<td id="order-<?php echo "$zakazId"; ?>" class="tPrice" >  <?php echo "$productPrice"; ?> </td>
						
					</tr>
					


					<?php
					}	
					while ($myrow01 = mysqli_fetch_array ($result01));
					?>
					
					<tr>
						<td class="tNum" colspan="4"> Сумма: </td>

						<td class="tSum"  >  <?php echo "$totalSum"; ?>  </td>
					</tr>
				</table>	
				 <div class="butZakaz">
				 <button class="butCancelZakaz" id="butCancel-<?php echo "$zakazId"; ?>" > Удалить из архива  </button>
				 <!-- <button class="butCancelZakaz"  id="butCancel-<?php echo "$zakazId"; ?>" > Отменить  </button>  -->
				 </div>
				 </div>
				<?php
				}	
				while ($myrow = mysqli_fetch_array ($result));
				?>
			

  <?php
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=archive.php?page=1> Первая</a> | <a href=archive.php?page='. ($page - 1) .'>Назад</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=archive.php?page='. ($page + 1) .'>Вперед</a> | <a href=archive.php?page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=archive.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=archive.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=archive.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=archive.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a href=archive.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=archive.php?page='.($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=archive.php?page='.($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=archive.php?page='.($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=archive.php?page='.($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=archive.php?page='.($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
} 
?>
			
			
			</div>  <!--  конец mainCol  -->
		</div>

		</div>  <!--  конец wrapper  -->

		

<script type="text/javascript">

/*
// user defined onchange handler
function cal_on_change_dummy(cal, object_code) {
	if (object_code == 'day') {
		alert('Date selected: ' + cal.get_formatted_date());
		cal.show_date();
	}
}
*/


var cal_obj2 = null;

//var format = '%j %M %Y %H:%i';
var format = '%Y-%m-%d';
var fieldName = null;

// show calendar
function show_cal(el, needFieldName) {

	if (cal_obj2) return;
fieldName = needFieldName;
	//var text_field = document.getElementById("text_field");
	var text_field = document.getElementById(fieldName);

	cal_obj2 = new RichCalendar();
	cal_obj2.start_week_day = 1;
	cal_obj2.show_time = false;
	cal_obj2.language = 'ru';
	cal_obj2.user_onchange_handler = cal2_on_change;
	cal_obj2.user_onclose_handler = cal2_on_close;
	cal_obj2.user_onautoclose_handler = cal2_on_autoclose;

	cal_obj2.parse_date(text_field.value, format);

	cal_obj2.show_at_element(text_field, "adj_right-bottom");
	//cal_obj2.change_skin('alt');

}

// user defined onchange handler
function cal2_on_change(cal, object_code) {
	if (object_code == 'day') {
		//document.getElementById("text_field").value = cal.get_formatted_date(format);
		document.getElementById(fieldName).value = cal.get_formatted_date(format);
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

/*
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
*/
</script>

	
		
		
</body>






</html>


<?php mysqli_free_result($result);?>