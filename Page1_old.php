<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой


if (isset($_GET['catId'])) {$catId=$_GET['catId'];}

// получаем текущую подкатегорию
if (isset($_GET['subcatId'])) {$subcatId=$_GET['subcatId'];}
else 
{
	$result = mysqli_query($connect, "SELECT `id`, `title` FROM subcat WHERE `cat` = $catId ORDER BY position LIMIT 1");
	$myrow = mysqli_fetch_array($result);
	$subcatId = $myrow['id'];
	$subcatTitle = $myrow['title'];

}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title> Меню </title>

	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<link href="css/wicart.css" type="text/css" rel="stylesheet">
	<link href="css/styleBasket.css"  type="text/css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js">  </script>
	<script type="text/javascript" src="js/wicart.js">  </script>
	<script type="text/javascript" src="js/main.js"  >  </script>
	
	<script type="text/javascript" src="js/jqueryUi.js"></script>

<script type="text/javascript">
	var robotNum = localStorage.getItem("robotNumber");
	if ($.isEmptyObject(robotNum))
	{
		location.replace("InputRobotNum.php");
	}

$(document).ready(function() {	
		//$(" .menuItem#leftNav:first").css({"background": "#F0F0F0", "color": "#000"});
		$("li.menuItem:first").click();
});
</script>	
	
</head>

<body>
<!--
	<div id="robot"> <img src="img/hand_logo.gif" height="250px"/>  </div>
-->
		<?php
		$result = mysqli_query ($connect, "SELECT title FROM cat WHERE id=$catId");
		$myrow = mysqli_fetch_array ($result);
		?>

<div id="container">
		<div id="robofood" class="border">
			<h1 >Ресторан RoboFood</h1>
		</div>

	
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> <?php echo $myrow['title'] ?> </h2>

		<div id="contentWrap">

		
			<?php 
			// получаем список всех подкатегорий в текущей категории для вывода его в левом меню
			// (дальнейшая обработка запроса - в файле leftNav.php )
			$result = mysqli_query ($connect, "SELECT * FROM subcat WHERE cat=$catId ORDER BY position");
			?>
		
			<!-- подключаем левое меню -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>

		

					
					
			<!-- основная колонка  -->
			<div id="mainCol">


			</div>  <!--  конец mainCol -->
		</div>  <!--  конец contentWrap -->
	<!-- <div class="clear"></div>  -->
	
				<!-- подключаем правое меню -->
			<div id="rightBar">
				<!-- подключаем виджет корзины  -->
				<?php include ("blocks/basketWidget.php");  ?>
			</div>
	
<div> <!--container-->
<!--  </div>    конец vitrine  -->
<!-- 	</div>   конец wrapper  -->

</body>

</html>

