<?php 
$conn=new mysqli("localhost","root","","chowmein");
if(isset($_GET['id']) && isset($_POST['EditForm'])){
    $id=$_GET['id'];
    $FoodName=$_POST['fooditem'];
    $FilePath=$_FILES['food-image']['name'];
    $Category=$_POST['category'];
    $Description=$_POST['description'];
    $Price=$_POST['price'];
   
    
    $sql="UPDATE `menu` SET `Food_Name`='$FoodName',`Image_Path`='$FilePath',`Category`= '$Category',`Description`= '$Description',`Price`='$Price' WHERE id = $id";

    if($conn->query($sql) === TRUE){
        header('location:dashboard.php');
    }else{
        echo"woops";
    }
}else{
    echo"Invalid";
}

?>