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
            <center><h4>Информация о заказах</h4></center><br><br>

            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <th>Номер заказа</th>
                    <th>Имя клиента</th>
                    <th>Телефон клиента</th>
                    <th>Комментарий клиента</th>
                    <th>Статус заказа</th>
                    <th>Дата заказа</th>
                    <th></th>
                    <th></th>

                </tr>
                <? foreach ($orderList as $order): ?>
                <tr>
                    <td><?=$order['id']?></td>
                    <td><?=$order['user_name'];
                        if ($order['user_id']): echo ', ID='.$order['user_id']; endif;?></td>
                    <td><?=$order['user_phone']?></td>
                    <td><?=$order['user_comment']?></td>
                    <td><? echo Instruments::getStatusText($order['status']); ?>
                    </td>
                    <td><?=$order['date']?></td>
                    <td><i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                        <a href="/admin/order/view/<?=$order['id']?>">Просмотр</a></td>
                    <td><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                        <a href="/admin/order/update/<?=$order['id']?>">Редактир.</a></td>


                </tr>
                <? endforeach; ?>
            </table>

            <a href="/admin/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>
