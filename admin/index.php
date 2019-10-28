<?php 
header("Content-Type: text/html; charset=utf-8");
header('Refresh:60');   // автоматическое обновление через N секунд
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
</head>
	
<body>


	
	<div id="container">
		<div id="robofood" class="border">
			<h1 >Панель управления</h1>
		</div>
		
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Текущие заказы </h2>

		<div id="contentWrap">
				
			<!-- боковая панель -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>
		
		
			<!-- основная колонка  -->
			<div id="mainCol">

<?php

// Скрипт постраничной навигации НАЧАЛО

// количество записей, выводимых на одной странице
$recordNum = 10;
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysqli_query($connect, "SELECT COUNT(*) FROM allzakazy WHERE `status` = 'started'");
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
$resultZak = mysqli_query($connect, "SELECT * FROM allzakazy WHERE `status` = 'started' ORDER BY id LIMIT $start, $recordNum");

// Скрипт постраничной навигации КОНЕЦ


	//$resultZak = mysqli_query ("SELECT * FROM allzakazy WHERE status = 'started'",$db);


	if (!$result) 
	{	
		echo "Текущих заказов нет";  
		exit();
	}
	
	
	$myrowZak = mysqli_fetch_array ($resultZak); 
	
	if (mysqli_num_rows($resultZak) < 1)
	{echo "Текущих заказов нет01";  exit();}

	?>
			
				<?php
				//$count = 0;
				do {
					$start++;
					//$catId = $myrow['id'];
					//$catName = $myrow['title'];
					//$imgPath = $myrow['img'];
				
					$zakazId = $myrowZak['id'];
					$robotNum = $myrowZak['robot'];
					$totalSum = $myrowZak['totalSum'];
					$timeStart = $myrowZak['timeStart'];
					
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
						<td class="tPrice"> Цена </td>
						<td class="tCount"> Количество </td>
					</tr>

					<?php
					$resultProd = mysqli_query ($connect, "SELECT * FROM zakazProducts WHERE `zakaz` = '$zakazId'");
					$myrowProd = mysqli_fetch_array ($resultProd); 
					if (mysqli_num_rows($resultProd) < 1)
					{ /*echo "Текущих заказов нет";*/  continue;}
					
					
					$num = 0;
					do {
						$num++;
							$productId = $myrowProd['id'];
							$productTitle = $myrowProd['title'];
							$productPrice = $myrowProd['price'];
							$productYield = $myrowProd['yield'];
							$productCount = $myrowProd['count'];
					?>
					<tr>
						<td id="id-<?php echo "$zakazId";    ?>" class="tNum"   >  <?php echo "$num";          ?> </td>
						<td id="title-<?php echo "$zakazId"; ?>" class="tTitle" >  <?php echo "$productTitle"; ?> </td>
						<td id="price-<?php echo "$zakazId"; ?>" class="tYield" >  <?php echo "$productYield"; ?> </td>
						<td id="order-<?php echo "$zakazId"; ?>" class="tPrice" >  <?php echo "$productPrice"; ?> </td>
						<td id="but-<?php echo "$zakazId";   ?>" class="tCount" >  <?php echo "$productCount"; ?> </td>
					</tr>
					


					<?php
					}	
					while ($myrowProd = mysqli_fetch_array ($resultProd));
					?>
					
					<tr>
						
					</tr>
				</table>	
				 <div class="butZakaz">
				 <button class="butComleteZakaz" id="butComlete-<?php echo "$zakazId"; ?>" > Выполнить  </button>
				 <button class="butCancelZakaz"  id="butCancel-<?php echo "$zakazId"; ?>" > Отменить  </button>
				 </div>
				 </div>
				<?php
				}	
				while ($myrowZak = mysqli_fetch_array ($resultZak));
				?>
			

  <?php

  // Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=index.php?page=1> Первая</a> | <a href=index.php?page='. ($page - 1) .'>Назад</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=index.php?page='. ($page + 1) .'>Вперед</a> | <a href=index.php?page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=index.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=index.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=index.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a href=index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=index.php?page='.($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=index.php?page='.($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=index.php?page='.($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=index.php?page='.($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=index.php?page='.($page + 1) .'>'. ($page + 1) .'</a>';

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

</body>
</html>


<?php mysqli_free_result($resultZak);
	  mysqli_free_result($resultProd);
?>