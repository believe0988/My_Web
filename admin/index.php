<?php
// 登入檢查
session_start();
$LoginUser = $_SESSION["LoginUser"];
if(empty($LoginUser)){
    echo"<alert>尚未登入!</alert>";
    header("Location: login.php");
    exit();
}
$_SESSION["LimitID"] = "19";
//

// 引用版面套件
include("pagebase.php");
$tpl = new Template();
$type = '01';
$tpl->set('template', 'template/'.$type);
$tpl->set('webtitle', "Title");



// 網站結束
echo $tpl->fetch('template/'.$type.'/index.html');