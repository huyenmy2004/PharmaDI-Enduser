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
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <link rel="stylesheet" href="order.css">
    <title>Đơn Hàng</title>
</head>
<body>

<div class="content">
    <div class="order-list">
    <h0 class="order-list-title">Danh sách đơn hàng</h0>
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
                    if($product['orderStatus'] == 0) $wait++;
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
                                            <?php if($product['orderStatus'] == 0) echo "Chờ xác nhận";
                                                else if($product['orderStatus'] == 2) echo "Đã xác nhận";
                                                else if($product['orderStatus'] == 3) echo "Đang giao hàng";
                                                else if($product['orderStatus'] == 4) echo "Đã giao hàng";
                                                else if($product['orderStatus'] == 5) echo "Huỷ đơn hàng";
                                            ?></button></li>
                                        <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                        <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                    </ul>
                                </div>
                                <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                                <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                                <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div> 

        <!-- search wait -->

        <div class="order-lists">
            <div class="order-list-box">
                <?php foreach ($products as $product) : if($product['orderStatus'] == 0) {?>
                    <div class="order-list-detail">
                        <div class="order-list-item">
                            <div class="order-list-item-des">
                                <img class="order-list-item-img" src="<?= $product['imgPath']?>" alt="">
                                <ul class="order-list-item-inf">
                                    <li><button class="order-list-item-status"><?= "Chờ xác nhận" ?></button></li>
                                    <li><span class="order-list-item-title"><?= $product['prodName']?></span></li>
                                    <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
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
                                    <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
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
                                    <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
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
                                    <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
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
                                    <li><p class="order-list-item-price"><?= number_format($product['prodPrice']) ?> (VND)</p></li>
                                </ul>
                            </div>
                            <p class="order-list-item-detal"><a href="order-detail.php?id=<?php echo $product["orderId"] ?>">Xem thêm ></a></p>
                            <p class="order-list-item-num"><?= $product['prodNumber'] ?> sản phẩm</p>
                            <p class="order-list-item-total">Thành tiền: <?= number_format($product['prodPrice'] * $product['prodNumber'])?> (VND)</p>
                        </div>
                    </div>
                <?php } endforeach; ?>
            </div>
        </div> 
    </div>
</div>
    <script src="app.js"></script>
    <?php require_once '../components/footer.php'; ?>
</body>
</html>