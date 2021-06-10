<?php


class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $db = Db::getConnection();

        $sql = "INSERT "
                ."INTO `product_order` "
                ."(`user_name`, `user_phone`, `user_comment`, `user_id`, `products`) "
                ."VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)";

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
               
    }

    public static function getOrderById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * "
                ."FROM product_order WHERE id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
    }

    public static function getOrderList()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * "
            ."FROM `product_order` "
            ."ORDER BY id DESC");

        $orderList = array();

        $i = 0;
        while ($row = $result->fetch())
        {
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['user_phone'] = $row['user_phone'];
            $orderList[$i]['user_comment'] = $row['user_comment'];
            $orderList[$i]['user_id'] = $row['user_id'];
            $orderList[$i]['date'] = $row['date'];
            $orderList[$i]['status'] = $row['status'];
            $i++;
        }
        return $orderList;
    }

}