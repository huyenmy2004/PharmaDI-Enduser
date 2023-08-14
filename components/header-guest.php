<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo-shortcut.png" type="images/x-icon">
    <script src="../assets/js/script.js"></script>
</head>
<style> 
body{
    font-family: "Inter";
    height: 100vh;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
button:hover{
    cursor: pointer;
}
/* MENU TOP */
.menu-top{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    color: #505050;
    padding: 0px 0 8px 0;
    border-bottom: 1px solid #d8d8d8;
}
.logo{
    display: flex;
    padding-left: 30px;
    font-size: 28px;
    font-weight: 600;
    letter-spacing: 1px;
}
.menu-mid{
    display: flex;
    width: 900px;
    max-width: 60%;
    border: 1px solid #d8d8d8;
    color: #d8d8d8;
    border-radius: 6px;
    font-size: 12px;
    >form{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin: 0;
        >svg{
            width: 5%;
            max-width: 20px;
        }
        >button{
            border: none;
            background-color: transparent;
            padding-right: 20px;
        }
    }
}
.menu-mid:focus-within{
    border: 1px solid #0071AF;
}
.search{
    padding: 12px 30px 12px 20px;
    border: 0px;
    border-radius: 6px;
    width: 95%;
    outline-style: none;
    font-size: 12px;
}
.menu-right{
    display: flex;
    min-width: max-content;
    justify-content: right;
    margin-right: 30px;
    >button{
        font-size: 12px;
    }
}
/* MENU BOTTOM */
.menu-bottom{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    border-bottom: 1px solid #d8d8d8;
    background-color: #f9f9f9;
    >a{
        text-decoration: none;
        padding: 15px 20px;
        color: #505050;
        font-weight: 400;
    }
}
.menu-active{
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
            <input type="text" placeholder="Nhập nội dung tìm kiếm..." class="search">
            <button>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58332 2.29166C5.55625 2.29166 2.29166 5.55625 2.29166 9.58332C2.29166 13.6104 5.55625 16.875 9.58332 16.875C13.6104 16.875 16.875 13.6104 16.875 9.58332C16.875 5.55625 13.6104 2.29166 9.58332 2.29166ZM1.04166 9.58332C1.04166 4.86589 4.86589 1.04166 9.58332 1.04166C14.3008 1.04166 18.125 4.86589 18.125 9.58332C18.125 11.7171 17.3426 13.6681 16.049 15.1652L18.7753 17.8914C19.0193 18.1355 19.0193 18.5312 18.7753 18.7753C18.5312 19.0193 18.1355 19.0193 17.8914 18.7753L15.1652 16.049C13.6681 17.3426 11.7171 18.125 9.58332 18.125C4.86589 18.125 1.04166 14.3008 1.04166 9.58332Z" fill="#505050"/>
                </svg>                
            </button>
        </form>
    </div> -->
    <div class="menu-right">
        <button style="border: 1px solid #0071AF; background-color: #0071AF; color: white; border-radius: 30px; padding: 10px 20px; margin: 10px" id="sign-in">Đăng nhập</button>
        <button style="border: 1px solid #d8d8d8; border-radius: 30px; padding: 10px 20px; margin: 10px" id="sign-up">Đăng ký</button>
    </div>
</div>
<div class="menu-bottom">
    <a href="http://localhost/PharmaDI/layout/home.php" class="menu-active" id="home" onclick="menuActive('home')">TRANG CHỦ</a>
    <a href="" id="product" onclick="menuActive('product')">SẢN PHẨM</a>
    <a href="" id="brand" onclick="menuActive('brand')">THƯƠNG HIỆU</a>
    <a href="http://localhost/PharmaDI/layout/news-list.php" id="news" onclick="menuActive('news')">TIN TỨC</a>
</div>
</div>