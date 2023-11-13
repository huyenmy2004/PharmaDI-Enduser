<?php
require_once("profile-pdo.php");
$profile = new Profile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F4F7FC]">
    <?php require_once "../components/header.php"; ?>
    <div class="flex justify-center">
        <div class="flex bg-white rounded-[10px] max-w-max max-h-max m-12 p-8 justify-center items-center">
            <form action="action-edit.php" method="POST">
                <span class="text-[18px] font-[600] text-[#0071AF]" style="margin-bottom: 10px">THÔNG TIN CÁ NHÂN</span>
                <div class="flex flex-col py-1 text-[#505050]">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Tên nhà thuốc</span>
                        <span class="text-[#ff0000] text-[14px]">*</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusName']?>" width="1000px" name="cusName"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Người liên hệ</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusContact']?>" width="1000px" name="cusContact"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Số điện thoại</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusPhone']?>" width="1000px" name="cusPhone"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Địa chỉ</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusAddress']?>" width="1000px" name="cusAddress"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Số GPP</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusGPP']?>" width="1000px" name="cusGPP"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Ngày cấp</span>
                    </div>
                    <input type="date" value="<?=$profile->detail()[0]['cusGPPDate']?>" width="1000px" name="cusGPPDate"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <div class="flex flex-col pb-1">
                    <div>
                        <span class="text-[14px] font-[500] text-[#505050] py-2">Nơi cấp</span>
                    </div>
                    <input type="text" value="<?=$profile->detail()[0]['cusGPPAddr']?>" width="1000px" name="cusGPPAddr"
                        class="px-2.5 pl-[10px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px] focus-within:border-[#0071AF] focus-within:border focus-within:border-solid outline-0 text-[13px]">
                </div>
                <button type="submit" class="w-full bg-[#0071AF] text-white text-[14px] rounded-[20px] py-2 mt-4">Lưu thay đổi</button>
            </form>
        </div>
    </div>
    <?php require_once "../components/footer.php" ?>
</body>

</html>