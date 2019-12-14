<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Register Page</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="homestyle.css" rel="stylesheet">

</head>
<body>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<div class="container">
    <div class="page-header"><h3>Welcome to Thaton Shopping</h3></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Register Form</h3></div>
                    <div class="panel-body">
                        <form method="post" action="home.php">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>
</html>