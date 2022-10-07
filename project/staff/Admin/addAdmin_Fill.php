<?php
session_start();

if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'../Login.php\';</script>';
}
$username =  $_SESSION['username'];
$tmp = $_SESSION["staff"];
session_unset();
if($tmp != 1) {
    session_destroy();
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    $_SESSION['go_addAdmin'] = 1;
}
?>
<link rel="stylesheet" href="adminFill.css">
<html>
    <body>
    <div class="container">
        <header>Info Registeration</header>


        <form action="addAdmin.php" method="post" enctype="multipart/form-data">
<div class="form first">
     <div class="details personal">
     <span class="title">Fill admin Details</span>
     
     <div class="fields">
        <form action="addAdmin.php" method="post">

        <div class="input-field"> 
            <input placeholder="Name" type="text" name="name" maxlength="50" required="required">
        </div>
            <div class="input-field"> 
            <input placeholder="Username" type="text" name="username" maxlength="50" required="required">
            </div>
            <div class="input-field"> 
            <input placeholder="Password" type="text" name="password" maxlength="50" required="required">
            </div>
            
            <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 150px;
                                  cursor: pointer;" input type="submit" name="submit" value="Add Admin">
    
    <div class="input-field">
        <a href="../staff_Area.php" class="btn" style="font-size: 2rem;" >back</a>                         
       </div>
        </form>
    </body>
</html>
