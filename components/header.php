<?php
require_once "../cart/cart-pdo.php"; 
$cart = new Cart();
$cartTotalNum = $cart->totalNum();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo-shortcut.png" type="images/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        font-family: "Inter";
        height: 100vh;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: white;
    }

    button:hover {
        cursor: pointer;
    }

    /* MENU TOP */
    .menu-top {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        color: #505050;
        padding: 10px 0 8px 0;
        border-bottom: 1px solid #d8d8d8;
        background-color: white;

    }

    .logo {
        display: flex;
        padding-left: 30px;
        font-size: 28px;
        font-weight: 600;
        letter-spacing: 1px;
        max-width: 20%;
    }

    .menu-mid {
        display: flex;
        width: 900px;
        max-width: 60%;
        border: 1px solid #d8d8d8;
        color: #d8d8d8;
        border-radius: 6px;
        font-size: 12px;
        background-color: white;

        >form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin: 0;

            >svg {
                width: 5%;
                max-width: 20px;
            }

            >button {
                border: none;
                background-color: transparent;
                padding-right: 20px;
                display: flex;
                align-items: center;
            }
        }
    }

    .menu-mid:focus-within {
        border: 1px solid #0071AF;
    }

    .search {
        padding: 12px 30px 12px 20px;
        border: 0px;
        border-radius: 6px;
        width: 95%;
        outline-style: none;
        font-size: 12px;
    }

    .menu-right {
        display: flex;
        max-width: 20%;
        min-width: max-content;
        justify-content: right;
        margin-right: 20px;

        >button {
            font-size: 12px;
        }
    }

    .menu-right-cart {
        position: relative;
        display: flex;
        align-items: center;
        padding: 10px 10px;
        margin: 5px 0;
    }

    .menu-right-cart:hover {
        cursor: pointer;
    }

    .menu-right-account {
        display: flex;
        align-items: center;
        padding: 10px 10px;
        margin: 5px 0;
    }

    /* MENU BOTTOM */
    .menu-bottom {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        border-bottom: 1px solid #d8d8d8;
        background-color: white;

        >a {
            text-decoration: none;
            padding: 15px 20px;
            color: #505050;
            font-weight: 400;
        }
    }

    .menu-active {
        color: #0071AF !important;
        font-weight: 600 !important;
    }
</style>
<div class="menu">
    <div class="menu-top">
        <div class="logo">
            <span style="color: #0071AF">PHARMA</span>
            <span style="color: #15A5E3">DI</span>
        </div>
        <!-- <div class="menu-mid">
        <form action="">
            <input type="text" placeholder="Nhập tên sản phẩm..." class="search">
            <button>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58332 2.29166C5.55625 2.29166 2.29166 5.55625 2.29166 9.58332C2.29166 13.6104 5.55625 16.875 9.58332 16.875C13.6104 16.875 16.875 13.6104 16.875 9.58332C16.875 5.55625 13.6104 2.29166 9.58332 2.29166ZM1.04166 9.58332C1.04166 4.86589 4.86589 1.04166 9.58332 1.04166C14.3008 1.04166 18.125 4.86589 18.125 9.58332C18.125 11.7171 17.3426 13.6681 16.049 15.1652L18.7753 17.8914C19.0193 18.1355 19.0193 18.5312 18.7753 18.7753C18.5312 19.0193 18.1355 19.0193 17.8914 18.7753L15.1652 16.049C13.6681 17.3426 11.7171 18.125 9.58332 18.125C4.86589 18.125 1.04166 14.3008 1.04166 9.58332Z" fill="#505050"/>
                </svg>                
            </button>
        </form>
    </div> -->
        <div class="menu-right">
            <div class="menu-right-cart">
                <svg width="24" height="22" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.71685 0.270053C1.24467 0.104046 0.72732 0.352244 0.561313 0.82442C0.395306 1.2966 0.643504 1.81395 1.11568 1.97995L1.43131 2.09092C2.238 2.37454 2.76816 2.56249 3.15826 2.7539C3.52466 2.93368 3.68618 3.0792 3.79258 3.23491C3.90165 3.39452 3.98587 3.61374 4.0334 4.05278C4.08313 4.5122 4.08436 5.11059 4.08436 6.00469V9.29334C4.08436 11.0485 4.10082 12.314 4.26643 13.281C4.44324 14.3133 4.79623 15.0523 5.45627 15.7485C6.17385 16.5053 7.08349 16.8348 8.16644 16.9884C9.20347 17.1355 10.5204 17.1354 12.1464 17.1354L18.6784 17.1354C19.5746 17.1355 20.3286 17.1355 20.9388 17.0608C21.5861 16.9816 22.1765 16.8084 22.6919 16.3884C23.2072 15.9685 23.496 15.4252 23.7043 14.8072C23.9006 14.2246 24.0528 13.4861 24.2337 12.6084L24.8487 9.6246L24.8498 9.61905L24.8624 9.55587C25.0614 8.55913 25.2288 7.72068 25.2704 7.0463C25.3141 6.33797 25.2335 5.63954 24.7721 5.03974C24.4882 4.67068 24.089 4.46176 23.7259 4.33418C23.3556 4.20405 22.9368 4.12877 22.5142 4.08153C21.684 3.98872 20.6755 3.98874 19.6863 3.98875L5.84829 3.98875C5.84432 3.94434 5.84002 3.90067 5.83537 3.85773C5.77045 3.25794 5.62978 2.71091 5.28905 2.2123C4.94567 1.7098 4.4891 1.38797 3.95667 1.12673C3.45873 0.882403 2.82601 0.659978 2.08104 0.398094L1.71685 0.270053ZM5.89685 5.80125H19.6486C20.6834 5.80125 21.5941 5.80246 22.3128 5.88281C22.67 5.92273 22.9372 5.97819 23.1251 6.04418C23.2786 6.09812 23.3305 6.14217 23.338 6.14854C23.3383 6.14881 23.3379 6.14841 23.338 6.14854C23.4121 6.24691 23.4928 6.42538 23.4613 6.93464C23.4283 7.47061 23.2875 8.18626 23.0729 9.26159L23.0723 9.26427L22.4696 12.1886C22.2746 13.1345 22.1434 13.7633 21.9867 14.2284C21.8379 14.6698 21.6982 14.8601 21.5469 14.9834C21.3956 15.1067 21.1811 15.2051 20.7186 15.2617C20.2315 15.3213 19.5892 15.3229 18.6234 15.3229H12.2157C10.5038 15.3229 9.31589 15.3208 8.42092 15.1939C7.55719 15.0714 7.1009 14.8488 6.77157 14.5014C6.38471 14.0934 6.17604 13.6938 6.05292 12.975C5.9186 12.1907 5.89686 11.0926 5.89686 9.29334L5.89685 5.80125Z"
                        fill="#505050" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.0621 23.7813C6.56057 23.7813 5.34335 22.564 5.34335 21.0625C5.34335 19.561 6.56057 18.3438 8.0621 18.3438C9.56362 18.3438 10.7808 19.561 10.7808 21.0625C10.7808 22.564 9.56362 23.7813 8.0621 23.7813ZM7.15585 21.0625C7.15585 21.563 7.56159 21.9688 8.0621 21.9688C8.5626 21.9688 8.96835 21.563 8.96835 21.0625C8.96835 20.562 8.5626 20.1563 8.0621 20.1563C7.56159 20.1563 7.15585 20.562 7.15585 21.0625Z"
                        fill="#505050" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.9371 23.7813C17.4356 23.7813 16.2183 22.5641 16.2183 21.0626C16.2183 19.5611 17.4356 18.3438 18.9371 18.3438C20.4386 18.3438 21.6558 19.5611 21.6558 21.0626C21.6558 22.5641 20.4386 23.7813 18.9371 23.7813ZM18.0308 21.0626C18.0308 21.5631 18.4366 21.9688 18.9371 21.9688C19.4376 21.9688 19.8433 21.5631 19.8433 21.0626C19.8433 20.5621 19.4376 20.1563 18.9371 20.1563C18.4366 20.1563 18.0308 20.5621 18.0308 21.0626Z"
                        fill="#505050" />
                </svg>
                <span style="
                background-color: #D30000;
                border-radius: 50px;
                padding: 4px 4px;
                width: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 20px;
                position: absolute;
                left: 22px;
                top: 0px;
                font-size: 10px;
                color: #FFFFFF;"><?= $cartTotalNum['total'] > 0 ? $cartTotalNum['total'] : 0 ?></span>
                <span style="font-size: 13px; padding-left: 12px;"
                    onclick="window.location.href='http://localhost/PharmaDI-Enduser/cart/cart-list.php'">Giỏ hàng</span>
            </div>
            <div class="menu-right-account"  onclick="showDroplist('profile')">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.93783 9.74996C8.93783 7.5063 10.7567 5.68746 13.0003 5.68746C15.244 5.68746 17.0628 7.5063 17.0628 9.74996C17.0628 11.9936 15.244 13.8125 13.0003 13.8125C10.7567 13.8125 8.93783 11.9936 8.93783 9.74996ZM13.0003 7.31246C11.6541 7.31246 10.5628 8.40377 10.5628 9.74996C10.5628 11.0962 11.6541 12.1875 13.0003 12.1875C14.3465 12.1875 15.4378 11.0962 15.4378 9.74996C15.4378 8.40377 14.3465 7.31246 13.0003 7.31246Z"
                        fill="#505050" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.35449 13C1.35449 6.56814 6.56851 1.35413 13.0003 1.35413C19.4321 1.35413 24.6462 6.56814 24.6462 13C24.6462 19.4318 19.4321 24.6458 13.0003 24.6458C6.56851 24.6458 1.35449 19.4318 1.35449 13ZM13.0003 2.97913C7.46597 2.97913 2.97949 7.46561 2.97949 13C2.97949 15.7577 4.09345 18.2552 5.89594 20.0671C6.09137 19.0129 6.47534 18.0189 7.24606 17.2196C8.39889 16.0241 10.2423 15.4375 13.0003 15.4375C15.7582 15.4375 17.6017 16.0241 18.7545 17.2196C19.5252 18.0189 19.9092 19.0129 20.1046 20.0672C21.9072 18.2553 23.0212 15.7577 23.0212 13C23.0212 7.46561 18.5347 2.97913 13.0003 2.97913ZM18.6268 21.2933C18.5164 19.9804 18.2314 19.0182 17.5847 18.3476C16.8811 17.6179 15.5775 17.0625 13.0003 17.0625C10.4231 17.0625 9.11941 17.6179 8.41582 18.3476C7.7692 19.0182 7.48411 19.9803 7.37374 21.2932C8.97774 22.3836 10.9146 23.0208 13.0003 23.0208C15.086 23.0208 17.0228 22.3836 18.6268 21.2933Z"
                        fill="#505050" />
                </svg>
                <span style="font-size: 13px; padding: 0 5px; "><?=$_SESSION['username']?></span>
                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.3075 7.09327C16.5322 7.35535 16.5018 7.74991 16.2397 7.97455L10.4064 12.9745C10.1724 13.1752 9.82697 13.1752 9.59292 12.9745L3.75959 7.97455C3.49751 7.74991 3.46716 7.35534 3.69179 7.09327C3.91643 6.83119 4.311 6.80084 4.57307 7.02548L9.99966 11.6768L15.4263 7.02548C15.6883 6.80084 16.0829 6.83119 16.3075 7.09327Z"
                        fill="#505050" />
                </svg>
                <div class="absolute top-[60px] right-[10px] w-max flex flex-col bg-white z-1 w-[120px] py-1 rounded-[6px] border border-[#d8d8d8] text-[13px] hidden"
                id="profile">
                        <span class="hover:bg-gray-100 px-[20px] py-[2px] text-[#505050] w-max" onclick="window.location.href='http://localhost/PharmaDI-Enduser/profile/profile.php'">
                            Trang cá nhân
                        </span>
                        <span class="hover:bg-gray-100 px-[20px] py-[2px] text-[#505050] w-max" onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=0'">
                            Đơn hàng của tôi
                        </span>
                        <span class="hover:bg-gray-100 px-[20px] py-[2px] text-[#505050] w-max" onclick="window.location.href='../log-out.php'">
                            Đăng xuất
                        </span>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-bottom">
        <a href="http://localhost/PharmaDI-Enduser/home/home.php" class="menu-active" id="home"
            onclick="menuActive('home')">TRANG CHỦ</a>
        <a href="http://localhost/PharmaDI-Enduser/product/product-list.php" id="product"
            onclick="menuActive('product')">SẢN PHẨM</a>
        <a href="http://localhost/PharmaDI-Enduser/brand/brand-list.php" id="brand" onclick="menuActive('brand')">THƯƠNG
            HIỆU</a>
        <a href="http://localhost/PharmaDI-Enduser/news/news-list.php" id="news" onclick="menuActive('news')">TIN
            TỨC</a>
    </div>
</div>
<script>
    switch (window.location.href) {
        case "http://localhost/PharmaDI-Enduser/home/home.php":
            document.querySelector('.menu-active').classList.toggle('menu-active')
            document.getElementById('home').classList.add('menu-active')
            break;
        case "http://localhost/PharmaDI-Enduser/product/product-list.php":
            document.querySelector('.menu-active').classList.toggle('menu-active')
            document.getElementById('product').classList.add('menu-active')
            break;
        case "http://localhost/PharmaDI-Enduser/brand/brand-list.php":
            document.querySelector('.menu-active').classList.toggle('menu-active')
            document.getElementById('brand').classList.add('menu-active')
            break;
        case "http://localhost/PharmaDI-Enduser/news/news-list.php":
            document.querySelector('.menu-active').classList.toggle('menu-active')
            document.getElementById('news').classList.add('menu-active')
            break;
        default:
            break;
    }
    function showDroplist(id) {
        var dropList = document.getElementById(id);
        dropList.classList.toggle('hidden');
    }
</script>