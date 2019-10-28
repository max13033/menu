
<?php
//header("Content-Type: text/html; charset=utf-8");
include ("blocks/bdZakaz.php");  //Соединяемся с базой

//phpinfo();

//date_default_timezone_set("UTC");

$today = date("Y-m-d H:m:s");
echo $today;

//$result = mysqli_query("INSERT INTO zakaz (`timeStart`) VALUES ('$today')");
$result = mysqli_query($connect, "SELECT * FROM zakaz WHERE `timeStart` < '$today'");
	if (!$result) {echo "ArchEmpty";  exit();}
	$myrow = mysqli_fetch_array ($result); 
	
	if (mysqli_num_rows($result) < 1)
	{echo "ArchEmpty01";  exit();}
	
	do {
		$timeStart = $myrow['timeStart'];
		?>
		<div> <?php echo $timeStart ?> </div>
		<?php
	}
	while ($myrow = mysqli_fetch_array ($result));
exit();


// получим целое число, соответствующее "сегодня", т.е. 00:00:00 сегодняшней даты
$d1 = strtotime('today'); 

// для отладки выведем как есть
echo $d1, "\n"; // выведется большое целое число

// узнаем сколько секунд прошло с полуночи
echo time() - $d1, "\n"; // выведется не очень большое целое число

// получим дату "завтра"
$d2 = $d1 + 60*60*24;



//echo $d2;
exit();



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

$result = mysqli_query($connect, "INSERT INTO zakaz (`robot`, `totalSum`) VALUES ('$robotNum', '$totalSum')");
	//$result = mysqli_query("INSERT INTO zakaz (`robot`, `totalSum`, `timeStart`) VALUES ('$robotNum', '$totalSum', $today)");
	//if (!$result) { die ("error INSERT INTO zakaz"); }


	
	$zakazId = mysqli_insert_id();

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
//continue;	
}	




	
	//$result = mysqli_query("INSERT INTO zakaz (`robot`, `totalSum`, `timeStart`, `timeEnd`) VALUES ('56', '$desc', '$yield', '$price', $subcatId)", $db);
		
/*	
	$result = mysqli_query ("SELECT zakaz FROM products WHERE id=$id", $db);
	$myrow = mysqli_fetch_array($result);
	$curOrder = $myrow['zakaz'];
	$order = $order + $curOrder;
	
	
	$result = mysqli_query("UPDATE products SET zakaz = '555' WHERE id = $elemId", $db);
	$pos++;
}
*/
die($stro);


	
?>