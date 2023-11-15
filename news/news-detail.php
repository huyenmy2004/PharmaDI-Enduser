<!-- MENU  -->
<?php require "../components/header.php"; 
require_once "news-pdo.php";
$news = new News();
$news1 = $news->getNewsDetail($_GET['newsId'])[0];
$newsList = $news->getData();
?>
<head>
    <title>Chi tiết tin tức</title>
    <style>
        .news-breadcrumb:hover{
            cursor: pointer;
        }
        .news-detail{
            display: flex;
            flex-direction: column;
            background-color: #F4F7FC;
        }
        .news-breadcrumb{
            display: flex;
            padding-left: 80px;
        }
        .news-breadcrumb-black{
            display: flex;
            align-items: center;
            color: #505050;
            font-size: 14px;
            padding-top: 25px;
        }
        .news-breadcrumb-blue{
            color: #0071AF;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            padding-top: 25px;
        }
        .news-detail-post{
            display: flex;
            justify-content: center;
            margin: 30px;
        }
        .news-detail-content{
            display: flex;
            flex-direction: column;
            width: 67%;
            color: #505050;
            height: max-content;
            font-size: 14px;
            border-radius: 10px;
            margin-right: 30px;
            background-color: white;
            padding: 20px;
            >img{
                width: 100%;
                height: max-content;
                padding-bottom: 30px;
                border-radius: 8px;
            }
        }
        .news-detail-more-post{
            display: flex;
            flex-direction: column;
            width: 23%;
            height: 600px;
            overflow-y: hidden;
        }
        .news-title{
            width: 330px;
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
        textarea::-webkit-scrollbar {
  display: none;
}
textarea.vertical {
  resize: vertical;
  max-height: 1000px;
  min-height: 550px;
  height: max-content;
  resize: none;
}
    </style>
</head>
<body>
    <div class="news-detail">
        <div class="news-breadcrumb">
            <div class="news-breadcrumb-black">
                <span onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/home/home.php'">Trang chủ</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z" fill="#505050"/>
                </svg>
            </div>
            <div class="news-breadcrumb-black">
                <span onclick="window.location.href = 'http://localhost/PharmaDI-Enduser/news/news-list.php'">Tin tức</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z" fill="#505050"/>
                </svg>
            </div>
            <div class="news-breadcrumb-blue">
                <span><?= $news1['newsTitle'] ?></span> 
            </div>
        </div>
        <div class="news-detail-post">
            <div class="news-detail-content">
                <img src="<?= $news1['newsImage'] ?>" alt="">
                <span style="font-weight: 600; padding-bottom: 20px; font-size: 18px; "><?= $news1['newsTitle'] ?></span>
                <textarea class="vertical outline-none" type="text" readonly>
                <?= $news1['newsContent'] ?></textarea>
            </div>
            <div class="news-detail-more-post">
                <span style="padding: 0 0 20px 0px; font-weight: 600; color: #505050; font-size: 20px">Tin tức khác</span>
                <div>
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
                <button class="show-more" onclick="link('http://localhost/PharmaDI/layout/news-list.php')" style="font-style: normal; font-weight: 600; font-size: 14px; justify-content:right">
                    Xem tất cả
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09327 3.6921C7.35535 3.46746 7.74991 3.49781 7.97455 3.75989L12.9745 9.59323C13.1752 9.82728 13.1752 10.1727 12.9745 10.4067L7.97455 16.24C7.74991 16.5021 7.35535 16.5325 7.09327 16.3078C6.83119 16.0832 6.80084 15.6886 7.02548 15.4266L11.6768 9.99997L7.02548 4.57338C6.80084 4.3113 6.83119 3.91674 7.09327 3.6921Z" fill="#505050"/>
                    </svg>
            </button>
            </div>
        </div>
    </div>
</body>
<!-- FOOTER  -->
<?php require_once "../components/footer.php"; ?>
