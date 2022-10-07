<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/Instructor.php";

?>
<html>
<head>
    <title>Classes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="class.css">
    <script src="my_custome.js"></script>
</head>

<body class="body">
    
    

    <header class="header">
        <h2>AAST <br>&nbsp &nbspGym</h2>
        <nav class="navbar">
        <a href="../Main.php">Home</a>
        <a href="../gallery/gallery.php">Gallery </a>
        <a href="#">Classes</a>
        <a href="../Contact/Contact.php">Contact</a>

        
            <?php session_start(); if(isset($_SESSION['SL'])){?>
                <a  style="width:auto;"><?php echo $_SESSION['username'];?></a>
                <a id="LogOut" onclick="GoTo(this)" style="width:auto;">Log out</a>
            <?php }else {?>
                <a onclick="document.getElementById('id01').style.display='block'" class="btn"  style="font-style:italic;">Login</a>
            <?php }?>
        </nav>
    </header>
    
    
       
    
</div>


<br><br><br><br>
<br><br><br>
<br>


<section class=container>
<?php
$res = excuteQuery("select * from Class");
$counter = 0;
$photo_tmp = new picture();
while($counter < count($res)){
     //START
    
    $photo_tmp->fill_object($res[$counter]['pic_id']);
   
    echo "<div class=\"card\">";// IMG START
    echo "<img  class=\"card-image\" src=\"../../uploads/".$photo_tmp->getpicname()."\">";
    echo "<h1>".$res[$counter]['class_name']."</h1>";
    echo "<p>".$res[$counter]['class_describe']."</p>";
    echo "<button  id=\"Connect_CC_".$res[$counter]['class_id']."\"  onclick=\"GoTo(this)\"  value=\"".$res[$counter]['class_id']."\">More INFO</button>";
    echo "</div>";// IMG END
  
   

   
    $counter++;
}
?>

</section>


<div id="id01" class="modal">

    <form class="modal-content animate" action="../Customer/Login.php" method="post" style="background-color: black">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../../uploads/login.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container-cus">
            <input type="text" placeholder="Enter Username" name="uname" required>

            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit"  class="cus" name="submit">Login</button>
        </div>

        <div class="container-cus" style="background-color: black">
            <button type="button" class=" cancelbtn" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <button style="float: right" type="button" class="cancelbtn" id="REG" onclick="GoTo(this)">Register</button>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>



</html>

