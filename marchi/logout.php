<?php
// 啟用session
session_start();


// 引用版面套件
include("pagebase.php");
$tpl = new Template();
$type = '01';
$tpl->set('template', 'template/' . $type);
$tpl->set('webtitle', "登出畫面");


unset($_SESSION["LoginUser"]);
unset($_SESSION["LimitID"]);
// 網站結束
echo $tpl->fetch('template/' . $type . '/logout.html');
