<?php
include"config.php";
$shop=new Shop();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        .btnAddCart{
            display:block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            background: #f68731;
            color: #fff;
            border-radius: 50px;
            position:absolute;
            top:80px;
            right: 0;
        }
        .btnAddCart:hover{
            background: #f68731;
            color:#0f253c;

        }
        i{
            padding-right: 2.5px;
        }
    </style>
</head>
<body>
<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php include "navbar.php"; ?>

<div class="container">
    <?php include "menu.php"; ?>


    <div class="row">
        <?php

        //print_r($_SESSION['cart']);

        if(!empty($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
            $posts=$shop->getPostByCategory($cat_id);
        }elseif (!empty($_GET['q'])){
           $q=$_GET['q'];
           $posts=$shop->getPostSearch($q);
        }
        else{
            $posts=$shop->getPosts();
        }

        foreach ($posts as $p):
            ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail">
                    <img src="postsimg/<?php echo $p['image'] ?>" style="height: 240px">
                    <p class="text-center" style="margin-top: 10px; color: darkblue; font-style: oblique;">
                        <?php echo $p['item_name'] ?>
                    </p>
                    <div>
                        <small style="margin-right: 3px; margin-left: 5px;">
                            <i class="glyphicon glyphicon-user" ></i> <?php echo $p['name']?>
                        </small>&nbsp;
                        <small style="margin-right: 3px">
                            <i class="glyphicon glyphicon-tags" ></i> <?php echo $p['category_name'] ?>
                        </small>&nbsp;
                        <small class="badge">
                            $ <?php echo $p['price'] ?>
                        </small>
                    </div>
                    <a href="add-to-cart.php?id=<?php echo $p['id']?>" class="btnAddCart">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <i class="glyphicon glyphicon-plus-sign"></i>
                    </a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>


</body>
</html>