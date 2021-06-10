<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015</p>
                <p class="pull-right">Курс PHP Start</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->
<?php

$end_time = microtime();

$end_array = explode(" ",$end_time);

$end_time = $end_array[1] + $end_array[0];

// вычитаем из конечного времени начальное

$time = $end_time - $start_time;

// выводим в выходной поток (броузер) время генерации страницы

printf("Страница сгенерирована за %f секунд",$time);

?>

<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
                });
            return false;
        });
    });

    function conversionPrice(id){



        var newCnt = $('#productCnt_' + id).val();
        var itemPrice = $('#productPrice_' + id).attr('value');

        var productRealPrice = document.getElementById('productRealPrice_' + id);
        //var productRealPrice = $('#productRealPrice_' + id).attr('value');
        var newProductRealPrice = newCnt * itemPrice;


        //var sumPrice = document.getElementById('valTotalPrice');
        var sumPrice = $('#valTotalPrice').attr('value');

        //var sumPrice -= productRealPrice;


        //var y = newProductRealPrice - productRealPrice;


        //var newTotalPrice = newTotalPrice + newProductRealPrice ;

        //productRealPrice.innerHTML = newProductRealPrice;


        $('#productRealPrice_' + id).html(newProductRealPrice);
        var newTotalPrice = sumPrice - productRealPrice;


        //$('#valTotalPrice').html(newTotalPrice);

        valTotalPrice.innerHTML = sumPrice - productRealPrice;

//        var sumKwa =0;
//
//        $('#productRealPrice_' + id).each(function(){
//            var num = $(this).html();
//            sumKwa += parseInt(num);
//        });
        /*
                var narast = 0;

                tbody = $("#cartTable").get(0).tBodies[0];
                noofRows = tbody.rows.length;

                for (j = 0; j < noofRows; ++j) {

                    //value = tbody.rows[j].cells[5].innerHTML;
                    //var value = $('#productRealPrice_' + id).html();
                    value = $('#productRealPrice_' + id).attr('value');

                    //narast += value;

                    narast += parseInt(value, 10);

                }

                $('#totalPrice).html(narast);*/
/*
        var arr = [];

        tbody = $("#cartTable").get(0).tBodies[0];
        noofRows = tbody.rows.length;

        arr.push(Math.round(Math.random() * 10) + 1);

        for (var i = 0; i < noofRows; i++) {

            sum += arr[i];
            arr.push(i);
        }
*/
/*
        var cols = document.getElementById('#productRealPrice_' + id); // Все элементы по id

        noofRows = cols.length;
        var sum = 0;

        for (var i = 0; i < noofRows; i++) {
            var value = $('#productRealPrice_' + id).attr('value');
            sum += value;
            /*sum += arr[i];
            arr.push(i);
        }*/



/*
        let elems = document.querySelectorAll('.kwa');  // Все элементы по class-у

        for (let elem of elems) {
            elem.innerHTML = '!!!';
        }
*/


    }
/*
    $(document).ready(function () {

        var sumKwa =0;

        $('td.kwa').each(function(){
            var num = $(this).html();
            sumKwa += parseInt(num);
        });

        $('#totalPrice).html(sumKwa);
    });
*/

</script>
</body>
</html>
