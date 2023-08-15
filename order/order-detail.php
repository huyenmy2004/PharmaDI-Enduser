<?php
    require_once '../connection/pdo.php';
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
    <div class="menu">
        <div class="menu-top">
            <div class="img">
                <img src="../asset/image/logo.png" alt="logo">
            </div>
            <div class="menu-mid">
                <form action="">
                    <input type="text" placeholder="Nhập nội dung tìm kiếm..." class="search">
                    <button>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58332 2.29166C5.55625 2.29166 2.29166 5.55625 2.29166 9.58332C2.29166 13.6104 5.55625 16.875 9.58332 16.875C13.6104 16.875 16.875 13.6104 16.875 9.58332C16.875 5.55625 13.6104 2.29166 9.58332 2.29166ZM1.04166 9.58332C1.04166 4.86589 4.86589 1.04166 9.58332 1.04166C14.3008 1.04166 18.125 4.86589 18.125 9.58332C18.125 11.7171 17.3426 13.6681 16.049 15.1652L18.7753 17.8914C19.0193 18.1355 19.0193 18.5312 18.7753 18.7753C18.5312 19.0193 18.1355 19.0193 17.8914 18.7753L15.1652 16.049C13.6681 17.3426 11.7171 18.125 9.58332 18.125C4.86589 18.125 1.04166 14.3008 1.04166 9.58332Z" fill="#505050"/>
                        </svg>                
                    </button>
                </form>
            </div>
            <div class="menu-right">
                <button>Đăng ký</button>
                <button>Đăng nhập</button>
            </div>
        </div>
        <div class="menu-bottom">
            <a href="" class="menu-active">TRANG CHỦ</a>
            <a href="">SẢN PHẨM</a>
            <a href="">THƯƠNG HIỆU</a>
            <a href="">TIN TỨC</a>
        </div>
    </div>
    <!-- CONTENT  -->
    
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
                <div class="order-list-brand-img"><img src="./image/image 120.png" alt=""></div>
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
                        <img class="order-list-brand-item-img" src="./image/Rectangle 275.png" alt="">
                        <div class="order-list-brand-item-des">
                            <span class="order-list-brand-item-title"><?= $product['prodName'] ?></span>
                            <p class="order-list-brand-item-des"><?= $product['prodDescrip'] ?></p>
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
    
    <!-- FOOTER  -->
    <div class="footer">
        <div class="footer-top">
            <div class="footer-left">
                <div class="footer-left-top">
                    <span style="font-weight: 600; padding-bottom: 20px; font-size: 24px;">PharmaDI</span>
                    <span>Nền tảng B2B phân phối Thực Phẩm Chức Năng Chính Hãng</span>
                </div>
                <div class="footer-left-bottom">
                    <span style="font-weight: 600; padding-bottom: 20px; font-size: 18px;">CÔNG TY CỔ PHẦN PHARMADI</span>
                    <span>Trụ sở: 36 Mạc Đỉnh Chi, Phường Đa Kao, Quận 1, Thành phố Hồ Chí Minh, Việt Nam</span>
                    <span>Giấy phép ĐKKD số 0317699732 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội Cấp ngày 23/02/2023</span>
                    <span>Hotline: (028) 888 59 468</span>
                    <span>Email: info@pharmadi.vn</span>
                </div>
            </div>
            <div class="footer-right">
                <span>CHÍNH SÁCH</span>
                <a href="">Chính sách vận chuyển</a>
                <a href="">Chính sách bảo mật</a>
                <a href="">Chính sách đổi trả, kiểm hàng</a>
                <a href="">Chính sách thanh toán</a>
                <a href="">Điều khoản sử dụng</a>
            </div>
        </div>
        <div class="footer-bottom">© Copyright PharmaDi. All rights reserved.</div>
    </div>
    <script src="app.js"></script>
</body>
</html>