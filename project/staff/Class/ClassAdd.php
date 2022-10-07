<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'../Login.php\';</script>';
}
$username =  $_SESSION['username'];
$tmp = $_SESSION["go_addClass"];
session_unset();

if($tmp != 1) {
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
require "../../Global_Stuff/Branch.php";
require "../../Global_Stuff/GClass.php";
//

if(count($_POST) == 7) {
    $pic_name = picture::uploadimg($_FILES);
    if ($pic_name == null) {
        $_SESSION["staff"]=1;
        echo '<script>alert("Incorrect img Format")</script>';
        echo '<script type="text/javascript">location.href = \'Class_Fill.php\';</script>';
    } else {
        picture::push($pic_name);
        $pic_id = picture::get_id($pic_name);
        $pic = new picture();
        $pic->fill_object($pic_id);
        //
        $tmpClass = new GClass();
        $name = $_POST['name'];
        $describe =  $_POST['describe'];
        $start = $_POST['start'];
        $end =  $_POST['end'];
        $Day =  $_POST['Day'];
        //
        $branchtmp = new branch();
        $branchtmp->fill_object( $_POST['branch']);
        //
        $tmpClass->SetAllParam($name, $describe, $start, $end, $Day, $branchtmp,$pic);
        $res = $tmpClass->push();
        if($res == null || $res == false){
            $_SESSION["staff"]=1;
            echo '<script>alert("[DUPLICATED Details FOUND]")</script>';
            echo '<script type="text/javascript">location.href = \'Class_Fill.php\';</script>';
        }else {
            echo '<script>alert("Class WAS ADDED SUCCESSFULLY")</script>';
            echo '<script type="text/javascript">window.location.replace(\'../staff_Area.php\');</script>';
        }
    }
}else{
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../staff_Area.php\';</script>';
}