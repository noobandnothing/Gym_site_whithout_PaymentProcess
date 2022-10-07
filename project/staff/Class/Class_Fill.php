<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/Branch.php";
require "../../Global_Stuff/GClass.php";

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
    $_SESSION['go_addClass'] = 1;
}
?>

<html>
<link rel="stylesheet" href="class.css">
     
   
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
    <body class="body">
    <div class="container">
        <header>Info Registeration</header>
         <form action="ClassAdd.php" method="post" enctype="multipart/form-data">
         <div class="form first">
              <div class="details personal">
                    <span class="title">Class Details</span>  
                               
                    <div class="fields">
                             <div class="input-field">
                  Name<input placeholder="Name" type="text" name="name" required="required" maxlength="50">
                             </div>
            <div class="input-field">
                    
                     Start<input type="time" id="Start" name="start" value="00:00:00" required="required">
                
                     
                     End<input type="time" id="end" name="end" value="00:00:00" required="required">
    </div>
            <div class="input-field">
                   Please Select Branch  <select id="Branch" name="branch" required="required">
                             <option value="" disabled selected hidden>Choose Branch</option>
                             <?php
                             $tmp_b = new Branch();
                             for($count = 1 ;$count <= Branch::count_member();$count++){
                                 $tmp_b->fill_object($count);
                                 $name = $tmp_b->getName();
                                 if($name != null)
                                        echo "<option value=\"$count\">$name</option>";
                             }
                             ?>
                         </select>
            </div>    
            <div class="input-field">
               Please Select a Day  <select id="Day" name="Day" required="required">
                             <option value="" disabled selected hidden>Choose Day</option>
                             <option value="Sunday">Sunday</option>
                             <option value="Monday">Monday</option>
                             <option value="Tuesday">Tuesday</option>
                             <option value="Wednesday">Wednesday</option>
                             <option value="Thursday">Thursday</option>
                             <option value="Friday">Friday</option>
                             <option value="Saturday">Saturday</option>
                         </select>
            </div> 
            <div class="input-field">
                  Please enter a Description <textarea placeholder="Description" name="describe" rows="4" cols="50"></textarea>
                    
            </div>
            <div class="input-field">

            Please insert an image   <input type="file" name="image" required="required">
            </div>

            <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 150px;
                                  cursor: pointer;" input type="submit" name="submit" value="Add Class">
  
   <div class="input-field">
        <a href="../staff_Area.php" class="btn" style="font-size: 2rem;" >back</a>                         
       </div>
            

         </form>
    <br/><br>
    </body>
</html>

