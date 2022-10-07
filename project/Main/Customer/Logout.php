<?php
session_start();

if($_SESSION['SL']){
    session_unset();
    session_destroy();
    echo '<script>alert("Log Out")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';

}else{
    session_unset();
    session_destroy();
    echo '<script>alert("WT....")</script>';
    echo '<script type="text/javascript">location.href = \'../Main.php\';</script>';

}
