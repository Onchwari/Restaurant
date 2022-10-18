<?php

$conn=new mysqli("localhost","root","","chowmein");

if(isset($_GET["id"])){
$id=$_GET["id"];
$sql="DELETE FROM clients WHERE id=$id";

if($conn->query($sql)===TRUE){
    header('location:admin.php');
        echo"nop";
    }
}else{
    die('id not provide');
}

?>