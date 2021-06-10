<?php include ROOT . '/views/admin/header_admin.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/order/">Управление заказами</a></li>
                </ol>
            </div>
            <center><h4>Информация о заказе №<?=$id ?></h4></center><br><br>

           <table class="table-admin-small table-bordered table-striped table">
               <tr>
                   <th>Номер заказа</th>
                   <td><?=$order['id']?></td>
               </tr>
               <tr><th>Имя клиента</th>
                   <td><?=$order['user_name'];
                       if ($order['user_id']): echo ', ID='.$order['user_id']; endif;?></td>
               </tr>
               <tr><th>Телефон клиента</th>
                   <td><?=$order['user_phone']?></td>
               </tr>
               <tr><th>Комментарий клиента</th>
                   <td><?=$order['user_comment']?></td>
               </tr>
               <tr>
                   <th>Статус заказа</th>
                   <td><? echo Instruments::getStatusText($order['status']); ?>
                   </td>
               </tr>
               <tr>
                   <th>Дата заказа</th>
                   <td><?=$order['date']?></td>
               </tr>
           </table>

            <center><h4>Товары в заказе №<?=$id ?></h4></center><br><br>

            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <? foreach ($products as $product): ?>
                <tr>
                    <td><?=$product['id']?></td>
                    <td><?=$product['code']?></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['price']?></td>
                    <td><?=$productsQuantity[$product['id']]?></td>
                </tr>
                <? endforeach;?>
            </table>
            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>
