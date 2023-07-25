<!-- 基本套件--php -->
<?php
// 登入檢查
session_start();
$LoginUser = $_SESSION["LoginUser"];
if (empty($LoginUser)) {
    echo "<alert>尚未登入!</alert>";
    header("Location: login.php");
    exit();
}
$_SESSION["LimitID"] = "";
// 引用版面套件
include("pagebase.php");
include("sql/01/LimitSql.php");
$tpl = new Template();
$LimitDAL = new LimitSql();
$type = '01';
$tpl->set('template', 'template/' . $type);
$LimitAry = $LimitDAL->LimitUser($_SESSION["UserID"], $_SESSION["LimitID"]);
$tpl->set('webtitle', '');
// 網站結束
echo $tpl->fetch('template/' . $type . '/index.html');

?>
<!-- 基本套件--HTML -->
<!doctype html>
<html lang="en">

<head>
    <title><?=$webtitle;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $template; ?>/css/style.css">
    <script src="<?= $template; ?>/js/jquery.min.js"></script>
    <script src="<?= $template; ?>/js/popper.js"></script>
    <script src="<?= $template; ?>/js/bootstrap.min.js"></script>
    <script src="<?= $template; ?>/js/main.js"></script>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <div class="sidebar"></div>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">


        </div>
    </div>
    <script src="<?= $template; ?>/js/jquery-loading-master/jquery.loading.js"></script>
    <script>
        $(function() {
            $(".sidebar").load("sidebar.html")
            $("body").loading({
                theme: 'dark'
            });
            setTimeout(function() {
                $("body").loading("stop")
            }, 1500);
        })
    </script>

</body>

</html>