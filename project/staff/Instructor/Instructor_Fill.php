
<html>
<?php
//error_reporting(E_ALL); // or E_STRICT
//ini_set("display_errors",1);

session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'../Login.php\';</script>';
}
$username = $_SESSION['username'];
$tmp = $_SESSION["staff"];
session_unset();
if($tmp != 1) {
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    $_SESSION['go_addIns'] = 1;
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
}

?>
<link rel="stylesheet" href="inst.css">
     
     <!----===== Iconscout CSS ===== -->
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


        <form action="InsAdd.php" method="post" enctype="multipart/form-data">
<div class="form first">
     <div class="details personal">
     <span class="title">Instructor Details</span>
     
     <div class="fields">
            <div class="input-field">
  </div>
      <div class="input-field">              
      First Name <input placeholder="First Name" type="text" name="FN" required="required" maxlength="50">
                  
   </div>
   <div class="input-field"> 
      Last Name <input placeholder="Last Name" type="text" name="LN" required="required" maxlength="50">
   </div>
          <div class="input-field">

       Phone no. <input placeholder="Phone" type="tel" name="phone" required="required" onkeypress="return onlyNumberKey(event)" maxlength="100">
    
        </div>
               <div class="input-field">

        Description <textarea placeholder="Description" name="Describe" rows="4" cols="50"></textarea>
    
        </div>
              <div class="input-field">

       Please insert an image <input type="file" name="image" required="required">
    
        </div>
                        

       <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 150px;
                                  cursor: pointer;" input type="submit" name="submit" value="Add Instructor">
    
    <div class="input-field">
        <a href="../staff_Area.php" class="btn" style="font-size: 2rem;" >back</a>                         
       </div>
</form>
<br/><br>
</body>
</html>

