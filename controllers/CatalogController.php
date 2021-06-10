<?php
/*
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';
*/

class CatalogController
{
    public function actionIndex()
    {
        // Выводим список категорий

        $categories = array();
        $categories = Category::getCategoriesList();

        // Выводим последние добавленные продукты

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(Product::SHOW_BY_DEFAULT);

        require_once (ROOT.'/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        //echo 'Category: '.$categoryId;
        //echo '<br>Page: '.$page;

        // Выводим список категорий

        $categories = array();
        $categories = Category::getCategoriesList();

        // Выводим продукты данной категории

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        // Получаем кол-во продуктов в категории
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/catalog/category.php');

        return true;
    }

}