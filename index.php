<?php
// 引用版面套件
include("pagebase.php");
include("sql/01/MainSql.php");
$tpl = new Template();
$indexsql = new MainSql();
$type = '01';
$tpl->set('template', 'template/'.$type);
$tpl->set('webtitle', "Title");
$BannerAry = $indexsql->sclectall("banner","");


$tpl->set('Banner', $BannerAry);
// 網站結束
echo $tpl->fetch('template/'.$type.'/index.html');