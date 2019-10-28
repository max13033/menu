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
}

.button4 {border-radius: 12px;}

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

	<button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "1" class="button button4">1 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "2" class="button button4">2 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "3" class="button button4">3 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "4" class="button button4">4 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "5" class="button button4">5 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "6" class="button button4">6 стол</button>  <br>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "7" class="button button4">7 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "8" class="button button4">8 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "9" class="button button4">9 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "10" class="button button4">10 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "11" class="button button4">11 стол</button>
  <button name = "table_num" formmethod = "GET" formaction="mainpage.php" value = "12" class="button button4">12 стол</button>

</form>
</div>
</body>
</html>
