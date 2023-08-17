
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaDI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images_of_Đoan/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./profile.css">
</head>
<body>
    <?php require "../components/header.php"; ?>
    <!-- CONTENT  -->
    <div class="wrapper">
        <div class="container1">
            <div class="header">
                <h4 style="font-weight: 600">THÔNG TIN TÀI KHOẢN</h4>
            </div>
            <?php
                require_once "ProfilePage.php";
                $profilePage = new ProfilePage();
                $profilePage->displayProfile($_SESSION['cusId']);
            ?>
           
        </div>
    </div>

    <!-- FOOTER  -->
    <?php require "../components/footer.php"; ?>

</body>
</html>
