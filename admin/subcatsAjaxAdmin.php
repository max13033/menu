<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой
/*
$db = mysqli_connect ("localhost","php","12345");
mysqli_select_db("RoboFood",$db);
mysqli_query("SET NAMES 'utf8';");
*/

if (isset($_POST['tableName'])) {$tableName=$_POST['tableName'];}

if (isset($_POST['ownerId'])) {$ownerId=$_POST['ownerId'];}

if (isset($_POST['ownerTitle'])) {$ownerTitle=$_POST['ownerTitle'];}

//if (isset($_POST['catId'])) {$catId=$_POST['catId'];}

// получаем текущую подкатегорию
//if (isset($_POST['subcatId'])) {$subcatId=$_POST['subcatId'];}

$resultSubcat = mysqli_query($connect,"SELECT * FROM $tableName WHERE $ownerTitle = '$ownerId' ORDER BY position");
	$myrowSubcat = mysqli_fetch_array ($resultSubcat);
	$vsego = mysqli_num_rows($resultSubcat);
	//$subcatId = $myrow['id'];
	//$subcatTitle = $myrow['title'];


?>
										
										
								<!-- заголовок таблицы -->
								<tr class="tHeader">
									<td class="tNum"> № </td>
									<td class="tTitle"> Наименование </td>
									<td class="tBut">  </td>
								</tr>					
					
					
								<?php
	/*							$result01 = mysqli_query ($connect, "SELECT * FROM subcat WHERE cat=$catId ORDER BY position");
								if (mysqli_num_rows($result01) > 0)
								{
									$myrow01 = mysqli_fetch_array ($result01);
								}
								else
								{ ?>
									</table>
									</div>
								<?php
									continue;
								}
	*/
								$num = 0;
						
								do {
									$subcatId = $myrowSubcat['id'];
									$subcatTitle = $myrowSubcat['title'];
									//$subcatDesc = $myrowSubcat['desc'];
									$num++;
									?>
			
									
									<!--  вывод каждой строки таблицы  -->
									<tr class="line-<?php echo "$subcatId";?>">
										<td id="id-<?php echo "$subcatId";    ?>"   class="tCount" > <?php echo "$num"; ?> </td>
										<td id="title-<?php echo "$subcatId"; ?>"   class="tTitle" > 
											<input type="text" name="textTitle" id="textTitle-<?php echo "$subcatId"; ?>" class="textTitle" maxlength="80" value="<?php echo $subcatTitle; ?> ">
										</td>
										<td id="but-<?php echo "$subcatId";   ?>"   class="tBut"   > 
											<button id="butEdit-<?php echo "$subcatId"; ?>" class="butEdit" > Изменить </button> 
											<button id="butDel-<?php echo "$subcatId";  ?>" class="butDel" > Удалить </button> 
										</td>
									</tr>
						
									<?php
								}
								while ($myrowSubcat = mysqli_fetch_array ($resultSubcat));
								?>




