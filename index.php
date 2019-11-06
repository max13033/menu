<!DOCTYPE html>
<html>
<head>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  width: 190px;    /*  ширина кнопки  */
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 42px;        /* размер шрифта */
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;

}

</style>
</head>
<body>

<h1><center>Кулинария<center></h1>
<h2 style="color:blue;"><center>MENU / МЕНЮ <center></h2>
<h1><center><i>Пожалуйста выберите свободный стол</i><center></h1>
<br>
<br>
<div style="text-align: center;">
<form>

	<button name = "table_num" formmethod = "GET" formaction="main.php" value = "1" class="button">1 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="main.php" value = "2" class="button">2 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="main.php" value = "3" class="button">3 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="main.php" value = "4" class="button">4 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="main.php" value = "5" class="button">5 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="main.php" value = "6" class="button">6 стол</button>  <br>


</form>
</div>
</body>
</html>
