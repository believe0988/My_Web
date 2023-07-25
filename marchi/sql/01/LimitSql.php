<?php

class LimitSql
{
    function LimitUser($UserID, $MenuID)
    {
        if ($UserID == 1) {
            return true;
        }
        include("../connect.php");
        $sql = "SELECT * FROM `limit` WHERE  `UserID` = '" . $UserID . "' AND `MenuID` = '" . $MenuID . "'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
            mysqli_free_result($result);
        }
    }
    function LimitUserSidebar($UserID, $MenuID)
    {
        if ($UserID == 1) {
            return true;
        }
        include("../../../connect.php");
        $sql = "SELECT * FROM `limit` WHERE  `UserID` = '" . $UserID . "' AND `MenuID` = '" . $MenuID . "'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
            mysqli_free_result($result);
        }
    }
    function LimitUserCheck($UserID)
    {

        include("../connect.php");
        $sql = "SELECT * FROM `limit` WHERE  `UserID` = '" . $UserID . "'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            } else {
                $datas = "";
            }
            mysqli_free_result($result);
        }
        return $datas;
    }
}
