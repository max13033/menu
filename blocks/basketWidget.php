
	
	<!-- подключаем виджет корзины  -->
	<div class="bsk">

		<span id="bskWidjet" onclick="cart.showWinow('bcontainer', 1)"> Мой заказ </span>
		<div id="bskList"> </div>  
		<div id="bskTotal">  </div> 
		<div id="bskSum"> </div>
		<div class="clear"></div>
		<button id="bskButClear"   onclick="cart.clearBasket(true)"> Очистить</button> 
		<button id="bskButConfirm" onclick="cart.showWinow('bcontainer', 1)"> Заказать </button>

	</div>	

	
