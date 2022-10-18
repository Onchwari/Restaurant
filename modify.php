<?php 
$conn=new mysqli("localhost","root","","chowmein");
if(isset($_GET['id']) && isset($_POST['EditForm'])){
    $id=$_GET['id'];
    $FullName=$_POST['fname'];
    $UserName=$_POST['uname'];
    $Email=$_POST['email'];
    $Number=$_POST['number'];
    
    $sql="UPDATE `clients` SET `FullName`='$FullName',`Username`='$UserName',`Email`= '$Email',`PhoneNumber`='$Number' WHERE id = $id";

    if($conn->query($sql) === TRUE){
        header('location:dashboard.php');
    }else{
        echo"woops";
    }
}else{
    echo"Invalid";
}

?>