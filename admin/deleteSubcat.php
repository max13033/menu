
<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	// проверяем существование переданной переменной
	if (isset($_POST['id']))  { $id=$_POST['id']; }
		else { die("Not OK - id"); }
/*		
	if (isset($_POST['elemType']))  { $elemType=$_POST['elemType']; }
		else { die("Not OK - elemType"); }		
*/	

	// объявляем массив продуктов, входящих в удаляемую подкатегорию
	$needProduct = array();
	
	$stro = "SubCat: "  .$id;
		
	// выбираем продукты, входящие в удаляемую подкатегорию
	$result = mysqli_query ($connect, "SELECT `id` FROM products WHERE `subcat`=$id");
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array ($result);

		// заносим выбранные продукты в массив
		do {
			$needProduct[] = $myrow['id'];
		}	
		while ($myrow = mysqli_fetch_array ($result));
	}
	
		
		$stro = $stro.  "  product:";
		
		foreach ($needProduct as $eachProduct)
		{
			$stro = $stro. " " .$eachProduct;			
		}
	
	//die ($stro);	
		
	// удаляем подкатегорию
	$result = mysqli_query($connect, "DELETE FROM `subcat` WHERE `id` = $id");
	if ($result != 'true') 
	   { die ("Not OK Delete SUBCAT"); }	
		

	// удаляем все продукты, входящие в выбранную подкатегорию
	foreach ($needProduct as $eachProduct)
	{
			$result = mysqli_query($connect, "DELETE FROM `products` WHERE `id` = $eachProduct");
			if ($result != 'true') 
				{ die ("Not OK Delete PRODUCT"); }			
	}		
	
		die ("OKK");
	
?>