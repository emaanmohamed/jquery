<?php
session_start();
if (isset($_SESSION["username"]))
{
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Syntax</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <style>
        #box
        {
            width:100%;
            max-width:500px;
            border:1px solid #ccc;
            border-radius:5px;
            margin:0 auto;
            padding:0 20px;
            box-sizing:border-box;
            height:270px;
        }
    </style>
</head>
<body>
<div class="container ">
    <h2 align="center">How to Use Ajax with PHP for Login with Shake Effect</h2><br /><br />
    <div id="box">
        <br />
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="form-group">
                <input type="button" name="login" id="login" class="btn btn-success" value="Login" />
            </div>
            <div id="error"></div>
        </form>
        <br />

    </div>
</div>

    <script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#login').click(function(){
            var username = $('#username').val();
            var password = $('#password').val();
            if($.trim(username).length > 0 && $.trim(password).length > 0)
            {
                $.ajax({
                    url:"login.php",
                    method:"POST",
                    data:{username:username, password:password},
                    cache:false,
                    beforeSend:function(){
                        $('#login').val("connecting...");
                    },
                    success:function(data)
                    {
                        if(data)
                        {
                            $("body").load("home.php").hide().fadeIn(1500);
                        }
                        else
                        {
                            var options = {
                                distance: '40',
                                direction:'left',
                                times:'3'
                            }
                            $("#box").effect("shake", options, 800);
                            $('#login').val("Login");
                            $('#error').html("<span class='text-danger'>Invalid username or Password</span>");
                        }
                    }
                });
            }
            else
            {

            }
        });
    });
</script>
</body>
</html>