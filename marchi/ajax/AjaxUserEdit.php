<?php
switch ($_POST["do"]) {

    case "save":
        save();
        break;
    case "del":
        del();
        break;
    case "insert":
        insert();
        break;
}

function save()
{
    include("../../connect.php");
    $UserID = $_POST["UserID"];
    $Account = $_POST["Account"];
    $Password = $_POST["Password"];
    $Enable = $_POST["Enable"];
    $TEXT = $_POST["TEXT"];
    $MenuID = $_POST["MenuID"];
    $sql = "UPDATE `admin` SET `Account` = '" . $Account . "',`Password` = '" . $Password . "',`Enable` = '" . $Enable . "',`TEXT` = '" . $TEXT . "' where `ID` = '" . $UserID . "' ";
    $filter = mysqli_query($con, $sql);
    $sqlA = "Delete from `limit` WHERE `UserID` ='" . $UserID . "'";
    $filterA = mysqli_query($con, $sqlA);
    for ($i = 0; $i < count($MenuID); $i++) {
        $sqlB = "INSERT INTO `limit`(`UserID`, `MenuID`) VALUES ('" . $UserID . "','" . $MenuID[$i] . "')";
        $filterB = mysqli_query($con, $sqlB);
    }
    if ($filter && $filterA && $filterB) {
        $Fdata = '{"result": [{"msg": "0","text":"success"}]}';
    } else {
        $Fdata = '{"result": [{"msg": "1","text":"fail"}]}';
    }

    echo $Fdata;
}
function del()
{
    include("../../connect.php");
    $UserID = $_POST["UserID"];
    $sql = "Delete from `admin` WHERE `ID` ='" . $UserID . "'";
    $filter = mysqli_query($con, $sql);
    $sqlA = "Delete from `limit` WHERE `UserID` ='" . $UserID . "'";
    $filterA = mysqli_query($con, $sqlA);
    if ($filter && $filterA) {
        $Fdata = '{"result": [{"msg": "0","text":"success"}]}';
    } else {
        $Fdata = '{"result": [{"msg": "1","text":"fail"}]}';
    }

    echo $Fdata;
}
function insert()
{
    include("../../connect.php");
    $Account = $_POST["Account"];
    $Password = $_POST["Password"];
    $Enable = $_POST["Enable"];
    $TEXT = $_POST["TEXT"];
    $MenuID = $_POST["MenuID"];
    $sql = "INSERT INTO `admin`(`Account`,`Password`,`Enable`,`TEXT`) VALUES ('" . $Account . "', '" . $Password . "','" . $Enable . "','" . $TEXT . "')";
    $filter = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) > 0) {
        // 如果有一筆以上代表有更新
        // mysqli_insert_id可以抓到第一筆的id
        $new_id = mysqli_insert_id($con);
    }
    for($i=0;$i<count($MenuID);$i++){
        $sqlB = "INSERT INTO `limit`(`UserID`, `MenuID`) VALUES ('".$new_id."','".$MenuID[$i]."')";
        $filterB = mysqli_query($con, $sqlB);
    }
    if ($filter && $filterB) {
        $Fdata = '{"result": [{"msg": "0","text":"success"}]}';
    } else {
        $Fdata = '{"result": [{"msg": "1","text":"fail"}]}';
    }

    echo $Fdata;
}
