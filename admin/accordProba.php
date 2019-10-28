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
	<script type="text/javascript" src="../js/jqueryUi.js"></script>
	<script type="text/javascript" src="../js/wicart.js">   </script>
	<script type="text/javascript" src="../js/main.js"  >   </script>
</head>
	
<body>

	<?php
	$result = mysqli_query ($connect, "SELECT id, title FROM cat ORDER BY position");
	$myrow = mysqli_fetch_array ($result); 
	?>
<!--
	<div id="robot"> <img src="../img/hand_logo.gif" />  </div>
-->	
	<div id="wrapper" class="border">
		<h1>Панель управления</h1>
		<h2>Подкатегории<h2>

		

		<div id="contentWrap">
			
			<!-- боковая панель -->
			<div id="sidebar">	
				<!-- левое меню навигации -->
				<ul id="leftNav">
					<?php include ("blocks/leftNav.php"); ?>
				</ul>
			</div>
		
		
		
			<div id="mainCol">
			
				<div id="accordion">
					<!--
					<div> title 111111 </div>
					
						<div> 
							<div> 2222222 </div>
							<div> 3333333 </div>
							<div> 4444444 </div>
						</div>

							
					
					
				
					
					<div> title 22222 </div>
						<div> 33333333 </div>
						-->
					
					

					<div class="accordTitle border" id="111"> 
						Имя категории
					</div>
					
					<div class="eachAccord">
						<table class="tableList">

						
						<tr class="tHeader">
							<td class="tNum"> № </td>
							<td class="tTitle"> Наименование </td>
							<td class="tDesc"> Описание </td>
							<td class="tBut"> Кнопка </td>
						</tr>
						</table>
					</div>
					
					
					
					<div class="accordTitle border" id="111"> 
						Имя категории 2
					</div>
					
					<div class="eachAccord">
						<table class="tableList">
						<tr class="tHeader">
							<td class="tNum"> № </td>
							<td class="tTitle"> Наименование </td>
							<td class="tDesc"> Описание </td>
							<td class="tBut"> Кнопка </td>
						</tr>
						</table>
						
						<table class="tableList">
						<tr class="tHeader">
							<td class="tNum"> № </td>
							<td class="tTitle"> Наименование </td>
							<td class="tDesc"> Описание </td>
							<td class="tBut"> Кнопка </td>
						</tr>
						</table>
					</div>					
					
					
				</div>
				

	
			</div>  <!--  конец mainCol  -->
		</div>  <!--  contentWrap    -->

		</div>  <!--  конец wrapper  -->

</body>
</html>


<? mysqli_free_result($result);?>