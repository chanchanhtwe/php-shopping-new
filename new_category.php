<?php
include "user_authlogin.php";
include "admin_auth.php";

include "post_config.php";

$c_name=$_POST['category_name'];

$p=new Post();
$p->newCategory($c_name);