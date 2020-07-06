<!DOCTYPE html>
<html lang="en">
<head>
<title>register</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  align:"center";
}
.header {
  padding: 80px; /* some padding */
  text-align: center; /* center the text */
  background: #1abc9c; /* green background */
  color: white; /* white text color */
}

/* Increase the font size of the <h1> element */
.header h1 {
  font-size: 40px;
}
/* Style the top navigation bar */
.navbar {
  overflow: hidden; /* Hide overflow */
  background-color: #333; /* Dark background color */
}

/* Style the navigation bar links */
.navbar a {
  float: left; /* Make sure that the links stay side-by-side */
  display: block; /* Change the display to block, for responsive reasons (see below) */
  color: white; /* White text color */
  text-align: center; /* Center the text */
  padding: 14px 20px; /* Add some padding */
  text-decoration: none; /* Remove underline */
}

/* Right-aligned link */
.navbar a.right {
  float: right; /* Float a link to the right */
}

/* Change color on hover/mouse-over */
.navbar a:hover {
  background-color: #ddd; /* Grey background color */
  color: black; /* Black text color */
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}

.footer {
  padding: 20px; /* Some padding */
  text-align: center; /* Center text*/
  background: #ddd; /* Grey background */
}

/* Bordered form */
form {

  border: 3px solid #f1f1f1;
  height:400px;
  width:400px;
  align:"center";
  margin:auto;
}

/* Full-width inputs */
input[type=text], input[type=password],[type=email] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.reset {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .reset {
    width: 100%;
  }
}


</style>
</head>






<body>
<div class="header">
  <h1>ARJUN</h1>
  <h2>Enjoy learning.</h2>
</div>

<div class="navbar">
  <a href="about.php">ABOUT US</a>
  <a href="homepage.php" class="right">LOGIN</a>
  
  
</div>




<form action="registerback.php" method="post" name="signup" class="box">
  <div class="imgcontainer">
    <img src="C:\Users\HP\Downloads\IMG_20200701_134453.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Ener Email" name="email" required><br>

    <label for="phone"><b>Phone Number</b></label><br>
    <input type="text" placeholder="Enter mobile no." name="phone" required>



    <button type="submit" name="register">Register</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="reset" class="reset">Reset</button>
    <span class="psw">Already a user? <a href="homepage.php">LOGIN here!</a></span>
  </div>


  
  

</form>

</body>
</html>