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
        LIMIT 8";
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
        LIMIT 8";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
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