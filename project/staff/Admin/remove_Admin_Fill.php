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
    $_SESSION['go_removeAdmin'] = 1;
}
 require "../../Global_Stuff/DB_func.php";
 require "../../Global_Stuff/Admin.php"
?>
<link rel="stylesheet" href="RmvAdd.css">

<html>
    
    <body class="body">
    <div class="container">
        <header>Info Registeration</header>

        <form action="remove_Admin.php" method="post">

       <div class="form first">
     <div class="details personal">
     <span class="title">Remove Admin</span>
     <div class="input-field">
            <select id="adminV" name="adminV" required="required">
                <option value="" disabled selected hidden>Choose Admin</option>
                <?php
                    $tmp_Admin = new Admin();
                    for($counter = 2; $counter <= Admin::count_member();$counter++){
                        $tmp_Admin->fill_object($counter);
                        $name = $tmp_Admin->getName();
                        if($name != null)
                            echo "<option value=\"$counter\">$name</option>";
                    }
                ?>
            </select> 
                </div>
          
          &nbsp;&nbsp;  <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 145px;
                                  cursor: pointer;" input type="submit" name="submit" value="Delete Admin">
    
    
<div class="space">
    <div class="input-field">
        <a href="../staff_Area.php" class="btn" style="font-size: 2rem;">back</a>                         
       </div>
                </div>
        </form>       
    </body>
</html>
