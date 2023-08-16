<?php
    require_once 'pdo.php';
    require_once '../components/header.php';
    $id = $_GET['id'];
    $getinf = new Query();
    $products = $getinf->select($id);
    $getBrand = new Query();
    $brands = $getBrand->select_brand($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./asset/image/logo-shortcut.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="font_backgroud.css">
    <link rel="stylesheet" href="order-detail.css">
</head>
<body>
    <!-- MENU  -->

    <!-- CONTENT  -->
    <div class="content">
    <div class="order-list">
        <div class="order-list-showcase">
            <a href="order.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="order-list-showcase-title">CHI TIẾT ĐƠN HÀNG</h1>
        </div>
            <?php 
                $i = 1;
                foreach ($products as $product) : 
                    if($i == 1) { $i++;
            ?>
        <div class="showcase-detali">
            <div>
                <span class="showcase-detail-box-intro">Tên nhà thuốc</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf"><?= $product['brandName'] ?></p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Tên người liên hệ</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf"><?= $product['cusName'] ?></p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Ngày đặt hàng</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf"><?= $product['orderDate'] ?></p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Trạng thái đơn hàng</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf">
                    <?php if($product['orderStatus'] == 1) echo "Chờ xác nhận";
                        else if($product['orderStatus'] == 2) echo "Đã xác nhận";
                        else if($product['orderStatus'] == 3) echo "Đang giao hàng";
                        else if($product['orderStatus'] == 4) echo "Đã giao hàng";
                        else if($product['orderStatus'] == 5) echo "Huỷ đơn hàng";
                    ?>
                </p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Số điện thoại</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf"><?= $product['cusPhone'] ?></p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Địa chỉ</span>
                <div class="showcase-detali-box">
                <p class="showcase-detail-box-inf"><?= $product['cusGPPAddr'] ?></p>
                </div>
            </div>
            <div>
                <span class="showcase-detail-box-intro">Ghi chú</span>
                <div class="showcase-detali-box-note">
                <p class="showcase-detail-box-inf"><?php if($product['orderNote'] != "") echo $product['orderNote'];
                else echo "Trống";?></p>
                </div>
            </div>
        </div>
        <?php } endforeach; ?>

        <?php 
                foreach ($brands as $brand) :   
            ?>
            <div class="order-list-brand">
                <div class="order-list-brand-img"><img src="" alt=""><span><?= $brand['brandName'] ?></span></div>
                <div>
                    <ul class="order-list-brand-title">
                        <li class="order-list-brand-title-name">Tên sản phẩm</li>
                        <li class="order-list-brand-title-num">Số lượng</li>
                        <li class="order-list-brand-title-price">Giá tiền</li>
                    </ul>
                </div>
                <?php 
                foreach ($products as $product) : 
                        
                        if($brand['brandId'] == $product['brandId']) {
                ?>
                <div class="order-list-brand-detail">
                    <div class="order-list-brand-item">
                        <img class="order-list-brand-item-img" src="<?= $product['imgPath'] ?>" alt="">
                        <div class="order-list-brand-item-des">
                            <span class="order-list-brand-item-des"><?= $product['prodName'] ?></span>
                            <p class="order-list-brand-item-title"><?= $product['prodUnit'] ?></p>
                        </div>
                        <p class="order-list-brand-item-num"><?= $product['prodNumber'] ?></p>
                        <div class="order-list-brand-item-price"><?= $product['prodOldPrice'] ?></div>
                    </div>
                </div>
                <?php }
                
                    endforeach; ?>
            </div>
            <?php endforeach; ?>

        <?php 
            $num = 0;
            $total = 0;
            $i = 1;
            $max = count($products);
            foreach ($products as $product) :
                if($i == $max) {
                $num = $num + $product['prodNumber'];
                $total = $total + ($product['prodNumber'] * $product['prodOldPrice'])
        ?>
        <div class="order-detail-item-total">
            <div class="order-detail-item-total-num">
                <span class="title-num">Số lượng:</span>
                <p class="total-num"><?= $num?> sản phẩm</p>
            </div>
            <div class="order-detail-item-total-detail">
                <span class="title-detail">Thành tiền:</span>
                <p class="total-detail"><?= $total?> (VND)</p>
            </div>
        </div>
        <?php } else $i++; 
                $num = $num + $product['prodNumber'];
                $total = $total + ($product['prodNumber'] * $product['prodOldPrice']);
            endforeach; ?>

        <?php if($product['orderStatus'] == 1) {?>
            <div class="cancel-button"><button onclick="confirmCancle()">Huỷ đơn hàng</button></div>
                <div class="popup">
                    <div class="confirm-popup">
                        <span>XÁC NHẬN HUỶ ĐƠN HÀNG?</span>
                        <p>Bạn chắc chắn muốn huỷ đơn hàng đã chọn?</p>
                        <div class="confirm-popup-button">
                            <button class="confirm-popup-cancel" onclick="closePopup()">Huỷ bỏ</button>
                            <form method="POST" action="changeStatus.php">
                                <input type="hidden" value="<?= $product['orderId'] ?>" name="id">
                                <button type = "submit" class="confirm-popup-delete">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php } ?>
    </div> 
    </div>
    <script src="app.js"></script>
    <?php require_once '../components/footer.php'; ?>
</body>
</html>