/***************************************
 * JQuery based script					
 * Basket on client side 				
 * Created WebInside WebStudio (c) 2014	
 * Use only for linked www.webinside.ru 
 **************************************/
function WICard(obj)
	{
	this.widjetX = 0;
	this.widjetY = 0;	
	this.widjetObj;
	this.widjetPos;
	this.cardID = "";
	this.DATA = {};
	this.IDS = [];
	this.objNAME = obj;
	this.CONFIG = {};
	this.IMG = "iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABpFBMVEUAAABEREBEREBEREBEREASEhEJCQgGBgYBAQEAAAAGBgUHBwYAAAAAAAADAwNEREBEREAJCQkICAcGBgYFBQUJCQgnJyVEREAICAgBAQEAAAAICAcAAAAAAAAAAAAJCQgAAAAGBgYBAQEQEA8NDQwHBwcBAQEMDAsSEhEJCQkBAQEBAQEBAQFAQDxEREBEREADAwIAAAABAQESEhEkJCIAAAAICAgAAAAQEA9EREAAAAATExIAAAAKCgkNDQwAAAAAAAABAQETExIHBwcDAwMDAwMTExIAAAAAAAABAQEAAAAAAAAAAAAAAAAAAAAAAAADAwIAAAAGBgUBAQEWFhUAAAAAAAAHBwYBAQEVFRMDAwMHBwcUFBMWFhUBAQETExIAAAAAAAADAwMMDAsAAAAAAAASEhEAAAAUFBMAAAAJCQkrKygDAwMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAwMAAAAJCQgAAAAiIiABAQEAAAAAAAAAAAAAAAAAAAAAAAAAAAABAQFEREAFBQUBAQEAAAAGBgYICAgHBwcBAQEJW8x2AAAAhXRSTlMAAQcIAjJ0kZqZnp+LaygNDxKw/v6wIwPY1A+upf4nenGWvXCg/Pubc8eSmLkcHxpW+vlhBr6hl3EDUl9pop5Q+fhe+1FPXVT8mlxfXWD9+1dbnPRRRved9ldI+Fhd+mBaVlSYWJN1V2dqwwVTA8ORvJXAknRzKii2rCjc3BUTqagrepgUbRZwswAAAAlwSFlzAAAASAAAAEgARslrPgAAAb1JREFUOMuNk2dTwkAQhpdiCZagotiwd5RYQeyKJdii2FDsvffeG0TJnza3lzg4kBnv0zt5NpvdZ3IA/zs6vUGv00wAxrj4hESGnERTkomk5JRU1swaFZ6WnhEMieSEgl9qsmRmWVWe/R2W8KkUjkw5uUr/vNhcEvPpLHEZGly0FYA8pb4wqMFFscioBzAU06lKSsvKKa+orKqmqYY1yB3smGvrHFx9A0mNTQ6uuQU7Oc1yB50Lc6uDc0ObXNHYTlIHfqmTJaZcmLvkpwDdPb19hAODkzjRlAuzpx93GhhEPsTjpF6gBTg1PyxnN4d8hHKJoQUhuhU/qvKxcWVTWmAPKlsLE5RP8qoJLND5vhQ/U9PIYWZWNcWgyTnFpH+ecoCFgNKTQZM+atK/qHI3txSg73gjTC6vIF9dw0nXhSiTG8g3eaEeJ92KMrlN+I4gSp5dkvaiTO4fAKwJ6PQQ4Og4wuQJ3fp070zZXzhJOafpAgsuQ2Gtf+4KC64tWtx2gybZW61/8g7QpPn+ITZ/fAI0yVqfX2wx+r8+gxVNkl3f3j+cnU4v3j4vSa73NwDrJ5qkt+f3Jv5N6u3Vvt0/UGcpYbC85ecAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTMtMDUtMThUMDY6MDM6MzEtMDU6MDALk1CfAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTA1LTE4VDA2OjAzOjMxLTA1OjAwes7oIwAAAABJRU5ErkJggg==";
	

/***********************************************************************************************
 * инициализация					
 **********************************************************************************************/	
	this.init = function(widjetID, config)
		{
		
	
		this.CONFIG = config || {};
		try {
			this.DATA = JSON.parse(localStorage.getItem(widjetID)); // code to try
			console.log("TRY - OK");
			if ($.isEmptyObject(this.DATA))
				{
				this.DATA = {};
				}	
					
			} 
			catch (e) 
			{
			this.DATA = {};
			//onsole.log("TRY - BED");
			}	
		try {
			this.IDS = JSON.parse(localStorage.getItem(widjetID + "_ids"));
			console.log(this.IDS[0]);
			if ($.isEmptyObject(this.IDS))
				{
				this.IDS = [];
				}	
			} 
			catch (e) 
			{			
			this.IDS = [];
			}	
		//console.log(this.DATA);
			
		this.cardID = widjetID;	
		$("body").append("<div class='bird' id='"+widjetID +"_bird'></div>");	
		this.widjetObj = $("#" + widjetID);
		this.widjetPos = this.widjetObj.position();
		//alert(this.widjetPos.left + " " + this.widjetPos.top);
		
		if ($.isEmptyObject(this.DATA))
			{
			//this.widjetObj.html("Корзина пуста");
			//$("#bskButConfirm").hide();
			}
			else
			{
			//this.reCalc();	
			this.renderBasketTable();
			}
		
		}
		
/***********************************************************************************************
 * добавление элемента в корзину
 * example: onclick="cart.addToCart(this, '2', 'Name of comic 2', '25500')						
 **********************************************************************************************/
	this.addToCart = function(curObj, id, name, yield, price)
	{
		//id = ( $.isNumeric(id) ) ? "ID" + id.toString() : id;
		 
		var goodieLine = {"id" : id, "name" : name, "yield" : yield, "price": price, "num" : 1};
		
		
		
		if ($.isEmptyObject(this.DATA))
			{
			this.DATA[id] = goodieLine;	
			this.IDS.push(id);
			}
		
		else
		for(var idkey in this.DATA) 
			{
			
			// если таких значений еще не было
			if($.inArray(id, this.IDS) === -1)
				{
				this.DATA[id] = goodieLine;
				this.IDS.push(id)
				
				}
			else	
			if (idkey == id)
				{
				
				this.DATA[idkey].num += 1;	
				
				}
			}
		
		localStorage.setItem(this.cardID, JSON.stringify(this.DATA));
		localStorage.setItem(this.cardID + "_ids", JSON.stringify(this.IDS));
		
		// вызываем ф-цию пересчета
		//this.reCalc();
		
		this.renderBasketTable();
		

		
		/*
		var bird = $("#" + this.cardID + "_bird"); 
		var pos = $(curObj).position();	
		bird.offset({ top: pos.top, left: pos.left});
		bird.html(price);
		
		bird.show();
		
		bird.animate(
		{
			
			'left': this.widjetPos.left, 
			'top': this.widjetPos.top 
			
			'left': 1050, 
			'top': 70
			
			}
			,
			{
			'duration': 500, 
			complete:  function() 
			{ 
				bird.offset({ top: -300, left: -300});
			}
		});
		*/		
		if (this.CONFIG.showAfterAdd)
		{
			cart.showWinow('bcontainer', 1);
		}
	}
	
	
	
/***********************************************************************************************
 * пересчет кол-ва товаров и вывод его в виджете		
 **********************************************************************************************/	
	this.reCalc = function()
		{
		var num = 0;
		var sum = 0;
		for(var idkey in this.DATA) 
			{
			num += parseInt(this.DATA[idkey].num);
			sum += parseFloat(parseInt(this.DATA[idkey].num) * parseFloat(this.DATA[idkey].price));
		
			}	
		this.widjetObj.html("Товаров " + num + " на сумму " + sum);
		}



/***********************************************************************************************
 * Очистка корзины				
 **********************************************************************************************/
	this.clearBasket = function(needAsk)
	{
		if ($.isEmptyObject(this.DATA))
		{ return; }
/*		
		if (needAsk) 
		{	if (!confirm("Очистить список заказа?")) 
				{ return; }
		}
*/		
		this.DATA = {};	
		this.IDS = [];
		//this.widjetObj.html("Корзина пуста");	
		localStorage.setItem(this.cardID, "{}");
		localStorage.setItem(this.cardID + "_ids", "[]");
		$("#btable").html('');
		
		// обнуляем общую сумму
		$("#bsum").html("0 руб.");
		
		// очищаем список и обнуляем общую сумму в виджете
		$("#bskList").hide()      // html("");
		$("#bskTotal").hide() 
		$("#bskSum").hide()        //html("0 руб.");
		
		$("#bskButConfirm").hide();
		$("#bskButClear").hide();
	}	


/***********************************************************************************************
 *  прорисовка содержимого корзины			
 **********************************************************************************************/
	this.renderBasketTable = function()
	{	


	//alert("render");
		
		// если на странице еще нет корзины - формируем ее шаблон 
		if ($('#bcontainer').length == 0)
		{		
			$("body").append(" \
				<div id='blindLayer' class='blindLayer'></div> \
				<div id='bcontainer' class='bcontainer'> \
				<div id='bsubject'>Мой заказ<a id='bclose' href='#' onclick='" + this.objNAME + ".closeWindow(\"bcontainer\", 1);'><img src='data:image/jpeg;base64,"+ this.IMG + "' /></a></div> \
				<table id='bcaption'><tr><td>№</td><td>Название</td><td>Цена</td><td>Кол-во</td><td>Итого</td><td></td></tr></table> \
				<div id='overflw'><table class='btable' id='btable'></table></div> \
				<div id='bfooter'> <button class='bbutton' onclick=\"cart.confirmOrder()\">Подтвердить заказ</button><span id='bsum'>...</span></div> \
				</div> \
			");
			
		}
		
		// если корзина уже есть - очищаем ее таблицу
		else 
		{
			$("#btable").html("");

			//$("#bskList").html("");
		}
		
		
		if ($('#confirmContainer').length == 0)
		{
				$("body").append(" \
				<div id='confirmContainer' class='confirmContainer'> \
					<div id='confirmDiv'> \
					<img src='img/hand_logo.gif' /> \
					<div> \
					<h1> Ваш заказ принят </h1>\
				</div> \
				");
		}
		
		
		
		// очищаем список в корзине-виджете
		$("#bskList").html("");
		
		this.center( $("#bcontainer") )	
		var sum = 0;
		
		// проходим по всем записям в локальном хранилище и выводим каждую из них
		//for(var idkey in this.DATA)
		for(var i = 0; i < this.IDS.length; i++)
		{
			var idkey = this.IDS[i];
			with (this.DATA[idkey])
			{
				sum += parseFloat(price * num);		
				//var funcDelete = this.objNAME + ".delItem('" + id + ', ' + name + )
				var productLine = '<tr class="bitem" id="wigoodline-' + id + '"> \
										<td>'+ (i + 1) +'</td> \
										<td>'+ name +'</a></td> \
										<td class="wigoodprice">' + price + ' руб.</td> \
										<td>'+ num +'</td> \
										<td>'+ parseFloat(price * num) +'</td> \
										<td><a href="#" onclick="' + this.objNAME + '.delItem(\'' + id + '\')"> <button class="bbutDel">Удалить</button></td>\
									</tr>';	
									
				//var schetLine = '<li>' + name + '<span class="schetPrice">' + parseFloat(price * num) +  '</span> </li>';
				var schetLine = '<div class="bskTitle">' + (i + 1) + '. ' +  name + '</div>  <div class="bskPrice">' + parseFloat(price * num) +  '</div> <hr>';
			}
			$("#btable").append(productLine);
			
			$("#bskList").append(schetLine);
		}
		
		// вывод общей суммы
		$("#bsum").html(sum + "  руб.");
		
		$("#bskTotal").html("Итого:");
		$("#bskSum").html(sum + "  руб.");
		
		$("#bskList").show()
		$("#bskTotal").show();
		$("#bskSum").show();	
		$("#bskButConfirm").show();
		$("#bskButClear").show();
	}
	
	
/***********************************************************************************************
 *  задание места положения окна корзины	
 **********************************************************************************************/	
	this.center = function(obj)
	{
		obj.css({"top" : "50px"});
    	obj.css({"left" : Math.max(0, (($(window).width() - obj.outerWidth()) / 2) + $(window).scrollLeft()) + "px"});	
    	return obj;
	}	


/***********************************************************************************************
 *  показать окно с содержимым корзины		
 **********************************************************************************************/
		this.showWinow = function(win, blind)
		{
		//alert("Показать окно");
		
		if ($.isEmptyObject(this.DATA))
		{
			//this.widjetObj.html("Корзина пуста");
			//alert("Пустая0");
			return;
		}
		
		
		// показываем окно корзины
		$("#" + win).show();
		
		// затемняем основной фон
		if (blind)
			{
			$("#blindLayer").show();
			}
		
		}
		

/***********************************************************************************************
 *  закрыть окно с содержимым корзины		
 **********************************************************************************************/
	this.closeWindow = function(win, blind)
	{
		$("#" + win).hide();
		if (blind)
		$("#blindLayer").hide();	
	}
		
		
/***********************************************************************************************
 *  удаление элемента из корзины		
 **********************************************************************************************/		
	this.delItem = function(id)
	{
		//if (confirm("Удалить " + name + "?")) 
		//{
			$("#btable").html("");	
			delete this.DATA[id];
			this.IDS.splice( $.inArray(id, this.IDS), 1 );
			//this.reCalc();
			this.renderBasketTable();
			localStorage.setItem(this.cardID, JSON.stringify(this.DATA));
			localStorage.setItem(this.cardID + "_ids", JSON.stringify(this.IDS));
		
			// если в корзине больше не осталось элементов - выводим надпись в виджете
			if ($.isEmptyObject(this.DATA))
			{
				//this.widjetObj.html("Корзина пуста");
				
			}
		//} 
	}




	this.sendOrder = function(domElm)	
	{
		if (this.CONFIG.valudate)	
			{
			var valid = this.CONFIG.valudate.validationEngine('validate');
			if (!valid) return false;
			}
			
		var bodyHTML = "";
		var arr = domElm.split(",");
		
		for (var f=0; f < arr.length; f++) {
		
			bodyHTML +=  this.getForm(arr[f]) + "<br><br>";	
			
			};
		
		//return bodyHTML;
		$.post( "sendmail.php?subj=ZAKAZ BASKET", { "order": bodyHTML }).done(function( data ) {
		cart.closeWindow("bcontainer", 1)	
		cart.closeWindow("order", 0);
		if (cart.CONFIG.clearAfterSend)
			{
			cart.clearBasket();
			} 
		alert("Спасибо за покупку!\nМы свяжемся с Вами в ближайшее время");	
		});
		
	}
	
	
	
	this.getForm = function (formId)
		{
		var formObj = document.getElementById(formId);
		var copyForm = formObj.cloneNode(true);
		
		INPUTS=[].slice.call( copyForm.querySelectorAll("input,select,textarea") );
	
		INPUTS.forEach(function(elm)
			{
			if (elm.type == 'checkbox')
					{	
					var spanReplace = document.createElement("span");
  					spanReplace.innerHTML = (elm.checked) ? elm.value : "";	
					elm.parentNode.replaceChild(spanReplace, elm);	
					}
			else if ((elm.type == 'text') || (elm.type == 'hidden'))
					{	
					var subjP = document.createElement('b');
  					subjP.innerHTML = elm.placeholder;	
					elm.parentNode.insertBefore(subjP, elm);
					var spanReplace = document.createElement("div");
					spanReplace.innerHTML = elm.value;	
					elm.parentNode.replaceChild(spanReplace, elm);	
					}
			});
	
	
	return copyForm.innerHTML;
		}
		

/***********************************************************************************************
 *  Подтверждение заказа	
 **********************************************************************************************/			
	this.confirmOrder = function()
	{
		var idArr = [];
		var orderArr = [];
		
		// массив всех объектов заказа
		
		
		// проходим по всем записям в локальном хранилище и выводим каждую из них
		for(var idkey in this.DATA) 
		{
			orderArr.push(this.DATA[idkey]);
			/*
			with (this.DATA[idkey])
			{
				idArr.push(id);
				orderArr.push(num);
			}
			*/
		}
		
		for(var idkey in orderArr) 
		{
			//alert(orderArr[idkey].name);
		}
		//return;
		
		var robotNum = localStorage.getItem("robotNumber");
		//alert("робот" + robotNum);
		$.ajax({
			url: "ConfirmOrder.php",
			type: "POST",
			//data: {"id": idArr, "order": orderArr},
			data: { "orderArr": orderArr, "robotNum": robotNum },
			error: function() {alert('EEError');},
			success: function(data){
								//alert( "Прибыли данные: " + data );
								}
		});
		
		cart.closeWindow("bcontainer", 0);

		this.center( $("#confirmContainer") );
		$("#confirmContainer").show();
		
		
		setTimeout(function () {
			if (cart.CONFIG.clearAfterSend)
			{
				cart.clearBasket(false);
				location.replace("index.php");
				cart.closeWindow("confirmContainer", 1);
				
				//$(".confirmContainer").show();
			} 
		}, 3000); // время в мс
		
		return;
		
		
		$("#bcontainer").html("\
				<div id='bfinal'><img src='img/hand_logo.gif' /> \
				<h1> Ваш заказ принят </h1></div> \
			");
			this.center( $("#bcontainer") );	
		//onclick='" + this.objNAME + ".closeWindow(\"bcontainer\", 1);'
		
		setTimeout(function () {
			cart.closeWindow("bcontainer", 1);
		
			if (cart.CONFIG.clearAfterSend)
			{
				cart.clearBasket(false);
			} 
		}, 5000); // время в мс
		
		return;
		cart.closeWindow("bcontainer", 1);
		
		if (cart.CONFIG.clearAfterSend)
		{
			cart.clearBasket(false);
		} 
		alert("Ваш заказ принят");
		
		
	}
	
	}
	
