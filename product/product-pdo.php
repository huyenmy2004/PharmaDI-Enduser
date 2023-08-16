<?php
require_once "../connect-db.php";
class Product extends Connection
{
    public function getData($name)
    {
        $sql = "SELECT product.*, tagName, imgPath
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE (prodStatus = 1) " . ($name != null ? "AND (prodName LIKE '%{$name}%')"  : ' ') .
        "GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getDetailData($id)
    {
        $sql = "SELECT product.*, tagName, imgPath, cateName
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        JOIN category ON product.cateId = category.cateId
        WHERE product.SKU = '$id'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function searchCate($cate)
    {
        $sql = "SELECT product.*, tagName, imgPath
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        JOIN category ON category.cateId = product.cateId
        WHERE (prodStatus = 1) " . ($cate != null ? "AND (category.cateId = '$cate')"  : ' ') .
        "GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function searchTag($tag)
    {
        $sql = "SELECT product.*, tagName, imgPath
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE (prodStatus = 1) " . ($tag != null ? "AND (tag.tagId = '$tag')"  : ' ') .
        "GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getDataByBrand($brand)
    {
        $sql = "SELECT product.*, imgPath
        FROM product JOIN brand ON product.brandId = brand.brandId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE (prodStatus = 1) " . "AND product.brandId = '$brand'" .
        "GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function insert($id, $number)
    {
        $sqlExists = "SELECT EXISTS(SELECT 1 FROM product_cart WHERE SKU = '$id' AND cartId = 'cart001')";
        $selectExists = $this->prepareSQL($sqlExists);
        $selectExists->execute();
        if($selectExists->fetchAll()[0]["EXISTS(SELECT 1 FROM product_cart WHERE SKU = '$id' AND cartId = 'cart001')"] == 1)
        {
            $sql = "UPDATE `product_cart` SET prodCartNum = product_cart.prodCartNum + $number WHERE SKU = $id AND cartId = 'cart001'";
        }
        else {
            $sql = "INSERT INTO `product_cart`(`SKU`, `cartId`, `prodCartNum`) VALUES ('$id', 'cart001', $number)";
        }
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Brand extends Connection
{
    public function getData()
    {
        $sql = "SELECT * FROM brand";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Tag extends Connection
{
    public function getData()
    {
        $sql = "SELECT * FROM tag";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Category extends Connection
{
    public function getData()
    {
        $sql = "SELECT * FROM category";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}