
<?php

	include ("blocks/bd.php");  //Соединяемся с базой

	// проверяем существование переданной переменной
	if (isset($_POST['id']))  { $id=$_POST['id']; }
		else { die("Not OK - id"); }
/*		
	if (isset($_POST['elemType']))  { $elemType=$_POST['elemType']; }
		else { die("Not OK - elemType"); }		
*/	

	// объявляем массивы подкатегорий и продуктов, входящих в удаляемую категорию
	$needSubcat = array();
	$needProduct = array();
	
	$stro = "Cat: "  .$id;
	//die($stro);
	
	// выбираем все подкатегории, входящие в удаляемую категорию
	$result = mysqli_query ($connect, "SELECT * FROM `subcat` WHERE `cat`=$id");
		
	// если такие подкатегории существуют
	if (mysqli_num_rows($result) > 0)
	{ 
		$myrow = mysqli_fetch_array ($result);

		// проходим по выбранным подкатегориям и заносим их в массив
		do {
			$needSubcat[] = $myrow['id'];
		}	
		while ($myrow = mysqli_fetch_array ($result));

		// проходим по массиву подкатегорий и выбираем продукты, относящиеся к ним
		foreach ($needSubcat as $eachSubcat)
		{
			$result = mysqli_query ($connect, "SELECT `id` FROM products WHERE subcat=$eachSubcat");
			if (mysqli_num_rows($result) > 0)
			{
				$myrow = mysqli_fetch_array ($result);

				// заносим выбранные продкты в массив
				do {
					$needProduct[] = $myrow['id'];
				}	
				while ($myrow = mysqli_fetch_array ($result));
			}
		}
		
		
		
		$stro = $stro. " Subcat:";
		
		foreach ($needSubcat as $eachSubcat)
		{
			$stro = $stro. " " .$eachSubcat;
		}
		
		$stro = $stro.  "  product:";
		
		foreach ($needProduct as $eachProduct)
		{
			$stro = $stro. " " .$eachProduct;			
		}
	}	
	//die ($stro);	
		
	// удаляем категорию
	$result = mysqli_query($connect, "DELETE FROM `cat` WHERE `id` = $id");
	if ($result != 'true') 
	   { die ("Not OK Delete CAT"); }	
		
	// удаляем все подкатегории, входящие в категорию
	foreach ($needSubcat as $eachSubcat)
	{
			$result = mysqli_query($connect, "DELETE FROM `subcat` WHERE `id` = $eachSubcat");
			if ($result != 'true') 
				{ die ("Not OK Delete SUBCAT"); }
	}
	
	// удаляем все продукты, входящие в выбрнные подкатегории
	foreach ($needProduct as $eachProduct)
	{
			$result = mysqli_query($connect, "DELETE FROM `products` WHERE `id` = $eachProduct");
			if ($result != 'true') 
				{ die ("Not OK Delete PRODUCT"); }			
	}		
	
		die ("OKK");
	
?>