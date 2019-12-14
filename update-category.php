<?php

include "user_authlogin.php";
include "admin_auth.php";
include "post_config.php";


$c_name=$_POST['category_name'];
$id=$_POST['id'];

$p=new Post();
$p->updateCategory($c_name,$id);