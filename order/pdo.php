<?php
require_once "../connect-db.php";
class Query extends Connection {
    public function all() {
        $sql = "SELECT * 
        FROM 
        -- product_img INNER JOIN 
        product 
        -- ON product_img.SKU = product.SKU 
        INNER JOIN product_order ON product.SKU = product_order.SKU 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN product_img ON product_img.SKU = product.SKU
        GROUP BY orders.orderId";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function all_ad() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId
        GROUP BY orders.orderId";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO products (name, price, category_id) VALUES (:name, :price, :ca_id)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function delete($data) {
        $sql = "DELETE FROM product_order 
         WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function updateStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 5 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function updateConfirmStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 2 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function select($data) {
        $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
        INNER JOIN orders ON product_order.orderId = orders.orderId 
        INNER JOIN customer ON orders.cusId = customer.cusId
        INNER JOIN product_img ON product_img.SKU = product.SKU
        INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function select_brand($data) {
    $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
    INNER JOIN orders ON product_order.orderId = orders.orderId 
    INNER JOIN customer ON orders.cusId = customer.cusId
    -- INNER JOIN product_img ON product_img.SKU = product.SKU
    INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data' GROUP BY product.brandId";
    $stmt = $this->prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
}


