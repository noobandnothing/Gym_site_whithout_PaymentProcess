<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'Login.php\';</script>';
}
$username = $_SESSION['username'];
$tmp = $_SESSION["go_addAdmin"];
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
if(count($_POST) == 4){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tmp_admin = new Admin();
    $tmp_admin->SetAllParam($name,$username,$password);
    $res = $tmp_admin->push();

    if (($res == null || $res == false)) {
        $_SESSION['staff'] = true;
        echo '<script>alert("[DUPLICATED Details FOUND]")</script>';
        echo '<script type="text/javascript">location.href = \'addAdmin_Fill.php\';</script>';
    } else {
        echo '<script>alert("Adding WAS DONE SUCCESSFULLY")</script>';
        echo '<script type="text/javascript">window.location.replace(\'../staff_Area.php\');</script>';
    }
}else{
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../staff_Area.php\';</script>';
}
