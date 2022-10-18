<?php

$conn=new mysqli("localhost","root","","chowmein");

if(isset($_GET["id"])){
$id=$_GET["id"];
$sql="DELETE FROM menu WHERE id=$id";

if($conn->query($sql)===TRUE){
    header('location:dbfood.php');
    //echo"Modified data";
}else{
        echo"nop";
    }
}else{
    die('id not provide');
}

?>