<?php 
header("Content-Type: text/html; charset=utf-8");

$db = mysql_connect ("localhost","php","12345");
echo $db;
mysql_select_db("RoboFood",$db);
mysql_query("SET NAMES 'utf8';");
//include ("blocks/bd.php");
?>


<? mysql_free_result($result);?>
