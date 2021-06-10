<?php include ROOT . '/views/admin/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/category/">Управление категориями</a></li>
                </ol>
            </div>
            <center><h4>Редактирование категории №<?=$id ?></h4></center><br><br>

            <? if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <? foreach ($errors as $error): ?>
                        <li>- <?=$error ?></li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название категории</p>
                        <input type="text" name="name" value="<?=$category['name'] ?>">

                        <p>Порядок отображения</p>
                        <input type="text" name="sort_order" value="<?=$category['sort_order'] ?>">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <? if ($category['status'] == 1) echo 'selected="selected"'?>>Отображается</option>
                            <option value="0" <? if ($category['status'] == 0) echo 'selected="selected"'?>>Скрыта</option>
                        </select><br><br>

                        <button type="submit" name="submit" class="btn btn-default">Сохранить</button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>
