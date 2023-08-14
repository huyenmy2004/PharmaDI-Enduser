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