<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой

if (isset($_GET['cat'])) {$cat=$_GET['cat'];}

/*
include ("blocks/bd.php");  //Соединяемся с базой
$result = mysql_query ("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db); 
//Обращаемся к БД, указываем, какие пункты из какой таблицы надо выбрать

$myrow = mysql_fetch_array ($result); 
//Помещаем выбранные пункты в переменную myrow
*/
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!--
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">


<title> <?php echo $myrow['title']; ?> </title>
-->
	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<link href="css/wicart.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js">  </script>
	<script type="text/javascript" src="js/wicart.js">  </script>
	<script type="text/javascript" src="js/main.js"  >  </script>
	
	<script type="text/javascript" src="js/jqueryUi.js"></script>
	
	
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	});
	</script>
</head>

<body>

<div id="robot"> <img src="img/hand_logo.gif" />  </div>

<div id="wrapper">
	<div class="bsk">
		<a href="#" onclick="cart.clearBasket()" style="float: right; margin-top: 4px">Очистить</a>
		<span id="basketwidjet" style="font: bold 16px Arial; cursor: pointer"onclick="cart.showWinow('bcontainer', 1)"> Мой заказ </span>
		
		
		<div id="schet" class="border"> 
			<ul id='schetlist'> </ul>  
			<div id="schetSum"> </div> 
		</div>
		

	</div>
	<?php 
	$result = mysql_query ("SELECT title FROM cat WHERE id=$cat",$db);
	$myrow = mysql_fetch_array ($result);
	
	?>
	
	<h1><?php echo $myrow['title'] ?> </h1>
	
	<div class="clear"></div>
<div id="vitrine" class="border">	
	
	<?php
	$result = mysql_query ("SELECT * FROM subcat WHERE cat=$cat",$db);
	if (mysql_num_rows($result) > 0)
	{
		$myrow = mysql_fetch_array ($result);
	}
		else
	{
		exit();
	}
	 
	
	?>
	
	
	<div id="accordion">
		
		<?php
		do {
			$subcatId = $myrow['id'];
			$catName = $myrow['cat'];
			$subcatName = $myrow['title'];
			
			?>
			
			<div class="subcatTitle border"> 
				<?php echo "$subcatName"  ?>
				<!-- <a href="Page2.php?subcatId= <?php echo "$subcatId" ?> ">  <?php echo "$subcatName"  ?>     </a>  -->
			</div>
			
			<div> 
				<!-- <ul class="subList"> -->
				<?php 
				$result01 = mysql_query ("SELECT * FROM products WHERE subcat=$subcatId",$db);
				
				
				if (mysql_num_rows($result01) > 0)
				{
					$myrow01 = mysql_fetch_array ($result01);
				}
				else
				{
					continue;
				}
				
				
				?>
				
				<table id="subTable">
					<tr>
						<td> </td>
						<td> Выход </td>
						<td> Цена  </td>
						<td> </td>
					</tr>
					
				<?php
				do {
					$productId = $myrow01['id'];
					$productName = $myrow01['title'];
					$productDesc = $myrow01['desc'];
					$productPrice = $myrow01['price'];
					$productYield = $myrow01['yield'];
					?>
				

						
						<tr class="productList">
							
							<td> <?php echo "$productName"; ?> <div class="desc"> <?php echo "$productDesc"; ?> </div>    </td> 
							<td> <?php echo "$productYield"; ?>  </td> 
							<td> <?php echo "$productPrice"; ?>  </td> 
							<td>
								<button data-pr="<?php echo "$productId"; ?>" class="incart" 
									onclick="cart.addToCart(this, 
															'<?php echo "$productId"; ?>', 
															'<?php echo "$productName"; ?>', 
															'<?php echo "$productPrice";  ?>')" >Заказать</button>
							</td>

						</tr>
											
				
				<!--
					<li class="product" id="<?php echo "$productId"; ?>" >
					<span class="productName">   <?php echo "$productName"; ?>     </span> 
					----------------
					<span class="productPrice">  <?php echo "$productPrice";  ?> </span>
				
				
					<button data-pr="<?php echo "$productId"; ?>" class="incart" 
									onclick="cart.addToCart(this, 
															'<?php echo "$productId"; ?>', 
															'<?php echo "$productName"; ?>', 
															'<?php echo "$productPrice";  ?>')" >Заказать</button>
					
					</li>
				-->	
				
				<?php
				}
				while ($myrow01 = mysql_fetch_array ($result01))
				
				?>
				
				</table>
				<!--  </ul>  -->
			</div>
			
		
		<?php
		}	
		while ($myrow = mysql_fetch_array ($result));
		?>
		
		
	</div>

	<div class="clear"></div>
</div>  <!--  конец vitrine  -->
</div>  <!--  конец wrapper  -->

</body>

</html>

<? mysql_free_result($result);?>
