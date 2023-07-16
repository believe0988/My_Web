<?php

class MainSql
{
    function sclectall($tablename, $orderby)
    {
        include("../connect.php");
        $sql = "select * from `" . $tablename . "`";

        if ($orderby != "") {
            $sql .= "order by '" . $orderby . "'";
        }
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
    function sclectadmin($tablename, $where, $orderby)
    {
        include("../connect.php");
        $sql = "select * from `" . $tablename . "` where " . $where;

        if ($orderby != "") {
            $sql .= "order by '" . $orderby . "'";
        }
        // echo $sql ;
        // exit();
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
            } else {
                $datas[] = array();
            }
            mysqli_free_result($result);
        }
        return $datas;
    }
}
