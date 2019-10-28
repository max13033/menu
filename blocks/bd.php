<?php
// $db = mysql_connect ("localhost","","");
// mysql_select_db("roborood",$db);
// mysql_query("SET NAMES 'utf8';"); 

session_start();

$connect = new mysqli("localhost", "root", "mysql", "robofood");

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}

mysqli_query($connect, "SET NAMES utf8");











?>
