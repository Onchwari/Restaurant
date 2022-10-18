<?php
require_once("dbconnect.php");
if(isset($_POST["submitImage"])){
    $file=$_FILES["food-image"];
    $file_path="order/";

    $original_file_name=$_FILES['food-image']['name'];
    $file_tmp_location=$_FILES['food-image']['tmp_name'];

    if(move_uploaded_file($file_tmp_location,$file_path.$original_file_name)){
        $sql="INSERT INTO menu(Food_Name,Image_Path,Category, Description,Price) VALUES('".$_POST['fooditem']."','$original_file_name','".$_POST['category']."','".$_POST['description']."','".$_POST['price']."')";
         if(setData($sql)){
             header("location:dashboard.php");
         }
    }
    
}
?>