<?php
abstract class connection {
    protected $DB_TYPE;
    protected $DB_HOST;
    protected $DB_NAME;
    protected $USER;
    protected $PW;
    protected $connection;

    public function __construct() {
        $this->DB_TYPE = 'mysql';
        $this->DB_HOST = 'localhost';
        $this->DB_NAME = 'pharmadi';
        $this->USER = 'root';
        $this->PW = '';
        $this->connection = $this->conn();
    }

    public function conn() {
        try {
            $conn = new PDO("$this->DB_TYPE:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->USER, $this->PW);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function prepareSQL($sql) {
        return $this->connection->prepare($sql);
}
}
class Query extends connection {
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

    public function search() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId WHERE orderStatus LIKE '%$search%'";
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


