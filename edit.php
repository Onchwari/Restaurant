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

$conn=mysqli_connect("localhost","root","","chowmein");
//$conn=("localhost","root","","chowmein");
$id=$_GET['id'];
$sql="SELECT*FROM clients WHERE id=$id";
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
        <h1 class="head">Client Details </h1>
</div>
<div class="Container">
    <div class="col-md-6 offset-md-3 col-sm-12">
    <form action="./modify.php?id=<?=$id?>" method="post"autocomplete="off">
        <h1 id="heading">Edit form</h1>
        <input type="text"placeholder="Full Name"name="fname"  value="<?= $data["FullName"];?>">
        <br><br>
        <input type="text"placeholder="User Name"name="uname"value="<?= $data['Username']?>">
        <br><br>
        <input type="email"placeholder="Email Address"name="email"value="<?= $data['Email']?>">
        <br><br>
        <input type="tel"placeholder="Telephone Number"name="number"id="number"value="<?= $data['PhoneNumber']?>">
        <input type="submit"value="Submit"name="EditForm">
          </form>
          <a href="dashboard.php"><input type="submit"value="Back"name="Back"> 
    </div>
</div>