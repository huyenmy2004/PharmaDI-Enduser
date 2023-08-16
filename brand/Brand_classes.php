<?php
class Brand {
    public $brandId;
    public $brandLogo;
    public $brandDescription;
    public $productCount;
    public $brandName;

    function __construct($brandId, $brandLogo, $brandName, $brandDescription, $productCount) {
        $this->brandId = $brandId;
        $this->brandLogo = $brandLogo;
        $this -> brandName = $brandName;
        $this->brandDescription = $brandDescription;
        $this->productCount = $productCount;
    }

    public function displayBrand() {
        echo '<div class="brand">';
        echo '<img class="input" src="' . $this->brandLogo . '" alt="Logo">';
        echo '<p class="input" id="name">' . $this->brandName . '</p>';
        echo '<p class="input">' . $this->brandDescription . '</p>';
        echo '<p class="input" id="count">' . $this->productCount . ' sản phẩm</p>';
        echo '<a class="input" href="san-pham-theo-hang.php?brandId=' . $this->brandId . '"> Xem sản phẩm >>> </a>';
        echo '</div>';
    }
}

class BrandList {
    private $brands = [];

    public function addBrand($brand) {
        $this->brands[] = $brand;
    }

    public function displayBrands() {
        foreach ($this->brands as $brand) {
            $brand->displayBrand();
        }
    }
    public function loadBrandsFromDB() {
        $conn = connectDB();

        $sql = "SELECT brand.*, COUNT(product.brandId) AS product_count FROM brand
        LEFT JOIN product ON brand.brandId = product.brandId
        GROUP BY brand.brandId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $brand = new Brand(
                    $row['brandId'],
                    $row['brandLogo'],
                    $row['brandName'],
                    $row['brandDescription'],
                    $row['product_count']
                    
                );

                $this->addBrand($brand);
            }
        }

        mysqli_close($conn);
    }
}
?>
