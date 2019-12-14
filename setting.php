<?php
    include "user_authlogin.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Setting</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php include "navbar.php"; ?>

<div class="container">
    <div class="page-header text-center">
        <h4><i class="glyphicon glyphicon-cog"></i> User account setting</h4>
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-offset-3">
            <div class="thumbnail" style="background: gainsboro">
                <table class="table table-responsive " style="padding: 15px; margin: 10px;">
                    <tr>
                        <td class="col-sm-3"><i class="glyphicon glyphicon-user" style="margin-right: 5px"></i> Username</td>
                        <td class="col-sm-9">:  <span style="margin-left: 20px" ><?php echo $_SESSION['login']['name'] ?></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-3"><i class="glyphicon glyphicon-envelope" style="margin-right: 5px"></i> Email</td>
                        <td class="col-sm-9">:  <span style="margin-left: 20px"><?php echo $_SESSION['login']['email'] ?></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-3"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i> Role</td>
                        <td class="col-sm-9">:  <span style="margin-left: 20px"><?php
                            if($_SESSION['login']['role'])
                            { echo "Admin"; }
                            else
                            { echo "User";}
                                ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-3"><i class="glyphicon glyphicon-time" style="margin-right: 5px"></i> Member Since</td>
                        <td class="col-sm-9">:  <span style="margin-left: 20px"><?php //echo $_SESSION['login']['created_at'];
                            echo date("D d m/Y h:i s A",strtotime($_SESSION['login']['created_at']));
                                ?></span>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>


</body>
</html>