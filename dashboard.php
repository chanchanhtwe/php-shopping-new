<?php
include "user_authlogin.php";
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
    <title>MM Shopping</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        a{
            color: #8b0f20;
        }
    </style>
</head>
<body>
<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<?php include "navbar.php"; ?>

<div class="container" style="margin-top: 40px">
    <?php
    if($_SESSION['login']['role']){
        ?>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-body bg-warning">
                        <h4>
                            <i class="glyphicon glyphicon-tags"></i> Posts
                        </h4>
                        <hr>
                        <a style="display: block" href="posts.php">More >></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-body bg-info">
                        <h4>
                            <i class="glyphicon glyphicon-list-alt"></i> Categories
                        </h4>
                        <hr>
                        <a style="display: block" href="categories.php">More >></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="panel panel-primary">
                    <div class="panel-body bg-success">
                        <h4>
                            <i class="glyphicon glyphicon-list-alt"></i> Orders
                        </h4>
                        <hr>
                        <a style="display: block" href="orders.php">More >></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }else{
        ?>
        <h4>Your order items.</h4>

        <?php
        $order=$shop->getOrderForUser();

        foreach ($order as $od):
            ?>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div style="border-right: 1px solid" class="col-sm-4">
                                <p>Order ID : <?php echo $od['id'] ?></p>
                                <p>Name : <?php echo $od['full_name'] ?></p>
                                <p>Email : <?php  echo  $od['email']?></p>
                                <p>Phone : <?php echo $od['phone'] ?></p>
                                <p>Order Date : <?php echo date("D m/Y h:i A",strtotime($od['order_at'])) ?></p>
                                <p>Status: <?php if($od['status']){
                                        echo "<span class='text-success'>Finish Delivered</span>";
                                    }else{
                                        echo "<span class='text-warning'>Waiting For Delivered</span>";
                                    } ?></p>
                            </div>
                            <div class="col-sm-8">

                                <table class="table table-hover">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                    </tr>
                                    <?php
                                    $items=$shop->getOrderItem($od['id']);
                                    $totalAmount=0;
                                    foreach ($items as $i){
                                        $totalAmount+=$i['qty']*$i['price'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i['item_name'] ?></td>
                                            <td><?php echo $i['price'] ?></td>
                                            <td><?php echo $i['qty'] ?></td>
                                            <td><?php echo $i['qty']*$i['price'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-right">Total Amount</td>
                                        <td><?php echo $totalAmount; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
        endforeach;
        ?>
        <?php
    }
    ?>
</div>
</body>
</html>