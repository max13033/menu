<?php 
header("Content-Type: text/html; charset=utf-8");
include ("blocks/bd.php");

//if (isset($_GET['catId'])) {$catId=$_GET['catId'];}

// получаем текущую подкатегорию
if (isset($_GET['tableName'])) {$tableName=$_GET['tableName'];}

if (isset($_GET['ownerId'])) {$ownerId=$_GET['ownerId'];}

if (isset($_GET['ownerTitle'])) {$ownerTitle=$_GET['ownerTitle'];}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
	<title> Панель управления </title>

	<!-- стили  -->
	<link href="../css/style.css"  type="text/css" rel="stylesheet">
	<link href="../css/styleAdmin.css"  type="text/css" rel="stylesheet">
	<link href="../css/wicart.css" type="text/css" rel="stylesheet">

	<!-- скрипты  -->
	<script type="text/javascript" src="../js/jquery.js">   </script>
	<script type="text/javascript" src="../js/jqueryUi.js"></script>
	<script type="text/javascript" src="../js/wicart.js">   </script>
	<script type="text/javascript" src="../js/main.js"  >   </script>

	
<script type="text/javascript">
$(document).ready(function() {

	$("#mainCol").sortable({
		cursor: "move",
		opacity: 0.6,
		stop: function(sorted){
			var result = $("#mainCol").sortable('toArray');
			//alert(result);
			var ownerId = $("#mainCol").attr("ownerId");
			var tableName = $("#mainCol").attr("tableName");
			//alert(tableName);
			$.ajax({
				url: "sortInDb.php",
				type: "POST",
				data: { "array": result, "tableName": tableName, "ownerId": ownerId },
				error: function() {alert('EEError');},
				success: function(data){
									alert( "Прибыли данные: " + data );}
			});
			
		}

	});
	

}); // end ready()



	


</script>	
</head>
	
<body>

	<?php
	
	if ($ownerId==0) {
		$result = mysqli_query ($connect, "SELECT id, title FROM $tableName ORDER BY position");
	}
	else {
		$result = mysqli_query ($connect, "SELECT id, title FROM $tableName WHERE $ownerTitle = $ownerId ORDER BY position");
		
	}
	$myrow = mysqli_fetch_array($result);
	//$ownerTitle = $myrow['title'];
	?>

	<div id="container">
			<div id="robofood" class="border">
				<h1 >Панель управления</h1>
			</div>
		
			<!-- вывод названия категории  -->
			<h2 id="secondZagol"> Сортировка </h2>

			<div id="contentWrap">
				
				<!-- боковая панель -->
				<div id="leftBar">	
					<ul id="leftNav">
						<?php include ("blocks/leftNav.php"); ?>
					</ul>
				</div>
		
		
				<!-- основная колонка  -->
				<div id="mainCol" tableName="<?php echo $tableName ?>" ownerId="<?php echo $ownerId ?>">
			
				
					<?php
					// проходим по всем категориям
					do {
						$elemId = $myrow['id'];
						$elemTitle = $myrow['title'];
						?>
					
						<div class="accordTitle border" id="<?php echo "$elemId"?>"> 
							<?php echo "$elemTitle"  ?>
						</div>
			


					<?php
					}	
					while ($myrow = mysqli_fetch_array ($result));
					?>
			
				<!--</div>    конец accordion  -->
			</div>  <!--  конец mainCol  -->
		</div>  <!--  contentWrap    -->
	</div>  <!--  конец container  -->

</body>
</html>


<? mysqli_free_result($result);?>