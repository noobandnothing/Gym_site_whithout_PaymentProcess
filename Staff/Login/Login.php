<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../../Default/Form-Style.css">
    <style>
        .full-screen-container {
            background-image: url("../../Default/S_A_156.jpg");
        }
        .login-container {
            background-color: rgba(0,0,0,0.7);
        }
        .login-button {
            background-color: rgba(0,0,0,.25);
            border: 1px solid hsl(var(--primary-hsl));
        }

        .login-button:hover,
        .login-button:focus {
            background-color:  rgba(0,0,0,0.8);
        }
    </style>
    <script src="mediator.js" ></script>
</head>
<body>
<div class="full-screen-container">

    <div class="login-container">
        <h1 class="login-title">Welcome</h1>
        <form class="form" id="login-form" method="post">
            <!--<div class="input-group" id="Error-Message">
                <p style="text-align: center; color: red ; font-size: 20px">Invalid Input</p>
                 <span class="msg" style="visibility: hidden"></span>
            </div> !-->

            <div class="input-group">
                <label for="email">Username</label>
                <input type="text" placeholder="Enter Username" name="uname" id="username">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password"  placeholder="Enter Password" name="psw" id="password">
            </div>
            <button type="submit" class="login-button">Login</button>
            <button type="button" class="trans_btn" id="fp_button">Forgotten password ?</button>
            <button type="button" class="trans_btn" id="na_button">Register</button>

        </form>
    </div>

</div>
</body>
</html>