<?php 
include ("blocks/bd.php");  //Соединяемся с базой

if (isset($_GET['subcatId'])) {$subcatId=$_GET['subcatId'];}

/*
include ("blocks/bd.php");  //Соединяемся с базой
$result = mysqli_query ("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db); 
//Обращаемся к БД, указываем, какие пункты из какой таблицы надо выбрать

$myrow = mysqli_fetch_array ($result); 
//Помещаем выбранные пункты в переменную myrow
*/
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">


<title> <?php echo $myrow['title']; ?> </title>
-->
	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<link href="css/wicart.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js">   </script>
	<script type="text/javascript" src="js/wicart.js">   </script>
	<script type="text/javascript" src="js/main.js"  >   </script>


</head>

<body>


<div id="wrapper">
	<div class="bsk"> 
		<a href="#" onclick="cart.clearBasket()" style="float: right; margin-top: 4px">Очистить</a>
		<span id="basketwidjet" onclick="cart.showWinow('bcontainer', 1)"> Корзина </span>
		
		<div id="schet" class="border"> <ul id='schetlist'> 	</ul> 
			<div id="schetSum">  </div>
			<button class='bbutton' onclick="cart.confirmOrder()">Подтвердить заказ</button>
		</div> 

	</div>

	<?php
	echo "$cat ccccaattt";
	$result = mysqli_query($connect, "SELECT * FROM products WHERE subcat=$subcatId");

	
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array($result);
	}
	else
	{
		echo "<p> В данной категории нет работ </p>";
		exit();
	}
	
	
	?>
	
	<ul>
		
		<?php
		do {
			$productId = $myrow['id'];
			//$catName = $myrow['cat'];
			$productName = $myrow['title'];
			$productPrice = $myrow['price'];
			
			?>
			
			<li class="product" id="<?php echo "$productId"; ?>" >
				<span class="productName">   <?php echo "$productName"; ?>     </span> 
				----------------
				<span class="productPrice">  <?php echo "$productPrice";  ?> </span>
					
				
				<button data-pr="<?php echo "$productId"; ?>" class="incart" 
									onclick="cart.addToCart(this, 
															'<?php echo "$productId"; ?>', 
															'<?php echo "$productName"; ?>', 
															'<?php echo "$productPrice";  ?>')" >В корзину</button>
			</li>
			
		
		<?php
		}	
		while ($myrow = mysqli_fetch_array ($result));
		?>
		
		
	</ul>
	
	<p> Сумма:: <span id="total">  </span>  </p>

	

	
	<p class="common"> 12121231232123 </p>
	
	
	
</div>  <!-- конец wrapper>

</body>

</html>

<? mysqli_free_result($result);?>
