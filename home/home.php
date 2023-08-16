<!-- MENU  -->
<?php
require_once "../check-login.php";
require_once "../components/header.php";
require_once "home-pdo.php";
$prod = new Home();
$prodLeft = $prod->getData(1)[0];
$prodRight = $prod->getData(10);
$products = $prod->getListProdNew();
$prods = $prod->getListProdVN();
$news = new News();
$newsList = $news->getData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <style>
        .prod:hover {
            outline: 1px solid #0071AF;
            cursor: pointer;
        }

        .prod {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #d8d8d8;
            border-radius: 6px;
            width: 100%;
        }

        .prod-img {
            display: flex;
            width: 25%;
            height: max-content;

            >img {
                width: 100%;
            }
        }

        .product-detail {
            display: flex;
            flex-direction: column;
            width: 70%;
            padding: 10px;
            color: #505050;
        }

        button:hover {
            cursor: pointer;
        }

        /* Hide Input Number Arrows */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .hidden-scroll::-webkit-scrollbar {
            display: none;
        }

        .hidden-scroll {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .home-sale-left:hover {
            cursor: pointer;
        }

        .home-banner {
            padding: 30px;
            display: flex;
            justify-content: center;
        }

        .home-sale {
            display: flex;
            width: 96%;
            justify-content: left;
            margin: 0 80px;
            /* padding: 0 50px; */
        }

        .home-sale-left {
            display: flex;
            width: 55%;
            padding: 20px;
            border: 1px solid #d8d8d8;
            border-radius: 6px;
            position: relative;
            margin-right: 20px;
        }

        .prod-images {
            display: flex;
            justify-content: center;
            overflow: hidden;
            max-width: 40%;
            height: max-content;

            z-index: 0;

            >img {
                width: 400px;
                height: auto;
            }
        }

        .prod-info {
            display: flex;
            flex-direction: column;
            width: 60%;

            >form {
                padding-left: 10px;

                >button {
                    padding: 10px 16px;
                    border-radius: 6px;
                    background-color: #0071AF;
                    border: transparent;
                    font-size: 12px;
                    color: white;
                    width: 300px;
                    margin: 10px 0;
                }
            }
        }

        .prod {
            margin-bottom: 15px;
        }

        .prod-detail {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .prod-cate {
            padding: 5px 10px;
            background-color: #EFFAFF;
            font-size: 12px;
            border-radius: 20px;
            width: fit-content;
            margin-bottom: 30px;
        }

        .price-sale {
            padding-top: 5px;
            font-size: 24px;
            color: #0071AF;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .price-orgin {
            font-size: 12px;
            text-decoration: line-through;
            color: #505050;
        }

        .plus-number {
            display: flex;
            margin: 0 0 5px 0;

            >button {
                display: flex;
                justify-content: center;
                align-items: center;
                border: 1px solid #d8d8d8;
                background-color: transparent;
                width: 40px;
            }

            >input {
                border-top: 1px solid #d8d8d8;
                border-bottom: 1px solid #d8d8d8;
                outline: 0;
                border-left: 0;
                border-right: 0;
                width: 80px;
                padding: 5px;
            }
        }

        .home-sale-right {
            display: flex;
            flex-direction: column;
            justify-content: start;
            width: 35%;
            padding: 5px;
            border: 1px solid #d8d8d8;
            border-radius: 6px;
        }

        .home-sale-right-prod {
            /* padding: 0 20px 20px 20px; */
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 330px;
            /* width: 100%; */
            padding: 20px;
            margin-bottom: 15px;
        }

        .title-lowercase {
            padding: 15px 0 0px 30px;
            font-weight: 600;
            color: #505050;
        }

        .title {
            margin: 30px 0 30px 30px;
            font-weight: 600;
            color: #505050;
        }

        .home-product-new {
            position: relative;
            margin: 0 50px;
            width: 90%;
            >button {
                position: absolute;
                right: 40px;
                display: flex;
                align-items: center;
            }
        }

        .home-product {
            display: flex;
            flex-wrap: wrap;
            margin: 0 30px;
            width: 100%;
            justify-content: left;

        }

        .product {
            display: flex;
            width: 25%;
            padding: 0 27px 10px 0;
        }

        .home-parner {
            display: flex;
            flex-direction: column;
            margin: 0 50px;
        }

        .partner {
            display: flex;
            padding: 0 30px;
            overflow: Hide;

            >svg {
                padding-right: 80px;
                width: fit-content;
            }
        }

        .home-news {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0 50px;
            position: relative;
            margin-bottom: 30px;

            >button {
                position: absolute;
                right: 30px;
                bottom: -10px;
                display: flex;
                align-items: center;

            }
        }

        .news {
            display: flex;
            width: 30%;
            margin: 0 20px 35px 20px;
        }

        .home-news-post {
            display: flex;
            width: 100%;
            margin: 0 10px;
        }

        /* news */
        .compo-news {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .compo-news:hover {
            cursor: pointer;
        }

        .news-img {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: max-content;
        }

        .news-title {
            width: 90%;
            font-size: 14px;
            font-weight: 600;
            padding: 15px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .news-content {
            width: 100%;
            height: 55px;
            font-size: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .show-more {
            color: #505050;
            font-style: italic;
            font-size: 12px;
            outline: none;
            background-color: transparent;
            border: none;
            display: flex;
            justify-content: right;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <!-- CONTENT -->
    <div class="home-banner">
        <img src="../assets/images/banner.png" alt="">
    </div>
    <div class="home-sale">
        <div class="home-sale-left"
            onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-detail.php?prodId=<?= $prodLeft['SKU'] ?>'">
            <span class="z-10"
                style="background-color: #BA0122; height: 41.8px; width: 110px; position: absolute; top: 24.5px; left: -1px; color: white; padding: 10px; font-size: 17px">BÁN
                CHẠY</span>
            <div style="position: absolute; left: -10px" class="z-10">
                <svg width="10" height="62" viewBox="0 0 12 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 58.0056C2.54174 60.4649 6.60001 62.3737 11.461 63.3333V44.0115H2.60662C1.61954 44.6275 0.744681 45.3008 0 46.0213V58.0056Z"
                        fill="#505050" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 44.0115H11.461V50.0458C11.1904 50.024 10.9175 50.013 10.6424 50.013C6.09323 50.013 2.12186 53.0354 0 57.5264V44.0115Z"
                        fill="#BA0122" />
                    <path d="M0 8C0 3.58172 3.58172 0 8 0H12V45H0V8Z" fill="#BA0122" />
                </svg>
                <svg width="20.5" height="49.2" viewBox="0 0 25 53" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style=" position: absolute; top: 1px; left: 118.5px">
                    <path d="M25 26.5L0.25 52.0477L0.250004 0.952251L25 26.5Z" fill="#BA0122" />
                </svg>
            </div>
            <div class="prod-images">
                <img src="<?= $prodLeft['imgPath'] ?>" alt="">
            </div>
            <div class="prod-info">
                <div class="prod-detail">
                    <span style="font-size: 12px; padding: 5px 0; color: #505050">
                        <?= $prodLeft['prodDosageForms'] ?>
                    </span>
                    <span style="font-size: 18px; padding: 5px 0; font-weight: 600; color: #505050">
                        <?= $prodLeft['prodName'] ?>
                    </span>
                    <span style="font-size: 12px; padding-bottom: 5px; color: #505050">
                        <?= $prodLeft['prodUnit'] ?>
                    </span>
                    <span style="font-size: 12px; padding-bottom: 5px; color: #505050">Quốc gia:
                        <?= $prodLeft['prodCountry'] ?>
                    </span>
                    <span class="prod-cate">
                        <?= $prodLeft['cateName'] ?>
                    </span>
                    <div class="prod-price">
                        <span class="price-sale">
                            <?= number_format($prodLeft['prodPriceSale']) ?>
                        </span>
                        <span class="price-orgin">
                            <?= number_format($prodLeft['prodPrice']) ?>
                        </span>
                    </div>
                </div>
                <form action="">
                    <div class="plus-number">
                        <button>
                            <svg width="11" height="3" viewBox="0 0 11 3" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 1.62295C11 2.49263 10.4317 2.67285 9.73077 2.67285L1.26923 2.67227C0.568254 2.67227 1.50475e-08 2.49215 8.74709e-08 1.62247C1.59894e-07 0.752783 0.568255 0.572645 1.26923 0.572645L9.73077 0.572646C10.4317 0.572646 11 0.753261 11 1.62295Z"
                                    fill="#505050" />
                            </svg>
                        </button>
                        <input type="number">
                        <button>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
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
                    <button type="submit">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
        <div class="home-sale-right">
            <div class="title-lowercase">Sản phẩm bán chạy</div>
            <div class="home-sale-right-prod hidden-scroll">
                <?php foreach ($prodRight as $prod): ?>
                    <div class="prod"
                        onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-detail.php?prodId=<?= $prod['SKU'] ?>'">
                        <div class="prod-img">
                            <img src="<?= $prod['imgPath'] ?>" alt="product">
                        </div>
                        <div class="product-detail">
                            <span
                                style="font-weight: 600; font-size: 12px; padding: 5px 0; max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                <?= $prod['prodName'] ?>
                            </span>
                            <span style="font-weight: 500; font-size: 12px;">
                                <?= $prod['prodUnit'] ?>
                            </span>
                            <span style="font-weight: 600; font-size: 16px; color: #0071AF; padding: 5px 0;">
                                <?= number_format($prod['prodPriceSale']) ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <div class="home-product-new">
        <div class="title">SẢN PHẨM MỚI</div>
        <div class="home-product">
            <?php foreach ($products as $prod): ?>
                <div class="product"
                    onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-detail.php?prodId=<?= $prod['SKU'] ?>'">
                    <div class="prod">
                        <div class="prod-img">
                            <img src="<?= $prod['imgPath'] ?>" alt="product">
                        </div>
                        <div class="product-detail">
                            <span
                                style="font-weight: 600; font-size: 12px; padding: 5px 0; max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                <?= $prod['prodName'] ?>
                            </span>
                            <span style="font-weight: 500; font-size: 12px;">
                                <?= $prod['prodUnit'] ?>
                            </span>
                            <span style="font-weight: 600; font-size: 16px; color: #0071AF; padding: 5px 0;">
                                <?= number_format($prod['prodPriceSale']) ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="show-more"
            onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-list.php'"
            style="z-index: 10; font-style: normal; font-weight: 600; font-size: 14px; right:-10px">
            Xem tất cả
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                    fill="#505050" />
            </svg>
        </button>
    </div>
    <div class="home-product-new">
        <div class="title">SẢN PHẨM NỘI ĐỊA</div>
        <div class="home-product">
            <?php foreach ($prods as $prod): ?>
                <div class="product"
                    onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-detail.php?prodId=<?= $prod['SKU'] ?>'">
                    <div class="prod">
                        <div class="prod-img">
                            <img src="<?= $prod['imgPath'] ?>" alt="product">
                        </div>
                        <div class="product-detail">
                            <span
                                style="font-weight: 600; font-size: 12px; padding: 5px 0; max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                <?= $prod['prodName'] ?>
                            </span>
                            <span style="font-weight: 500; font-size: 12px;">
                                <?= $prod['prodUnit'] ?>
                            </span>
                            <span style="font-weight: 600; font-size: 16px; color: #0071AF; padding: 5px 0;">
                                <?= number_format($prod['prodPriceSale']) ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="show-more"
            onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-list.php'"
            style="z-index: 10; font-style: normal; font-weight: 600; font-size: 14px; right:-10px">
            Xem tất cả
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                    fill="#505050" />
            </svg>
        </button>
    </div>
    <div class="home-news">
        <div class="title">TIN TỨC GẦN ĐÂY</div>
        <div class="home-news-post">
            <?php foreach ($newsList as $news): ?>
                <div class="news"
                    onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/news/news-detail.php?newsId=<?= $news['newsId'] ?>'">
                    <div class="compo-news">
                        <div class="news-img">
                            <img src="<?= $news['newsImage'] ?>" alt="" style="border-radius: 6px;">
                            <div class="news-title">
                                <?= $news['newsTitle'] ?>
                            </div>
                            <div class="news-content">
                                <?= $news['newsContent'] ?>
                            </div>
                            <button class="show-more">Xem thêm...</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="show-more" onclick="window.location.href='http://localhost/PharmaDI-Enduser/news/news-list.php'"
            style="font-style: normal; font-weight: 600; font-size: 14px;">
            Xem tất cả
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                    fill="#505050" />
            </svg>
        </button>
    </div>

    <!-- POPUP SIGN IN -->
    <?php require "sign-in.php" ?>
    <?php require "sign-up.php" ?>
    <!-- FOOTER  -->
    <?php require_once "../components/footer.php"; ?>
</body>

</html>
