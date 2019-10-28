$(document).ready(function() {

    // Отобразим содержимое хранилища
    function ref_cart() {
        var output = "";
        $(".cart li").remove();
        for (var i = 0; i < localStorage.length; i++) {
            output += "<li>ID: "+localStorage.key(i)+" | Количество: "+localStorage.getItem(localStorage.key(i))+" <button data-pr='"+localStorage.key(i)+"' class='remove'> X </button></li>";
        }
        $(".cart").append(output);
    }

    // проверка совместимости
    function web_storage() {
      try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
      }
    }

    ref_cart();

// Добавить в корзину
$(".incart").on('click', function() {
    var reg = /[0-9]/,
        id = $(this).attr("data-pr"),
        kolvo = $("#"+id).val();

    if (reg.test(kolvo)) {
        if(web_storage()) {  
            $("#"+id).val('');
            localStorage.setItem(id, kolvo);
            ref_cart();
        } else{
          alert("Ваш браузер не может работать с локальным хранилищем!");
        }
    } else {
        $("#"+id).val('');
        alert("Использовать только числа!");
    } 
});

    // Удалить из корзины
    $(document.body).on('click','.remove',function() {
        localStorage.removeItem($(this).attr("data-pr"));
        $(this).parent('li').remove();
    });

});