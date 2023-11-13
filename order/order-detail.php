<?php
require_once "order-pdo.php";
$order = new Order();
// print_r($order->detail($_GET['orderId']));
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
            <div class="flex items-center cursor-pointer">
            <svg onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=0'"
            width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.09327 0.692102C1.35535 0.467463 1.74991 0.497814 1.97455 0.759893L6.97455 6.59323C7.17517 6.82728 7.17517 7.17266 6.97455 7.40672L1.97455 13.24C1.74991 13.5021 1.35535 13.5325 1.09327 13.3078C0.831188 13.0832 0.800837 12.6886 1.02548 12.4266L5.67684 6.99997L1.02548 1.57338C0.800837 1.3113 0.831188 0.916741 1.09327 0.692102Z"
                                fill="#0071AF" />
                        </svg>
                <span class="text-[18px] font-[600] text-[#0071AF] pl-2">ĐƠN HÀNG CỦA BẠN</span>
            </div>
            <div class="flex mt-3">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Tên nhà thuốc</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['cusName'] ?>" readonly
                        width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Người liên hệ</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['cusContact'] ?>" readonly
                        width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Ngày đặt hàng</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['orderDate'] ?>" readonly
                        width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Trạng thái đơn hàng</span>
                    <input type="text"
                        value="<?= $order->detail($_GET['orderId'])[0]['orderStatus'] == 1 ? "Chờ xác nhận" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 2 ? "Đã xác nhận" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 3 ? "Đang giao hàng" : ($order->detail($_GET['orderId'])[0]['orderStatus'] == 4 ? "Đã giao hàng" : "Đã huỷ"))) ?>"
                        readonly width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Số điện thoại</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['cusPhone'] ?>" readonly
                        width="350px"
                        class="mr-14 px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col">
                    <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Địa chỉ</span>
                    <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['cusAddress'] ?>" readonly
                        width="350px"
                        class="px-2.5 pl-[10px] py-[6px] w-[400px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
            </div>
            <div>
                <span class="text-[14px] font-[500] text-[#505050] py-1 pt-2 ml-2">Ghi chú</span>
                <input type="text" value="<?= $order->detail($_GET['orderId'])[0]['orderNote'] ?>" readonly
                    class="flex border border-solid rounded-[6px] border-[#d8d8d8] px-2.5 w-full h-[50px]">
            </div>
            <div class="flex flex-col mt-4 border border-solid border-[#d8d8d8] py-4 px-6 rounded-[6px] text-[#505050]">
                <?php foreach ($order->brandInOrder($_GET['orderId']) as $brand): ?>
                    <span class="text-[18px] font-[600] text-[#505050] pb-2">
                        <?= $brand['brandName'] ?>
                    </span>
                    <div class="flex grid grid-cols-12 text-[13px] pt-2 pb-2 border-solid border-[#f6f6f6] font-[600]">
                        <span class="col-span-7">Tên sản phẩm</span>
                        <span class="col-span-3">Số lượng</span>
                        <span class="col-span-2">Đơn giá</span>
                    </div>
                    <?php foreach ($order->detail($_GET['orderId']) as $v):
                        if ($v['brandName'] == $brand['brandName'])
                        ?>
                        <div class="flex grid grid-cols-12 text-[13px] pt-2 border-t-2 pb-2 border-solid border-[#f6f6f6]">
                            <div class="col-span-7 flex">
                                <img class="object-cover h-[70px] w-[70px] pr-2" src="<?= $v['imgPath'] ?>" alt="">
                                <span class="pl-2 pt-2">
                                    <?= $v['prodName'] ?>
                                </span>
                            </div>
                            <span class="col-span-3 pt-2">
                                <?= $v['prodNumber'] ?>
                            </span>
                            <span class="col-span-2 pt-2">
                                <?= number_format($v['prodOldPrice']) ?> VND
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach ?>
            </div>
            <div class="flex flex-col text-[14px] border border-solid border-[#d8d8d8] rounded-[6px] py-2 mt-4 px-2.5">
                <div class="flex justify-between pb-1">
                    <span>Số lượng</span>
                    <span>
                        <?= $order->detail($_GET['orderId'])[0]['num'] ?> (sản phẩm)
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="font-[600]"> Thành tiền </span>
                    <span class="font-[600] text-[#0071AF]">
                        <?= number_format($order->detail($_GET['orderId'])[0]['total']) ?> VND
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>