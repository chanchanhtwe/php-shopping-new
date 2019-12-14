<?php
session_start();
if(!isset($_SESSION['cart'])){
    header("location:index.php");
    exit();
}
include "config.php";
$shop=new Shop();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Shopping</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        i{
            margin: 3px;
        }
    </style>
</head>
<body>
<?php include "navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            if(!isset($_SESSION['login'])){
                ?>
                <p>
                    Please login <a href="loginshop.php">here</a> to continue your order.
                </p>
                <?php
            }else{
                ?>
                <h4 style="color: royalblue">Fill your address to delivered</h4>
                <form method="post" action="checkout-order.php">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                <?php

            }
            ?>
        </div>
        <div class="col-sm-8">
            <h4 style="color:royalblue">Your shopping cart</h4>
            <table class="table table-hover">
                <tr style="background: lightgray">
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
                <?php
                foreach($_SESSION['cart'] as $id=>$qty){
                    $posts=$shop->getPostForCart($id);
                    foreach ($posts as $item){
                        ?>
                        <tr>
                            <td><?php echo $item['item_name'] ?></td>
                            <td><?php echo $item['price'] ?></td>
                            <td>
                                <a href="decrease-cart.php?id=<?php echo $item['id']; ?>"><i class="glyphicon glyphicon-minus-sign"></i></a>
                                <?php echo $qty; ?>
                                <a href="increase-cart.php?id=<?php echo $item['id']; ?>"><i class="glyphicon glyphicon-plus-sign"></i> </a>
                            </td>
                            <td><?php echo $qty * $item['price']; ?></td>
                        </tr>
                        <?php
                    }

                }
                ?>
            </table>
            <div class="col-sm-6">
                <a href="index.php" class="text-success">Continued Shopping</a>
            </div>
            <div class="col-sm-6">
                <a href="cancel-shopping.php" class="text-danger">Cancel Shopping</a>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>