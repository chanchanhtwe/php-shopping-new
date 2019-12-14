<?php
include "user_authlogin.php";
include "admin_auth.php";
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
    <title>MM Shopping >> Orders</title>
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

<div class="container">

        <h4 style="margin-bottom: 20px; padding-bottom: 10px"><i class="glyphicon glyphicon-list-alt"></i> Order items</h4>

        <?php
        $order=$shop->getOrderForAdmin();

        foreach ($order as $od):
            ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div style="border-right: 1px solid" class="col-sm-4">
                            <p style="color: royalblue">Order ID : <?php echo $od['id'] ?></p>
                            <p>Name : <?php echo $od['full_name'] ?></p>
                            <p>Email : <?php  echo  $od['email']?></p>
                            <p>Phone : <?php echo $od['phone'] ?></p>
                            <p>Order Date : <?php echo date("D m/Y h:i A",strtotime($od['order_at'])) ?></p>
                            <p>Status: <?php if($od['status']){
                                    echo "<span class='text-success'>Finish Delivered</span>";
                                }else{
                                    echo "<span class='text-danger'>Waiting For Delivered</span>";
                                } ?></p>
                            <?php
                            if($od['status']==null){
                                ?>
                                <a class="btn" style="background: #0f5e77; color: white; font-size: 16px" href="do-delivered.php?id=<?php echo $od['id']; ?>">Delivered Now</a>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="col-sm-8">

                            <table class="table table-hover">
                                <tr style="background: lightgray">
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
                                        <td>$ <?php echo $i['price'] ?></td>
                                        <td><?php echo $i['qty'] ?></td>
                                        <td>$ <?php echo $i['qty']*$i['price'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr style="font-size: 19px; color: royalblue">
                                    <td colspan="3" class="text-right">Total Amount</td>
                                    <td>$ <?php echo $totalAmount; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endforeach;
        ?>
</div>
</body>
</html>