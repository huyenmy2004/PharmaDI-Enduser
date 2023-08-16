<!-- MENU  -->
<?php 
require "../components/header.php"; 
require_once "cart-pdo.php"; 
$cart = new Cart();
$brandInCart = $cart->getBrandInCart();
$cartProducts = $cart->getData();
$cartTotalNum = $cart->totalNum();
$cartTotalPrice = $cart->totalPrice();
// print_r($cartTotalPrice);
?>

<head>
    <title>Giỏ hàng</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .cart {
            display: flex;
            margin: 30px 80px;
            color: #505050;
        }

        .cart-list-prod {
            display: flex;
            flex-direction: column;
            width: 65%;
        }

        .title {
            padding: 10px 0 10px 0px;
            font-weight: 600;
            color: #0071AF;
            font-size: 18px;
        }

        .cart-list-prod-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .delete-all{
            display: flex;
            align-items: center;
            padding: 5px 15px;
            border: 1px solid #D8D8D8;
            border-radius: 30px;
            background-color: #F9F9F9;
            font-size: 13px;
            color: #505050;
            height: 25px;
        }
        .select-all {
            display: flex;
            align-items: center;
            font-size: 14px;
            >span {
                padding: 0 10px 0 15px;
                font-size: 13px;
            }
        }
        .check input:checked ~ .checkmark {
            background-color: red;
        }

        .cart-list-prod-list-brand {
            display: flex;
            padding: 15px 30px;
            justify-content: space-between;
            >img{
                width: 100px;
                height: max-content;
            }
        }

        .cart-list-prod-list {
            display: flex;
            flex-direction: column;
            border: 1px solid #D8D8D8;
            border-radius: 8px;
            margin-top: 15px;
        }

        .cart-list-prod-list-prod {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto;
            padding: 20px 30px;
            border: solid 1px #D8D8D8;
            border-left: 0;
            border-right: 0;
        }

        .cart-transaction {
            display: flex;
            flex-direction: column;
            width: 35%;
            margin-left: 50px;
            >button {
                width: 100%;
                border-radius: 30px;
                background-color: #0071AF;
                border: none;
                padding: 8px 0;
                color: white;
                margin: 15px 0;
                font-size: 14px;
            }
        }

        .plus-number {
            border: 1px solid #D8D8D8;
            height: 28px;
            display: flex;
            >button {
                height: 100%;
                width: 30px;
                background-color: rgba(255, 255, 255, 0);
                border: 0;
            }
            >input{
                width: 70px;
                border: solid 1px #D8D8D8;
                border-top: 0;
                border-bottom: 0;
                outline: 0;
                padding: 0 10px;
            }
        }
        input[type="checkbox"]{
            margin: 0;
        }
        textarea:focus{
            outline: #0071AF
        }
    </style>
</head>

<body>
    <div class="cart">
        <div class="cart-list-prod">
            <div class="cart-list-prod-title">
                <span class="title">GIỎ HÀNG</span>
            </div>
            
            <?php foreach ($brandInCart as $brand): ?>
                <div class="cart-list-prod-list">
                    <div class="cart-list-prod-list-brand">
                        <span style = "font-size: 18px; color: #505050; font-weight: 600"><?= $brand['brandName'] ?></span>
                        <!-- <img src="<$brand['brandLogo'] ?>" alt="brand"> -->
                        <div style="display: flex; align-items: center">
                            <button class="delete-all">Xoá tất cả</button>
                            <div class="select-all">
                                <span>Chọn tất cả</span>
                                <input type="checkbox">
                            </div>
                        </div>
                    </div>
                    <?php foreach ($cartProducts as $prod): 
                        if($prod['brandId'] == $brand['brandId']) {
                        ?>
                        <div class="cart-list-prod-list-prod" style="cursor: pointer">
                            <div style="grid-column: span 1; display: flex; align-items: center">
                                
                            </div>
                            <div style="grid-column: span 4; display: flex; align-items: center">
                            <img src="<?= $prod['imgPath'] ?>" alt="product" style="width: 68px; height: 68px; object-fit: contain;">
                            <div style="display: flex; flex-direction: column;" onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-detail.php?prodId=<?= $prod['SKU'] ?>'">
                                    <span style="font-weight: 600; font-size: 14px; padding: 5px 0; max-width: 200px; overflow: hidden; text-overflow: ellipsis;"><?= $prod['prodName'] ?></span>
                                    <span style="font-weight: 500; font-size: 12px;"><?= $prod['prodUnit'] ?></span>
                                </div>
                            </div>
                            <form action="/action-plus.php?prodId=<?=$prod['SKU']?>" method="GET" style="grid-column: span 3; display: flex; align-items: center; margin: 0" id="plus-number" onclick="document.getElementById('plus-number').submit()">
                                <div class="plus-number">
                                    <button type="button" onclick="decrease('quantity-cart-<?= $prod['SKU']?>')"  style="font-size: 13px; text-align: center; display: flex; justify-content: center; align-items: center">
                                        <svg width="11" height="2.5" viewBox="0 0 11 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 1.62295C11 2.49263 10.4317 2.67285 9.73077 2.67285L1.26923 2.67227C0.568254 2.67227 1.50475e-08 2.49215 8.74709e-08 1.62247C1.59894e-07 0.752783 0.568255 0.572645 1.26923 0.572645L9.73077 0.572646C10.4317 0.572646 11 0.753261 11 1.62295Z"
                                                fill="#505050" />
                                        </svg>
                                    </button>
                                    <input type="number" style="font-size: 13px; text-align: center;" value="<?= $prod['prodCartNum']?>" id="quantity-cart-<?= $prod['SKU']?>">
                                    <button type="button" onclick="increase('quantity-cart-<?= $prod['SKU']?>')" style="font-size: 13px; text-align: center; display: flex; justify-content: center; align-items: center">
                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.99942 0.323242C6.82784 0.323242 6.99951 0.919798 6.99951 1.65569L6.99896 10.5386C6.99896 11.2745 6.82739 11.8711 5.99896 11.8711C5.17053 11.8711 4.99894 11.2745 4.99894 10.5386L4.99894 1.65569C4.99894 0.919798 5.17099 0.323242 5.99942 0.323242Z"
                                                fill="#505050" />
                                            <path
                                                d="M11.499 6.09658C11.499 6.96627 10.9308 7.14648 10.2298 7.14648L1.76825 7.14591C1.06728 7.14591 0.499023 6.96579 0.499024 6.0961C0.499024 5.22642 1.06728 5.04628 1.76825 5.04628L10.2298 5.04628C10.9308 5.04628 11.499 5.22689 11.499 6.09658Z"
                                                fill="#505050" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <span style="display: flex; align-items: center; font-weight: 600; font-size: 16px; color: #0071AF; padding: 5px 0;grid-column: span 2"><?= number_format($prod['prodPriceSale'])?></span>
                            <div style="grid-column: span 4; display: flex; align-items: center; justify-content: end; grid-column: span 2">
                                <svg style="cursor: pointer" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='http://localhost/PharmaDI-Enduser/cart/action-delete.php?prodId=<?=$prod['SKU']?>'">
                                    <path
                                        d="M6.2309 3.04162C6.4886 2.31253 7.18396 1.79167 7.99937 1.79167C8.81479 1.79167 9.51015 2.31253 9.76785 3.04162C9.88287 3.36706 10.24 3.53764 10.5654 3.42261C10.8908 3.30758 11.0614 2.95051 10.9464 2.62506C10.5177 1.41216 9.361 0.541672 7.99937 0.541672C6.63775 0.541672 5.48105 1.41216 5.05235 2.62506C4.93733 2.95051 5.1079 3.30758 5.43335 3.42261C5.7588 3.53764 6.11588 3.36706 6.2309 3.04162Z"
                                        fill="#505050" />
                                    <path
                                        d="M0.291016 4.50001C0.291016 4.15483 0.570838 3.87501 0.916016 3.87501H15.0828C15.4279 3.87501 15.7078 4.15483 15.7078 4.50001C15.7078 4.84518 15.4279 5.12501 15.0828 5.12501H0.916016C0.570838 5.12501 0.291016 4.84518 0.291016 4.50001Z"
                                        fill="#505050" />
                                    <path
                                        d="M2.2634 5.95972C2.60781 5.93676 2.90563 6.19735 2.92859 6.54176L3.31187 12.291C3.38675 13.4142 3.44011 14.1958 3.55725 14.7838C3.67087 15.3541 3.82948 15.6561 4.05733 15.8692C4.28517 16.0824 4.59697 16.2206 5.17364 16.296C5.76814 16.3738 6.55148 16.375 7.67718 16.375H8.32165C9.44735 16.375 10.2307 16.3738 10.8252 16.296C11.4019 16.2206 11.7137 16.0824 11.9415 15.8692C12.1693 15.6561 12.328 15.3541 12.4416 14.7838C12.5587 14.1958 12.6121 13.4142 12.687 12.291L13.0702 6.54176C13.0932 6.19735 13.391 5.93676 13.7354 5.95972C14.0798 5.98268 14.3404 6.2805 14.3175 6.62491L13.9313 12.418C13.86 13.487 13.8025 14.3504 13.6675 15.028C13.5272 15.7324 13.2885 16.3208 12.7955 16.782C12.3025 17.2432 11.6995 17.4423 10.9873 17.5354C10.3023 17.625 9.43692 17.625 8.3656 17.625H7.63323C6.56191 17.625 5.69654 17.625 5.01151 17.5354C4.2993 17.4423 3.69634 17.2432 3.20335 16.782C2.71035 16.3208 2.47167 15.7324 2.33134 15.028C2.19636 14.3504 2.13881 13.487 2.06756 12.418L1.68135 6.62491C1.65839 6.2805 1.91898 5.98268 2.2634 5.95972Z"
                                        fill="#505050" />
                                </svg>
                            </div>
                        </div>
                    <?php } endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-transaction">
            <span class="title">THÔNG TIN THANH TOÁN</span>
            <div
                style="border: 1px solid #D8D8D8; background-color: white; padding: 15px; border-radius: 8px; margin-top: 5px">
                <div style="display: flex; justify-content: space-between; font-size: 14px; padding-bottom: 10px">
                    <span>Số lượng</span>
                    <span><?= number_format($cartTotalNum['total']) ?> (sản phẩm)</span>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 14px; ">
                    <span>Thành tiền</span>
                    <span style="font-size: 16px; color: #0071AF; font-weight: 600"><?= number_format($cartTotalPrice['total'])?> (VND)</span>
                </div>
            </div>
            <textarea
                style="border: 1px solid #D8D8D8; background-color: white; padding: 15px; border-radius: 8px; margin-top: 15px; resize: none; outline:0"
                name="" id="" cols="30" rows="4" style="height: 20px; max-width: 100%; min-width: 100%"></textarea>
            <button>Xác nhận đặt hàng</button>
        </div>
    </div>
</body>
<!-- FOOTER  -->
<?php require_once "../components/footer.php"; ?>
<script>
        function increase(id) {
        document.getElementById(id).value = parseInt(document.getElementById(id).value) + 1
    }
    function decrease(id) {
        document.getElementById(id).value = parseInt(document.getElementById(id).value) - 1
    }
    function getNum(id) {
        return document.getElementById(id).value
    }
</script>