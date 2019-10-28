<?php 
header("Content-Type: text/html; charset=utf-8");

// $db = mysqli_connect ("localhost","php","12345");
// echo $db;
// mysql_select_db("RoboFood",$db);
// mysql_query("SET NAMES 'utf8';");
include ("blocks/bd.php");


$resultCat = mysqli_query ($connect, "SELECT id, title FROM cat ORDER BY position");
$myrowСat = mysqli_fetch_array ($resultCat); 
		do {
				$catId = $myrowСat['id'];
				$catTitle = $myrowСat['title'];
				echo $catTitle;
			}
			while ($myrowСat = mysqli_fetch_array ($resultCat));


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
	<title> Панель управления </title>

	<!-- стили  -->
	<link href="../css/style.css"  type="text/css" rel="stylesheet">
	<link href="../css/styleAdmin.css"  type="text/css" rel="stylesheet">
	<link href="../css/wicart.css" type="text/css" rel="stylesheet">

	<!-- скрипты  -->
	<script type="text/javascript" src="../js/jquery.js">   </script>
	<script type="text/javascript" src="../js/jqueryUi.js"></script>
	<script type="text/javascript" src="../js/wicart.js">   </script>
	<script type="text/javascript" src="../js/main.js"  >   </script>

<script type="text/javascript">
	// Аккордеон
	$(function() {
		$( ".accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	});

	$(function() {
		$( ".accordion1" ).accordion({
			heightStyle: "content",
			//collapsible: true,
			//active: false
		});
	});	
	
		$(function() {
		$( ".accordion2" ).accordion({
			heightStyle: "content",
			//collapsible: true,
			//active: false
		});
	});	
	
</script>	
</head>
	
<body id="products">

	<?php
	$resultCat = mysqli_query ($connect, "SELECT id, title FROM cat ORDER BY position");
	echo $resultCat;
	$myrowСat = mysqli_fetch_array ($resultCat); 


	?>
	<div id="container">
		<div id="robofood" class="border">
			<h1 >Панель управления</h1>
		</div>
		
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Продукты </h2>

		<div id="contentWrap">
				
			<!-- боковая панель -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>
		
		<?php
/*		
		do {
				$catId = $myrowСat['id'];
				$catTitle = $myrowСat['title'];
				echo $catTitle;
			}
			while ($myrowСat = mysqli_fetch_array ($resultCat));	
		*/ ?>
		
		
		
			<!-- основная колонка  -->
			<div id="mainCol">
			
				<div class="accordion">
				
					<?php
					// вывод категорий
					do {
						$catId = $myrowСat['id'];
						$catTitle = $myrowСat['title'];
						//echo $catTitle;
						?>
						<div class="accordTitle border" id="<?php echo "$catId"  ?>"> 
							<?php echo "$catTitle"  ?>
						</div>
			
						<div class="accordList">

							<div class="accordion">
							
								<?php
								$resultSubcat = mysqli_query ($connect, "SELECT id, title FROM subcat WHERE `cat` = '$catId' ORDER BY position");
								$myrowSubcat = mysqli_fetch_array ($resultSubcat); 
								// вывод подкатегорий
								do {
									$subcatId = $myrowSubcat['id'];
									$subcatTitle = $myrowSubcat['title'];
									?>
							
									<div class="accordTitle border" id="<?php echo "$subcatId"  ?>"> 
										<?php echo "$subcatTitle"  ?>
									</div>
							
							
									<div class="accordList">

										<div class="addSortPanel"> 
											<div class="addElem"  id="add-<?php echo "$subcatId" ?>">  Добавить продукты </div>
											<div class="sortElem" id="sort-<?php echo "$subcatId" ?>"> Сортировать продукты </div>
										</div>


										<!-- таблица списка продуктов в каждой подкатегории -->
										<table class="tableList" id="tableList-<?php echo "$subcatId" ?>">
					
										<!-- заголовок таблицы -->
										<tr class="tHeader">
											<td class="tNum"> № </td>
											<td class="tTitle"> Наименование </td>
											<td class="tDesc"> Описание </td>
											<td class="tYield"> Выход </td>
											<td class="tPrice"> Цена </td>
											<td class="tBut"> Кнопка </td>
										</tr>					
					
					
										<?php
										$resultProducts = mysqli_query ($connect, "SELECT * FROM products WHERE subcat=$subcatId ORDER BY position");
										if (mysqli_num_rows($resultProducts) > 0)
										{
											$myrowProducts = mysqli_fetch_array ($resultProducts);
										}
										else
										{
										?>
											</table>
											</div>
											<?php	continue;
										}

										$count = 0;
										
										// вывод продуктов
										do {
											$productId = $myrowProducts['id'];
											$productTitle = $myrowProducts['title'];
											$productDesc = $myrowProducts['desc'];
											$productPrice = $myrowProducts['price'];
											$productYield = $myrowProducts['yield'];
											//$productOrder = $myrowProducts['zakaz'];
											$count++;
											?>
			
											<tr class="line-<?php echo "$productId";?>">
												<td id="id-<?php echo "$productId";    ?>"   class="tCount" > <?php echo "$count"; ?> </td>
												<td id="title-<?php echo "$productId"; ?>"   class="tTitle" > 
													<input type="text" name="textTitle" id="textTitle-<?php echo "$productId"; ?>" class="textTitle" maxlength="80" value="<?php echo $productTitle; ?> ">
												</td>
												<td id="desc-<?php echo "$productId";  ?>"   class="tDesc"  > 
													<textarea name="textDesc" id="textDesc-<?php echo "$productId"; ?>" cols="30" rows="3" maxlength="120"> <?php echo $productDesc; ?> </textarea>							
												</td>
												<td id="yield-<?php echo "$productId";  ?>"   class="tYield"  > 
													<input type="text" name="textYield" id="textYield-<?php echo "$productId"; ?>" class="textYield" maxlength="20" value="<?php echo $productYield; ?> ">
												</td>
												<td id="price-<?php echo "$productId";  ?>"   class="tPrice"  > 
													<input type="text" name="textPrice" id="textPrice-<?php echo "$productId"; ?>" class="textPrice" maxlength="20" value="<?php echo $productPrice; ?> ">
												</td>
												<td id="but-<?php echo "$productId";   ?>"   class="tBut"   > 
													<button id="butEdit-<?php echo "$productId"; ?>" class="butEdit" > Изменить </button> 
													<button id="butDel-<?php echo "$productId";  ?>" class="butDel" > Удалить </button> 
												</td>
											</tr>
						
										<?php
										}
										while ($myrowProducts = mysqli_fetch_array ($resultProducts));
										?>
					
										</table>  <!-- конец tableList продуктов -->
									</div>      <!-- конец accordList продуктов -->

								<?php
								}
								while ($myrowSubcat = mysqli_fetch_array ($resultSubcat));  ?>
							</div>   <!-- конец accordion продуктов -->
						
						</div>  <!-- конец accordList Subcat -->
					
					<?php
					}
					while ($myrowСat = mysqli_fetch_array ($resultCat));  ?>


			
				</div>  <!--  конец accordion  -->
			</div>  <!--  конец mainCol  -->
			<!--  <button id="111"> Ghjm,d </button>  -->
		</div>  <!-- конец contentWrap -->
	</div>  <!--  конец container  -->

</body>
</html>


<? mysqli_free_result($resultCat);?>