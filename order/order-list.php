<?php
require_once "../check-login.php";
require_once "order-pdo.php";
$order = new Order();
// print_r($order->countDataByStatus(0));
// echo count($order->getDataByStatus(0));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <script src="cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F4F7FC]">
    <?php require_once "../components/header.php"; ?>
    <div class="flex justify-center">
        <div class="bg-white flex flex-col m-12 p-8 rounded-[10px] max-w-max max-h-max">
            <span class="text-[18px] font-[600] text-[#0071AF] mb-3">ĐƠN HÀNG CỦA BẠN</span>
            <div>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=0'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 0 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid  py-1.5 px-2.5 text-[13px] rounded-[20px] mr-2">Tất
                    cả (<?=$order->countStatus(null)[0]['num']?>)</span>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=1'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 1 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid py-1.5 px-2.5 text-[#505050] text-[13px] rounded-[20px] mr-2">Chờ
                    xác nhận (<?=$order->countStatus(1)[0]['num']?>)</span>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=2'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 2 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid py-1.5 px-2.5 text-[#505050] text-[13px] rounded-[20px] mr-2">Đã
                    xác nhận (<?=$order->countStatus(2)[0]['num']?>)</span>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=3'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 3 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid py-1.5 px-2.5 text-[#505050] text-[13px] rounded-[20px] mr-2">Đang
                    giao hàng (<?=$order->countStatus(3)[0]['num']?>)</span>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=4'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 4 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid py-1.5 px-2.5 text-[#505050] text-[13px] rounded-[20px] mr-2">Đã
                    giao hàng (<?=$order->countStatus(4)[0]['num']?>)</span>
                <span onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/order-list.php?status=5'"
                    class="<?= isset($_GET['status']) ? ($_GET['status'] == 5 ? 'bg-[#0071AF] text-white border-white' : 'border-[#d8d8d8] bg-white text-[#505050]') : ''?> border border-solid py-1.5 px-2.5 text-[#505050] text-[13px] rounded-[20px]">Đã
                    huỷ (<?=$order->countStatus(5)[0]['num']?>)</span>
            </div>
            <?php 
                $i = 0;
                $count = count($order->getDataByStatus($_GET['status']));
                foreach ($order->getDataByStatus($_GET['status']) as $v) : 
            ?>
            <div class="mt-3 w-full border border-solid py-4 px-4 rounded-[10px] flex flex-col">
                <div class="flex w-full" onclick="window.location.href='http://localhost/PharmaDI-Enduser/order/orders-detail.php?orderId=<?=$v['orderId']?>'">
                    <img src="<?= $v['imgPath'] ?>" alt="" class="mr-3 w-full object-cover h-[90px] max-w-[90px] bg-red">
                    <div class="flex flex-col w-full">
                        <span
                            class="text-[#0071AF] text-[10px] px-2 py-1 rounded-[20px] font-[600] outline-none bg-[#EFFAFF] max-w-max max-h-max"><?= $v['orderStatus'] == 1 ? "Chờ xác nhận" : ($v['orderStatus'] == 2 ? "Đã xác nhận" : ($v['orderStatus'] == 3 ? "Đang giao hàng" : ($v['orderStatus'] == 4 ? "Đã giao hàng" : "Đã huỷ"))) ?></span>
                        <span class="text-[14px] text-[#505050] py-1"><?= $v['prodName'] ?></span>
                        <div class="flex w-full justify-between">
                            <span class="text-[#0071AF] text-[14px] font-[600]"><?= number_format($v['prodPriceSale']) ?>đ</span>
                            <span class="text-[13px] text-[#505050] px-1">Xem thêm ></span>
                        </div>
                    </div>
                </div>
                <div class="w-full border mt-3 border-[#f6f6f6]"></div>
                <div class="flex justify-between">
                    <span class="text-[13px] text-[#505050] pt-2.5">Tổng: <?= $order->countDataByStatus($_GET['status'])[$i]['num']?> sản phẩm</span>
                    <span class="text-[13px] text-[#0071AF] font-[600] pt-2.5">Thành tiền: <?= number_format($order->countDataByStatus($_GET['status'])[$i]['total'])  ?> VND</span>
                </div>
            </div>
            <?php 
                // echo $i ;
                // echo $count;
                $i < $count ? $i++ : '';
                endforeach; ?>
        </div>
    </div>
<?php require_once "../components/footer.php" ?>
</body>
</html>
<script>

</script>