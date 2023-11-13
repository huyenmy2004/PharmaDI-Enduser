<?php
require_once "../check-login.php";
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
        $sql = "SELECT product.*, tagName, imgPath, cateName, brand.*
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN brand ON product.brandId = brand.brandId
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
    public function seeAllProduct($brand)
    {
        $sql = "SELECT product.*, tagName, imgPath
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        JOIN brand ON brand.brandId = product.brandId
        WHERE (prodStatus = 1) " . ($brand != null ? "AND (brand.brandName = '$brand')"  : ' ') .
        " GROUP BY product.SKU;";
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
        $sqlExists = "SELECT EXISTS(SELECT 1 FROM product_cart WHERE SKU = '$id' AND cartId = '$_SESSION[cartId]')";
        $selectExists = $this->prepareSQL($sqlExists);
        $selectExists->execute();
        if($selectExists->fetchAll()[0]["EXISTS(SELECT 1 FROM product_cart WHERE SKU = '$id' AND cartId = '$_SESSION[cartId]')"] == 1)
        {
            $sql = "UPDATE `product_cart` SET prodCartNum = product_cart.prodCartNum + $number WHERE SKU = $id AND cartId = '$_SESSION[cartId]'";
        }
        else {
            $number == 0 ? $number = 1 : $number;
            $sql = "INSERT INTO `product_cart`(`SKU`, `cartId`, `prodCartNum`) VALUES ('$id', '$_SESSION[cartId]', $number)";
        }
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function searchCountry($v)
    {
        $sql = "SELECT product.*, tagName, imgPath
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE (prodStatus = 1) " . ($v != null ? "AND (product.prodCountry = '$v')"  : ' ') .
        "GROUP BY product.SKU;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function searchNew()
    {
        $sql = "SELECT product.*, tagName, brandName, cateName, imgPath
        FROM product 
        JOIN tag ON product.tagId = tag.tagId
        JOIN brand ON product.brandId = brand.brandId
        JOIN category ON product.cateId = category.cateId
        JOIN product_img ON product_img.SKU = product.SKU
        WHERE prodStatus = 1
        GROUP BY SKU
        ORDER BY prodSellNumber desc";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Brand extends Connection
{
    public function getList()
    {
        $sql = "SELECT * FROM brand";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function countProduct($brandId){
        $sql = "SELECT COUNT(*) AS num 
        FROM product JOIN tag ON product.tagId = tag.tagId
        JOIN product_img ON product_img.SKU = product.SKU
        JOIN brand ON brand.brandId = product.brandId
        WHERE brand.brandId = '$brandId'";
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