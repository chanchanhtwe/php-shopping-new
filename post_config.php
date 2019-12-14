<?php
session_start();

class Post{
    public $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=206.189.82.145; dbname=shopping", "root", "phpsqlPaSsWoRd");//connect database

        } catch (PDOException $e) {
            die("Connection failed to database server.");
        }
    }
    public function updatePost($id,$item_name,$price,$category_id,$image){
        //echo $id,$item_name,$price,$category_id;
        $user_id=$_SESSION['login']['id'];
        if(!empty($image['name'])){

            $old_sql="select image from post where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_image=$old_row['image'];
            unlink("postsimg/$old_image");

            $img_name=date("d-m-y-h-i-s")."-".$image['name'];
            $img_tmp=$image['tmp_name'];

            move_uploaded_file($img_tmp,"postsimg/$img_name");

            $sql="update post set image='$img_name', item_name='$item_name', price='$price', category_id='$category_id', user_id='$user_id' where id='$id'";

        }else{
            $sql="update post set item_name='$item_name', price='$price', category_id='$category_id', user_id='$user_id'where id='$id'";
        }
        $this->db->query($sql);
        $_SESSION['success']="The selected post have been updated.";
        header("location:posts.php");

    }
    public function getPostOne($id){
        $sql="select * from post where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function deletePost($id){
        $old_sql="select image from post where id='$id'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        $old_image=$old_row['image'];

        unlink("postsimg/$old_image");  // delete image from folder

        $sql="delete from post where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="The selected post have been deleted.";
        header("location:posts.php");
    }
    public function getPost(){     // 5 method for post
        $sql="select post.*, category_name from post left join category on category.id=post.category_id order by id desc";
        return $this->db->query($sql);
    }
    public function newPost($image,$item_name,$price,$category_id){ //fourth method
        $img_name=date("d-m-y-h-i-s")."-".$image['name'];
        $img_tmp=$image['tmp_name'];
        $user_id=$_SESSION['login']['id'];

        $sql="insert into post (item_name, price, image, category_id, user_id, post_at) 
              values ('$item_name','$price','$img_name','$category_id','$user_id',now())";
        $r=$this->db->query($sql);

        if($r){
            move_uploaded_file($img_tmp,"postsimg/$img_name");
            $_SESSION['success']="The post has been created.";

        }else{
            $_SESSION['error']="The post created failed.";
        }
        header("location:new-post.php");
    }
    public function updateCategory($c_name,$id){  //third method
        $sql="update category set category_name='$c_name' where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="The selected category has been updated.";
        header("location:categories.php");
    }
    public function deleteCategory($id){  //second method
        $sql="delete from category where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="The selected category have been deleted.";
        header("location:categories.php");
    }
    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
    public function newCategory($category_name){   //first method
        $old_sql="select * from category where category_name='$category_name'";
        $row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($row)){
            //echo  $category_name;
            $sql="insert into category (category_name) values ('$category_name')";
            $this->db->query($sql);
            $_SESSION['success']="The category have been created.";
            header("location:categories.php");
        }else{
            $_SESSION['error']="The selected category name is exits.";
            header("location:categories.php");
        }

    }
}