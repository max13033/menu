
<?php

include ("blocks/bdZakaz.php");  //Соединяемся с базой

$robotNum = $_POST['robotNum'];

$today = date("Y-m-d H:m:s");
//die($today);



$pos = 0;
$totalSum = 0;
$stro = $robotNum;
foreach ($_POST['orderArr'] as $eachElem) {
	$elemId = $eachElem['id'];
	$elemTitle = $eachElem['name'];
	//$elemYield = $eachElem[yield];
	$elemPrice = $eachElem['price'];
	$elemCount = $eachElem['num'];
	
	$totalSum = $totalSum + ($elemPrice * $elemCount);
	//$eachId = $_POST['orderArr'][$pos][id];
	//$stro = $stro. " " .$eachId;
	//$eachTitle = $_POST['orderArr'][$pos][name];
	
	//$stro = $stro. " " .$elemId. " " .$elemTitle;
	
//continue;	
}

$result = mysqli_query($connect, "INSERT INTO allzakazy (`robot`, `totalSum`, `timeStart`) VALUES ('$robotNum', '$totalSum', '$today')");
	//$result = mysql_query("INSERT INTO zakaz (`robot`, `totalSum`, `timeStart`) VALUES ('$robotNum', '$totalSum', $today)");
	//if (!$result) { die ("error INSERT INTO zakaz"); }


	
	$zakazId = mysqli_insert_id($connect);

foreach ($_POST['orderArr'] as $eachElem) {
	$elemId = $eachElem["id"];
	$elemTitle = $eachElem["name"];
	//$elemYield = $eachElem[yield];
	$elemPrice = $eachElem["price"];
	$elemCount = $eachElem["num"];
	
	$totalSum = $totalSum + ($elemPrice * $elemCount);
	//$eachId = $_POST['orderArr'][$pos][id];
	//$stro = $stro. " " .$eachId;
	//$eachTitle = $_POST['orderArr'][$pos][name];
	//$stro = $stro. " " .$elemId. " " .$elemTitle;
	
	$result = mysqli_query($connect, "INSERT INTO zakazProducts (`zakaz`, `title`, `price`, `count`) VALUES ('$zakazId', '$elemTitle', '$elemPrice', $elemCount)");
}	




	
	//$result = mysql_query("INSERT INTO zakaz (`robot`, `totalSum`, `timeStart`, `timeEnd`) VALUES ('56', '$desc', '$yield', '$price', $subcatId)", $db);
		
/*	
	$result = mysql_query ("SELECT zakaz FROM products WHERE id=$id", $db);
	$myrow = mysql_fetch_array($result);
	$curOrder = $myrow['zakaz'];
	$order = $order + $curOrder;
	
	
	$result = mysql_query("UPDATE products SET zakaz = '555' WHERE id = $elemId", $db);
	$pos++;
}
*/
die($stro);


	
?>