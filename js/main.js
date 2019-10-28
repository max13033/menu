$(document).ready(function() {

	// Подключаем корзину-виджет
	cart = new WICard("cart");
	var config = {'clearAfterSend':true, 'showAfterAdd':false /*, 'valudate':contactForm */ }; 
	cart.init("basketwidjet", config);

	




	
	//$(".activeMenu").addClass(".DDD");
	// сортировка элементов
	/*
	$(".tableList").sortable({
		cursor: "move",
		opacity: 0.6,
		axis: "y",
		items: ">div>tr"
		/*
		stop: function(sorted){
			var result = $(".tableList").sortable('toArray');
			alert(result);
			$.ajax({
				url: "SortInBd.php",
				type: "POST",
				data: {array: result},
				error: function() {alert('EEError');}
			});
		}
		
	});
	*/
	
	
	/***********************************************************************************************
	***********************  EVENTS  ***************************************************************			
	**********************************************************************************************/
	
	/*********************************************
	*  Кнопка "Изменть"  / админка		
	*********************************************/
	$(".butEdit").live('click', function() {
		var fullId = $(this).attr("id");
		var elemId = fullId.slice(fullId.indexOf("-")+1);
		
		var ownerFullId = $(this).closest(".tableList").attr("id");
		var ownerId = ownerFullId.slice(ownerFullId.indexOf("-")+1);		
		
		var title = $("#textTitle-" + elemId).val().trim();
		//var desc = $("#textDesc-" + elemId).val().trim();

		
		// определяем, на какой странице находится данная кнопка
		var partPageName = window.location.href.slice(window.location.href.lastIndexOf('/') + 1);
		partPageName = partPageName.slice(0, partPageName.indexOf('.'));
		
		// в зависимости от имени страницы, определяем объект, данные которого будем передавать обработчику
		switch (partPageName) {
			case "cats":
				//alert("Катег");
				var tableName = "cat";	
				var ownerTitle = "cat";
				var loadingFile = "catsAjaxAdmin.php";
				
				var img = $("#textImg-" + elemId).val().trim();
				var handlerFile = "updateCat.php";
				var dataObj = {"id" : elemId, "img": img, "title": title };
				break
			case "subcats":
				//alert("ПодКатег");
				var tableName = "subcat";	
				var ownerTitle = "cat";
				var loadingFile = "subcatsAjaxAdmin.php";
							
				var handlerFile = "updateSubcat.php";
				var dataObj = {"id" : elemId, "title": title };				
				break
			case "products":
				//alert("Прод");
				var tableName = "products";
				var ownerTitle = "subcat";
				var loadingFile = "productsAjaxAdmin.php";
				
				var desc = $("#textDesc-" + elemId).val().trim();
				var yield = $("#textYield-" + elemId).val().trim();
				var price = $("#textPrice-" + elemId).val().trim();
				var handlerFile = "updateProduct.php";
				var dataObj = {"id" : elemId, "title": title, "desc": desc, "yield": yield, "price": price };
				break
			default:
				return;
		}
		
		var loadingData = { "tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId };
		
		// изменяем данные элемента в БД
		$.ajax({
			url: handlerFile,
			type: "POST",
			data: dataObj,
			error: function() {alert('EEError');},
			success: function(data){
									alert( "Запись изменена " + data );
									//$("#tableList-" + ownerId).load("productsAjaxAdmin.php", {"tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId} );
									$("#tableList-" + ownerId).load(loadingFile, loadingData );
								}
		});
	});


	/*********************************************
	*  Кнопка "Удалить"  / админка		
	*********************************************/
	$(".butDel").live('click', function() {
		
		// получаем id элемента
		var fullId = $(this).attr("id");
		var elemId = fullId.slice(fullId.indexOf("-")+1);

		var ownerFullId = $(this).closest(".tableList").attr("id");
		var ownerId = ownerFullId.slice(ownerFullId.indexOf("-")+1);		

		
		// получаем наименование элемента
		var elemTitle = "#textTitle-" + elemId;
		elemTitle = $(elemTitle).val();
		
		// запрос подтверждения
		if (!confirm("Удалить " + elemTitle + "?"))
		{ return; }
		
		
		// определяем, на какой странице находится данная кнопка
		var partPageName = window.location.href.slice(window.location.href.lastIndexOf('/') + 1);
		partPageName = partPageName.slice(0, partPageName.indexOf('.'));
		
		// в зависимости от имени страницы, определяем объект, данные которого будем передавать обработчику
		switch (partPageName) {
			case "cats":
				//alert("Катег");
				var tableName = "cat";	
				var ownerTitle = "cat";
				var loadingFile = "catsAjaxAdmin.php";

				var handlerFile = "deleteCat.php";
				break
			case "subcats":
				//alert("ПодКатег");
				var tableName = "subcat";	
				var ownerTitle = "cat";
				var loadingFile = "subcatsAjaxAdmin.php";
				
				var handlerFile = "deleteSubcat.php";
				break
			case "products":
				//alert("Прод");
				var tableName = "products";
				var ownerTitle = "subcat";
				var loadingFile = "productsAjaxAdmin.php";
				
				var handlerFile = "deleteProduct.php";
				break
			default:
				return;
		}
		
		var loadingData = { "tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId };
		
		$.ajax({
			url: handlerFile,
			type: "POST",
			data: { "id": elemId },
			error: function() {alert('EEError');},
			success: function(data){
									alert( "Запись удалена " + data );
									//$("#tableList-" + ownerId).load("productsAjaxAdmin.php", {"tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId} );
									$("#tableList-" + ownerId).load(loadingFile, loadingData );
								}
		});
/*		
		// удаляем строку элемента со страницы
		// удаление происходит только по классу (не по ID)
		var lineClass = ".line-" + elemId;
		$(lineClass).remove();
*/
	});
	

	/*********************************************
	*  Надпись "Добавить"  / админка		
	*********************************************/	
	$(".addElem").click(function() {
		//alert("Сработала");
		var fullId = $(this).attr("id");
		var ownerId = fullId.slice(fullId.indexOf("-")+1);
	
		// определяем, на какой странице находится данная кнопка
		var partPageName = window.location.href.slice(window.location.href.lastIndexOf('/') + 1);
		partPageName = partPageName.slice(0, partPageName.indexOf('.'));
		// в зависимости от страницы, определяем вид таблицы во всплывающем окне
		switch (partPageName) {
			case "cats":
				//alert("Катег");
				var fheader = '<tr><td class="tPic">Фото</td><td class="tTitle">Наименование</td></tr>';
				var productLine = '<tr class="bitem" > \
													<td class="tPic">  <input type="text" class="textImg"   name="textImg"   id="textImg"   maxlength="80" > </td> \
													<td class="tTitle"><input type="text" class="textTitle" name="textTitle" id="textTitle" maxlength="80" ></td> \
													</tr>';
				var invokeFunc = 'addElem("cat", "0")';
				var elemType = "cat";
				break
			case "subcats":
				//alert("ПодКатег");
				var fheader = '<tr><td>Наименование</td></tr>';
				var productLine = '<tr class="bitem" > \
													<td ><input type="text"  class="textTitle" name="textTitle" id="textTitle" maxlength="80" ></td> \
													</tr>';
				//var ownerId = fullId.slice(fullId.indexOf("-")+1);
				var invokeFunc = 'addElem("subcat", ' + ownerId + ')';
				var elemType = "subcat";
				//alert(invokeFunc);
				break
			case "products":
				//alert("Прод");
				var fheader = '<tr><td class="tTitleProd">Наименование</td><td class="tDescProd">Описание</td><td class="tYield">Выход</td><td>Цена</td></tr>';
				var productLine = '<tr class="bitem" > \
													<td class="tTitle"><textarea name="textTitle" id="textTitle" cols="25" rows="3"> </textarea> </td> \
													<td class="tDescProd"><textarea name="textDesc" id="textDesc" cols="30" rows="3"> </textarea> </td> \
													<td class="tTield"><input type="text" class="textYield" name="textYield" id="textYield" maxlength="80" ></td> \
													<td><input type="text" name="textPrice" id="textPrice" maxlength="80" ></td> \
													</tr>';
				var invokeFunc =  'addElem("products", ' + ownerId + ')';
				var elemType = "products";
				break

			default:
				return;
		}
		
	
		$("body").append(" <div id='blindLayer' class='blindLayer'> </div> \
					<div id='fcontainer' class='fcontainer'> \
						<div id='bsubject'>Добавление элемента<a id='fclose' href='#' onclick='closeWindow(\"fcontainer\")'\>  <img src='../img/close.png' id='fIMGclose' /> </a></div> \
						<table id='fcaption'>  </table> \
						<div id='foverflw'><table class='ftable' id='ftable'> <tr> <td> </td> </tr> </table></div> \
						<div class='bfooter' id='bfooter-" + ownerId + "' elemType='" + elemType + "'> <button class='fbutton' id='fbutton'  >Добавить</button></div> \
					</div> \
					");
					
					//<div id='bfooter'> <button class='fbutton' id='fbutton' onclick='" + invokeFunc + "' >Добавить</button></div> \
/*
		var productLine = '<tr class="bitem" > \
										<td></td> \
										<td><input type="text" name="textTitle" id="textTitle" maxlength="80" ></td> \
										<td><textarea name="textDesc" id="textDesc" cols="30" rows="3"> </textarea> </td> \
									</tr>';	
*/
	
		// выводим необходимый заголовок таблицы
		$("#fcaption").html("");
		$("#fcaption").append(fheader);
		
		// выводим в таблицу необходимые поля для ввода
		$("#ftable").html("");
		$("#ftable").append(productLine);
		
		// позиционируем окно на экране
		$("#fcontainer").css({"top" : "50px"});
		$("#fcontainer").css({"left" : Math.max(0, (($(window).width() - $("#fcontainer").outerWidth()) / 2) + $(window).scrollLeft()) + "px"});	
		
		// показываем заглушку и всплывающее окно
		$("#blindLayer").show();
		$("#fcontainer").show();		
	});


	
	/*********************************************
	*  Кнопка "Добавить" всплывающего окна / админка		
	*********************************************/		
	$("#fbutton").live('click', function() {
		//alert("click");
		var fullId = $(".bfooter").attr("id");
		var ownerId = fullId.slice(fullId.indexOf("-")+1);

		var elemType = $(".bfooter").attr("elemType");
		var title = $("#textTitle").val().trim();
		//var desc = $("#textDesc").val().trim();

		
		switch (elemType) {
			case "cat":
				//alert("Катег");
				var tableName ="cat";
				var ownerTitle = "";
				var loadingFile = "catsAjaxAdmin.php";
				
				var img = $("#textImg").val().trim();
				alert (img);
				var handlerFile = "addCat.php";
				var dataObj = { "img": img, "title": title };     //, "desc": desc };
				break
			case "subcat":
				//alert("ПодКатег");
				var tableName = "subcat";
				var ownerTitle = "cat";
				var loadingFile = "subcatsAjaxAdmin.php";
				
				var handlerFile = "addSubcat.php";
				var dataObj = { "title": title, "catId": ownerId };				
				break
			case "products":
				//alert ("продукт");
				var tableName = "products";
				var ownerTitle = "subcat";
				var loadingFile = "productsAjaxAdmin.php";
				
				var desc = $("#textDesc").val().trim();
				var yield = $("#textYield").val().trim();
				var price = $("#textPrice").val().trim();
				var handlerFile = "addProduct.php";
				var dataObj = { "title": title, "desc": desc, "yield": yield, "price": price, "subcatId": ownerId };
				break
			case "index.php":
				//alert("Заказы");
				break
			default:
				return;
		}		

		var loadingData = { "tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId };
				
		// добавляем элемент в БД
		$.ajax({
			url: handlerFile,  
			type: "POST",
			data: dataObj,
			error: function() {alert('EEError');},
			success: function(data){
									alert( " " + data );
									//$("#tableList-" + ownerId).load("productsAjaxAdmin.php", {"tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId} );
									$("#tableList-" + ownerId).load(loadingFile, loadingData );
								}
		});
		
		// убираем заглушку и окно
		$("#blindLayer").hide();
		$("#fcontainer").remove();
	});

	
	/*********************************************
	*  Кнопка "Сортировать"  / админка		
	*********************************************/	
	$(".sortElem").click(function() {
		//alert("Сработала");
		
		// определяем, на какой странице находится данная кнопка
		var partPageName = window.location.href.slice(window.location.href.lastIndexOf('/') + 1);
		partPageName = partPageName.slice(0, partPageName.indexOf('.'));

		var fullId = $(this).attr("id");
		var ownerId = fullId.slice(fullId.indexOf("-")+1);		

		// в зависимости от имени страницы, определяем объект, данные которого будем передавать обработчику
		switch (partPageName) {
			case "cats":
				//alert("Катег");
				var tableName ="cat";
				var ownerTitle = "";
				break
			case "subcats":
				//alert("ПодКатег");
				var tableName ="subcat";
				var ownerTitle = "cat";
				break
			case "products":
				alert("Прод");
				var tableName ="products";
				var ownerTitle = "subcat";
				break
			default:
				return;
		}
		
		// перенаправление на страницу сортировки
		location.replace("sortPage.php?tableName=" + tableName + "&ownerTitle=" + ownerTitle + "&ownerId=" + ownerId);
	});	


	/*********************************************
	*  Кнопка "Выполнить"  / админка		
	*********************************************/
	$(".butComleteZakaz").click(function() {
		//alert("vfdvdd");

		// получаем id элемента
		var fullId = $(this).attr("id");
		var zakazId = fullId.slice(fullId.indexOf("-")+1);
		
		var divZakazId = "#zakaz-" + zakazId;
		//alert (divZakazId);  
		var divZakaz = $(divZakazId);
		
		// запрос подтверждения
		if (!confirm("Выполнить заказ?" + zakazId))
		{ return; }		
		
		$.ajax({
			url: "completeOrCancelZakaz.php",  
			type: "POST",
			data: { "zakazId": zakazId, "param": "complete"},
			error: function() {alert('EEError');},
			  success: function(data){
									alert( " " + data );
									//divZakaz.remove();
									location.reload(true);
									}
		});
	});

	
	/*********************************************
	*  Кнопка "Отменить"  / админка		
	*********************************************/
	$(".butCancelZakaz").click(function() {
		//alert("cancel");

		// получаем id элемента
		var fullId = $(this).attr("id");
		var zakazId = fullId.slice(fullId.indexOf("-")+1);
		var divZakazId = "#zakaz-" + zakazId;
		//alert (divZakazId);  
		var divZakaz = $(divZakazId);
		
		
		// запрос подтверждения
		if (!confirm("Удалить заказ?"))
		{ return; }		
		
		$.ajax({
			url: "completeOrCancelZakaz.php",  
			type: "POST",
			data: { "zakazId": zakazId, "param": "cancel"},
			error: function() {alert('EEError');},
			  success: function(data){
									alert( " " + data );
									//divZakaz.remove();
									location.reload(true);
									}
		});
	});

	
	/*********************************************
	*  Переключатель способа удаления заказов / архив
	*********************************************/	
	$("#selArchDel").change(function() {
		switch ($(this).val()) {
			case "nothing":
				//alert("Ничего");
				$("#calendars").fadeOut();
				$("#butDelArch").fadeOut();
				break
			case "allZakaz":
				//alert("allZakaz");
				$("#calendars").fadeOut();
				$("#butDelArch").fadeIn();
				$("#dateFrom").attr("disabled", true);
				$("#dateTo").attr("disabled", true);

				break
			case "byDate":
				//alert("byDate");
				$("#calendars").fadeIn();
				$("#butDelArch").fadeIn();
				break
			default:
				return;
		}
	});


	/*********************************************
	*  Удаление заказов из архива / админка 
	*********************************************/
	$("#butDelArch").click(function(e) {
		e.preventDefault();
		
		// запрос подтверждения
		if (!confirm("Вы действительно хотите удалить заказы?"))
		{ return; }
	
		switch ($("#selArchDel").val()) {
			case "allZakaz":
				//alert("allZakaz");
				var param = "deleteArchiveAll";
				var dataObj = { "param": param };
				
				break;
			case "byDate":
				//alert("byDate");
				var dateFrom = $("#dateFrom").val().trim();
				var dateTo = $("#dateTo").val().trim();
				if (dateFrom == "" || dateTo == "")
				{ 
					alert("Выберите диапазон дат для удаления заказов!") 
					return;
				};
				
				if (dateFrom > dateTo)
				{ 
					alert("Укажите правильный диапазон дат для удаления заказов!") 
					return;
				};			
				var dateFrom = dateFrom + " 00:00:00";
				var dateTo = dateTo + " 23:59:59";
				var param = "deleteArchiveByDate";
				var dataObj = { "dateFrom": dateFrom, "dateTo": dateTo, "param": param };
				
				break;
			default:
				return;
		}

		// удаляем заказ из БД
		$.ajax({
			url: "completeOrCancelZakaz.php",  
			type: "POST",
			data: dataObj,
			error: function() {alert('EEError');},
			  success: function(data){
									alert( " " + data );
									//divZakaz.remove();
									location.reload(true);
									}
		});

	});
	

	/*********************************************
	*  Кнопки главного меню	
	*********************************************/
	$("#leftNav .menuItem").click(function() {
	//$("#robofood").click(function() {
	
		// снимаем выделение со всех пунктов
		$("#leftNav li").css({"background": "#F0F0F0", "color": "#000"});
		
		// получаем активный пункт меню и выделяем его
		$(this).css({"background": "#696969", "color": "#FFF"});
		
		
		var fullId = $(this).attr("id");
		var elemId = fullId.slice(fullId.indexOf("-")+1);
//alert(elemId);
		
		//$("#mainCol").fadeOut();
		$("#mainCol").load("ProductsAjax.php .tableList", {"subcatId": elemId}, function() { /* $("#mainCol").fadeIn(); */ } );
		/*
		$("#robofood").hide();
		$("#robofood").fadeIn();
		$("#mainCol").fadeIn();
		*/
		return;
		
		$.ajax({
			url: "ProductsAjax.php",  
			type: "POST",
			data: { "catId": 1, "subcatId": elemId },
			error: function() {alert('EEError');},
			  success: function(data){
									alert( "Данные " + data );
									}
		});
		
		

		
		
		setTimeout(function () {
			$(this).css({"background": "#F0F0F0", "color": "#000"});
		}, 1000); // время в мс
		
	});

		
	$("#111").click(function() {		
		alert("egfegggfgf");
		var fullId = $(this).attr("id");
		var ownerId = fullId.slice(fullId.indexOf("-")+1);
		
		$("#mainCol").load("productsAjaxAdmin.php", {"tableName": "products", "ownerTitle": "subcat", "ownerId": 22} );
		
		return;
	});
/*	
	$(".incart").live('click', function() {	
		var fullId = $(".incart").attr("id");
		var elemId = fullId.slice(fullId.indexOf("-")+1);		

		//подсветка строки таблица после нажатия 
		$("#trProduct-" + elemId + " td").css("background", "blue");
		setTimeout(function () {
			$("#trProduct-" + elemId + " td").css("background", "white");
			
		}, 100); // время в мс	
	});
});
*/
	
});  //  конец (document).ready


/***********************************************************************************************
***********************  FUNCTIONS  ***************************************************************			
**********************************************************************************************/
	
/*********************************************
*  Закрытие окна	
*********************************************/
function closeWindow(win) {
	$("#" + win).hide();
	$("#blindLayer").hide();	
}



/*********************************************
*  Добавление элемента в БД
*********************************************/
function addElem(elemType, ownerId) {

		alert(elemType);
		alert(ownerId);
		var title = $("#textTitle").val().trim();
		//var desc = $("#textDesc").val().trim();
		//alert (title);
		//alert (desc);
		
		

		
		switch (elemType) {
			case "cat":
				//alert("Катег");
				var tableName ="cat";
				var ownerTitle = "";
				var loadingFile = "catsAjaxAdmin.php";
				
				var img = $("#textImg").val().trim();
				alert (img);
				var handlerFile = "addCat.php";
				var dataObj = { "img": img, "title": title };     //, "desc": desc };
				break
			case "subcat":
				alert("ПодКатег");
				var tableName = "subcat";
				var ownerTitle = "cat";
				var loadingFile = "subcatsAjaxAdmin.php";
				
				var handlerFile = "addSubcat.php";
				var dataObj = { "title": title, "catId": ownerId };				
				break
			case "products":
				alert ("продукт");
				var tableName = "products";
				var ownerTitle = "subcat";
				var loadingFile = "productsAjaxAdmin.php";
				
				var desc = $("#textDesc").val().trim();
				var yield = $("#textYield").val().trim();
				var price = $("#textPrice").val().trim();
				var handlerFile = "addProduct.php";
				var dataObj = { "title": title, "desc": desc, "yield": yield, "price": price, "subcatId": ownerId };
				break
			case "index.php":
				//alert("Заказы");
				break
			default:
				return;
		}		

		var loadingData = { "tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId };
				
		// добавляем элемент в БД
		$.ajax({
			url: handlerFile,  
			type: "POST",
			data: dataObj,
			error: function() {alert('EEError');},
			success: function(data){
									alert( " " + data );
									//$("#tableList-" + ownerId).load("productsAjaxAdmin.php", {"tableName": tableName, "ownerTitle": ownerTitle, "ownerId": ownerId} );
									$("#tableList-" + ownerId).load(loadingFile, loadingData );
								}
		});
		
		// убираем заглушку и окно
		$("#blindLayer").hide();
		$("#fcontainer").hide();

		//location.replace("sortPage.php?tableName=" + tableName + "&ownerTitle=" + ownerTitle + "&ownerId=" + ownerId);
}



/*********************************************
*  Нахождение id активной вкладки аккордеона
*********************************************/
function getActiveAccord(fullElemId) {
	alert($("#" + elemId).text());

	var elemId = fullElemId.slice(fullElemId.indexOf("-")+1);
	return elemId;
	
	var parent = $("#" + elemId)
	
	var activeAccordNum = $("#accordion" ).accordion( "option", "active" );
	var sele = ".accordTitle:eq(" + activeAccordNum + ")";
	var activeAccord = $(sele);
	var activeId = activeAccord.attr("id");
	return activeId;

}




