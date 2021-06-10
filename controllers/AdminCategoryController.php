<?php


class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        require_once (ROOT . '/views/admin_category/index.php');

        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['name'];

            $errors = false;

            if (!isset($_POST['name']) || empty($_POST['name']))
            {
                $errors[] = 'Введите название категории';
            }

            if ($errors == false)
            {
                Category::createCategory($options);

                header("Location: /admin/category");
            }

        }

        require_once (ROOT . '/views/admin_category/create.php');

        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Введите название категории';
            }

            if ($errors == false)
                {

                    if (Category::updateCategoryById($id, $options))
                    {
                        header("Location: /admin/category");
                    }
                }

        }

        require_once (ROOT . '/views/admin_category/update.php');

        return true;

    }

}