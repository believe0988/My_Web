<?php

class WebbaseSetSql
{
    function GetAllSet()
    {
        include("../connect.php");
        $sql = "SELECT * FROM `webbaseset` WHERE 1";

        $result = mysqli_query($con, $sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            }else {
                $datas[] = "";
            }
            mysqli_free_result($result);
        }
        return $datas;
    }

}
