<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/Branch.php";
require "../../Global_Stuff/GClass.php";
require "../../Global_Stuff/Instructor.php";
require "../../Global_Stuff/Customer.php";

?>
<html>
<head>
    <title>Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="class_info.css">
    <script src="my_custome.js"></script>
   
    </script>
</head>


<body class="body">
    
    

    <header class="header">
        <h2>AAST <br>&nbsp &nbspGym</h2>
        <nav class="navbar">
        <a href="../Main.php">Home</a>
        <a href="../gallery/gallery.php">Gallery </a>
        <a href="../Class/Class.php">Classes</a>
        <a href="../Contact/Contact.php">Contact</a>

        
            <?php session_start(); if(isset($_SESSION['SL'])){?>
                <a  style="width:auto;"><?php echo $_SESSION['username'];?></a>
                <a id="LogOut"  href="../Customer/Logout.php"  style="width:auto;">Log out</a>
            <?php }else {?>
                <a onclick="document.getElementById('id01').style.display='block'" class="btn"  style="font-style:italic;">Login</a>
            <?php }?>
        </nav>
    </header>
      
      
            

<br><br><br><br><br>
<br><br><br>
<br>

<section class="container">
<?php
$tmp_class = new GClass();
$id = $_GET['class'];
if($id >= 1 && $id <= GClass::count_member()){
    //
    if(isset($_SESSION['username'])){
        $cus_usr = $_SESSION['username'];
        $cus_tmp = new Customer();
        $cus_tmp->fill_object_u($cus_usr);
        $res = null;
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        if($cus_tmp->getId()){
            $res = excuteQuery("SELECT * FROM subscription WHERE cust_id =".$cus_tmp->getId()." and class_id = ".$id." and  DATE_FORMAT(Sub_date,'%Y%m') >=  DATE_FORMAT('".$today."','%Y%m')");
        }
    }
    
    //class info
    echo "<section>";
    $tmp_class->fill_object($id);
    $photo_tmp = $tmp_class->getPic();
    echo "<div class=\"card\">";
    echo "<img class=\"card-image\" src=\"../../uploads/".$photo_tmp->getpicname()."\">";
  
    echo "<h1>".$tmp_class->getName()."</h1>";
    echo "<h3>".$tmp_class->getDay()."</h3>";
    echo "<h3>".$tmp_class->getStart()."-".$tmp_class->getEnd()."</h3>";
    echo "<p>".$tmp_class->getDescribe()."</p>";
   
    if(isset($_SESSION['SL'])){
        if($res != false && $res != null){
            echo "<button id=\"unSub_Customer\" class=\"btn\" onclick=\"GoTo(this)\"  value=\"" . $id . "\">UnSubscribe</button>";
        }else {
            echo "<button  id=\"Sub_Customer\" class=\"btn\" onclick=\"GoTo(this)\"  value=\"" . $id . "\">Subscribe</button>";
        }
    }

    echo "</section>";

    
    
   
    
    $query = "SELECT CONCAT(Instructor.Ins_Firstname, ' ', Instructor.Ins_Lastname) as name,Instructor.Ins_Description,Instructor.Ins_pic
              FROM Instructor
              WHERE Ins_id  IN (SELECT Ins_id
                                FROM  Instructor   JOIN Ins_Class USING(Ins_id)
                                WHERE class_id = ".$id.")";

    $res = excuteQuery($query);
    $counter = 0;
    $pic_tmp = new picture();
    while($counter < count($res)){
      $pic_tmp->fill_object($res[$counter]['Ins_pic']);
        echo "<div class=\"card\">";
        echo "<img class=\"card-image\" src=\"../../uploads/".$pic_tmp->getpicname()."\"></img>";
        echo "<h2>Instructor</h2>";
        echo "<h1 style =\"color:  grey ;font-style:normal; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; padding-left: 10px;\">".$res[$counter]['name']."</h1>";
        echo "<p>".$res[$counter]['Ins_Description']."</p>";
        echo "</div>";

        $counter++;
    }
    echo "</section>";

}else{
    echo '<script>alert("[CLASS NOT FOUND]")</script>';
    echo '<script type="text/javascript">location.href = \'Class.php\';</script>';
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

