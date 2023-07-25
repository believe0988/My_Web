<?php
// 登入檢查
session_start();
// 引用版面套件
include("pagebase.php");
include("sql/01/UserListSql.php");
include("sql/01/LimitSql.php");
include("sql/01/SidebarSql.php");
$tpl = new Template();
$UserDAL = new UserListSql();
$LimitDAL = new LimitSql();
$sideDAL = new SidebarSql();
// 版型
$type = '01';
$tpl->set('template', 'template/' . $type);
// 版型結束，檢查登入
$LoginUser = $_SESSION["LoginUser"];
if (empty($LoginUser)) {
    echo "<alert>尚未登入!</alert>";
    header("Location: login.php");
    exit();
}
// 檢查權限
$_SESSION["LimitID"] = "21";
$LimitAry = $LimitDAL->LimitUser($_SESSION["UserID"], $_SESSION["LimitID"]);
if (!$LimitAry) {
    echo "<script>alert(\"您無權限瀏覽此頁面!\");location.href='index.php'</script>";
}

//檢查結束，網站開始
$tpl->set('webtitle', "編輯管理人員");
// 檢查是否編輯/新增

if ($_REQUEST["UID"] != "") {
    $UserAry = $UserDAL->GetUser($_REQUEST["UID"]);
    $tpl->set('UserID', $_REQUEST["UID"]);
    $tpl->set('Account', $UserAry[0]["Account"]);
    $tpl->set('Password', $UserAry[0]["Password"]);
    $tpl->set('Enable', $UserAry[0]["Enable"]);
    $tpl->set('TEXT', $UserAry[0]["TEXT"]);
    // 獲得使用者權限清單
    $AllCheckAry = $LimitDAL->LimitUserCheck($_REQUEST["UID"]);
    $tpl->set('AllCheckAry', $AllCheckAry);
} else {
    $tpl->set('UserID', "");
    $tpl->set('Account', "");
    $tpl->set('Password', "");
    $tpl->set('Enable', "");
    $tpl->set('TEXT', "");
    $tpl->set('AllCheckAry', "");
}
// 權限按鈕
$aryJ = array();
$filter = " a.`ParentID`=0 AND a.`Visible`=1";
$getside = $sideDAL->Editgetsidebar($filter);
foreach ($getside as $rows) {
    $menuID = $rows["MenuID"];
    $menuName = urlencode($rows["MenuName"]);
    $menuIcon = urlencode($rows["MenuIcon"]);
    $menuClass = "";
    $aryCL = array();
    $intoAry = array();
    $filter = " a.`ParentID`='" . $menuID . "' AND a.`Visible`=1";
    // if($this->userID != "1") $filter .= " AND a.`IsOA`=0";
    $dataM2 = $sideDAL->EditexecuteRecordset($filter);
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
        $aryCL[] = array("MenuID" => $rows2["MenuID"], "MenuName" => urlencode($rows2["MenuName"]));
    }
    $show = (count($aryCL) > 0) ? "fa fa-angle-down" : "";
    $aryJ[] = array("MenuID" => $menuID, "MenuName" => $menuName, "aryCL" => $aryCL);
}
$txtJ = urldecode(json_encode($aryJ));
$tpl->set('txtJ', $txtJ);



// 網站結束
echo $tpl->fetch('template/' . $type . '/userEdit.html');
