
<html>
<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);

session_start();
if(!($_SESSION['SAL'] && $_SESSION['username'] )){
    echo '<script>alert("[ACCESS DENIED]")</script>';
    echo '<script type="text/javascript">location.href = \'Login.php\';</script>';
}
$username = $_SESSION['username'];
$tmp = $_SESSION["staff"];
session_unset();
if($tmp != 1) {
    session_destroy();
    echo '<script>alert("Illegal Request")</script>';
    echo '<script type="text/javascript">location.href = \'../../Hecker.html\';</script>';
}else{
    $_SESSION['go_addBRA'] = 1;
    $_SESSION['username'] = $username;
    $_SESSION['SAL'] = true;
}

?>
<script>
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
<body>
<form action="BraAdd.php" method="post" enctype="multipart/form-data">
    <tr>
        <td><input placeholder="Name" type="text" name="name" required="required" maxlength="50"></td>
    </tr>
    <br><br>
    <tr>
        <td><input placeholder="Phone" type="tel" name="phone" required="required" onkeypress="return onlyNumberKey(event)" maxlength="100"></td>
    </tr>
    <br><br>
    <tr>
        <td><textarea placeholder="Description" name="Describe" rows="4" cols="50"></textarea></td>
    </tr>
    <br><br>
    <tr>
        <td><input type="file" name="image" required="required">
    </tr>
    <br><br>
    <tr>
        <td colspan="2"><input type="submit" name="submit" value="Add Branch"></td>
    </tr>
</form>
<br/><br>
</body>
</html>

