<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	$pos = 0;


	$id = $_POST['id'];
	$img = $_POST['img'];
	$title = $_POST['title'];
	//$desc = $_POST['desc'];
	

	$result = mysqli_query($connect, "UPDATE `cat` SET `title` = '$title', `img` = '$img' WHERE `id` = $id");

	$pos++;
	
	if ($result == 'true') { die ("OKKKKKKKK"); }
	 else { die ("NOT UPDATE CAT"); }

	
	
?>