<?php 
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title> Меню </title>

	<link href="css/style.css"  type="text/css" rel="stylesheet">
	<!--
	<link href="css/wicart.css" type="text/css" rel="stylesheet">
	<link href="css/styleBasket.css"  type="text/css" rel="stylesheet">
-->
	<script type="text/javascript" src="js/jquery.js">  </script>
	<!--
	<script type="text/javascript" src="js/wicart.js">  </script>
	<script type="text/javascript" src="js/main.js"  >  </script>
	
	<script type="text/javascript" src="js/jqueryUi.js"></script>
-->
	<script type="text/javascript" >
		$(document).ready(function() {

			
			
			var robotNum = localStorage.getItem("robotNumber");
				if (!$.isEmptyObject(robotNum))
				{
					var aciveOpt = $("#optRobotNum option[value='" + robotNum + "']");
					aciveOpt.attr('selected', 'selected');
					alert(robotNum);
				
				}
				else
					{	alert("ПУсто");  }
			//return;
			

			
			
				/*********************************************
	*  Кнопка ввода номера робота	
	*********************************************/	
	$("#butRobotNum").click(function() {
		var robotNum = $("#optRobotNum").val();
		if (robotNum == 0) 
			{ alert("Выберите номер робота");
				return;
			}
			
		localStorage.setItem('robotNumber', robotNum);
		alert(robotNum);
	});

		});  //  конец (document).ready
	</script>
</head>

<body>
<!--
	<div id="robot"> <img src="img/hand_logo.gif" height="250px"/>  </div>
-->
		<div id="robofood" class="border">
			<h1 >Ресторан RoboFood</h1>
		</div>
			





	
		<!-- вывод названия категории  -->
		<h2 id="secondZagol"> Выберите номер робота </h2>

		<div id="contentWrap">

			
				


					<!-- подключаем левое меню 
					<div id="leftBar">	
						<ul id="leftNav">
							<a href="index.php"> <li class="activeMenu border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
							<a href="index.php"> <li class="border">  Меню   </li> </a>
						</ul>
					</div>
				-->

					
					
					<!-- основная колонка  -->
					<div id="mainCol">
						
						<div id="robotNum">
							<select name="robot" id="optRobotNum">
								<option value="0"></option>
								<option value="1">Робот №1</option>
								<option value="2">Робот №2</option>
								<option value="3">Робот №3</option>
								<option value="4">Робот №4</option>
							</select>
							
							 <button id="butRobotNum">Ввод</button> 
							
							<a href="index.php"> <button >На главную</button> </a>
						</div>
					


				</div>  <!--  конец mainCol -->
			</div>  <!--  конец contentWrap -->


</body>

</html>

