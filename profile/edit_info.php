<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaDI - Chỉnh sửa thông tin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images_of_Đoan/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./edit_info.css">
</head>
<body>
    <?php require "../components/header.php"; ?>
    <!-- CONTENT  -->
    <div class="wrapper">
        <div class="container1">
            <div class="header">
                <h4>CHỈNH SỬA THÔNG TIN</h4>
            </div>
            <div class="info">
            <?php
                require_once "EditProfilePage.php";

                $editProfilePage = new EditProfilePage();
                $editProfilePage->displayEditForm();
            ?>

              
            </div>
        </div>
    </div>

    <!-- FOOTER  -->
    <?php require "../components/footer.php"; ?>

</body>
</html>
