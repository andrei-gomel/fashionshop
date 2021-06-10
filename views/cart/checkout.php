<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php

                        foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?=$categoryItem['id'] ?>">
                                            <?=$categoryItem['name'] ?>
                                        </a></h4>
                                </div>
                            </div>
                        <? endforeach; ?>

                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Оформление заказа</h2>

                    <?php if ($result): ?>

                        <h4>Заказ оформлен. Мы Вам перезвоним.</h4>

                    <?php else: ?>

                    <p>Выбрано товаров: <? echo $totalQuantity; ?>, на сумму: <? echo $totalPrice; ?> р</p><br>

                    <?php if (!$result): ?>

                        <div class="col-md-4">
                            <? if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <? foreach ($errors as $error): ?>
                                        <li>- <?=$error ?></li>
                                    <? endforeach; ?>
                                </ul>
                            <? endif; ?>

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="#" method="POST">
                                    <p>Ваше имя:</p>
                                    <input type="text" name="userName" placeholder="Ваше имя" value="<? echo $userName; ?>">

                                    <p>Номер телефона:</p>
                                    <input type="tel" name="userPhone" placeholder="Номер телефона" value="<? echo $userPhone; ?>">

                                    <p>Комментарий к заказу:</p>
                                    <input type="text" name="userComment" placeholder="Комментарий" value="<? echo $userComment; ?>">

                                    <button type="submit" name="submit" class="btn btn-default add-to-cart">Оформить</button>
                                </form>

                            </div>

                        </div>

                    <?php endif;?>

                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<? include ROOT . '/views/layouts/footer.php';?>
