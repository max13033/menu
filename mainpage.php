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

	<script type="text/javascript">
		var robotNum = <?=$_GET['table_num']?>;
		localStorage.setItem('robotNumber', robotNum);
		// alert(robotNum);
	</script>


	<?php
	$result = $connect->query("SELECT * FROM cat ORDER BY position");
	$myrow = $result->fetch_array(MYSQLI_ASSOC); 
	?>
	
<!-- 	<div id="robot" > <img src="img/hand_logo.gif" height="180px" />  </div> -->
	
	<div id="robofood" class="border" >
		<h1>Кулинария</h1>
	</div>

	<div id="wrapperTwoCol">
		<!-- заголовок  
		<h2 id="secondZagol"> Меню  </h2>
		-->
		<div id="contentWrapTwo">

			<!-- подключаем правое меню -->
			<div id="rightBar">
				<!-- подключаем виджет корзины  -->
				<?php include ("blocks/basketWidget.php");  ?>
			</div>

			<!-- главная колонка -->
			<div id="mainColTwo" >	
				<!--
				<h2 id="mainZagol">Меню<h2>
				-->
				<?php
				// вывод категорий
				do {
					$catId = $myrow['id'];
					$catName = $myrow['title'];
					$imgPath = $myrow['img'];
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
