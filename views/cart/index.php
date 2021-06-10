<? include ROOT . '/views/layouts/header.php'; ?>

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
                    <h2 class="title text-center">Корзина</h2>

                    <? if ($productsInCart): ?>
                    <h4>Вы выбрали такие товары:</h4>
                    <table class="table-bordered table-striped table" id="cartTable">
                        <tr>
                            <th>Код товара</th>
                            <th>Название</th>
                            <th>Цена, р</th>
                            <th>Колич., шт</th>
                            <th>Стоимость, р</th>
                            <th>Удалить</th>
                        </tr>
                        <tbody>
                        <? foreach ($products as $product): ?>
                        <tr>
                            <td><? echo $product['code']; ?></td>
                            <td>
                                <a href="/product/<?=$product['id'] ?>"><? echo $product['name']; ?></a>
                            </td>
                            <td>
                                <span id="productPrice_<?=$product['id']?>" value="<?=$product['price']?>">
                                    <?=$product['price']?>
                                </span>
                            </td>
                            <td>
                                <input name="productCnt_<?=$product['id']?>" id="productCnt_<?=$product['id']?>" size="4" type="number" min="1" max="10" value="<?=$productsInCart[$product['id']]?>" onchange="conversionPrice(<?=$product['id']?>);">
                            </td>
                            <td>
                                <span id="productRealPrice_<?=$product['id']?>" value="<?=$product['price']?>">
                                    <?=$product['price']?>
                                    </span>
                            </td>
                            <td>
                                <a href="/cart/delete/<?=$product['id']?>"><img src="/template/images/cancel.png" width=20 height=20 border=0 title="Удалить из корзины" alt="Удалить из корзины"></a>
                            </td>
                        </tr>
                        <? endforeach; ?>
                        </tbody>
                        <tr>
                            <td colspan="4" align="right">Общая стоимость:</td>
                            <td>
                                <span id="valTotalPrice" value="<?=$totalPrice?>"><?=$totalPrice?></span>
                            </td>
                            <td></td>
                        </tr>
                        </table>
                    <br>

                        <a class="button" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить</a>

                        <? else: ?><p>Корзина пуста</p>
                        <? endif; ?>

                </div>
            </div>
        </div>
    </div>

</section>

<? include ROOT . '/views/layouts/footer.php'; ?>