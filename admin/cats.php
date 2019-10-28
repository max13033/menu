<?php 
header("Content-Type: text/html; charset=utf-8");
include ("blocks/bd.php");
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
	<script type="text/javascript" src="../js/jqueryUi.js"> </script>
	<script type="text/javascript" src="../js/wicart.js">   </script>
	<script type="text/javascript" src="../js/main.js"  >   </script>
</head>
	
<body>

	<?php
	$result = mysqli_query ($connect, "SELECT * FROM cat ORDER BY position");
	$myrow = mysqli_fetch_array ($result); 
	?>
	
	<div id="container">
		<div id="robofood" class="border">
			<h1 >Панель управления</h1>
		</div>
		
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Категории </h2>

		<div id="contentWrap">
				
			<!-- боковая панель -->
			<div id="leftBar">	
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>
		
		
			<!-- основная колонка  -->
			<div id="mainCol">
				<div class="addSortPanel"> 
						<div class="addElem"  id="add-0"  > Добавить категорию </div>
						<div class="sortElem" id="sort-0" > Сортировать категории </div>
				</div>				
				
				<!--  главная таблица  -->
				<table class="tableList" id="tableList-0">
					
					<!-- заголовок таблицы -->
					<tr class="tHeader">
						<td class="tNum"> № </td>
						<td class="tPic"> Фото </td>
						<td class="tTitle"> Наименование </td>
						<!-- <td class="tDesc"> Описание </td>  -->
						<td class="tBut"> Кнопка </td>
					</tr>
				
					<?php
					$num = 0;
					if (mysqli_num_rows($result) > 0)
					{
					do {
						$num++;
						$catId = $myrow['id'];
						$catImg = $myrow['img'];
						$catTitle = $myrow['title'];
						$catDesc = $myrow['desc'];
					?>
						
						<!--  вывод каждой строки таблицы  -->
						<tr class="line-<?php echo "$catId";?>">
							<td id="id-<?php echo "$catId";    ?>"   class="tNum"   >  <?php echo "$num";      ?>  </td>
							<td id="img-<?php echo "$catId";   ?>"   class="tPic"   >  
								<input type="text" name="textImg" id="textImg-<?php echo "$catId"; ?>" class="textTitle" maxlength="80" value="<?php echo $catImg; ?> ">
							</td>
							<td id="title-<?php echo "$catId"; ?>"   class="tTitle" >  
								<input type="text" name="textTitle" id="textTitle-<?php echo "$catId"; ?>" class="textTitle" maxlength="80" value="<?php echo $catTitle; ?> ">
							</td>
							<!--
							<td id="desc-<?php echo "$catId";  ?>"   class="tDesc"  >
								<textarea name="textDesc" id="textDesc-<?php echo "$catId"; ?>" cols="30" rows="3" maxlength="120"> <?php echo $catDesc; ?> </textarea>
							</td>
							-->
							<td id="but-<?php echo "$catId";   ?>"   class="tBut"   > 
									<button id="butEdit-<?php echo "$catId"; ?>" class="butEdit" > Изменить </button> 
									<button id="butDel-<?php echo "$catId";  ?>" class="butDel" > Удалить </button>
							</td>
						</tr>

					<?php
					}	
					while ($myrow = mysqli_fetch_array ($result));
					}
					?>
			
				</table>	

	
			</div>  <!--  конец mainCol  -->
		</div>    <!--  contentWrap    -->
	</div>    <!--  конец container  -->

</body>
</html>


<? mysqli_free_result($result);?>