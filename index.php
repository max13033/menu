﻿<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы
include ("blocks/bd.php");  //Соединяемся с базой
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
	<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title> Меню </title>

	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<link href="css/wicart.css" type="text/css" rel="stylesheet">
	<link href="css/styleBasket.css"  type="text/css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js">   </script>
	<script type="text/javascript" src="js/wicart.js">   </script>
	<script type="text/javascript" src="js/main.js"  >   </script>
</head>

<body>

<?php
	$result = $connect->query("SELECT * FROM subcat ORDER BY position");
	$num_cat = $result->num_rows;

?>
	
	<div id="robofood" class="border" >
		<h1>Кулинария</h1>
	</div>

	<div id = "cont">
<?php 
include ("blocks/basketWidget.php");  

	for($i=1;$i<=$num_cat; $i++){
		$myrow = $result->fetch_array(MYSQLI_ASSOC); 
		
		$catId = $myrow['id'];
		$catName = $myrow['title'];

?>


		<div class = "category">
			<div class = "cattitle"> <?=$catName?></div>
<?
			$res = $connect->query("SELECT * FROM products WHERE `subcat` = '$catId' ORDER BY `position` ");
			$num_prod = $res->num_rows;

			for($j = 1; $j <= $num_prod; $j++){
				$prod = $res->fetch_array(MYSQLI_ASSOC);
				$productId = $prod['id'];
				$productTitle = $prod['title'];
				$productYield = $prod['yield'];
				$productPrice = $prod['price'];
?>
			<div class = "product" onclick="cart.addToCart(this, 
														'<?php echo "$productId"; ?>', 
														'<?php echo "$productTitle"; ?>',
														'<?php echo "$productYield"; ?>',
														'<?php echo "$productPrice"; ?>')">
				<div>
					<img src = "img/subcat/<?=$productId?>.jpg">
				</div>

				<p><?=$prod['title']?>&nbsp;<?=$prod['desc']?></p>
				<p>Цена: <?=$prod['price'] ?>р/<wbr><?=$prod['yield']?>гр.</p>

			</div>
<?			}		?>

		</div>	<br><br>
<?	}	?>



		<br><br><br>
	</div>  <!--   cont    -->	

</body>

</html>

<?php mysqli_free_result($result);?>
