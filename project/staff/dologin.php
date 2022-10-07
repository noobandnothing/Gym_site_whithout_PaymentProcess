<?php

session_start();
require "../Global_Stuff/DB_func.php";
$username = $_POST['uname'];
$password = $_POST['psw'];
//
$res = excuteQuery("SELECT admin_id FROM Admin_GYM 
                             WHERE admin_username='" . $username . "' and admin_pass='" . $password . "'");
session_unset();
if ($res) {
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    echo '<script>alert("ACCESS GRANT")</script>';
    echo '<script type="text/javascript">location.href = \'staff_Area.php\';</script>';
} else {
    session_destroy();
    echo '<script>alert("ACCESS DENIED")</script>';
    echo '<script type="text/javascript">location.href = \'Login.php\';</script>';
}
