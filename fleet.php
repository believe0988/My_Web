<?php
// 引用版面套件
include("pagebase.php");
// 載入套件
$tpl = new Template();
// 版型
$type = '01';

// 開始內容
$tpl->set('template', 'template/'.$type);



// 顯示
echo $tpl->fetch('template/'.$type.'/fleet.html');