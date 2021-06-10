<?php

include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        echo '<hr>Список новостей<hr><br>';

        echo '<pre>';
        print_r($newsList);
        echo '</pre>';
        return true;
    }

    public function actionView($id)
    {
        if($id)
        {
            $newsItem = News::getNewsItemById($id);
            echo '<hr>Просмотр новости<hr><br>';
            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';

        }

        return true;
    }
}
