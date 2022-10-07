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
    <link rel="stylesheet" href="../Main.css">
    <script src="my_custome.js"></script>
    <script >

    </script>
</head>
<body background="../maxresdefault.jpg"  style=" width: 100%;height: 100%;background-position: center;background-size:cover ; background-repeat: no-repeat;height:100%";">

<div class="Header container Content">
    <div class="divA">
        <h3>GYM</h3>
        <ul class="list-inline">
            <li><a href="../Main.php">Home</a></li>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Classes</a></li>
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
$res = excuteQuery("select * from Class");
$counter = 0;
$photo_tmp = new picture();
while($counter < count($res)){
    echo "<div class=\"Content\">"; //START
    $photo_tmp->fill_object($res[$counter]['pic_id']);
    echo "<div class=\"divA\">";// IMG START
    echo "<img width=\"300px\" height=\"300px\" style=\"border-radius: 8px;\" src=\"../../uploads/".$photo_tmp->getpicname()."\">";
    echo "</div>";// IMG END
    echo "<div class=\"divB\">";// Details START
    echo "<table class='table-a2'>";
    echo "<tr><td>&#160&#160</td><td colspan=\"2\"><h1>".$res[$counter]['class_name']."</h1></td><td>&#160&#160</td></tr>";
    echo "<tr>";
    echo "<td>&#160&#160</td><td>&#160&#160</td><td>&#160&#160</td><td><p>".$res[$counter]['class_describe']."</p></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>&#160&#160</td><td>&#160&#160</td><td>";
    echo "<td colspan=\"5\">";
    echo "<button style=\"float: right;\" id=\"Connect_CC_".$res[$counter]['class_id']."\" class=\"btn btn-primary\" onclick=\"GoTo(this)\"  value=\"".$res[$counter]['class_id']."\">More INFO</button>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";// Details START
    echo "</div>"; //END
    echo "<br/><br/>";
    $counter++;
}
?>


</body>
</html>

