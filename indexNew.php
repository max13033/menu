<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы
//include ("blocks/bd.php");  //Соединяемся с базой

//include ("../blocks/bdZakaz.php");

$db = mysqli_connect ($connect, "localhost","root","");
mysqli_select_db("RoboFood", $db)  or die(mysqli_error());
mysqli_query("SET NAMES 'utf8';"); 
echo "fdrtgsh";
	$result = mysqli_query ("SELECT `id` FROM cat ") || die(mysqli_error());;
	$myrow = mysqli_fetch_array ($result); 
	
	do {
		
		$catTitle = $myrow['id'];
		echo $catTitle;
	}
	while ($myrow = mysqli_fetch_array ($result));
/*
include ("blocks/bd.php");  //Соединяемся с базой
$result = mysqli_query ("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db); 
//Обращаемся к БД, указываем, какие пункты из какой таблицы надо выбрать

$myrow = mysqli_fetch_array ($result); 
//Помещаем выбранные пункты в переменную myrow
*/
  ?>


<? mysqli_free_result($result);?>
