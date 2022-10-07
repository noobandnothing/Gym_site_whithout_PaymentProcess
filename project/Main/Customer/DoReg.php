<?php
//error_reporting(E_ALL); // or E_STRICT
//ini_set("display_errors",1);
//
session_start();
if($_SESSION["go_Reg"] != 1) {
    session_unset();
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    session_unset();
}
//
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/Customer.php";
//
if(count($_POST) == 7) {
    $FN = $_POST['FN'];
    $LN = $_POST['LN'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $Customer_tmp = new Customer();
    $Customer_tmp->SetAllParam($birthdate, $phone, $FN, $LN, $username, $password);
    $res = $Customer_tmp->push();
    if (($res == null || $res == false)) {
        echo '<script>alert("[DUPLICATED Details FOUND]")</script>';
        echo '<script type="text/javascript">location.href = \'Registration.php\';</script>';
    } else {
        session_unset();
        session_destroy();
        echo '<script>alert("REGISTRATION WAS DONE SUCCESSFULLY")</script>';
        echo '<script type="text/javascript">window.location.replace(\'../Main.php\');</script>';
    }
}else{
    session_unset();
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';
}

