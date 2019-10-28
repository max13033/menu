

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title> Меню </title>

	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<link href="css/wicart.css" type="text/css" rel="stylesheet">
	<link href="css/styleBasket.css"  type="text/css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js">  </script>
	<script type="text/javascript" src="js/wicart.js">  </script>
	<script type="text/javascript" src="js/main.js"  >  </script>
	
	<script type="text/javascript" src="js/jqueryUi.js"></script>

</head>

<body>
<!--
	<div id="robot"> <img src="img/hand_logo.gif" height="250px"/>  </div>
-->
		<div id="robofood" class="border">
			<h1 >RoboF</h1>
		</div>
			
		<!-- подключаем виджет корзины  -->
		<div class="bsk">
			<a href="#" onclick="cart.clearBasket()" style="float: right; ">Очистить</a>
			<span id="bskWidjet" onclick="cart.showWinow('bcontainer', 1)"> Мой заказ </span>
		
			<div id="bskList"> </div>  
			<div id="bskTotal">  </div> 
			<div id="bskSum"> </div> 
		</div>
	
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Подкатегория Имя </h2>

		<div id="contentWrap">

			<div id="mainCol">
				


					<!-- подключаем левое меню -->
					<div id="sidebar">	
						<ul id="leftNav">
							<a href="index.php"> <li class="border">  Меню   </li> </a>
						</ul>
					</div>

					
					<!-- таблица продуктов  -->
					<table class="tableList">
						<tr class="tHeader">
							<td class="tTitle"> Наименование</td>
							<td class="tYield"> Выход </td>
							<td class="tPrice"> Цена  </td>
							<td class="tBut"> </td>
						</tr>

			

							<!-- построчно выводим информацию по каждому продукту  -->
							<tr class="productList">
								<td> Продукт1 <div class="desc"> Описание продукта1  </div>    </td> 
								<td> 200г  </td> 
								<td> 280 </td> 
								<td>
								<button data-pr="1" class="incart" 
									onclick="cart.addToCart(this, 
															'1', 
															'Продукт1', 
															'280р')" >Заказать</button>
								</td>
							</tr>

				
					</table>

				</div>  <!--  конец contentWrap -->
			</div>  <!--  конец mainCol -->
		<div class="clear"></div>
<!--  </div>    конец vitrine  -->
<!-- 	</div>   конец wrapper  -->

</body>

</html>

