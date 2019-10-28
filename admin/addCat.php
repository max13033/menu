<?php

include ("blocks/bd.php");  //Соединяемся с базой

$title = $_POST['title'];
$img = $_POST['img'];


// Определяем наибольший position среди категорий
$result = mysqli_query($connect, "SELECT MAX(`position`) FROM cat");
$temp = mysqli_fetch_array($result);
$pos = $temp[0];

// увеличиваем position для добавляемой категории
$pos++;
	
	$result = mysqli_query($connect, "INSERT INTO `cat` (`title`, `img`, `position`) VALUES ('$title', '$img', '$pos')");
	//$result = mysql_query("UPDATE `products` SET `title` = '$title', `desc` = '$desc', `yield` = '$yield', `price` = '$price' WHERE `id` = $id", $db);
	//$result = mysql_query("UPDATE cat SET title = '$title' WHERE id = $id", $db);
	//$result = mysql_query("UPDATE cat SET  desc = \"говн7ищеее\" WHERE id = $id", $db);
	
	
	if ($result == 'true') { die ("OK"); }
	 else { { die ("ERROR: INSERT INTO CAT in addCat"); }}

	
?>