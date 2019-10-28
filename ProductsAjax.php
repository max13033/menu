<?php 
header("Content-Type: text/html; charset=utf-8"); //устанавливаем кодировку страницы

include ("blocks/bd.php");  //Соединяемся с базой
// $db = mysqli_connect ("localhost","php","12345");
// mysqli_select_db("RoboFood",$db);
// mysqli_query("SET NAMES 'utf8';");



if (isset($_POST['catId'])) {$catId=$_POST['catId'];}

// получаем текущую подкатегорию
if (isset($_POST['subcatId'])) {$subcatId=$_POST['subcatId'];}

$result = mysqli_query($connect, "SELECT * FROM subcat WHERE `id` = '$subcatId' ORDER BY position");
	$myrow = mysql_fetch_array ($result);
	$subcatId = $myrow['id'];
	$subcatTitle = $myrow['title'];


echo $subcatTitle;

?>



				<!-- таблица продуктов  -->
				<table class="tableList">
					<tr class="tHeader">
						<td class="tTitle"> Наименование</td>
						<td class="tYield"> Выход </td>
						<td class="tPrice"> Цена  </td>
						<td class="tBut"> </td>
					</tr>

					<?php 
					// выбираем все продукты в подкатегории
					$result01 = mysqli_query($connect, "SELECT * FROM products WHERE `subcat` = $subcatId ORDER BY position");
					if (mysqli_num_rows($result01) > 0)
						{	$myrow01 = mysqli_fetch_array ($result01);	}
					else
						{	exit();	}		
				
					// проходим по списку продуктов в подкатегории
					do {
						$productId = $myrow01['id'];
						$productTitle = $myrow01['title'];
						$productDesc = $myrow01['desc'];
						$productPrice = $myrow01['price'];
						$productYield = $myrow01['yield'];
						?>
			

						<!-- построчно выводим информацию по каждому продукту  -->
						<tr class="productList">
							<td class="tTitle"> <?php echo "$productTitle"; ?> <div class="desc"> <?php echo "$productDesc"; ?> </div>    </td> 
							<td class="tYield"> <?php echo "$productYield"; ?>  </td> 
							<td class="tPrice"> <?php echo "$productPrice"; ?>  </td> 
							<td >
								<button data-pr="<?php echo "$productId"; ?>" class="incart" 
								onclick="cart.addToCart(this, 
														'<?php echo "$productId"; ?>', 
														'<?php echo "$productTitle"; ?>',
														'<?php echo "$productYield"; ?>',
														'<?php echo "$productPrice"; ?>')" >Заказать</button>
							</td>
						</tr>
						<?php
					}
					while ($myrow01 = mysqli_fetch_array ($result01))
					?>
				
				</table>


