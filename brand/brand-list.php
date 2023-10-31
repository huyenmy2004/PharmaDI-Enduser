<?php
require_once "../check-login.php";
require "../components/header.php"; 
require "../product/product-pdo.php";
$brand = new Brand();
$brands = $brand->getList();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thương hiệu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F4F7FC]">
    <?php require_once "../components/header.php" ?>
    <div class="flex text-[14px] pt-6 pl-16 cursor-pointer">
        <span onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/home/home.php'">Trang chủ</span>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                fill="#505050" />
        </svg>
        <span class="text-[#0071AF]">Thương hiệu</span>
    </div>
    <span class="pt-6 pl-16 text-[#505050] font-[600]">DANH SÁCH THƯƠNG HIỆU</span>
    <div class="flex pt-6 px-14 text-[#505050] w-full justify-between flex-wrap">
        <?php foreach ($brands as $v): ?>
        <div class="w-1/2 px-2 py-2">
            <div class="w-full bg-white p-3 rounded-[10px]">
                <div class='flex w-full text-[13px] items-center cursor-pointer'>
                    <img src="" alt="">
                    <span class="flex min-w-max py-1 px-2 bg-[#f5f5f5] rounded-[20px]"><?=$brand->countProduct($v['brandId'])[0]['num'];?> sản phẩm</span>
                    <div class='flex w-full justify-end'>
                        <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/product/product-list.php?brandName=<?= $v['brandName'] ?>'">Xem tất cả sản phẩm</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                                fill="#505050" />
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col px-2 py-1">
                    <span class="font-[600] text-[#0071AF]"><?=$v['brandName']?></span>
                    <span class="text-[13px] min-h-[58px] max-h-[58px] overflow-hidden white-space-nowrap"> <?= $v['brandDescription']?> </span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>