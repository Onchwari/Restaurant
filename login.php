<html>
  <head>
      <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css" type="text/css" />
  </head>
  <body>
     <input type="radio" name="r" id="radio2"checked style="display: none">
      <input type="radio" name="r"id="radio1"checked style="display:none">
     <!-- <p>Kindly login / Register to continue</p>-->
    <div id="main">
        <!--Login-->
      <div id="form1">
          <form action="validation.php" method="post"autocomplete="off">
              <h1 id="heading">Login Here</h1>
              <input type="text"placeholder="Usename"name="uname">
              <input type="password"placeholder="Password"name="pass">
              <input type="submit"value="Login"name="submit">
              <div id="lblsup"><label for="radio2">Dont have an Account?Register New User</label></div>
          </form>
      </div>
<!--Register-->
<div id="form2">
    <form action="registration.php" method="post"autocomplete="off">
        <h1 id="heading">Register New User</h1>
        <input type="text"placeholder="Full Name"name="fname">
        <br><br>
        <input type="text"placeholder="User Name"name="uname">
        <br>
        <input type="email"placeholder="Email Address"name="email">
        <br><br>
        <input type="tel"placeholder="Telephone Number"name="number">
        <input 
        type="password"placeholder="Password"name="pass">
        <br><br>
        <input type="password"placeholder="Confirm Password"name="cpass">
        <br><br>
        <div class="usert">
        <label for="user">UserType:</label>
        <select id="usertype" name="users">
        <option value="user">User</option>
        <option value="admin">Admin</option>
        
        </select>
         </div>
         
        <input type="submit"value="Register"name="submit1" style="position: relative;top: 20px;">
        <div id="lblsup"><label for="radio1" style="position:relative; top:-80px;">Already have an Account?Login</label></div>
    </form>
    </div>
  </body>
</html>
