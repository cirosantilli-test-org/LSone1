<?php
class Site {
    /*成员变量*/
    var $url;
    var $title;

    /*成员函数*/
    function setUrl($par) {
        $this->url = $par;
    }

    function getUrl(){
        echo $this->url . PHP_EOL;
    }

    function setTitle($par) {
        $this->title = $par;
    }

    function getTitle() {
        echo $this->title . PHP_EOL;
    }
}

$baidu = new Site;
$google = new Site;
$youtube = new Site;

//调出成员函数，设置标题和URL
$baidu->setTitle("baidu");
$google->setTitle("google");
$youtube->setTitle("youtube");

$baidu->setUrl("www.baidu.com");
$google->setUrl("www.google.com");
$youtube->setUrl("www.youtube.com");

//调出成员函数，获取标题和URL
$baidu->getTitle();
$google->getTitle();
$youtube->getTitle();

$baidu->getUrl();
$google->getUrl();
$youtube->getUrl();
?>

