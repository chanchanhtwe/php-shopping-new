<?php

class Shop{
    public $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=206.189.82.145; dbname=shopping", "root", "phpsqlPaSsWoRd");//connect database

        } catch (PDOException $e) {
            die("Connection failed to database server.");
        }
    }
    public function doDelivered($id){
        $sql="update orders set status=1 where id='$id'";
        $this->db->query($sql);
        header("location:orders.php");
    }
    public function getOrderForAdmin(){
        $sql="select * from orders order by status asc";
        return $this->db->query($sql);
    }
    public function getOrderForUser(){
        $email=$_SESSION['login']['email'];
        $sql="select * from orders where email='$email'";
        return $this->db->query($sql);
    }
    public function getOrderItem($order_id){
        $sql="select * from order_items where order_id='$order_id'";
        return $this->db->query($sql);
    }
    public function checkoutOrder($f_name, $phone, $address){
        $email=$_SESSION['login']['email'];
        $sql_order="insert into orders (full_name, email, phone, address, order_at) 
                    values ('$f_name','$email', '$phone', '$address', now())";
        $this->db->query($sql_order);

        $order_id=$this->db->lastInsertId();

        foreach ($_SESSION['cart'] as $id=>$qty){
            $posts="select * from post where id='$id'";
            $items=$this->db->query($posts);

            foreach ($items as $i){
                $item_name=$i['item_name'];
                $price=$i['price'];

                $sql="insert into order_items (order_id, item_name, price, qty) 
                      values ('$order_id', '$item_name','$price', '$qty')";
                $this->db->query($sql);
            }
        }

        unset($_SESSION['cart']);
       // echo"success";
        header("location:thank.php");
    }
    public function getPostForCart($id){
        $sql="select * from post where id='$id'";
        return $this->db->query($sql);
    }
    public function getPostSearch($q){
        $sql="select post.*, category.category_name, users.name from post 
              left join category on category.id=post.category_id 
              left join users on users.id=post.user_id where item_name LIKE '%$q%' order by id desc";
        return $this->db->query($sql);
    }
    public function getPostByCategory($cat_id){
        $sql="select post.*, category.category_name, users.name from post 
              left join category on category.id=post.category_id 
              left join users on users.id=post.user_id where category_id='$cat_id' order by id desc";
        return $this->db->query($sql);
    }
    public function getPosts(){
        $sql="select post.*,category.category_name,users.name from post 
              left join category on category.id=post.category_id left join users on users.id=post.user_id order by id desc";
        return $this->db->query($sql);
    }
    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
}