<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Sign Up</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        h2{
            color: #054cff;
            margin-bottom: 40px;
        }

    </style>
</head>
<body>
<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php include "navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php include "message.php"; ?>
            <h2 class="text-center">Sign up New Account</h2>
            <form method="post" action="post_register.php">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sing up</button>
                </div>
            </form>
            Already have an account ? <a href="loginshop.php">Sign in</a>
        </div>
    </div>
</div>
</body>
</html>