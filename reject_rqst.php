
<!--
reject a request of any other user-->
<?php
session_start();
include('config.php');
if($_SESSION['user'] != 'admin'){
    $invalid =   $_SESSION['email'];
    echo $invalid;

    $query ="update user set isActive ='n' where email= '$invalid' ";
    mysql_query($query, $con);
    header('location:index.php');
}
$current = date("Y/m/d");
$query ="update blockuser set status = 'r', actionDate = '$current' where id = '$_GET[id]'";
mysql_query($query);

header('location: block_rqst_msg.php');
?>
