<?php
?>
<htm>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: black">

    <form class="" action="dologin.php" method="post" style="align-content: center;text-align: center">
        <h1 style="color:white;">ADMIN AREA</h1>
        <img src="../uploads/login.jpg" alt="Avatar" class="avatar"><br>

        <input type="text" placeholder="Enter Username" name="uname" required><br><br>

        <input type="password" placeholder="Enter Password" name="psw" required><br><br>

        <button type="submit"  class="cus btn btn-primary" name="submit">Login</button>
    </form>

    </body>
</htm>