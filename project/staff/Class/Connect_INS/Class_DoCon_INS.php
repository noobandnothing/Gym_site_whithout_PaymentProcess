<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'../Login.php\';</script>';
}
$username =  $_SESSION['username'];
$tmp = $_SESSION["go_ConnectClassINS"];
session_unset();

if( $tmp != 1) {
    session_destroy();
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../../Hecker.html\';</script>';
}else{
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
}
//
require "../../../Global_Stuff/DB_func.php";


//
if(count($_POST) == 3){
    $ins_id = $_POST['INST'];
    $class_id =  $_POST['class'];
    $res = excuteOther("Insert into Ins_Class(Ins_id, class_id) value(".$ins_id.",".$class_id.")");
    if($res == null || $res == false){
        $_SESSION["staff"]=1;
        echo '<script>alert("[WEIRD DUPLICATED Details FOUND]")</script>';
        echo '<script type="text/javascript">location.href = \'Class_DoCon_INS.php\';</script>';
    }else {
        echo '<script>alert("Instructor WAS CONNECTED SUCCESSFULLY")</script>';
        echo '<script type="text/javascript">window.location.replace(\'../../staff_Area.php\');</script>';
    }
}else{
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">window.location.replace(\'../../staff_Area.php\');</script>';
}