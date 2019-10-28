<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой


if (isset($_GET['catId'])) {$catId=$_GET['catId'];}

// получаем текущую подкатегорию
if (isset($_GET['subcatId'])) {$subcatId=$_GET['subcatId'];}
else 
{
	$result = mysqli_query ($connect, "SELECT `id`, `title` FROM subcat WHERE `cat` = $catId ORDER BY position LIMIT 1");
	$myrow = mysqli_fetch_array ($result);
	$subcatId = $myrow['id'];
	$subcatTitle = $myrow['title'];

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
		$(" .menuItem#leftNav:first").css({"background": "#F0F0F0", "color": "#000"});
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
			$result = mysqli_query ("SELECT * FROM subcat WHERE cat=$catId ORDER BY position",$db);
			?>
		
			<!-- подключаем левое меню -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>

		

					
					
			<!-- основная колонка  -->
			<div id="mainCol">
					
				<!-- таблица продуктов  -->
				<table class="tableList">
					<tr class="tHeader">
						<td class="tTitle"> Наименование</td>
						<td class="tYield"> Выход </td>
						<td class="tPrice"> Цена  </td>
						<td class="tBut"> </td>
					</tr>

					<?php 
					// выбираем все продукты в подкатегории
					$result01 = mysqli_query ($connect, "SELECT * FROM products WHERE `subcat` = $subcatId ORDER BY position");
					if (mysqli_num_rows($result01) > 0)
						{	$myrow01 = mysqli_fetch_array ($result01);	}
					else
						{	exit();	}		
				
					// проходим по списку продуктов в подкатегории
					do {
						$productId = $myrow01['id'];
						$productTitle = $myrow01['title'];
						$productDesc = $myrow01['desc'];
						$productPrice = $myrow01['price'];
						$productYield = $myrow01['yield'];
						?>
			

						<!-- построчно выводим информацию по каждому продукту  -->
						<tr class="productList" id="trProduct-<?php echo "$productId"; ?>">
							<td class="tTitle"> <?php echo "$productTitle"; ?> <div class="desc"> <?php echo "$productDesc"; ?> </div>    </td> 
							<td class="tYield"> <?php echo "$productYield"; ?>  </td> 
							<td class="tPrice"> <?php echo "$productPrice"; ?>  </td> 
							<td >
								<button id="product-<?php echo "$productId"; ?>" class="incart" 
								onclick="cart.addToCart(this, 
														'<?php echo "$productId"; ?>', 
														'<?php echo "$productTitle"; ?>',
														'<?php echo "$productYield"; ?>',
														'<?php echo "$productPrice"; ?>')" >Заказать</button>
							</td>
						</tr>
						<?php
					}
					while ($myrow01 = mysqli_fetch_array ($result01))
					?>
				
				</table>


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

