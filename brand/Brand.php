<?php
require_once "Brand_classes.php"; // Include the class file
require_once "connect-db.php"; // Include the DB connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaDI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images_of_Đoan/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Brand.css">
</head>
<body>
    <?php require_once "../components/header.php"; ?>
    
    <div class="prod-breadcrumb" style="margin: 10px 0; margin-left: 25px" >
            <div class="prod-breadcrumb-black">
                <span onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/home/home.php'">Trang
                    chủ</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                        fill="#505050" />
                </svg>
            </div>
            <span class="prod-breadcrumb-blue" onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-list.php'">Danh sách thương hiệu</span>
        </div>
    
    <!-- Phần HTML cho logo-container -->
    <div class="logo-container" style="display: flex; width: 100%">
        <div class="logo-header">
            <h2 style="margin-left: 70px; padding: 30px 0; font-weight: 600; color: #0071AF">Danh sách thương hiệu</h2>
        </div>
        <div class="logo-slider">
            <?php
            $conn = connectDB();

            $sql = "SELECT brandLogo FROM brand";
            $result = mysqli_query($conn, $sql);

            $count = 0; 
            while ($row = mysqli_fetch_assoc($result)) {
                $imageURL = $row['brandLogo'];
                $displayStyle = $count < 6 ? "display: block;" : "display: none;";
                echo '<div class="img_logo" style="' . $displayStyle . '">';
                echo '<img src="' . $imageURL . '" alt="Logo">';
                echo '</div>';
                $count++;
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
    
    <h2 style="margin-left: 70px; padding: 40px 0 0 0; font-weight: 600; color: #0071AF">Thương hiệu liên kết với PharmaDi</h2>

    <div class="brand-container" >
        <?php
        $brandList = new BrandList();
        $brandList->loadBrandsFromDB();
        $brandList->displayBrands();
        ?>
    </div>
    
    <?php require_once "../components/footer.php"; ?>
    
    <!-- Các thẻ script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            
            var slideInterval = 4000;
            var isMouseOverSlider = false;
            
            
            var $slideContainer = $('.logo-slider');
            var $slides = $slideContainer.find('.img_logo');
            var currentIndex = 0;

            function showNextSlide() {
               
                if (!isMouseOverSlider) {
                    
                    $slides.css('display', 'none');

                    
                    for (var i = 0; i < 6; i++) {
                        var nextIndex = (currentIndex + i) % $slides.length;
                        $slides.eq(nextIndex).css('display', 'block');
                    }

                    
                    currentIndex = (currentIndex + 6) % $slides.length;
                }
            }

           
            showNextSlide();

           
            setInterval(showNextSlide, slideInterval);
           
            $slideContainer.on('mouseover', function() {
                isMouseOverSlider = true;
            }).on('mouseout', function() {
                isMouseOverSlider = false;
            });
        });
    </script>
    
</body>
</html>