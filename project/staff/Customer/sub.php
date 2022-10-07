<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/GClass.php";
require "../../Global_Stuff/Customer.php";

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
    echo '<script type="text/javascript">location.href = \'../../../Hecker.html\';</script>';
}else{
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
    $_SESSION['go_SearchSub'] = 1;
}
?>


<html>
<link rel="stylesheet" href="class_con.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<body>
<div class="container">
    <header>Info Subscription</header>

    <form action="subcheck.php" method="post">
        <div class="form first">
            <div class="details personal">
                <span class="title">Customer Subscription</span>

                <div class="fields">
                    <div class="input-field">
                    </div>
                    <div class="input-field">
                        Select The Customer <select id="cutomer" name="customer" required="required">
                            <option value="" disabled selected hidden>Choose customer</option>
                            <?php
                            $tmp_Cus = new Customer();
                            for($count = 1 ;$count <= Customer::count_member();$count++){
                                $tmp_Cus->fill_object($count);
                                $name = $tmp_Cus->getname();
                                echo $name;
                                if($name != null)
                                    echo "<option value=\"$count\">$name</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 150px;
                                  cursor: pointer;" input type="submit" name="submit" value="Add Instructor">

                    <div class="input-field">
                        <a href="../../staff_Area.php" class="btn" style="font-size: 2rem;" >back</a>
                    </div>



    </form>
    <br/><br>

</body>
</html>
