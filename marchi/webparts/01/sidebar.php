<?php
session_start();
// 引用版面套件
include("../../pagebase.php");
include("../../sql/01/sidebarSql.php");
include("../../sql/01/LimitSql.php");
// 載入套件
$tpl = new Template();
$sideDAL = new sidebarSql();
$LimitDAL = new LimitSql();
// 版型
$type = '01';
$tpl->set('template', 'template/' . $type);
$aryJ = array();
$filter = " a.`ParentID`=0 AND a.`Visible`=1";
$getside = $sideDAL->getsidebar($filter);
foreach ($getside as $rows) {
    $menuID = $rows["MenuID"];
    $menuName = urlencode($rows["MenuName"]);
    $menuIcon = urlencode($rows["MenuIcon"]);
    $menuClass = "";
    $aryCL = array();
    $intoAry = array();
    $filter = " a.`ParentID`='" . $menuID . "' AND a.`Visible`=1";
    // if($this->userID != "1") $filter .= " AND a.`IsOA`=0";
    $dataM2 = $sideDAL->executeRecordset($filter);
    foreach ($dataM2 as $rows2) {
        if ($_SESSION["LimitID"] == $rows2["MenuID"]) {

            $menuClass = "action";
            $minClass = "active";
        } else {
            $minClass = "";
        }
        $checkID = $rows2["MenuID"];
        $checkName = urlencode($rows2["MenuName"]);
        $checkLink = urlencode($rows2["MenuLink"]);
        $linkTarget = urlencode($rows2["LinkTarget"]);
        $LimitAry = $LimitDAL->LimitUserSidebar($_SESSION["UserID"], $rows2["MenuID"]);
        if ($LimitAry) {
            $aryCL[] = array("MenuID" => $checkID, "MenuName" => $checkName, "MenuLink" => $checkLink, "LinkTarget" => $linkTarget, "minClass" => $minClass);
        }
    }
    $show = (count($aryCL) > 0) ? "fa fa-angle-down" : "";
    if ($LimitAry) {
        $aryJ[] = array("MenuID" => $menuID, "MenuName" => $menuName, "MenuIcon" => $menuIcon, "menuClass" => $menuClass, "show" => $show, "childList" => $aryCL);
    }
}
$txtJ = urldecode(json_encode($aryJ));
$tpl->set('txtJ', $txtJ);

// 顯示
echo $tpl->fetch('template/webparts/' . $type . '/sidebar.html');
