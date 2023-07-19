<?php

class sidebarSql
{
    function getsidebar()
    {
        include("../../../connect.php");
        $sql = "select * FROM `menu` WHERE `Enable` = 1 and `TypeTop` = 0
        UNION ALL
        SELECT * FROM `menu` WHERE `TypeTop`!= 0";


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
