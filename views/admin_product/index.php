<?php include ROOT . '/views/admin/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs"></div> <br><center>
                <h4>Админпанель / Управление товарами </h4><br><br>
                <a href="/admin/product/create/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
                <br>
                <h4>Список товаров</h4><br>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <? foreach ($productsList as $product): ?>
                    <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['code']?></td>
                        <td><?=$product['name']?></td>
                        <td><?=$product['price']?></td>
                        <td><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            <a href="/admin/product/update/<?=$product['id']?>">Редактир.</a></td>
                        <td><i class="fa fa-times fa-lg" aria-hidden="true"></i>
                            <a href="/admin/product/delete/<?=$product['id']?>">Удалить</a></td>
                    </tr>
                    <? endforeach; ?>
                </table><br><br><br>
            </center></div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>