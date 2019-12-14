<?php

include "user_authlogin.php";
include "admin_auth.php";
include "post_config.php";
$p=new Post();
$posts=$p->getPost();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Posts</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-datatable.css" rel="stylesheet">
</head>
<body>
<?php
include "navbar.php";
?>
<div class="container">
    <div class="page-header">
        <h4>
            <i class="glyphicon glyphicon-tag"></i> Posts
            <a href="new-post.php" class="pull-right">
                <i class="glyphicon glyphicon-plus-sign"></i> New Posts
            </a>
        </h4>
    </div>

    <?php include "message.php"; ?>
    <div class="table-responsive">
        <table class="table table-hover" id="myTable">
            <thead>
                <tr style="background: gainsboro">
                    <th>Id</th>
                    <th>Images</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php
                foreach ($posts as $p):
                    ?>
                        <tr>
                            <td><?php echo $p['id']?> </td>
                            <td class="col-sm-2"><img class="img-responsive img-rounded" src="postsimg/<?php echo $p['image'] ?>" style="height: 200px"></td>
                            <td><?php echo $p['item_name']; ?></td>
                            <td><?php echo $p['price']; ?></td>
                            <td><?php echo  $p['category_name'] ?></td>
                            <td><?php echo date("d m/Y h:i A",strtotime(($p['post_at'])))?></td>
                            <td>
                                <a style="margin-right: 10px" href="edit-post.php?id=<?php echo $p['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                <a data-toggle="modal" data-target="#d<?php echo $p['id'] ?>" href="#" class="text-danger">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                                <div id="d<?php echo $p['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">//display modal box
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">Confirm</div>
                                            <div class="modal-body text-center">
                                                <i class="glyphicon glyphicon-warning-sign"></i>
                                                <p>This will delete this item name of
                                                    <b>"<?php echo $p['item_name'] ?>"</b>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="delete-post.php?post_id=<?php echo $p['id'] ?>">Agree</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php

                endforeach;
            ?>
        </table>
    </div>

</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery-datatable.js"></script>
<script src="bootstrap/js/bootstrap-datatable.js"></script>
<script>
    $(function () {
       $("#myTable").dataTable();
    })
</script>
</body>
</html>
