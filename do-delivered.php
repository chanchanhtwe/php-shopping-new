<?php
include "user_authlogin.php";
include "admin_auth.php";
include "config.php";

$id=$_GET['id'];

$shop=new Shop();
$shop->doDelivered($id);
