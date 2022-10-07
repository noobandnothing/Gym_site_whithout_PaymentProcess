<?php
require "../../../Global_Stuff/DB_func.php";
require "../../../Global_Stuff/picture.php";
require "../../../Global_Stuff/Branch.php";
require "../../../Global_Stuff/Instructor.php";
require "../../../Global_Stuff/GClass.php";
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
    $_SESSION['go_ConnectClassINS'] = 1;
}
?>


<html>
<link rel="stylesheet" href="class_con.css">
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#class').on('change', function(){
            var classID = $(this).val();
            if(classID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data:'class_id='+classID,
                    success:function(html){
                        $('#INST').html(html);
                    }
                });
            }else{
                $('#INST').html('<option value="">Select Instructor first</option>');
            }
        });
    });
</script>
<body>
<div class="container">
        <header>Info Registeration</header>

<form action="Class_DoCon_INS.php" method="post">
<div class="form first">
     <div class="details personal">
     <span class="title">Instructor Connection</span>
      
     <div class="fields">
            <div class="input-field">
  </div>
          <div class="input-field"> 
           Select The class <select id="class" name="class" required="required">
                    <option value="" disabled selected hidden>Choose Class</option>
                    <?php
                    $tmp_Class = new GClass();
                    for($count = 1 ;$count <= GClass::count_member();$count++){
                        $tmp_Class->fill_object($count);
                        $name = $tmp_Class->getName();
                        if($name != null)
                                echo "<option value=\"$count\">$name</option>";
                    }
                    ?>
                </select>
          </div>
                <div class="input-field">
         Select The Instructor  <select id="INST" name="INST" required="required">
                    <option value="" disabled selected hidden>Choose Instructor</option>
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
