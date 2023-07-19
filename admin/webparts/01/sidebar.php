<?php
// 引用版面套件
include("../../pagebase.php");
include("../../sql/01/sidebarSql.php");
// 載入套件
$tpl = new Template();
$sideDAL = new sidebarSql();
// 版型
$type = '01';
$tpl->set('template', 'template/' . $type);
$getside = $sideDAL->getsidebar();
$SiedAry = [];
$SideElse = [];
// 上層
for ($i = 0; $i < count($getside); $i++) {
    if ($getside[$i]["TypeTop"] == 0) {
        $SiedAry[] = array(
            "Text" => $getside[$i]["Text"],
            "ID" => $getside[$i]["ID"],
        );
    } else {
        $SideElse[] = array(
            "Text" => $getside[$i]["Text"],
            "TypeTop" => $getside[$i]["TypeTop"],
        );
    }
}
$NewSideAry = [];
foreach ($SiedAry as $SiedList) {
    foreach ($SideElse as $SideList){
        if($SiedList["ID"] == $SideList["TypeTop"]){
            $NewSideAry[] = array(
                "Text"=>$SideList["Text"]
            );
        }else{
            $NewSideAry[] = array(
                "Text"=>$SiedList["Text"]
            );
        }
    }

}
print_r($NewSideAry);
// $tpl->set('getside', $getside);

// 顯示
echo $tpl->fetch('template/webparts/' . $type . '/sidebar.html');
