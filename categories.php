<?php
include "user_authlogin.php";
include "admin_auth.php";
include "post_config.php";
$p=new Post();
$cate=$p->getCategory();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Shopping >> Categories</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php";?>

<div class="container">
    <?php include "message.php"; ?>
    <div class="page-header">
        <h4><i class="glyphicon glyphicon-th-list"></i> Categories</h4>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p style="margin-bottom: 30px; color: royalblue">
                <i class="glyphicon glyphicon-plus-sign"></i>
                New Category
            </p>
            <form method="post" action="new_category.php">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>
                <div class="form-group" style="margin-top: 18px">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <p style="margin-bottom: 20px; color:royalblue">
                <i class="glyphicon glyphicon-list-alt"></i>
                Available Categories
            </p>
            <table class="table table-hover">
                <tr style="background: lightgray">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($cate as $c){
                    ?>
                    <tr>
                        <td><?php echo $c['id'] ?></td>
                        <td><?php echo $c['category_name'] ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#e<?php echo $c['id'] ?>" href="#" style="margin-right: 10px">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <div id="e<?php echo $c['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-md">
                                    <form method="post" action="update-category.php">
                                        <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">Edit Category</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <input value="<?php echo $c['category_name'] ?>" type="text" name="category_name" id="category_name" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-lg">Save Change</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <a data-toggle="modal" data-target="#d<?php echo $c['id'] ?>" href="#" class="text-danger">
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </a>
                            <div id="d<?php echo $c['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">Confirm</div>
                                        <div class="modal-body text-center">
                                            <i class="glyphicon glyphicon-warning-sign"></i>
                                            <p>This will delete this category name of
                                                <b>"<?php echo $c['category_name'] ?>"</b>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete-category.php?id=<?php echo $c['id'] ?>">Agree</a>  <!--catch get method -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script> //disappear of message box
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();
        },2000)

    })
</script>

</body>
</html>
