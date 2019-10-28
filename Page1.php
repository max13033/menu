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

</head>

<body>
		<?php
		$result = mysqli_query ($connect, "SELECT title FROM cat WHERE id=$catId");
		$myrow = mysqli_fetch_array ($result);
		?>

	<div id="container">
		<div id="robofood" class="border">
			<h1 >Кулинария</h1>
		</div>

	
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> <?php echo $myrow['title'] ?> </h2>

		<div id="contentWrap">

		
			<?php 
			// получаем список всех подкатегорий в текущей категории для вывода его в левом меню
			// (дальнейшая обработка запроса - в файле leftNav.php )
			$result = mysqli_query($connect, "SELECT * FROM subcat WHERE cat=$catId ORDER BY position");
			?>
		
			<!-- подключаем левое меню -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>

		

					
					
			<!-- основная колонка  -->
			<div id="mainCol">
					
				<!-- список продуктов  -->
					

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
						<div style = "width: 300px;/* ширина блока */
								 height: 380px; border: 2px solid #000; float: left; margin-right: 20px;margin-bottom: 20px; border-radius: 20px; text-align: center; box-sizing: border-box; position: relative;" id="trProduct-<?php echo "$productId"; ?>"   
						onclick="cart.addToCart(this, 
														'<?php echo "$productId"; ?>', 
														'<?php echo "$productTitle"; ?>',
														'<?php echo "$productYield"; ?>',
														'<?php echo "$productPrice"; ?>')" >
							<img style = "height: 280px; /*  высота картинка */ width: 280px; /* ширина картинки */ margin-top: 20px;" src = "img/subcat/<?=$productId?>.jpg"> <br>
							<span style = "font-weight: bold; font-size: 20pt; position: absolute; left: 20%; bottom: 10px; margin: auto;"><?=$productTitle?><br> Цена &nbsp; <?=$productPrice?></span> 



						</div>	
							

						<?php
					}
					while ($myrow01 = mysqli_fetch_array ($result01))
					?>



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

