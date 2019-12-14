<?php
include "user_authlogin.php";
include "admin_auth.php";
include "post_config.php";

$id=$_GET['id'];

//echo $id;
$p=new Post();
$p->deleteCategory($id);
