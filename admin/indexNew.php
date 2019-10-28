<?php 
header("Content-Type: text/html; charset=utf-8");
/*
$db = mysql_connect ("localhost","php","12345");
echo $db;
mysql_select_db("RoboFood_zakazy",$db);
mysql_query("SET NAMES 'utf8';");
*/
include ("../blocks/bdZakaz.php");


$resultCat = mysql_query ("SELECT id, totalSum FROM allzakazy WHERE status = 'started'",$db);
$myrowСat = mysql_fetch_array ($resultCat); 
		do {
				$catId = $myrowСat['id'];
				$catTitle = $myrowСat['totalSum'];
				echo $catTitle;
			}
			while ($myrowСat = mysql_fetch_array ($resultCat));

phpInfo();
?>



<?php mysql_free_result($resultCat);?>
