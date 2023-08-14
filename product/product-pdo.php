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