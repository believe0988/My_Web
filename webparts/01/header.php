<?php
// 引用版面套件
include("../../pagebase.php");
// 載入套件
$tpl = new Template();
// 版型
$type = '01';
$tpl->set('template', 'template/'.$type);
$tpl->set('bannertitle', 'Car Rental <em>Website</em>');

// 顯示
echo $tpl->fetch('template/webparts/'.$type.'/header.html');