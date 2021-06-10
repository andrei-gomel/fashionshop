<?php include ROOT . '/views/admin/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/product/">Управление товарами</a></li>
                </ol>
            </div>
            <center><h4>Добавление нового товара</h4></center><br><br>

            <? if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <? foreach ($errors as $error): ?>
                        <li>- <?=$error ?></li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <input type="text" name="name" value="<?=@$options['name']?>">

                        <p>Артикул</p>
                        <input type="text" name="code" value="<?=@$options['code'] ?>">

                        <p>Стоимость, р</p>
                        <input type="text" name="price" value="<?=@$options['price'] ?>">

                        <p>Категория</p>
                        <select name="category_id">
                            <? if (is_array($categoriesList)): ?>
                            <? foreach ($categoriesList as $category): ?>
                            <option value="<?=$category['id']?>">
                                <?=$category['name']?>
                            </option>
                            <? endforeach;endif; ?>
                        </select><br><br>

                        <p>Производитель</p>
                        <input type="text" name="brand" value="<?=@$options['brand'] ?>">

                        <p>Изображение товара</p>
                        <input type="file" name="image" value="">

                        <p>Детальное описание</p>
                        <textarea name="description"><?=@$options['description'] ?></textarea><br><br>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select><br><br>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select><br><br>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select><br><br>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select><br><br>

                        <button type="submit" name="submit" class="btn btn-default">Сохранить</button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>
