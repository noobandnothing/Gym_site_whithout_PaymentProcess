<?php
session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'Login.php\';</script>';
}
$_SESSION["staff"] = true;

?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="staff_a.css">
<h1 id="hello"></h1>
<script src="my_custome.js"></script>
    <body class="body">
      
        <table>
            <tr>
                <td><label> &#160&#160 </label></td>
                <td> <button id="" class="btn" onclick="GoTo(this)"  style="background-color: grey">Add</button></td>
                <td><label> &#160&#160  &#160&#160&#160&#160 </label></td>
                <td> <button id="AddBRA" class="btn btn-primary" onclick="GoTo(this)" >Add Branch</button></td>
                <td><label> &#160&#160 </label></td>
                <td> <button id="AddINS" class="btn btn-primary" onclick="GoTo(this)" >Add Instructor</button></td>
                <td><label> &#160&#160 </label></td>
                <td> <button id="AddCLASS" class="btn btn-primary" onclick="GoTo(this)" >Add Class</button></td>
                <td><label> &#160&#160 </label></td>
            </tr>

        </table>
        <br><br>
        <table>
            <tr>
                <td><label> &#160&#160 </label></td>
                <td> <button id="" class="btn" onclick="GoTo(this)"  style="background-color: grey">Class</button></td>
                <td><label> &#160&#160  &#160&#160&#160&#160 </label></td>
                <td> <button id="Connect_CI" class="btn btn-primary" onclick="GoTo(this)" >Connect Instructor</button></td>
            <!--    <td><label> &#160&#160 </label></td>
                <td> <button id="Connect_CC" class="btn btn-primary" onclick="GoTo(this)" >Connect Customer</button></td>
                <td><label> &#160&#160 </label></td>-->
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <td><label> &#160&#160 </label></td>
                <td> <button id="" class="btn" onclick="GoTo(this)"  style="background-color: grey">Admin</button></td>
                <td><label> &#160&#160  &#160&#160&#160&#160 </label></td>
                <td> <button id="Add_Admin" class="btn btn-primary" onclick="GoTo(this)" >Add Admin</button></td>
                <td><label> &#160&#160 </label></td>
                <td> <button id="Remove_Admin" class="btn btn-primary" onclick="GoTo(this)" >Remove Admin</button></td>
                <td><label> &#160&#160 </label></td>
            </tr>
        </table>
    </body>
</html>
