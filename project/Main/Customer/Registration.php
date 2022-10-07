<?php
session_start();
session_unset();
$_SESSION['go_Reg'] = 1;
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="reg.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<html>
    <head>
        <script>
            function onlyNumberKey(evt) {
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        </script>
    </head>
    
   
<body>

<video autoplay muted loop id="myVideo">
  <source src="gym2.mp4" type="video/mp4">
</video>

    <div class="container">
        <header>Registration</header>
        

        <form action="DoReg.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input placeholder="First Name" type="text" name="FN" required="required" maxlength="50">
                        </div>
                        <div class="input-field">
                            <label>Last Name</label>
                            <input placeholder="Last Name" type="text" name="LN" required="required" maxlength="50">
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input  type="date" name="birthdate" required="required">
                        </div>

                     <!--   <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div> -->

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input placeholder="Phone" type="tel" name="phone" required="required" onkeypress="return onlyNumberKey(event)" maxlength="100">
                        </div>
  

                        <div class="input-field">
                            <label>Username</label>
                            <input placeholder="Username" type="text" name="username" required="required" maxlength="50">
                        </div>


                        <div class="input-field">
                            <label>Password</label>
                            <input placeholder="Password" type="password" name="password" required="required" maxlength="50">
                        </div>

                    

                      
                    <input style="color: rgb(244, 244, 244);
                                  margin-top: 2rem;
                                  padding: 5px;
                                  background:rgb(22, 154, 152) ;
                                  border-radius: 4px;
                                   width: 150px;
                                  cursor: pointer;"   type="submit" name="submit" value="Register">
                    

                </div> 
            </div>
        </form>
    </div>

  
</body>
</html>