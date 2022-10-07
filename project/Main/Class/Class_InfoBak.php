<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/Branch.php";
require "../../Global_Stuff/GClass.php";
require "../../Global_Stuff/Instructor.php";

error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
?>
<html>
<head>
    <title>Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Main.css">
    <script src="my_custome.js"></script>
    
    </script>
</head>
<body background="../maxresdefault.jpg"  style=" width: 100%;height: 100%;background-position: center;background-size:cover ; background-repeat: no-repeat;height:100%";">

<div class="Header container Content">
    <div class="divA">
        <h3>GYM</h3>
        <ul class="list-inline">
            <li><a href="../Main.php">Home</a></li>
            <li><a href="#">Menu 1</a></li>
            <li><a href="Class.php">Classes</a></li>
            <li><a href="../Contact/Contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="divB" style="text-align: right">
        <div class="divB">
            login
        </div>
    </div>
</div>
<br>

<?php
$tmp_class = new GClass();
$id = $_GET['class'];
if($id >= 1 && $id <= GClass::count_member()){
    $tmp_class->fill_object($id);
    $photo_tmp = $tmp_class->getPic();
    echo "<div class=\"Content\">";
    echo "<div class=\"divA\">";
    echo "<img width=\"100%\" height=\"100%\" src=\"../../uploads/".$photo_tmp->getpicname()."\">";
    echo "</div>";
    echo "<div class=\"divB\">";
    echo "<h1 style='color: black'>".$tmp_class->getName()."</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo "<h3 style='color: black'>".$tmp_class->getDay()."</h3>";
    echo "</td>";
    echo "<td>";
    echo "<h3 style='color: black'>".$tmp_class->getStart()."-".$tmp_class->getEnd()."</h3>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    //###########################################
    echo "<div class=\"Content\">";
    echo "<div class=\"divA\">";
    echo "<h1>".$tmp_class->getDescribe()."</h1>";
    echo "</div>";
    echo "</div>";
    //###########################################
    echo "<div class=\"Content\">";
    echo "<div class=\"divA\">";
    echo "<h1>Instructors</h1>";
    echo "</div>";
    echo "<div class=\"divB\">";
    $query = "SELECT CONCAT(Instructor.Ins_Firstname, ' ', Instructor.Ins_Lastname) as name,Instructor.Ins_Description,Instructor.Ins_pic
              FROM Instructor
              WHERE Ins_id  IN (SELECT Ins_id
                                FROM  Instructor   JOIN Ins_Class USING(Ins_id)
                                WHERE class_id = ".$id.")";
    $res = excuteQuery($query);
    $counter = 0;
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    echo "<table class='table-a1'>";
    $pic_tmp = new picture();
    while($counter < count($res)){
      $pic_tmp->fill_object($res[$counter]['Ins_pic']);
        echo "<tr>";
        echo "<td><img width=\"40%\" height=\"40%\" src=\"../../uploads/".$pic_tmp->getpicname()."\"></img></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h1>".$res[$counter]['name']."</h1></td>";
        echo "</tr>";
        echo "<tr><td><p>".$res[$counter]['Ins_Description']."</p></td></tr>";
        $counter++;
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";

}else{
    echo '<script>alert("[CLASS NOT FOUND]")</script>';
    echo '<script type="text/javascript">location.href = \'Class.php\';</script>';
}
?>


</body>
</html>

