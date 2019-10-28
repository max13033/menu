
<?php

include ("blocks/bd.php");  //Соединяемся с базой

$pos = 0;


//foreach ($_POST['id'] as $id) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$yield = $_POST['yield'];
	$price = $_POST['price'];
	
	
	$result = mysqli_query($connect, "UPDATE `products` SET `title` = '$title', `desc` = '$desc', `yield` = '$yield', `price` = '$price' WHERE `id` = $id");
	//$result = mysqli_query("UPDATE cat SET title = '$title' WHERE id = $id", $db);
	//$result = mysqli_query("UPDATE cat SET  desc = \"говн7ищеее\" WHERE id = $id", $db);
	$pos++;
	
	if ($result == 'true') { die ("OKKKKKKKK"); }
	 else { die ($res); }

	
?>