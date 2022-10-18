<html>
    <style>
        *{
            background-color:black;
            /*background-image: url("images/main.jpg");*/
            padding:5px;
            color:white;
            
        }
        </style>
    </html>
<?php 
if(!isset($_GET['id'])){
    die('id not provide');
} 

$conn=new mysqli("localhost","root","","chowmein");
$id=$_GET['id'];
$sql="SELECT*FROM menu WHERE id=$id";
$result=$conn->query($sql);
if($result->num_rows !=1){
    die('id not in db');
}
$data=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport">
        <title>Login Page</title>
    <link rel="stylesheet" href="" type="text/css" />
</head>
<body>
    <div class="heading">
        <h1 class="head">Menu Details </h1>
</div>
<div class="Container">
    <div class="col-md-6 offset-md-3 col-sm-12">
    <form action="./modify1.php?id=<?=$id?>" method="post"enctype="multipart/form-data">
    <h1 id="heading">Edit form</h1>
    
    <input type="text" name="fooditem" required="true" placeholder="Food Item Name" value="<?= $data["Food_Name"];?>"><br></br>

    <input type="file" name="food-image" id="foodimage" required="true" value="<?= $data["Image_Path"];?>"> <br>
    <p><img src="order/<?= $data["Image_Path"];?>" height="100" width ="100"/></p>

    <input type="text" name="category" id="category" required="true" value="<?= $data["Category"];?>">
    <br/></br>
    
    <input type="text" name="description" id="description" required="true" value="<?= $data["Description"];?>">
    <br/></br>

   
    <input type="number" name="price" id="foodprice" required="true" value="<?= $data["Price"];?>">
    <br/></br>

    <input type="submit"value="Submit"name="EditForm">

</form>
<a href="dashboard.php"><input type="submit"value="Back"name="Back"> 
    
    </div>
</div>