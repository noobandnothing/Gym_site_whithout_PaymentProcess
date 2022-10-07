<?php
session_start();
session_unset();
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h1 id="hello"></h1>
<script src="index.js"></script>
<body style="align-content: center;text-align: center">
<p><b>Each of them Should be configured on Different Ports</b></p>
<table style=" margin-left: auto;margin-right: auto;">
    <tr>
        <td><label> &#160&#160  &#160&#160&#160&#160 </label></td>
        <td> <button id="Main" class="btn btn-primary" onclick="GoTo(this)" >Main AREA</button></td>
        <td><label> &#160&#160 </label></td>
        <td> <button id="Stuff" class="btn btn-primary" onclick="GoTo(this)" >Stuff Area</button></td>
    </tr>
</table>
</body>
</html>
