<?php
require_once("../connect-db.php");
require_once("../check-login.php");
class Order extends Connection
{
    public function countStatus($v)
    {
        $sql = "SELECT COUNT(*) AS num, orderStatus FROM orders WHERE cusId = '$_SESSION[cusId]'"
            . ($v == null ? '' : " AND orderStatus = $v");
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getDataByStatus($v)
    {
        $sql = "SELECT *  FROM orders
        JOIN product_order ON orders.orderId = product_order.orderId
        JOIN product ON product.SKU = product_order.SKU
        JOIN product_img ON product_img.SKU = product.SKU WHERE cusId = '$_SESSION[cusId]'"
            . ($v == 0 ? '' : " AND orderStatus=$v")
        . " GROUP BY orders.orderId ORDER BY orders.orderId desc";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function countDataByStatus($v)
    {
        $sql = "SELECT orders.orderId, SUM(prodNumber) AS num, SUM(prodNumber*prodOldPrice) AS total FROM
        product_order JOIN orders ON orders.orderId = product_order.orderId WHERE cusId = '$_SESSION[cusId]'"
        . ($v == 0 ? '' : " AND orderStatus=$v") . "
        GROUP BY orders.orderId ORDER BY orders.orderId desc";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function detail($order){
        $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
        INNER JOIN orders ON product_order.orderId = orders.orderId 
        INNER JOIN customer ON orders.cusId = customer.cusId
        INNER JOIN product_img ON product_img.SKU = product.SKU
        INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$order' AND customer.cusId = '$_SESSION[cusId]'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function brandInOrder($order){
        $sql = "SELECT brand.brandName FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
        INNER JOIN orders ON product_order.orderId = orders.orderId 
        INNER JOIN customer ON orders.cusId = customer.cusId
        INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$order'  AND customer.cusId = '$_SESSION[cusId]'
        GROUP BY brand.brandId;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
?>