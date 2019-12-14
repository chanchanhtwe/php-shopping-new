<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Login</title>
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
            <?php include"message.php"; ?>
            <h2 class="text-center">Sign in to continue</h2>
            <form method="post" action="post_login.php">
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
            Don't have an account ? <a href="registershop.php">Sign Up</a>
        </div>
    </div>
</div>

</body>
</html>