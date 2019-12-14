<!doctype html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Thank</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body{
            background: #0f253c;
        }
    </style>
</head>
<body>
<div class="container" >
    <div class="col-sm-6 col-sm-offset-3 text-center" style="color: white">
        <h3>Thanks From MM Shopping</h3>
        <p>
            We will deliver to your giving address soon.
        </p>
        <img src="images/thanks.gif" style="margin-top: 50px">
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script>
    $(function () {
        setTimeout(function () {
            <?php
            if(isset($_SESSION['login']['role'])){
                ?> window.location.replace('dashboard.php'); <?php
            }else{
                ?>  window.location.replace('index.php'); <?php
            }
            ?>

        },3000)

        /*setInterval(function () {
            window.location.reload('index.php');
        },5000)*/
    })
</script>
</body>
</html>