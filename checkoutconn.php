<div class="content">
	<style>
		*{
			background-color:black;
			
			color:white;
		}
		</style>

	<br><br>
	<?php include  "dbconnect.php"; ?>
	<table border=1 cellpadding="6" cellspacing="8">
		<tr>
			 <th colspan="8">CLIENTS</th>
		</tr>
		<tr>
			
			<th>Customer Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Address</th>
			<th>View Product</th>
			<th>Delete</th>
		</tr>
		<?php
		$conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");
		$s = mysqli_query($conn,"select * from checkout");
		while($r = mysqli_fetch_array($s))
		{
		?>
		<tr>
			
			<td><?php echo $r['Name']; ?></td>
			<td><?php echo $r['PhoneNumber']; ?></td>
			<td><?php echo $r['Email']; ?></td>
			<td><?php echo $r['Address']; ?></td>
			<td><a href="viewcart.php?pid=<?php echo $r['p_id']; ?>&uid=<?php echo $r['u_id']; ?>">View Product</a></td>
			<td><a href="">Delete</a></td>
		<?php
		}
		?>
	</table>
	 

</div>
