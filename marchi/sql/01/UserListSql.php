<?php

class UserListSql
{
    function GetAllUser()
    {
        include("../connect.php");
        $sql = "SELECT * FROM `admin` where `ID` != 1";


        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            } else {
                $datas[] = "";
            }
            mysqli_free_result($result);
        }
        return $datas;
    }
    function GetUser($UID)
    {
        include("../connect.php");
        $sql = "SELECT * FROM `admin` where `ID` ='".$UID."'";


        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            } else {
                $datas[] = "";
            }
            mysqli_free_result($result);
        }
        return $datas;
    }
}
