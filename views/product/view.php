<? include ROOT . '/views/layouts/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                                <?php
                                foreach ($category as $categoryItem): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?= $categoryItem['id'] ?>"
                                                   class="<? if ($categoryId == $categoryItem['id'])
                                                   {
                                                       echo 'active';
                                                       $carentCategory = $categoryItem['name'];
                                                   }?>">
                                                    <?= $categoryItem['name'] ?>
                                                </a></h4>
                                        </div>
                                    </div>
                                <? endforeach; ?>

                            </div><!--/category-products-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<? echo Instruments::getImage($product['id'])?>" width="100">
                                    </div>
                                    <? if ($product['is_new'] == 1):
                                        echo '<img src="/template/images/home/new.jpg" class="new" alt="">';
                                    endif; ?>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->

                                        <h2><?= $product['name']?></h2>
                                        <p>Код товара: <?= $product['code']?></p>
                                        <span>
                                            <span><?= $product['price']?>р</span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> На складе</p>
                                        <p><b>Состояние:</b> Новое</p>
                                        <p><b>Производитель:</b> <?= $product['brand']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <p><?=$product['description']?></p>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>


        <br/>
        <br/>

        <? include ROOT . '/views/layouts/footer.php'; ?>
