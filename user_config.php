<?php
session_start();
class User{
    public $db;
    public function __construct()
    {
        try{
            $this->db=new PDO("mysql:host=206.189.82.145; dbname=shopping","root","phpsqlPaSsWoRd");//connect database

        }catch(PDOException $e){
            die("Connection failed to database server.");
        }
    }

    public function register($name,$email,$password,$confirm_password){
       // echo $name, $email, $password, $confirm_password;
        $sql="select email from users where email='$email'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($row)){

            if($password==$confirm_password){

                $enc_password=md5($password);
                $new_sql="insert into users (name,email,password,created_at) values 
                            ('$name','$email','$enc_password',now())";
                $this->db->query($new_sql);
                $_SESSION['success']="The user account has been created.";
                header("location:registershop.php");

            }else{
                $_SESSION['error']="The password and confirm_password must match.";
                header("location:registershop.php");
            }

        }else{
            $_SESSION['error']="The selected email is existed.";
            header("location: registershop.php");
        }
    }

    public function login($email,$password){
       $sql="select* from users where email='$email'";
       $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
       if(!empty($row)){
           $old_password=$row['password'];
           $new_password=md5($password);
           if($new_password==$old_password){

               $_SESSION['login']=$row;

               if($_SESSION['login']['role']){
                   header("location:dashboard.php");
               }else{
                   header("location:index.php");
               }


           }else{
               $_SESSION['error']="Authentication failed.";
               header("location:loginshop.php");
           }

       }else{
           $_SESSION['error']="Email is invalid.";
           header("location:loginshop.php");
       }
    }
}
//new User();