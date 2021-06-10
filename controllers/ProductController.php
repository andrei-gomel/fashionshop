<?php

class ProductController
{
  public function actionView($id)
  {
      //echo '<br>ProductController actionView';
      $category = array();
      $category = Category::getCategoriesList();

      $product = Product::getProductById($id);
      require_once (ROOT . '/views/product/view.php');

      return true;
  }

    public function actionList()
    {
        echo 'ProductController actionList';
        return true;
    }
}
