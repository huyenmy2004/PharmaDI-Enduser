<?php
    require_once 'pdo.php';
    require_once '../components/header.php';
    $getinf = new Query();
    $products = $getinf->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order.css">
    <!-- <link rel="stylesheet" href="font_backgroud.css"> -->
    <title>Order</title>
</head>
<body>
    <!-- <div class="menu">
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
    </div> -->

    <div class="order-list">
        <h1 class="order-list-title">Danh sách đơn hàng</h1>
        <?php 
            $all = count($products);
            $wait = 0;
            $confirm = 0;
            $on_way = 0;
            $receive = 0;
            $cancel = 0;
            $i = 1;
            $max = count($products);
            foreach ($products as $product) :
                if($i == $max) {
                    if($product['orderStatus'] == 1) $wait++;
                        else if($product['orderStatus'] == 2) $confirm++;
                        else if($product['orderStatus'] == 3) $on_way++;
                        else if($product['orderStatus'] == 4) $receive++;
                        else if($product['orderStatus'] == 5) $cancel++;
        ?>
        <div class="order-list-option">
            <button class="order-list-button button active" name="all">Tất cả (<?= $max?>)</button>
            <button class="order-list-button" name="wait">Chờ xác nhận (<?= $wait?>)</button>
            <button class="order-list-button" name="confirm">Đã xác nhận (<?= $confirm?>)</button>
            <button class="order-list-button" name="on_way">Đang giao hàng (<?= $on_way?>)</button>
            <button class="order-list-button" name="receive">Đã giao hàng (<?= $receive?>)</button>
            <button class="order-list-button" name="cancel">Huỷ đơn hàng (<?= $cancel?>)</button>
        </div>
        <?php } else $i++; 
                if($product['orderStatus'] == 1) $wait++;
                else if($product['orderStatus'] == 2) $confirm++;
                else if($product['orderStatus'] == 3) $on_way++;
                else if($product['orderStatus'] == 4) $receive++;
                else if($product['orderStatus'] == 5) $cancel++;
                endforeach; 
        ?>
        <!-- search all -->

        
            <div class="order-lists">
                <div class="order-list-box active">
                    <?php 
                        foreach ($products as $product) : 
                    ?>
                        <div class="order-list-detail">
                            <div class="order-list-item">
                                <div class="order-list-item-des">
                                    <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                    <ul class="order-list-item-inf">
                                        <li><button class="order-list-item-status">
                                            <?php if($product['orderStatus'] == 1) echo "Chờ xác nhận";
                                                else if($product['orderStatus'] == 2) echo "Đã xác nhận";
                                                else if($product['orderStatus'] == 3) echo "Đang giao hàng";
                                                else if($product['orderStatus'] == 4) echo "Đã giao hàng";
                                                else if($product['orderStatus'] == 5) echo "Huỷ đơn hàng";
                                            ?></button></li>
                                        <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                        <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                    </ul>
                                </div>
                                <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                                <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                                <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div> 
        
        <!-- <div class="order-lists">
            <div class="order-list-box active">
                <div class="order-list-detail">
                    <div class="order-list-item">
                        <div class="order-list-item-des">
                            <img class="order-list-item-img" src="image/Rectangle 275.png" alt="">
                            <ul class="order-list-item-inf">
                                <li><button class="order-list-item-status">Đã xác nhận</button></li>
                                <li><span class="order-list-item-title">Methycobal Mecobalamin 500mcg/Ml Eisai (H/10o/1ml)</span></li>
                                <li><p class="order-list-item-price">378.900đ</p></li>
                            </ul>
                        </div>
                        <p class="order-list-item-detal"><a href="order-detail.php">Xem thêm ></a></p>
                        <p class="order-list-item-num">2 sản phẩm</p>
                        <p class="order-list-item-total">Thành tiền: 3.000.000đ</p>
                    </div>
                </div>
                <div class="order-list-detail">
                    <div class="order-list-item">
                        <div class="order-list-item-des">
                            <img class="order-list-item-img" src="image/Rectangle 275.png" alt="">
                            <ul class="order-list-item-inf">
                                <li><button class="order-list-item-status">Chờ xác nhận</button></li>
                                <li><span class="order-list-item-title">Methycobal Mecobalamin 500mcg/Ml Eisai (H/10o/1ml)</span></li>
                                <li><p class="order-list-item-price">378.900đ</p></li>
                            </ul>
                        </div>
                        <p class="order-list-item-detal"><a href="order-detail.html">Xem thêm ></a></p>
                        <p class="order-list-item-num">2 sản phẩm</p>
                        <p class="order-list-item-total">Thành tiền: 3.000.000đ</p>
                    </div>
                </div>
                <div class="order-list-detail">
                    <div class="order-list-item">
                        <div class="order-list-item-des">
                            <img class="order-list-item-img" src="image/Rectangle 275.png" alt="">
                            <ul class="order-list-item-inf">
                                <li><button class="order-list-item-status">Chưa xác nhận</button></li>
                                <li><span class="order-list-item-title">Methycobal Mecobalamin 500mcg/Ml Eisai (H/10o/1ml)</span></li>
                                <li><p class="order-list-item-price">378.900đ</p></li>
                            </ul>
                        </div>
                        <p class="order-list-item-detal"><a href="order-detail.html">Xem thêm ></a></p>
                        <p class="order-list-item-num">2 sản phẩm</p>
                        <p class="order-list-item-total">Thành tiền: 3.000.000đ</p>
                    </div>
                </div>
                <div class="order-list-detail">
                    <div class="order-list-item">
                        <div class="order-list-item-des">
                            <img class="order-list-item-img" src="image/Rectangle 275.png" alt="">
                            <ul class="order-list-item-inf">
                                <li><button class="order-list-item-status">Chờ xác nhận</button></li>
                                <li><span class="order-list-item-title">Methycobal Mecobalamin 500mcg/Ml Eisai (H/10o/1ml)</span></li>
                                <li><p class="order-list-item-price">378.900đ</p></li>
                            </ul>
                        </div>
                        <p class="order-list-item-detal"><a href="order-detail.html">Xem thêm ></a></p>
                        <p class="order-list-item-num">2 sản phẩm</p>
                        <p class="order-list-item-total">Thành tiền: 3.000.000đ</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- search wait -->

        <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 1) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Chờ xác nhận" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 

        <!-- search confirm -->

        <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 2) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Đã xác nhận" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 

        <!-- search on_way -->

        <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 3) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Đang giao hàng" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 

         <!-- search receive -->

         <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 4) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Đã giao hàng" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 

        <!-- search cancel -->

        <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 5) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Huỷ đơn hàng" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= $product['prodPrice'] ?></p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= $product['prodPrice'] * $product['prodNumber']?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 
        
    </div>
    <!-- <div class="footer">
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
    </div> -->
    <script src="app.js"></script>
    <?php require_once '../components/footer.php'; ?>
</body>
</html>