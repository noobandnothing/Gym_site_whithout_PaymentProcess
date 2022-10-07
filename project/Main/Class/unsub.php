<?php
session_start();

require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/Customer.php";

$cLass_id = $_GET['class'];
if($_SESSION['SL']){
    $user_un = $_SESSION['username'];
    $tmp_cus =  new Customer();
    $tmp_cus->fill_object_u($user_un);
    if($tmp_cus->getId()){
        $tmp_cus->unsub($cLass_id);
        echo '<script>alert("UNSubscribe")</script>';
        echo '<script type="text/javascript">location.href = \'Class_Info.php?class='.$cLass_id.'\';</script>';
    }else{
        session_unset();
        session_destroy();
        echo '<script>alert("WT....")</script>';
        echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';
    }

}else{
    session_unset();
    session_destroy();
    echo '<script>alert("WT....")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';

}