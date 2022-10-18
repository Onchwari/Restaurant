<?php
session_start();
$conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");

$sql = "SELECT * FROM `menu`";

?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css" type="text/css" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="header">
      <nav id="Home">
        <ul>
          <li>
            <a href="homepage.php"><b>Home</b></a>
          </li>
          <li>
            <a href="aboutus.html"><b>About</b></a>
          </li>
          <li>
            <a href="contact.html"><b>Contact</b></a>
          </li>
          <li>
            <a href="cart.php"><b>Cart</b></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="wrapper">
      <div class="title">
        <h4><span>fresh food for good health</span>our menu</h4>
      </div>
      
      
      <?php
$result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)){
        ?>
      <div class="menu">
        <div class="single-menu">
          <img
            src="order/<?php echo $row["Image_Path"];?>"
            alt=""
            style="width: 200px; height: 150px"
          />
          <div class="menu-content">
            <h4><?php echo $row["Food_Name"]; ?> </h4>
            <h4><span><?php echo $row["Price"]; ?></span></h4>
            <p>
            <?php echo $row["Description"]; ?>
            </p>
            <input type="number" name="quan" min="1" max="5" value="1" placeholder="Quantity" required>
            <button class="cart" name="addtocart"value="<?php echo $row['Id'];?>">
              <span>Add to cart</span>
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            </button>
          </div>

        </div>
        <?php
      }
      ?>
         
      
    </div>
  </body>
</html>