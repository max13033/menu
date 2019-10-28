<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой
/*
$db = mysqli_connect ("localhost","php","12345");
mysql_select_db("RoboFood",$db);
mysql_query("SET NAMES 'utf8';");
*/

if (isset($_POST['tableName'])) {$tableName=$_POST['tableName'];}

if (isset($_POST['ownerId'])) {$ownerId=$_POST['ownerId'];}

if (isset($_POST['ownerTitle'])) {$ownerTitle=$_POST['ownerTitle'];}

//if (isset($_POST['catId'])) {$catId=$_POST['catId'];}

// получаем текущую подкатегорию
//if (isset($_POST['subcatId'])) {$subcatId=$_POST['subcatId'];}

$resultProducts = mysqli_query ($connect, "SELECT * FROM $tableName WHERE $ownerTitle = '$ownerId' ORDER BY position");
	$myrowProducts = mysqli_fetch_array ($resultProducts);
	$vsego = mysqli_num_rows($resultProducts);
	//$subcatId = $myrow['id'];
	//$subcatTitle = $myrow['title'];


?>
										
										
										<!-- заголовок таблицы -->
										<tr class="tHeader">
											<td class="tNum"> № </td>
											<td class="tTitle"> Наименование </td>
											<td class="tDesc"> Описание </td>
											<td class="tYield"> Выход </td>
											<td class="tPrice"> Цена </td>
											<td class="tBut"> <?php echo $vsego; ?></td>
										</tr>	

<?php
										// вывод продуктов
										do {
											$productId = $myrowProducts['id'];
											$productTitle = $myrowProducts['title'];
											$productDesc = $myrowProducts['desc'];
											$productPrice = $myrowProducts['price'];
											$productYield = $myrowProducts['yield'];
											//$productOrder = $myrowProducts['zakaz'];
											$count++;
											?>
			
											<tr class="line-<?php echo "$productId";?>">
												<td id="id-<?php echo "$productId";    ?>"   class="tCount" > <?php echo "$count"; ?> </td>
												<td id="title-<?php echo "$productId"; ?>"   class="tTitle" > 
													<input type="text" name="textTitle" id="textTitle-<?php echo "$productId"; ?>" class="textTitle" maxlength="80" value="<?php echo $productTitle; ?> ">
												</td>
												<td id="desc-<?php echo "$productId";  ?>"   class="tDesc"  > 
													<textarea name="textDesc" id="textDesc-<?php echo "$productId"; ?>" cols="30" rows="3" maxlength="120"> <?php echo $productDesc; ?> </textarea>							
												</td>
												<td id="yield-<?php echo "$productId";  ?>"   class="tYield"  > 
													<input type="text" name="textYield" id="textYield-<?php echo "$productId"; ?>" class="textYield" maxlength="20" value="<?php echo $productYield; ?> ">
												</td>
												<td id="price-<?php echo "$productId";  ?>"   class="tPrice"  > 
													<input type="text" name="textPrice" id="textPrice-<?php echo "$productId"; ?>" class="textPrice" maxlength="20" value="<?php echo $productPrice; ?> ">
												</td>
												<td id="but-<?php echo "$productId";   ?>"   class="tBut"   > 
													<button id="butEdit-<?php echo "$productId"; ?>" class="butEdit" > Изменить </button> 
													<button id="butDel-<?php echo "$productId";  ?>" class="butDel" > Удалить </button> 
												</td>
											</tr>
						
										<?php
										}
										while ($myrowProducts = mysqli_fetch_array ($resultProducts));
										?>



