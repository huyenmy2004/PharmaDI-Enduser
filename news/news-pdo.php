<?php
require_once "../connect-db.php";
class News extends Connection{
    public function getData(){
        $sql = "SELECT * FROM news ORDER BY newsCreatedDate desc";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getNewsDetail($news){
        $sql = "SELECT * FROM news WHERE newsId = $news";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}