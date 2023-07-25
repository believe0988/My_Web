<?php

class SidebarSql
{
    function getsidebar($filter)
    {
        include("../../../connect.php");
        $sql = "SELECT a.*,b.`MenuName` AS `ParentName` FROM `menu` a LEFT JOIN `menu` b ON a.`ParentID`=b.`MenuID`";
        if ($filter != "") {
            $sql .=" where" ;
            $sql .= $filter;
        }

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

    function executeRecordset($filter)
    {
        include("../../../connect.php");
        $sql = "SELECT a.*,b.`MenuName` AS `ParentName` FROM `menu` a LEFT JOIN `menu` b ON a.`ParentID`=b.`MenuID`";
        if ($filter != "") {
            $sql .=" where" ;
            $sql .= $filter;
        }

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
    function Editgetsidebar($filter)
    {
        include("../connect.php");
        $sql = "SELECT a.*,b.`MenuName` AS `ParentName` FROM `menu` a LEFT JOIN `menu` b ON a.`ParentID`=b.`MenuID`";
        if ($filter != "") {
            $sql .=" where" ;
            $sql .= $filter;
        }

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

    function EditexecuteRecordset($filter)
    {
        include("../connect.php");
        $sql = "SELECT a.*,b.`MenuName` AS `ParentName` FROM `menu` a LEFT JOIN `menu` b ON a.`ParentID`=b.`MenuID`";
        if ($filter != "") {
            $sql .=" where" ;
            $sql .= $filter;
        }

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
