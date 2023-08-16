<?php
class ProfilePage {
    public function displayProfile() {
        require_once "./connect-db.php";

        $conn = connectDB();

        $sql = "SELECT * FROM customer LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<a href="edit_info.php?cusId=' . $row["cusId"] . '" class="editButton">Sửa thông tin</a>';
            // Hiển thị thông tin của khách hàng như trước
            echo "<p><strong class='label'>Tên nhà thuốc</strong> <span class='value'>" . $row["cusName"] . "</span></p>";
            echo "<p><strong class='label'>Người liên hệ</strong> <span class='value'>" . $row["cusContact"] . "</span></p>";
            echo "<p><strong class='label'>Số điện thoại</strong> <span class='value'>" . $row["cusPhone"] . "</span></p>";
            echo "<p><strong class='label'>Địa chỉ</strong> <span class='value'>" . $row["cusAddress"] . "</span></p>";
            echo "<p><strong class='label'>Số GPP</strong> <span class='value'>" . $row["cusGPP"] . "</span></p>";
            echo "<p><strong class='label'>Ngày cấp</strong> <span class='value'>" . $row["cusGPPDate"] . "</span></p>";
            echo "<p><strong class='label'>Nơi cấp</strong> <span class='value'>" . $row["cusGPPAddr"] . "</span></p>";
            if (isset($_SESSION['success_message'])) {
                echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']); // Xóa thông báo sau khi đã hiển thị
            }
        } else {
            echo "Không có dữ liệu.";
        }
        $conn->close();
    }
}
?>
