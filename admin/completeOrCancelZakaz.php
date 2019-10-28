<?php

include ("../blocks/bdZakaz.php");  //Соединяемся с базой
		
if (isset($_POST['zakazId']))  { $zakazId=$_POST['zakazId']; }

if (isset($_POST['param']))  { $param=$_POST['param']; }
		else { die("Not param in CompliteOrCancelZakaz"); }

if (isset($_POST['dateFrom']))  { $dateFrom=$_POST['dateFrom']; }
if (isset($_POST['dateTo']))    { $dateTo=$_POST['dateTo']; }



if ($param == "cancel")
{
	// удаляем заказ
	$result = mysqli_query($connect, "DELETE FROM `allzakazy` WHERE `id` = $zakazId");
	if ($result != 'true') 
	   { die ("Not OK DELEtE FROM allzakazy"); }
		 
	// удаляем продукты
	$result = mysqli_query($connect, "DELETE FROM `zakazProducts` WHERE `zakaz` = $zakazId");
	if ($result != 'true') 
	   { die ("Not OK FROM `zakazProducts`"); }	
}
else if ($param == "complete")
{
	$result = mysqli_query($connect, "UPDATE `allzakazy` SET `status` = 'completed' WHERE `id` = $zakazId");
	
	if ($result != 'true') 
	   { die ("Not OK UPDATE allzakazy"); }	
}

else if ($param == "deleteArchiveByDate")
{

	// преобразуем даты, выбранные пользователем на календарях в формат TIMESTAMP
	$date01 = strtotime($dateFrom);
	$date02 = strtotime($dateTo);
	
	// выбираем все заказы из архива (т.е. выполненные)
	$result = mysqli_query ($connect, "SELECT id, timeStart FROM `allzakazy` WHERE `status` = 'completed' ");
	if (!$result) 
	  { die ("ERROR: SELECT id FROM allzakazy in CompliteOrCancelZakaz"); }	

		
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array ($result);
	
			// объавляем массив id удаляемых заказов
			$needZakaz = array();

			$stro = $date01. "zzz   ";
			
			// проходим по всем заказам архива и добавляем в массив все подходящие по дате
			do {
				$zakazDateStr = $myrow['timeStart'];
				$zakazId = $myrow['id'];
		
				$zakazDate = strtotime($zakazDateStr);
				
				// проверяем, входит ли дата в выбр диапазон
				if ( ($zakazDate >= $date01) && ($zakazDate <= $date02) )
				{
					$needZakaz[] = $zakazId;
			
					$stro = $stro. " " .$zakazDate;
				}
			}
			while ($myrow = mysqli_fetch_array ($result));	

			
			// удаляем каждый подошедший по дате заказ
			foreach ($needZakaz as $eachZakaz)
			{
				//$result = mysqli_query("UPDATE `zakaz` SET `status` = 'deleted' WHERE `id` = $eachZakaz", $db);
				$result = mysqli_query($connect, "DELETE FROM `allzakazy` WHERE `id` = $eachZakaz");
				if ($result != 'true') 
					{ die ("ERROR: DELETE allzakazy BY DATE in CompliteOrCancelZakaz"); }
			}

		
			// проходим по массиву удаляемых заказов и удаляем продукты, относящиеся к ним
			foreach ($needZakaz as $eachZakaz)
			{
					$result = mysqli_query($connect, "DELETE FROM `zakazProducts` WHERE `zakaz` = $eachZakaz");
					if ($result != 'true') 
						{ die ("ERROR: DELETE FROM zakazProducts BY DATE in CompliteOrCancelZakaz"); }
			}	
	}

}

else if ($param == "deleteArchiveAll")
{
	// выбираем все заказы из архива (т.е. выполненные)
	$result = mysqli_query ($connect, "SELECT id, timeStart FROM `allzakazy` WHERE `status` = 'completed' ");
	if (!$result) 
	  { die ("ERROR: SELECT id FROM allzakazy in CompliteOrCancelZakaz"); }	

		
	if (mysqli_num_rows($result) > 0)
	{
		$myrow = mysqli_fetch_array ($result);

		// объавляем массив id удаляемых заказов
		$needZakaz = array();
		
		do {
			$zakazId = $myrow['id'];
			$needZakaz[] = $zakazId;
		}
		while ($myrow = mysqli_fetch_array ($result));	


			foreach ($needZakaz as $eachZakaz)
			{
				$result = mysqli_query($connect, "DELETE FROM `allzakazy` WHERE `id` = $eachZakaz");
				if ($result != 'true') 
					{ die ("ERROR: DELETE FROM allzakazy ALL in CompliteOrCancelZakaz"); }
			}

		// проходим по массиву удаляемых заказов и удаляем продукты, относящиеся к ним
			foreach ($needZakaz as $eachZakaz)
			{
					$result = mysqli_query($connect, "DELETE FROM `zakazProducts` WHERE `zakaz` = $eachZakaz");
					if ($result != 'true') 
						{ die ("ERROR: DELETE FROM zakazProducts ALL in CompliteOrCancelZakaz"); }
			}	

		
	}

}
die("OK");
	
	
?>