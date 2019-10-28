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

	<script type="text/javascript">
		$(function() {
		$( ".accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	});
	</script>
	
	</head>
	
<body>

	<?php
	$result = mysqli_query ($connect, "SELECT id, title FROM cat ORDER BY position");
	$myrow = mysqli_fetch_array ($result); 
	?>

	<div id="container">
			<div id="robofood" class="border">
				<h1 >Панель управления</h1>
			</div>
		
			<!-- вывод названия категории  -->
			<h2 id="secondZagol"> Подкатегории </h2>

			<div id="contentWrap">
				
				<!-- боковая панель -->
				<div id="leftBar">	
					<ul id="leftNav">
						<?php include ("blocks/leftNav.php"); ?>
					</ul>
				</div>
		
		
				<!-- основная колонка  -->
				<div id="mainCol">
			
					<div class="accordion">
				
					<?php
					// проходим по всем категориям
					do {
						$catId = $myrow['id'];
						$catTitle = $myrow['title'];
						?>
					
						<div class="accordTitle border" id="<?php echo "$catId"  ?>"> 
							<?php echo "$catTitle"  ?>
						</div>
			
						<div class="accordList">
							
							<div class="addSortPanel"> 
								<div class="addElem" id="add-<?php echo "$catId" ?>" > Добавить подкатегорию </div>
								<div class="sortElem" id="sort-<?php echo "$catId" ?>" > Сортировать подкатегории </div>
							</div>
					
							<!-- таблица подкатегорий в каждой категории -->
							<table class="tableList" id="tableList-<?php echo "$catId" ?>">

								<!-- заголовок таблицы -->
								<tr class="tHeader">
									<td class="tNum"> № </td>
									<td class="tTitle"> Наименование </td>
									<td class="tBut">  </td>
								</tr>					
					
					
								<?php
								$result01 = mysqli_query ($connect, "SELECT * FROM subcat WHERE cat=$catId ORDER BY position");
								if (mysqli_num_rows($result01) > 0)
								{
									$myrow01 = mysqli_fetch_array ($result01);
								}
								else
								{ ?>
									</table>
									</div>
								<?php
									continue;
								}
	
								$num = 0;
						
								do {
									$subcatId = $myrow01['id'];
									$subcatTitle = $myrow01['title'];
									//$subcatDesc = $myrow01['desc'];
									$num++;
									?>
			
									
									<!--  вывод каждой строки таблицы  -->
									<tr class="line-<?php echo "$subcatId";?>">
										<td id="id-<?php echo "$subcatId";    ?>"   class="tCount" > <?php echo "$num"; ?> </td>
										<td id="title-<?php echo "$subcatId"; ?>"   class="tTitle" > 
											<input type="text" name="textTitle" id="textTitle-<?php echo "$subcatId"; ?>" class="textTitle" maxlength="80" value="<?php echo $subcatTitle; ?> ">
										</td>
										<!--
										<td id="desc-<?php echo "$subcatId";  ?>"   class="tDesc"  > 
											<textarea name="textDesc" id="textDesc-<?php echo "$subcatId"; ?>" cols="30" rows="3" maxlength="120"> <?php echo $subcatDesc; ?> </textarea>
										</td>
										-->
										<td id="but-<?php echo "$subcatId";   ?>"   class="tBut"   > 
											<button id="butEdit-<?php echo "$subcatId"; ?>" class="butEdit" > Изменить </button> 
											<button id="butDel-<?php echo "$subcatId";  ?>" class="butDel" > Удалить </button> 
										</td>
									</tr>
						
									<?php
								}
								while ($myrow01 = mysqli_fetch_array ($result01));
								?>
					
							</table>  <!-- конец tableList -->
						</div>  <!-- конец accordList -->

					<?php
					}	
					while ($myrow = mysqli_fetch_array ($result));
					?>
			
				</div>  <!--  конец accordion  -->
			</div>  <!--  конец mainCol  -->
		</div>  <!--  contentWrap    -->
	</div>  <!--  конец container  -->

</body>
</html>


<? mysqli_free_result($result);?>