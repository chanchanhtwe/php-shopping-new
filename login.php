<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping Login</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="homestyle.css" rel="stylesheet">
</head>
<body>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php include "navbar.php"; ?>

<div class="container">
    <div class="page-header"><h3>Welcome To Thaton Shopping</h3></div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Sign In</h3>
                </div>
                <div class="panel-body">

                        <form method="post" action="home.php">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <div class="form-group">
                                <input type="checkbox" name="remember" value="remember">
                                <label for="checkbox" class="control-label">Remember Me</label>
                                <a href="#!" id="pass">Forgot Password?</a>
                            </div>
                            <hr>
                            <div id="register">Don't have a account? <a href="register.php">REGISTER HERE</a></div>

                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>