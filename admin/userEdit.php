<?php
// 登入檢查
session_start();
$LoginUser = $_SESSION["LoginUser"];
if (empty($LoginUser)) {
    echo "<alert>尚未登入!</alert>";
    header("Location: login.php");
    exit();
}
$_SESSION["LimitID"] = "21";
//

// 引用版面套件
include("pagebase.php");
include("sql/01/UserListSql.php");
$tpl = new Template();
$UserDAL = new UserListSql();
$type = '01';
$tpl->set('template', 'template/' . $type);
$tpl->set('webtitle', "Title");
$AllUser = $UserDAL->GetAllUser();
for ($i = 0; $i < count($AllUser); $i++) {
    if ($AllUser[$i]["Enable"] == 1) {
        $AllUser[$i]["Enable"] = "<i class=\"fa fa-check-circle-o fa-3x\" aria-hidden=\"true\" style=\"color:green\"></i>";
    } else {
        $AllUser[$i]["Enable"] = "<i class=\"fa fa-ban fa-3x\" aria-hidden=\"true\" style=\"color:red\"></i>";
    }
}
$tpl->set('AllUser', $AllUser);


// 網站結束
echo $tpl->fetch('template/' . $type . '/userEdit.html');
