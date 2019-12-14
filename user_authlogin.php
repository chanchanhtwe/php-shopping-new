<?php
session_start();

if(!isset($_SESSION['login'])){//if session login start, you can log in.
    header("location:loginshop.php");
    exit();
}