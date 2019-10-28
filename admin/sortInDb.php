
<?php

	include ("blocks/bd.php");  //Соединяемся с базой
	
	if (isset($_POST['tableName'])) {$tableName=$_POST['tableName'];}
	
	$pos = 1;
	foreach ($_POST['array'] as $id) {
		$result = mysqli_query($connect, "UPDATE $tableName SET position = $pos WHERE id = $id");
		$pos++;
	}
	if ($result == 'true') { die ("OKKKKKKKK"); }
	 else { die ("error UPDATE POSITION"); }	
	
	
	

	// получаем текущую подкатегорию
	if (isset($_GET['ownerId'])) 
	{
		$ownerId=$_GET['ownerId'];
	}
	
	
	else 
	{
		$result = mysqli_query ($connect, "SELECT `id`, `title` FROM subcat WHERE `cat` = $catId ORDER BY position LIMIT 1");
		$myrow = mysqli_fetch_array ($result);
		$subcatId = $myrow['id'];
		$subcatTitle = $myrow['title'];
	}
	
	
	
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$catId = $_POST['catId'];
	
	$result = mysqli_query($connect, "INSERT INTO `subcat` (`title`, `desc`, `cat`) VALUES ('$title', '$desc', $catId)");

	if ($result == 'true') { die ("OKKKKKKKK"); }
	 else { die ("error INSERT SUBCAT"); }

	
?>