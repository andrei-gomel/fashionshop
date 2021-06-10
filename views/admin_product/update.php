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
            <center><h4>Редактирование товара №<?=$id ?></h4></center><br><br>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <input type="text" name="name" value="<?=$product['name'] ?>">

                        <p>Артикул</p>
                        <input type="text" name="code" value="<?=$product['code'] ?>">

                        <p>Стоимость, р</p>
                        <input type="text" name="price" value="<?=$product['price'] ?>">

                        <p>Категория</p>
                        <select name="category_id">
                            <? if (is_array($categoriesList)): ?>
                                <? foreach ($categoriesList as $category): ?>
                                    <option value="<?=$category['id']?>"
                                    <? if ($product['category_id'] == $category['id'])
                                        echo ' selected="selected"';?>>
                                        <?=$category['name']?>
                                    </option>
                                <? endforeach;endif; ?>
                        </select><br><br>

                        <p>Производитель</p>
                        <input type="text" name="brand" value="<?=$product['brand'] ?>">

                        <p>Изображение товара</p>
                        <img src="<? echo Instruments::getImage($product['id'])?>" width="200">
                        <input type="file" name="image" value="<?=$product['image']?>">

                        <p>Детальное описание</p>
                        <textarea name="description"><?=$product['description'] ?></textarea><br><br>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" <? if ($product['availability'] == 1) echo 'selected="selected"'?>>Да</option>
                            <option value="0" <? if ($product['availability'] == 0) echo 'selected="selected"'?>>Нет</option>
                        </select><br><br>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" <? if ($product['is_new'] == 1) echo 'selected="selected"'?>>Да</option>
                            <option value="0" <? if ($product['is_new'] == 0) echo 'selected="selected"'?>>Нет</option>
                        </select><br><br>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" <? if ($product['is_recommended'] == 1) echo 'selected="selected"'?>>Да</option>
                            <option value="0" <? if ($product['is_recommended'] == 0) echo 'selected="selected"'?>>Нет</option>
                        </select><br><br>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <? if ($product['status'] == 1) echo 'selected="selected"'?>>Отображается</option>
                            <option value="0" <? if ($product['status'] == 0) echo 'selected="selected"'?>>Скрыт</option>
                        </select><br><br>

                        <button type="submit" name="submit" class="btn btn-default">Сохранить</button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>
