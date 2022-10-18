<?php
session_start();
$conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");
extract($_REQUEST);
if(!isset($_SESSION['username']))
{
	header("location:login.php");
	
}
else
{
	$admin_username=$_SESSION['username'];
}
if(isset($logout))
{
	unset ($_SESSION['username']);
	setcookie('logout','loggedout successfully',time() +5);
	header("location:login.php");
}
if(isset($delete))
{
	header("location:deletefood.php?id=$delete");
}

$admin_info=mysqli_query($conn,"SELECT * from clients where Username='$admin_username '");
$row_admin=mysqli_fetch_array($admin_info);
$user= $row_admin['Username'];
$pass= $row_admin['Password'];


?>
<html>
  <head>
     <title>Admin control panel</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
		 <style>
		ul li{}
		ul li a {color:black;}
		ul li a:hover {color:black; font-weight:bold;}
		ul li {list-style:none;}

ul li a:hover{text-decoration:none;}
#social-fb,#social-tw,#social-gp,#social-em{color:blue;}
#social-fb:hover{color:#4267B2;}
#social-tw:hover{color:#1DA1F2;}
#social-gp:hover{color:#D0463B;}
#social-em:hover{color:#D0463B;}
	 </style>
	 
  
  </head>
  
    
	<body>

	
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:black;font-family: 'Permanent Marker', cursive;">Chowmein</span></a>
    <?php
	if(!empty($admin_username))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user">Admin <?php echo $_SESSION['username']?>;</i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="cart.php.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
		<?php
		if(isset($_SESSION['username']))
		{
			?>
			<li class="nav-item">
            <a class="nav-link" href="">
		      <form method="post">
			    <button type="submit" name="logout" class="btn btn-outline-success">Log Out</button>
			  </form>
		    </a>
            </li>
			<?php
		}
		
		?>
		
      </ul>
	  
    </div>
	
</nav>
<!--navbar ends-->
<br><br><br><br>
<!--details section-->
 
<div class="container">
       <!--tab heading-->
	   <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:black;border-radius:10px 10px 10px 10px;" role="tablist">
       <li class="nav-item">
              <a class="nav-link active" style="color:#BDDEFD;"  id="ManageVendors-tab" data-toggle="tab" href="#ManageVendors" role="tab" aria-controls="ManageVendors" aria-selected="true">View Users</a>
          </li>
          <li class="nav-item">
             <a class="nav-link " style="color:#BDDEFD;" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="false">View Food Items</a>
          </li>
          
		  
		  <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="orderstatus-tab" data-toggle="tab" href="#orderstatus" role="tab" aria-controls="orderstatus" aria-selected="false">Order status</a>
          </li>
          <li class="nav-item">
              <a class="nav-link"  style="color:#BDDEFD;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
          </li>
		  
		  
		  
		  
       </ul>
	   <br><br>
	<!--tab 1 starts-->   
	   <div class="tab-content" id="myTabContent">
	   
            <div class="tab-pane fade show " id="viewitem" role="tabpanel" aria-labelledby="viewitem-tab">
                 <div class="container">
	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col">Id</th>
                            <th scope="col">Food_Name</th>
                            <th scope="col">Food_Path</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            
                            <th scope="col">Price</th>
                            
                            <th scope="col">Operation</th>
                     </tr>
                 </thead>
				 <tbody>
	<?php
    require_once("dbconnect.php");
    $sql="SELECT*FROM menu";
    getFood($sql);
    
	
	?>			 
              
				   
                </tbody>
           </table>
           <a class='btn btn-dark' href="upload_image.php">ADD</a>
	 <br>
     <a class='btn btn-dark' href="foodchart.php">SEE CHART</a>
	 </div>   	
		  
		   <span style="color:green; text-align:centre;"><?php if(isset($success)) { echo $success; }?></span>
			
		
      	    </div>	 
	  
<!--tab 1 ends-->	   
			
			
			<!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
			    <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="username" value="<?php if(isset($user)){ echo $user;}?>" class="form-control" name="name" readonly="readonly"/>
                    </div>
					
					
					
                   <div class="form-group">
                      <label for="pwd">Password:</label>
                     <input type="password" name="password" class="form-control" value="<?php if(isset($pass)){ echo $pass;}?>" id="pwd" readonly required/>
                   </div>
				   
				   
 
                  
			 </form>
			</div>
			<!--tab 2 ends-->
			 
			 <div class="tab-pane fade show active" id="ManageVendors" role="tabpanel" aria-labelledby="ManageVendors-tab">
			    <div class="container">
	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col">Id</th>
                           
                            <th scope="col">FullName</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            
                            
                            <th scope="col">PhoneNumber</th>
                            <th scope="col">Operation</th>
                     </tr>
                 </thead>
				 <tbody>
	<?php
    require_once("dbconnect.php");
    $sql="SELECT ID,FullName, Username, Email, PhoneNumber FROM clients WHERE UserType ='user'";
    getUsers($sql);
	
	
	?>			 
                
                </tbody>
           </table>
           <a class='btn btn-dark' href="chart.php">SEE CHART</a>
	 
	 </div>   	
			 </div>
			 
			 <!--tab 4-->
			 <div class="tab-pane fade" id="orderstatus" role="tabpanel" aria-labelledby="orderstatus-tab">
               <table class="table">
			   <th>Order Id</th>
			   <th>Food Id</th>
			   <th>Customer Username</th>
			   <th>order Status</th>
			   <tbody>
			   <?php			   
			   $rr=mysqli_query($conn,"select * from cart");
			   while($rrr=mysqli_fetch_array($rr))
			   {
				   $stat=$rrr['orderStatus'];
				   $foodid=$rrr['Pid'];
				   $r_f=mysqli_query($conn,"select * from menu where Id='$foodid'");
				   $r_ff=mysqli_fetch_array($r_f);
			   
			   ?>
			   <tr>
			   <td><?php echo $rrr['Id']; ?></td>
			   <td><a href="searchfood.php?food_id=<?php echo $rrr['Id']; ?>"><?php echo $rrr['Id']; ?></td>
			   <td><?php echo $rrr['Customerusername']; ?></td>
			   <?php
			   if($stat=="cancelled" || $stat=="Out Of Stock")
			   {
			   ?>
			   <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $rrr['orderStatus']; ?></span></td>
			   <?php
			   }
			   else
				   
			   {
			   ?>
			   <td><span style="color:green;"><?php echo $rrr['orderStatus']; ?></span></td>
			   <?php
			   }
			   ?>
			   
			   </tr>
			   <?php
			   }
			   ?>
			   </tbody>
			   </table>
			</div>
			 
      
	  </div>
	</div>	 
	<br><br><br>
 
		  

</body>
	
</html>	