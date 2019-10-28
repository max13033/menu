
<?php

include ("blocks/bd.php");  //Соединяемся с базой

$pos = 0;


//foreach ($_POST['id'] as $id) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	//$desc = $_POST['desc'];
	
	/*
	$result = mysqli_query ($connect, "SELECT * FROM cat WHERE id=$id");
	$myrow = mysqli_fetch_array($result);
	*/

	
	$result = mysqli_query($connect, "UPDATE `subcat` SET `title` = '$title' WHERE `id` = $id");
	//$result = mysqli_query($connect, "UPDATE cat SET title = '$title' WHERE id = $id");
	//$result = mysqli_query($connect, "UPDATE cat SET  desc = \"говн7ищеее\" WHERE id = $id");
	$pos++;
	
	if ($result == 'true') { die ("OKKKKKKKK"); }
	 else { die ("ERROR: UPDATE subcat"); }

	
?>