<?php
class Brand {
    public $brandId;
    public $brandLogo;
    public $brandDescription;
    public $productCount;

    function __construct($brandId, $brandLogo, $brandDescription, $productCount) {
        $this->brandId = $brandId;
        $this->brandLogo = $brandLogo;
        $this->brandDescription = $brandDescription;
        $this->productCount = $productCount;
    }

    public function displayBrand() {
        echo '<div class="brand">';
        echo '<img class="input" src="' . $this->brandLogo . '" alt="Logo">';
        echo '<p class="input">' . $this->brandDescription . '</p>';
        echo '<p class="input" id="count">' . $this->productCount . ' sản phẩm</p>';
        echo '<a class="input" href = ""> Xem sản phẩm >>> </a>';
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