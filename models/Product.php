<?php


class Product
{
    const SHOW_BY_DEFAULT = 6;  // кол-во отображаемых товаров на одной странице

    /**
     * Функция возвращает последние добавленные продукты
     *
     * @param int $count
     * @return array
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page - 1) * $count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query("SELECT `id`, `name`, `price`, `image`, `is_new` "
                ."FROM `product` "
                ."ORDER BY `id` DESC "
                ."LIMIT ". $count
                ." OFFSET ". $offset);

        $i=0;

        while ($row = $result->fetch())
        {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;

        }

        return $productsList;
    }

    /**
     * Функция возвращает массив продуктов в категории
     *
     * @param int $categoryId
     * @return array
     */
    public static function getProductsListByCategory($categoryId = false, $page)
    {
        if($categoryId)
        {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $categoryId = intval($categoryId);

            $db = Db::getConnection();

            $products = array();

            $result = $db->query("SELECT `id`, `name`, `price`, `image`, `is_new` "
                    ."FROM product "
                    ."WHERE `category_id` = ".$categoryId
                    ." ORDER BY `id` DESC LIMIT ". self::SHOW_BY_DEFAULT
                    ." OFFSET ". $offset);

            $i = 0;

            while ($row = $result->fetch())
            {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    /**
     *  Получить продукт по Id
     *
     * @param $id
     */

    public static function getProductById($id)
    {
        $id = intval($id);

        if($id)
        {
            $db = Db::getConnection();

            $result = $db->query("SELECT * "
                        ."FROM `product` WHERE `id` = ".$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(`id`) AS count "
                            ."FROM `product` "
                            . "WHERE `status` = 1 AND `category_id` = ". $categoryId);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * "
                ."FROM `product` "
                ."WHERE `status` = 1 AND `id` IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch())
        {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;

    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT `id`, `name`, `price`, `code` '
                            .'FROM `product` ORDER BY `id` ASC');

        $productsList = array();

        $i = 0;

        while ($row = $result->fetch())
        {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['code'] = $row['code'];
            $i++;
        }

        return $productsList;
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = "DELETE "
            ."FROM `product` WHERE `id` = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options)
    {
        $image = $id . '.jpg';
        $db = Db::getConnection();

        $sql = "INSERT "
            ."INTO product (`name`, `category_id`, `code`, `price`, `brand`, `image`, `availability`, "
            ."`description`, `is_new`, `is_recommended`, `status`) "
            ."VALUES (:name, :category_id, :code, :price, :brand, :image, :availability, "
            .":description, :is_new, :is_recommended, :status)";

        $result = $db->prepare($sql);

        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);

        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);

        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);

        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);

        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);

        $result->bindParam(':image', $image, PDO::PARAM_STR);

        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);

        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);

        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);

        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);

        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute())
         {
             return $db->lastInsertId();
         }

         return false;

    }

    public static function updateProductById($id, $options)
    {
        $image = $id . '.jpg';

        $db = Db::getConnection();

        $sql = 'UPDATE product '
            .'SET name = :name, '
            .'category_id = :category_id, '
            .'code = :code, '
            .'price = :price, '
            .'availability = :availability, '
            .'brand = :brand, '
            .'image = :image, '
            .'description = :description, '
            .'is_new = :is_new, '
            .'is_recommended = :is_recommended, '
            .'status = :status '
            .'WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);

        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);

        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);

        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);

        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);

        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);

        $result->bindParam(':image', $image, PDO::PARAM_STR);

        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);

        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);

        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);

        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }

}