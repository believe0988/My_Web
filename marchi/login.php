<?php
// 啟用session
session_start();


// 引用版面套件
include("pagebase.php");
include("sql/01/MainSql.php");
$tpl = new Template();
$MainSql = new MainSql();
$type = '01';
$tpl->set('template', 'template/' . $type);
$tpl->set('webtitle', "MarChi後台登入介面");

// 檢查登入
if (!empty($_GET["account"])) {
    $Account = $_GET["account"];
}
if (!empty($_GET["pass"])) {
    $Password = $_GET["pass"];
}
if (!empty($Account) || !empty($Password)) {
    $Login_where = " `Account` = '" . $Account . "' and `Password` = '" . $Password . "' and `Enable` = 1";
    $LoginCheck = $MainSql->sclectadmin("admin", $Login_where, "");

    if (count($LoginCheck) > 0) {
        $_SESSION["LoginUser"] = $LoginCheck[0]["Account"];
        $_SESSION["Permissions"] = $LoginCheck[0]["Permissions"];
        $_SESSION["UserID"] = $LoginCheck[0]["ID"];
        header("Location: index.php");
    }
}
if (!empty($_SESSION["LoginUser"])) {
    header("Location: index.php");
}
// 網站結束
echo $tpl->fetch('template/' . $type . '/login.html');
