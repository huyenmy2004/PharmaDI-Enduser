<?php
require_once "../connect-db.php";
require_once "UpdateProfilePage.php";

if (isset($_GET['cusId'])) {
    $id_khach_hang = $_GET['cusId'];
} else {
    echo "Không có dữ liệu.";
    exit;
}

$ten_nha_thuoc = $_POST["ten_nha_thuoc"];
$nguoi_lien_he = $_POST["nguoi_lien_he"];
$so_dien_thoai = $_POST["so_dien_thoai"];
$dia_chi = $_POST["dia_chi"];
$so_GPP = $_POST["so_GPP"];
$ngay_cap = $_POST["ngay_cap"];
$noi_cap = $_POST["noi_cap"];

$conn = connectDB();

$updateProfilePage = new UpdateProfilePage($conn);
$updateProfilePage->updateProfile(
    $id_khach_hang,
    $ten_nha_thuoc,
    $nguoi_lien_he,
    $so_dien_thoai,
    $dia_chi,
    $so_GPP,
    $ngay_cap,
    $noi_cap
);
?>
