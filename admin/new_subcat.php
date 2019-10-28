<?php 
 include ("lock.php"); 
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<!--
<meta name="description" content="<?php echo $myrow['meta_d']; ?> ">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?> ">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">


<title> <?php echo $myrow['title']; ?> </title>
-->
<link href="style.css" rel="stylesheet" type="text/css"></head>

<body>

	<?php
	$result = mysqli_query ($connect, "SELECT * FROM cat");
	$myrow = mysqli_fetch_array ($result); 
	
	?>
	
	<ul>
		
    <form action="add_cat.php" method="post" enctype="multipart/form-data" name="form1">
      <p>
        <input type="hidden" name="Max_file_size" value="100000" >
      </p>
      <p>
        <label>Путь к миниатюре
          <input type= "file" name="img" id="img">
        </label>
        <br>
      </p>
      <p>
        <label>Название
          <input type="text" name="title" id="title" maxlength="60">
        </label>
      </p>
      <p>
        <label>Краткое описание<br>
          <textarea name="desc" id="desc" cols="45" rows="5" ></textarea>
        </label>
      </p>
      <p>
        <label>
          <input type="submit" name="button" id="submit" value="Занести в базу">
        </label>
      </p>
    </form>
		
		

		
		
	</ul>



</body>

</html>

<? mysqli_free_result($result);?>
