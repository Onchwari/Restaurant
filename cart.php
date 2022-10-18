<?php
session_start();
$conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");

extract($_REQUEST);
include("dbconnect.php");
$gtotal=array();
$ar=array();
$total=0;
if(isset($_GET['Id']))//product id
{
	$product_id=$_GET['Id'];
}
else
{
	$product_id="";
}
 if(isset($_SESSION['username']))
 {
 $cust_id=$_SESSION['username'];
 $qq=mysqli_query($conn,"select * from clients where Username='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
 }
if(empty($cust_id))
{
	header("location:login.php?msg=you must login first");
}
if(!empty($product_id && $cust_id ))
{
if(mysqli_query($con,"insert into cart (Pid,Customerusername) values ('$product_id','$cust_id') "))
{
	echo "success";
	$product_id="";
	header("location:cart.php");
}
else
{
	echo "failed";
}
}
if(isset($del))
{
	
	//echo $del;
	if(mysqli_query($con,"delete from cart where Id='$del' && Customerusername='$cust_id'"))
	{
		header("location:deletecart.php");
	}
	
}
 
 
 if(isset($logout))
 {
	 session_destroy();
	 
	 header("location:login.php");
 }
 if(isset($login))
 {
	 session_destroy();
	 
	 header("location:login.php");
 }
 
 //update section

 $conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");
  $cust_details=mysqli_query($conn,"select * from clients where Username='$cust_id'");
  $det_res=mysqli_fetch_array($cust_details);
  $name=$det_res['FullName'];
  $user=$det_res['Userame'];
  $email=$det_res['Email'];
  $mobile=$det_res['PhoneNumber'];
  $password=$det_res['Password'];
  
  
  $query=mysqli_query($conn,"select menu.FoodName,menu.Price,menu.Image_Path,cart.Id,cart.Pid,tblcart.Customerusername from menu inner  join cart on menu.Id=cart.Pid where cart.Customerusername='$cust_id'");
  
  //$re=mysqli_num_rows($query);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <style>
		ul li{list-style:none;}
		ul li a {color:black;text-decoration:none; }
		ul li a:hover {color:black;text-decoration:none; }
		
	 </style>
	 <script>
		  function del(id)
		  {
			  if(confirm('are you sure you want to cancel order')== true)
			  {
				  window.location.href='cancelorder.php?id=' +id;
			  }
		  }
		</script>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="homepage.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Chowmein</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user " ><?php if(isset($cust_id)) { echo $_SESSION['username'];}?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<!--<span style="color:black; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart"  class="badge badge-light">4</span></i></span>-->
			<a class="badge badge-light"id="cart" href="contact.php">Cart</a>
			
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			     <a style="font-size:14;" class="badge badge-light"id="cart" href="contact.php">Cart</a><?php if(isset($re)) echo $re; ?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		
		
      </ul>
	  
    </div>
	
</nav>

<!--navbar ends-->


<br><br>
<div class="middle" style="  padding:60px; border:1px solid #ED2553;  width:100%;">
       <!--tab heading-->
	   <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:black;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" style="color:#BDDEFD;" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Cart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
          </li>
		  
       </ul>
	   <br><br>
	<!--tab 1 starts-->
      
	   <div class="tab-content" id="myTabContent">
	   
            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
                 <table class="table">
                  <tbody>
	               <?php
				   if(isset($_GET['id']) && isset($_POST['addtocart'])){
					$id=$_GET['id'];
	                  $query=mysqli_query($conn,"select menu.FoodName,menu.Price,menu.Image_Path,cart.Id,cart.Pid,tblcart.Customerusername from menu inner  join cart on menu.Id=cart.Pid where cart.Customerusername='$cust_id'");
	                  $re=mysqli_num_rows($query);
	                   if($re)
	                    {
		                 while($res=mysqli_fetch_array($query))
		                  {
			                $vendor_id=$res['Id'];
			               $v_query=mysqli_query($con,"select * from clients where Id='$vendor_id'");
			               $v_row=mysqli_fetch_array($v_query);
			               $em=$v_row['Username'];
			               $nm=$v_row['Email'];}
	                ?>
                      <tr>
                         <td><image src="order/<?php echo $em."order/".$res['Image_Path'];?>" height="80px" width="100px"></td>
                         <td><?php echo $res['FoodName'];?></td>
                         <td><?php echo "RS ".$res['Price'];?></td>
                         <td><?php echo $res['Category'];?></td>
                         <td><?php echo $nm; ?></td>
		                <form method="post" enctype="multipart/form-data">
                           <td><button type="submit" name="del"  value="<?php echo $res['Id']?>" class="btn btn-danger">Delete</button></td>
                        </form>
                        <td><?php $total=$total+$res['cost']; $gtotal[]=$total;  ?></td>
                      </tr>
					  
					  
                   <?php
	                    }
						?>
						<tr>
					  <td>
					  <h5 style="color:red;">Grand total</h5>
					  </td>
					  <td>
					  <h5><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo end($gtotal); ?></h5>
					  </td>
					  <td>
					  
					  </td>
					  <td></td>
					  
					  <td style="padding:30px; text-align:center;">
					  <a href="order.php?cust_id=<?php echo $cust_id; ?>"><button type="button" style=" color:white; font-weight:bold; text-transform:uppercase;" class="btn btn-warning">Proceed to checkout</button></a>
					  </td>
					  <td></td>
					  </tr>
						
						<?php
	
	                  }
					  else
					  {
						  
	
	                 ?>
					 <tr><button type="button" class="btn btn-outline-success"><a href="menu.php" style="color:green; text-decoration:none;">No Items In cart Let's Shop Now</a></button></tr>
					 
					 <?php
					  }
					 ?>
                 </tbody>
	      </table>	
		  
		  <span style="color:green; text-align:centre;"><?php if(isset($success)) { echo $success; }?></span>
		       
			   
		 
		
         </div>	 
	  
<!--tab 1 ends-->
	   
        
			
			<!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
			    <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" value="<?php if(isset($name)){ echo $name;}?>" class="form-control"readonly name="name" required="required"/>
                    </div>
					
					<div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" value="<?php if(isset($email)){ echo $email;}?>" class="form-control"  readonly/>
                    </div>
					<div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="tel" id="mobile" class="form-control" name="mobile" pattern="[6-9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" value="<?php if(isset($mobile)){ echo $mobile;}?>" readonly placeholder="" required>
                    </div>
					
                   <div class="form-group">
                      <label for="pwd">Password:</label>
                     <input type="password" name="pswd" value="<?php if(isset($password)) { echo $password; }?>"class="form-control"  id="pwd" readonly required/>
                   </div>
				   
				   
 
                  
			 </form>
			</div>
			<!--tab 2 ends-->
			 <!--tab 3 starts-->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
			    <table class="table">
				<th>Order Number</th>
				<th>Item Name</th>
				<th>Price</th>
				<th>Cancel order</th>
				    <tbody>
					<?php
					$quer_res=mysqli_query($conn,"select * from cart where Customerusername='$cust_id' && orderStatus='ongoing'");
					while($roww=mysqli_fetch_array($quer_res))
					{   
				         $fid=$roww['Pid'];
				         $qr=mysqli_query($conn,"select * from menu where Id='$fid'");
						 $qrr=mysqli_fetch_array($qr);
						
					  
					?>
					   <tr>
					   <td><?php echo $roww['Id']; ?></td>
					   <?php
					   if(empty($qrr['Food_Name']))
					   {
					   ?>
					   <td><span style="color:red;">Product Not Available Now</span></td>
					   <?php
					   }
					   else
					   {
						   ?>
						    <td><?php echo $qrr['Food_Name']; ?></td>
						   <?php
					   }
					   ?>
					  
					   <td><?php echo $qrr['Price']; ?></td>
					   <td><a href="#" onclick="del(<?php echo $roww['Id'];?>);"><button type="button" class="btn btn-danger">Cancel Order</button></a></td>
					   </tr>
					 <?php
					}
					 ?> 
					</tbody>
				</table>
			</div>
			<!--tab 3 ends-->
            
	  </div>
	</div>  
	  
<?php

?>


   
</body>
</html>