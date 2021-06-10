<?php

class Instruments
{
    public static function getStatusText($status)
    {
        switch ($status)
        {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    public static function getImage($id)
    {
        $noImage = 'noimages.jpg';

        $path = '/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage))
        {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }

}