
	
	<!-- подключаем виджет корзины  -->
	<div class="bsk">


	<!-- вывод номера стола -->				

		<div style="float: right; text-decoration: underline">Стол № &nbsp;

			<script type="text/javascript">	
				var robotNum = localStorage.getItem("robotNumber");
				document.write(robotNum);
			</script>
		</div>

		<span id="bskWidjet" onclick="cart.showWinow('bcontainer', 1)"> Мой заказ </span>
		<div id="bskList"> </div>  
		<div id="bskTotal">  </div> 
		<div id="bskSum"> </div>
		<div class="clear"></div>
		<button id="bskButClear"   onclick="cart.clearBasket(true)"> Очистить</button> 
		<button id="bskButConfirm" onclick="cart.showWinow('bcontainer', 1)"> Заказать </button>

	</div>	

	
