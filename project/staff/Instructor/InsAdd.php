<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'../Login.php\';</script>';
}
$username =  $_SESSION['username'];
$tmp = $_SESSION["go_addIns"];
session_unset();

if( $tmp != 1) {
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
}
//
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/Instructor.php";
//

if(count($_POST) == 5){
    $pic_name = picture::uploadimg($_FILES);
    if($pic_name == null) {
        $_SESSION["staff"]=1;
        echo '<script>alert("Incorrect img Format")</script>';
        echo '<script type="text/javascript">location.href = \'Instructor_Fill.php\';</script>';
    } else {
        picture::push($pic_name);
        $pic_id = picture::get_id($pic_name);
        $pic = new picture();
        $pic->fill_object($pic_id);
        $tmpIns = new Instructor();
        $FN = $_POST['FN'];
        $LN = $_POST['LN'];
        $phone = $_POST['phone'];
        $Description = $_POST['Describe'];
        $tmpIns->SetAllParam($FN,$LN,$phone,$Description,$pic);
        $res = $tmpIns->push();
        if($res == null || $res == false){
            $_SESSION["staff"]=1;
            echo '<script>alert("[DUPLICATED Details FOUND]")</script>';
            echo '<script type="text/javascript">location.href = \'Instructor_Fill.php\';</script>';
        }else {
            echo '<script>alert("Instructor WAS ADDED SUCCESSFULLY")</script>';
            echo '<script type="text/javascript">window.location.replace(\'../staff_Area.php\');</script>';
        }
    }
}else{
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../staff_Area.php\';</script>';
}