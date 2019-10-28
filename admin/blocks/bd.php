<?php
// $db = mysql_connect ("localhost","php","12345");
// mysql_select_db("RoboFood",$db);
// mysql_query("SET NAMES 'utf8';");




$connect = new mysqli("localhost", "root", "mysql", "robofood");

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}

mysqli_query($connect, "SET NAMES utf8");
?>
