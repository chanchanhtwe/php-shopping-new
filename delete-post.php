<?php

include "user_authlogin.php";
include "admin_auth.php";
include "post_config.php";

$id=$_GET['post_id'];

$p=new Post();
$p->deletePost($id);
