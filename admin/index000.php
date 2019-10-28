<?php 
//header("Content-Type: text/html; charset=utf-8");
//header('Refresh:60');
//include ("../blocks/bdZakaz.php");
//include ("blocks/bd.php");

$db1 = mysql_connect ("localhost","php","12345");
mysql_select_db("robofood_zakazy", $db1)  or die("jjjjjj");
mysql_query("SET NAMES 'utf8';"); 


$res = mysql_query ("SELECT `id` FROM `zakaz`", $db1) || die(mysql_error());
$myrow = mysql_fetch_array($res) || die(mysql_error()); 
	if ($res != 'true') 
	{	
		echo "0000000000000000000000000000000000";  
		exit();
	}
echo "прошли";

	?>
