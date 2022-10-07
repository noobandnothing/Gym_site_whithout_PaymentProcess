<?php
//error_reporting(E_ALL); // or E_STRICT
//ini_set("display_errors",1);
session_start();
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/Customer.php";

$username = $_POST['uname'];
$password = $_POST['psw'];
//
$res = excuteQuery("SELECT cust_id FROM Customer 
                             WHERE cust_username='".$username."' and cust_pass='".$password."'");
session_unset();
if($res){
    $_SESSION['username'] = $username;
    $_SESSION['SL'] = true;
    echo '<script>alert("ACCESS GRANT")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';
}else{
    session_destroy();
    echo '<script>alert("ACCESS DENIED")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';
}
?>