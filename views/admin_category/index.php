<?php include ROOT . '/views/admin/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="breadcrumbs"></div> <br><center>
                    <h4>Админпанель / Управление категориями </h4><br><br>
                    <a href="/admin/category/create/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
                    <br>
                    <h4>Список категорий</h4><br>

                    <table class="table-bordered table-striped table">

                        <tr>
                            <th>ID категории</th>
                            <th>Название</th>
                            <th>Порядок отображения</th>
                            <th>Статус</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <? foreach ($categoriesList as $category): ?>
                            <tr>
                                <td><?=$category['id']?></td>
                                <td><?=$category['name']?></td>
                                <td><?=$category['sort_order']?></td>
                                <td><? if ($category['status'] == 1):
                                            echo "Отображается";
                                            else: echo "Скрыта";endif;?>
                                </td>
                                <td><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                    <a href="/admin/category/update/<?=$category['id']?>">Редактир.</a></td>
                                <td><i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    <a href="/admin/category/delete/<?=$category['id']?>">Удалить</a></td>
                            </tr>
                        <? endforeach; ?>

                    </table><br><br><br>

                </center></div>
        </div>
    </section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>