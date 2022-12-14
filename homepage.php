<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CHOWMEIN</title>
        <link rel="stylesheet" href="css/homep.css" type="text/css">
        
    </head>
    <body>
       <div class="header" >
        <div class="logo">
            <img src="images/logo.png" alt="logo"style="width:80px;height:50px;">
            </div>
        <nav id="Home">
        
            <ul>
                <li><a href="homepage.php"><b>Home</b></a></li>
                <li><a href="aboutus.html"><b>About</b></a></li>
                <li><a href="menu.php"><b>Menu</b></a></li>
                <li><a href="contact.html"><b>Contact</b></a></li>
                <li><a href="cart.php"><b>Cart</b></a></li>
                <li><a href=" "><b>Welcome <?php echo $_SESSION['username'];?></b></a></li>
                <li><a href="logout.php"><b>Logout</b></a></li>
                <!--<li><a href="login.php"><b>Login/Register</b></a></li>-->
            </ul>
        </nav>
        <div class="welcome">
            <h1 >Welcome to Chowmein!</h1>
            <h3> YOUR SATISFACTION IS OUR PRIORITY</h3>
            <div class="button">
                <h2>ORDER NOW</h2>
                <a href="menu.html"><button>MENU</button></a>
            </div>
        </div>
      </div>  
</body>
<body>
    <div class="slide-container">
        <span id="slider-image-1"></span>
        <span id="slider-image-2"></span>
        <span id="slider-image-3"></span>
        <span id="slider-image-4"></span>
        <span id="slider-image-5"></span>
        <span id="slider-image-6"></span>

        <div class="image-container">
            <img src="images/staters.jpg"alt="starter"class="slider-image"style: width=800px height=600px>
            <img src="images/soups.jpg"alt="soups"class="slider-image"style: width=800px height=600px>
            <img src="images/mains.jpg"alt="mains"class="slider-image"style: width=800px height=600px>
            <img src="images/seafood.jpg"alt="seafood"class="slider-image"style: width=800px height=600px>
            <img src="images/noodles.jpg"alt="noodles"class="slider-image"style: width=800px height=600px>
            <img src="images/rice.jpg"alt="rice"class="slider-image"style: width=800px height=600px>
        </div>
    
        <div class="button-container">
            <a href="#slider-image-1"class="slider-button"></a>
            <a href="#slider-image-2"class="slider-button"></a>
            <a href="#slider-image-3"class="slider-button"></a>
            <a href="#slider-image-4"class="slider-button"></a>
            <a href="#slider-image-5"class="slider-button"></a>
            <a href="#slider-image-6"class="slider-button"></a>
            
        </div>
        
    </div> 
</body>

<body>
    <div class="about">
        <h1 id="About"class="title">About Us</h1>
        <p><br>Chowmein was established in 2021 and since opening it has become one of the most sought after restaurants for authentic chinese food .</br> <br>It is a family based restaurant which brings to you exquisite chinese cuisines. We serve you exquisite cuisines that will take your tastebuds for a trip around the different flavors of Chinese food</b></p>
    </p>
        <div class="button">
           <a href="aboutus.html"><button>LEARN MORE</button></a>
        </div>
    </div>
</body>
<body>
    <div class="testimonials">
        <div class="inner">
            <h1>Testimonials</h1>
            <div class="border">
                <div class="row">
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/img1.jpg" alt="">
                            <div class="name">Anita Clark</div>
                            <p>Absolutely amazing place to eat, we will be making a reservation for our next visit in Nairobi! 10 of 10 for every single aspect of this meal as well as the outstanding service.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/img2.jpg" alt="">
                            <div class="name">Rodney Wlliams</div>
                            <p>Absolutely amazing! The place is beautiful and staff are super friendly and the food is delicious. I love that you get a lot of food as well for the price. I am definitely going back.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/img3.jpg" alt="">
                            <div class="name">Natalie Kering</div>
                            <p> Amaazing food! The whole experience from start to finish is great waitress is always so friendly and kind. The food can???t get better and the prices are fair.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<body>
	<footer>
        <div class="footer_info">
            <div class="footer_width hours">
                <h2>Working Hours</h2>
                <p>Monday- Friday<br>9:00am-8:00pm</br></p>
                <p>Weekends<br>10:00am-9:00pm</br></p>
                <p>Public Holidays<br>11:00am-6:00pm</br></p>
                
            </div>
            <div class="footer_width links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#Home ">Home</a></li>
                    <li><a href="#About">About</a></li>
                    <li><a href=" menu.html">Menu</a></li>
                    <li><a href="#Contact ">Contact</a></li>

                </ul>
            </div>
            <div class="footer_width contact">
                <h2 id="Contact">Contact</h2>
                <ul>
                    <li><a href="">Email:info@gmail.com</a></li>
                    <li>Phone: 0795438745</li>
                    <li>Facebook: ChowMein</li>
                    <li>Instagram: ChowMein</li>
                    <li>Twitter: ChowMein</li>

                </ul>
            </div>
        </div>
        <div class ="copy-right">
            <p>?? COPYRIGHT 2021 CHOWMEIN ALL RIGHT RESERVED.</p>
        </div>
    </footer>
</body>
</html>

