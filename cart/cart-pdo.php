<?php
require_once "../connect-db.php";
class Cart extends Connection
{
    public function getData()
    {
        $sql = "SELECT product_cart.cartId, product_cart.prodCartNum, product.*, imgPath, brand.*
        FROM product_cart
        JOIN product ON product_cart.SKU = product.SKU
        JOIN product_img ON product_img.SKU = product.SKU
        JOIN brand ON product.brandId = brand.brandId
        WHERE (prodStatus = 1) 
        GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getBrandInCart()
    {
        $sql = "SELECT brand.* FROM product_cart
        JOIN product ON product_cart.SKU = product.SKU
        JOIN brand ON product.brandId = brand.brandId
        WHERE (prodStatus = 1)
        GROUP BY brandId;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function deleteProduct($id){
        $sql = "DELETE FROM product_cart WHERE SKU = $id";
        $delete = $this->prepareSQL($sql);
        $delete->execute();
    }
    public function plusNumber($number, $id){
        $sql = "UPDATE product_cart SET prodCartNum = $number WHERE SKU = $id";
        $update = $this->prepareSQL($sql);
        $update->execute();
    }
    public function totalNum(){
        $sql = "SELECT SUM(prodCartNum) AS total FROM product_cart";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll()[0];
    }
    public function totalPrice(){
        $sql = "SELECT SUM(
            CASE 
            WHEN prodPriceSale IS NOT NULL THEN prodPriceSale*prodCartNum
            ELSE prodPrice*prodCartNum
            END) AS total 
        FROM product JOIN product_cart ON product.SKU = product_cart.SKU
        WHERE product.SKU = product_cart.SKU";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll()[0];
    }
}