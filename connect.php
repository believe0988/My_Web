<?php
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'web_001';
date_default_timezone_set('Asia/Taipei');
$con = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($con){
    mysqli_query($con,'SET NAMES utf8');
    // echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
?>
