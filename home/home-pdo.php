<?php
require_once "../connect-db.php";
class Home extends Connection{
    public function getData($number){
        $sql = "SELECT product.*, tagName, brandName, cateName, imgPath
        FROM product 
        JOIN tag ON product.tagId = tag.tagId
        JOIN brand ON product.brandId = brand.brandId
        JOIN category ON product.cateId = category.cateId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE prodStatus = 1
        GROUP BY SKU
        ORDER BY prodSellNumber desc
        LIMIT $number";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getListProdNew(){
        $sql = "SELECT product.*, tagName, brandName, cateName, imgPath
        FROM product 
        JOIN tag ON product.tagId = tag.tagId
        JOIN brand ON product.brandId = brand.brandId
        JOIN category ON product.cateId = category.cateId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE prodStatus = 1
        GROUP BY SKU
        ORDER BY prodSellNumber desc
        LIMIT 12";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getListProdVN(){
        $sql = "    SELECT product.*, tagName, brandName, cateName, imgPath
        FROM product 
        JOIN tag ON product.tagId = tag.tagId
        JOIN brand ON product.brandId = brand.brandId
        JOIN category ON product.cateId = category.cateId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE prodStatus = 1 AND prodCountry = 'Vietnam'
        GROUP BY SKU
        ORDER BY prodSellNumber desc
        LIMIT 12";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Login extends Connection {
    public function login($username, $password){
        $sql = "SELECT account.*, customer.*, cart.* FROM account 
        JOIN customer ON account.username = customer.username
        JOIN cart ON cart.cusId = customer.cusId
        WHERE account.username = '$username' AND account.password = '$password'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function signUp($data){
        $sql = "INSERT INTO account VALUE (:username, :pass, 0, 0); 
        INSERT INTO cart VALUE (:username, :username);
        INSERT INTO customer (cusId, username, cusName, cusGPP) VALUE (:username,:username, :cusName, :cusGPP)";
        $insert = $this->prepareSQL($sql);
        $insert->execute($data);
    }
    public function insertCart($data){
        $sql = "INSERT INTO account VALUE (:username, :pass, 0, 0);";
        $sql = $sql."INSERT INTO customer(cusName, cusGPP) VALUE (:cusName, :cusGPP);";
        $insert = $this->prepareSQL($sql);
        $insert->execute($data);
    }
}
class News extends Connection{
    public function getData(){
        $sql = "SELECT * FROM news ORDER BY newsCreatedDate desc LIMIT 3";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}