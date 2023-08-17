<!-- MENU  -->
<?php require "../components/header.php";
require_once "news-pdo.php";
$news = new News();
$newsList = $news->getData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tin tức</title>
    <style>
        .news-list {
            padding-bottom: 30px;
            background-color: #F4F7FC;
        }

        .news-breadcrumb:hover {
            cursor: pointer;
        }

        .news-detail {
            display: flex;
            flex-direction: column;
            background-color: #F8F8F8;
        }

        .news-breadcrumb {
            display: flex;
            padding-left: 80px;
        }

        .news-breadcrumb-black {
            display: flex;
            align-items: center;
            color: #505050;
            font-size: 14px;
            padding-top: 25px;
        }

        .news-breadcrumb-blue {
            color: #0071AF;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            padding-top: 25px;
        }

        .news-list-posts {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 40px;
        }

        .news-list-post {
            width: 28.5%;
            margin: 25px 15px 0px 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .home-news {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0 50px;
            position: relative;
            margin-bottom: 30px;

            >button {
                position: absolute;
                right: 30px;
                bottom: -10px;
                display: flex;
                align-items: center;

            }
        }

        .home-news {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0 50px;
            position: relative;
            margin-bottom: 30px;

            >button {
                position: absolute;
                right: 30px;
                bottom: -10px;
                display: flex;
                align-items: center;
            }
        }

        .news {
            display: flex;
            width: 30%;
            margin: 0 20px 35px 20px;
        }

        .home-news-post {
            display: flex;
            width: 100%;
            margin: 25px;
            flex-wrap: wrap;
        }

        /* news */
        .compo-news {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .compo-news:hover {
            cursor: pointer;
        }

        .news-img {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: max-content;
        }

        .news-title {
            width: 90%;
            font-size: 14px;
            font-weight: 600;
            padding: 15px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .news-content {
            width: 100%;
            height: 55px;
            font-size: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .show-more {
            color: #505050;
            font-style: italic;
            font-size: 12px;
            outline: none;
            background-color: transparent;
            border: none;
            display: flex;
            justify-content: right;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div class="news-list">
        <div class="news-breadcrumb">
            <div class="news-breadcrumb-black">
                <span onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/home/home.php'">Trang chủ</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z"
                        fill="#505050" />
                </svg>
            </div>
            <div class="news-breadcrumb-blue">
                <span>Tin tức</span>
            </div>
        </div>
        <div class="news-list-posts">
            <div class="home-news-post">
                <?php foreach ($newsList as $news): ?>
                    <div class="news"
                        onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/news/news-detail.php?newsId=<?= $news['newsId'] ?>'">
                        <div class="compo-news">
                            <div class="news-img">
                                <img src="<?= $news['newsImage'] ?>" alt="" style="border-radius: 6px;">
                                <div class="news-title">
                                    <?= $news['newsTitle'] ?>
                                </div>
                                <div class="news-content">
                                    <?= $news['newsContent'] ?>
                                </div>
                                <button class="show-more">Xem thêm...</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- FOOTER  -->
    <?php require_once "../components/footer.php"; ?>
</body>