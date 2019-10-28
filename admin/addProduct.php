
<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$yield = $_POST['yield'];
	$price = $_POST['price'];	
	
	$subcatId = $_POST['subcatId'];
	
	
	$result = mysqli_query ($connect, "SELECT * FROM products ORDER BY `position` DESC LIMIT 1");
	$temp = mysqli_fetch_array($result);
	$pos = $temp['position'];

	// увеличиваем position для добавляемой подкатегории
$pos++;
	
	
$eee = 	$title. " " .$desc. " " .$yield. " " .$price. " " .$subcatId;
	$result = mysqli_query($connect, "INSERT INTO `products` (`title`, `desc`, `yield`, `price`, `subcat`, `position`) VALUES ('$title', '$desc', '$yield', '$price', $subcatId, '$pos')");

	if ($result == 'true') { die ("OK"); }
	 else { { die ("ERROR: INSERT INTO PRODUCTS in addProduct"); }}

	
?>