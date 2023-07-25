<?php
// 登入檢查
session_start();
$LoginUser = $_SESSION["LoginUser"];
if (empty($LoginUser)) {
    echo "<alert>尚未登入!</alert>";
    header("Location: login.php");
    exit();
}
$_SESSION["LimitID"] = "47";
// 引用版面套件
include("pagebase.php");
include("sql/01/LimitSql.php");
include("sql/01/WebbaseSetSql.php");
$tpl = new Template();
$LimitDAL = new LimitSql();
$WebbaseSetDAL = new WebbaseSetSql();
$type = '01';
$tpl->set('template', 'template/' . $type);
$LimitAry = $LimitDAL->LimitUser($_SESSION["UserID"], $_SESSION["LimitID"]);
$tpl->set('webtitle', '網站資訊');
$WebbaseSetAry = $WebbaseSetDAL->GetAllSet();
foreach($WebbaseSetAry as $Key){
    $Key["Key"]=="webTitle"?$tpl->set('webTitle', $Key["Value"]):"";
    $Key["Key"]=="webDescribe"?$tpl->set('webDescribe', $Key["Value"]):"";
    $Key["Key"]=="webIcon"?$tpl->set('webIcon', $Key["Value"]):"";
}

// 網站結束
echo $tpl->fetch('template/' . $type . '/webbaseSet.html');
