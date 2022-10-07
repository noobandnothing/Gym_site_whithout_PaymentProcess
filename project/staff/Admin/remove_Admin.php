<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'Login.php\';</script>';
}
$username = $_SESSION['username'];
$tmp = $_SESSION["go_removeAdmin"];
session_unset();
if( $tmp != 1) {
    session_destroy();
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
}
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/Admin.php";

$id = $_POST['adminV'];
$tmp_admin = new Admin();
$res = $tmp_admin->delete($id);
if(count($_POST) == 2) {
    if (($res == null || $res == false)) {
        $_SESSION['staff'] = true;
        echo '<script>alert("[Error Happened]")</script>';
        echo '<script type="text/javascript">location.href = \'remove_Admin_Fill.php\';</script>';
    } else {
        echo '<script>alert("REMOVING WAS DONE SUCCESSFULLY")</script>';
        echo '<script type="text/javascript">window.location.replace(\'../staff_Area.php\');</script>';
    }
}else{
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../staff_Area.php\';</script>';
}