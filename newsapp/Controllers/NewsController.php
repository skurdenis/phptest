<?php
include_once './Models/News.php';

class NewsController {
    public static function actionIndex($param){
        $newsList=News::getNewsList();
        include "./Views/newsIndex.php";
        echo "actionIndex";
    
}
public static function actionView($param){
        $newsList=News::getNewsItemByID($param);
        include "./Views/newsView.php";
        echo $param;
    
}
}