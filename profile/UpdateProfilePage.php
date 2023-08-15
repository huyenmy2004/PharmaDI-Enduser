<?php
class UpdateProfilePage {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function updateProfile($id, $name, $contact, $phone, $address, $gpp, $gppDate, $gppAddr) {
        $sql = "UPDATE customer SET 
            cusName = '$name',
            cusContact = '$contact',
            cusPhone = '$phone',
            cusAddress = '$address',
            cusGPP = '$gpp',
            cusGPPDate = '$gppDate',
            cusGPPAddr = '$gppAddr'
        WHERE cusId = '$id'";

        if ($this->conn->query($sql) === TRUE) {
            // Hiển thị thông báo cập nhật thành công
            session_start();
            $_SESSION['success_message'] = "Cập nhật thông tin thành công.";

            // Chuyển hướng trở lại trang xem thông tin ban đầu
            header("Location: profile.php");
        } else {
            echo "Có lỗi xảy ra khi cập nhật thông tin: " . $this->conn->error;
        }
    }
}
?>
