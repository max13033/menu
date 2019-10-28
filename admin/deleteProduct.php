
<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	// проверяем существование переданной переменной
	if (isset($_POST['id']))  { $id=$_POST['id']; }
		else { die("Not OK - id"); }
		
	// удаляем продукт
	$result = mysqli_query($connect, "DELETE FROM `products` WHERE `id` = $id");
	if ($result != 'true') 
	   { die ("Not OK Delete PRODUCT"); }	

	die ("OKK");
	
?>