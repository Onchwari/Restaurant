<?php

session_start();
header('location:login.php');

$FullName=$_POST['fname'];
$UserName=$_POST['uname'];
$Email=$_POST['email'];
$Number=$_POST['number'];
$Password=$_POST['pass'];
$ConfirmPassword=$_POST['cpass'];
$UserType=$_POST['users'];

$conn=$conn=mysqli_connect("localhost","root","","chowmein");


$s ="select*from clients where username='$UserName'";

$result= mysqli_query($conn,$s);

$num=mysqli_num_rows($result);

if($num==1){
    echo"Username Already Taken";
}else if($_POST["pass"]!==$_POST["cpass"]){
    echo "Password does not match";

}else{
    $correct = true ;
if($_POST["fname"]==''){
    echo '<p class="displayErrorMsg">Name is mandatory.</p>';
    $correct = false ;
}
if($_POST["uname"]==''){
    echo '<p class="displayErrorMsg">Username is mandatory.</p>';
    $correct = false ;
}
if($_POST["email"]==''){
    echo '<p class="displayErrorMsg">Email is mandatory.</p>';
    $correct = false ;
}

if($_POST["number"]==''){
    echo '<p class="displayErrorMsg">Number is mandatory.</p>';
    $correct = false ;
}
if($_POST["pass"]==''){
    echo '<p class="displayErrorMsg">Password is mandatory.</p>';
    $correct = false ;
}
if($_POST["cpass"]==''){
    echo '<p class="displayErrorMsg">Confirm Password is mandatory.</p>';
    $correct = false ;
}
if($_POST["pass"]!==$_POST["cpass"]){
    echo '<p class="displayErrorMsg">Password does not match.</p>';
    $correct = false ;
}

if($correct==true)
{
    //connectDatabase();
    $sql_insert="INSERT INTO clients(FullName,Username, Email, PhoneNumber, Password, ConfirmPassword, UserType) VALUES ('$FullName','$UserName','$Email','$Number','$Password','$ConfirmPassword','$UserType')";

     mysqli_query($conn,$sql_insert);
     echo"Registration Successful"; 
}
}
?>

