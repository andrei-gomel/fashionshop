<?

Class SiteController
{
  public function actionIndex()
  {
        // массив всех категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        // массив последних добавленных продуктов
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

      require_once (ROOT . '/views/site/index.php');

    return true;
  }

  public function actionContact()
  {
      $userEmail = '';
      $userText = '';
      $result = false;

      if (isset($_POST['submit']))
      {
          $userEmail = $_POST['userEmail'];
          $userText = $_POST['userText'];

          $errors = false;

          if (!User::checkEmail($userEmail))
          {
              $errors[] = 'Некорректный Email!';
          }

          if ($errors == false)
          {
              $adminEmail = 'andr_vol@mail.ru';
              $subject = 'Тема письма';
              $message = "Текст: {$userText}. От {$userEmail}";
              $result = mail($adminEmail, $subject, $message);
              $result = true;
          }
      }

      require_once (ROOT . '/views/site/contact.php');

   }
}
