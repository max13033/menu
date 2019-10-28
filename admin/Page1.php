<?php 

 include ("lock.php"); 
 

if (isset($_GET['cat'])) {$cat=$_GET['cat'];}

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
<link href="style.css" rel="stylesheet" type="text/css"></head>

<body>

	<?php
	$result = mysqli_query ($connect, "SELECT * FROM subcat WHERE cat=$cat");
	//$myrow = mysqli_fetch_array ($result);
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array ($result);
	}
	else
	{
		die("В категории нет товаров");
	}
	
	?>
	
	<ul>
		
		<?php
		do {
			$subcatId = $myrow['id'];
			$catName = $myrow['cat'];
			$subcatName = $myrow['title'];
			
			?>
			
			<li> 
				<a href="Page2.php?subcatId= <?php echo "$subcatId" ?> ">  <?php echo "$subcatName"  ?>     </a>
			</li>
			
		
		<?php
		}	
		while ($myrow = mysqli_fetch_array ($result));
		?>
		
		
	</ul>
	
	<div> <a href="new_subcat.php"> Добавить подкатегорию </a> </div>



</body>

</html>

<? mysqli_free_result($result);?>
