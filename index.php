<?php 
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
	$result = $connect->query("SELECT * FROM cat ORDER BY position");
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
		$imgPath = $myrow['img'];

?>


		<div class = "category">
			<div class = "cattitle"><?=$catName?></div>
<?
			// $res = $connect->query("SELECT * FROM")

?>
			<div class = "product">
				<img src = "img/subcat/49.jpg">
				<p>Description</p>
				<p>Цена /вес</p>




			</div>


			<div class = "product"><img src = "img/subcat/30.jpg"></div>
			<div class = "product"><img src = "img/subcat/31.jpg"></div>
			<div class = "product"><img src = "img/subcat/54.jpg"></div>

		</div>	<br>
<?	}	?>




	</div>  <!--   cont    -->	










			

			<div id="mainColTwo" >	
				<!--
				<h2 id="mainZagol">Меню<h2>
				-->
				<?php
				// вывод категорий
				do {

					?>
					
					<div class="item border">
						<a href="Page1.php?catId= <?php echo "$catId"; ?> " class="item_img">  
							<?php echo "<img src={$imgPath} height='230px'>";	?>		
						</a>
			
						<p> <?php echo "$catName"; ?>  </p>
					</div>
					
				<?php
				}	
				while ($myrow = mysqli_fetch_array($result));
				?>
	
	
				
				<!--
				<div class="clear"></div>
				-->
			</div>  <!--  конец mainColTwo  -->
		</div>    <!-- конец contentWrapTwo  -->
	</div>   <!-- конец wrapperTwoCol  -->

</body>

</html>

<?php mysqli_free_result($result);?>
