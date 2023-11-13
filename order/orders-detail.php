<?php
require_once "order-pdo.php";
$order = new Order();
// print_r($order->detail($_GET['orderId']))
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <script src="cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F4F7FC]">
    <?php require_once "../components/header.php"; ?>
    <div class="flex justify-center">
        <div class="bg-white flex flex-col m-12 p-8 rounded-[10px] max-w-max max-h-max">
            <div class="flex items-center">
                <svg onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=0'"
                    class="cursor-pointer" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                        fill="#0071AF" />
                </svg>
                <span class="text-[18px] font-[600] text-[#0071AF]">CHI TIẾT ĐƠN HÀNG</span>
            </div>
            <div class="flex">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Tên nhà thuốc</span>
                    <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['cusName']?>" readonly width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Người liên hệ</span>
                    <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['cusContact']?>" readonly width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Ngày đặt hàng</span>
                    <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['orderDate']?>" readonly width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Trạng thái đơn hàng</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['orderStatus'] == 1 ? "Chờ xác nhận" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 2 ? "Đã xác nhận" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 3 ? "Đang giao hàng" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 4 ? "Đã giao hàng" : "Đã huỷ"))) ?>" readonly width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Số điện thoại</span>
                    <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['cusPhone']?>" readonly width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Địa chỉ</span>
                    <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['cusAddress']?>" readonly width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div>
                <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Ghi chú</span>
                <input type="text" value="<?=$order->detail($_GET['orderId'])[0]['orderNote']?>" readonly
                    class="flex border border-solid rounded-[6px] border-[#d8d8d8] px-2.5 w-full h-[50px]">
            </div>
            <div class="flex flex-col mt-4 border border-solid border-[#d8d8d8] py-4 px-6 rounded-[6px] text-[#505050]">
                <?php foreach($order->brandInOrder($_GET['orderId']) as $brand) : ?>
                <span class="text-[18px] font-[600] text-[#505050] pb-2"><?= $brand['brandName']?></span>
                <div class="flex grid grid-cols-12 text-[13px] pt-2 pb-2 border-solid border-[#f6f6f6] font-[600]">
                    <span class="col-span-7">Tên sản phẩm</span>
                    <span class="col-span-3">Số lượng</span>
                    <span class="col-span-2">Đơn giá</span>
                </div>
                <?php foreach($order->detail($_GET['orderId']) as $v) : 
                    if($v['brandName'] == $brand['brandName'])
                    ?>
                <div class="flex grid grid-cols-12 text-[13px] pt-2 border-t-2 pb-2 border-solid border-[#f6f6f6]">
                    <div class="col-span-7 flex">
                        <img class="object-cover h-[70px] w-[70px] pr-2" src="<?= $v['imgPath'] ?>" alt="">
                        <span class="pl-2 pt-2"><?= $v['prodName'] ?></span>
                    </div>
                    <span class="col-span-3 pt-2"> 1</span>
                    <span class="col-span-2 pt-2"><?= number_format($v['prodOldPrice']) ?> VND</span>
                </div>
                <?php endforeach; ?>
                <?php endforeach ?>
            </div>
            <div class="flex flex-col text-[14px] border border-solid border-[#d8d8d8] rounded-[6px] py-2 mt-4 px-2.5">
                <div class="flex justify-between pb-1">
                    <span>Số lượng</span>
                    <span>13 (sản phẩm)</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-[600]"> Thành tiền </span>
                    <span class="font-[600] text-[#0071AF]"> 100.000 VND </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>