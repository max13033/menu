<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой

// для категорий данные переменные не важны
if (isset($_POST['tableName'])) {$tableName=$_POST['tableName'];}
if (isset($_POST['ownerId'])) {$ownerId=$_POST['ownerId'];}
if (isset($_POST['ownerTitle'])) {$ownerTitle=$_POST['ownerTitle'];}

// выбираем все категории 
$resultCat = mysqli_query ($connect, "SELECT * FROM `cat` ORDER BY position");
$myrowCat = mysqli_fetch_array ($resultCat);

?>
	<!-- заголовок таблицы -->
	<tr class="tHeader">
		<td class="tNum"> № </td>
		<td class="tPic"> Фото </td>
		<td class="tTitle"> Наименование </td>
		<td class="tBut"> Кнопка </td>
	</tr>
	
<?php
	do {
		$num++;
		$catId = $myrowCat['id'];
		$catImg = $myrowCat['img'];
		$catTitle = $myrowCat['title'];
		//$catDesc = $myrow['desc'];
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
						
			<td id="but-<?php echo "$catId";   ?>"   class="tBut"   > 
					<button id="butEdit-<?php echo "$catId"; ?>" class="butEdit" > Изменить </button> 
					<button id="butDel-<?php echo "$catId";  ?>" class="butDel" > Удалить </button>
			</td>
		</tr>

		<?php
	}
	while ($myrowCat = mysqli_fetch_array ($resultCat));




