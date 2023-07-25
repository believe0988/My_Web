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
include("sql/01/LimitSql.php");
$tpl = new Template();
$LimitDAL = new LimitSql();
$type = '01';
$tpl->set('template', 'template/'.$type);
$tpl->set('webtitle', "MarChi管理後台");
$LimitAry = $LimitDAL->LimitUser($_SESSION["UserID"], $_SESSION["LimitID"]);

// 網站結束
echo $tpl->fetch('template/'.$type.'/index.html');