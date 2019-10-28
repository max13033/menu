
<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	$title = $_POST['title'];
	//$desc = $_POST['desc'];
	$catId = $_POST['catId'];


	$result = mysqli_query ($connect, "SELECT * FROM subcat ORDER BY `position` DESC LIMIT 1");
	$temp = mysqlш_fetch_array($result);
	$pos = $temp['position'];

	// увеличиваем position для добавляемой подкатегории
$pos++;

	
	$result = mysqli_query($connect, "INSERT INTO `subcat` (`title`, `cat`, `position`) VALUES ('$title', '$catId', '$pos')");

	if ($result == 'true') { die ("OK"); }
	 else { { die ("ERROR: INSERT INTO SUBCAT in addSubat"); }}

	
?>