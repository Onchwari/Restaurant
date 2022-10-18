
<?php
session_start();


if (isset($_SESSION['username'])) {
    header("Location: homepage.php");
}
$UserName=$_POST['uname'];
$Password=$_POST['pass'];
$conn=mysqli_connect("localhost","root","","chowmein");

$s ="select*from clients where username='$UserName' && password='$Password'";

$result= mysqli_query($conn,$s);

$num=mysqli_num_rows($result);

		if ($num == 1) { // user found
            $_SESSION['username']=$UserName;
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($result);
			if ($logged_in_user['UserType'] == 'Admin') {
				
				header('location: dashboard.php');		  
			}else{
				
				header('location: homepage.php');
			}
        }else{
           header('location:login.php');
        }
   /*}*/



?>