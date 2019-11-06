<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <title> Меню </title>
  <link href="css/style_tables.css"  type="text/css" rel="stylesheet">
</head>

<body>

<div class = "grid">

  <div class = "cafe">
      КАФЕ-КЛУБ
  </div>

  <div class = "robot">
    РОБОТ-МЕНЮ
  </div>

  <div class = "choose">
    ВЫБЕРИТЕ СТОЛ
  </div>

  <div class = "tables">
    <form>

      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "1" class="button_t">1 стол</button>
      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "2" class="button_t">2 стол</button>
      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "3" class="button_t">3 стол</button><br>
      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "4" class="button_t">4 стол</button>
      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "5" class="button_t">5 стол</button>
      <button name = "table_num" formmethod = "GET" formaction="main.php" value = "6" class="button_t">6 стол</button>  


    </form>

  </div>

  <div class="photo">
    <img src = "img/robot.jpg" alt = "robot">
  </div>

</div>  

</body>
</html>
