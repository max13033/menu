<?php 

 include ("lock.php"); 
 

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
<!--
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">


<title> <?php echo $myrow['title']; ?> </title>
-->
	<link href="../css/style.css"  type="text/css" rel="stylesheet">
	<link href="../css/wicart.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="../js/jquery.js">   </script>
	<script type="text/javascript" src="../js/wicart.js">   </script>
	<script type="text/javascript" src="../js/main.js"  >   </script>

<body>

	<?php
	$result = mysqli_query ($connect, "SELECT * FROM products WHERE subcat=$subcatId");
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array ($result);
	}
	else
	{
		die("В подкатегории нет товаров");
	}
	
	?>
	
	<table id="subTable">
		<tr>
			<td> Наименование </td>
			<td> Выход </td>
			<td> Цена  </td>
			<td> Заказано</td>
		</tr>
		
		<?php
		do {
			$productId = $myrow['id'];
			$productName = $myrow['title'];
			$productDesc = $myrow['desc'];
			$productPrice = $myrow['price'];
			$productYield = $myrow['yield'];
			$productOrder = $myrow['zakaz'];
			
			?>
			
			<tr class="productList">
							
				<td> <?php echo "$productName"; ?> <div class="desc"> <?php echo "$productDesc"; ?> </div>    </td> 
				<td> <?php echo "$productYield"; ?>  </td> 
				<td> <?php echo "$productPrice"; ?>  </td> 
				<td> <?php echo "$productOrder"; ?>  </td> 

			</tr>
			

			
		
		<?php
		}	
		while ($myrow = mysqli_fetch_array ($result));
		?>
		
		

	




</body>

</html>

<? mysqli_free_result($result);?>
