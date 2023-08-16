<?php
class EditProfilePage {
    public function displayEditForm() {
        require_once "../connect-db.php";

        if (isset($_GET['cusId'])) {
            $id_khach_hang = $_GET['cusId'];
        } else {
            echo "Không có dữ liệu.";
            exit; 
        }

        $conn = connectDB();

        $sql = "SELECT * FROM customer WHERE cusId = '$id_khach_hang'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo '<form action="update_info.php?cusId=' . $id_khach_hang . '" method="POST">';
            echo '<label for="ten_nha_thuoc"><strong class="label">Tên nhà thuốc</strong></label>';
            echo '<input type="text"  class="input" id="ten_nha_thuoc" name="ten_nha_thuoc" value="' . $row["cusName"] . '"><br>';

            echo '<label for="nguoi_lien_he"><strong class="label">Người liên hệ</strong></label>';
            echo '<input type="text"  class="input" id="nguoi_lien_he" name="nguoi_lien_he" value="' . $row["cusContact"] . '"><br>';

            echo '<label for="so_dien_thoai"><strong class="label">Số điện thoại</strong></label>';
            echo '<input type="text"  class="input" id="so_dien_thoai" name="so_dien_thoai" value="' . $row["cusPhone"] . '"><br>';

            echo '<label for="dia_chi"><strong class="label">Địa chỉ</strong></label>';
            echo '<input type="text"  class="input" id="dia_chi" name="dia_chi" value="' . $row["cusAddress"] . '"><br>';

            echo '<label for="so_GPP"><strong class="label">Số GPP</strong></label>';
            echo '<input type="text" class="input" id="so_GPP" name="so_GPP" value="' . $row["cusGPP"] . '"><br>';

            echo '<label for="ngay_cap"><strong class="label">Ngày cấp</strong></label>';
            echo '<input type="text" class="input" id="ngay_cap" name="ngay_cap" value="' . $row["cusGPPDate"] . '"><br>';

            echo '<label for="noi_cap"><strong class="label">Nơi cấp</strong></label>';
            echo '<input type="text" class="input" id="noi_cap" name="noi_cap" value="' . $row["cusGPPAddr"] . '"><br>';

            echo '<div class="container2">';
            echo '<button type="submit" class="cancel1" formaction="profile.php">Hủy bỏ</button>';
            echo '<button type="submit" class="update1" style="background-color: rgb(3, 109, 166);
            color: #ffffff;">Chỉnh sửa</button>';
            echo '</div>';

            echo '</form>';
        } else {
            echo "Không tìm thấy thông tin khách hàng.";
        }

        // Đóng kết nối
        $conn->close();
    }
}
?>
