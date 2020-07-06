


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();
$user=$_SESSION['username'];

$date=date("Y-m-d");
$sql = "SELECT  quizname FROM quizdata WHERE date='$date'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>selection of quiz</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  align:"center";
  text-align:center;
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
  height:auto;
  width:400px;
  align:"center";
  margin:auto;
}

/* Full-width inputs */
input[type=text], input[type=password] {
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
  padding: 14px 14px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  align:right;
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



/* Ensure proper sizing */
* {
  box-sizing: border-box;
}

/* Column container */
.row {
  display: flex;
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  flex: 30%; /* Set the width of the sidebar */
  background-color: #f1f1f1; /* Grey background color */
  padding: 20px; /* Some padding */
}

/* Main column */
.main {
  flex: 70%; /* Set the width of the main content */
  background-color: white; /* White background color */
  padding: 20px; /* Some padding */
}



</style>
</head>
<div class="navbar">
  <a href="about.php">ABOUT US</a>
  <a href="register.php">SIGNUP</a>
  
  <a href="homepage.php" class="right">LOGOUT</a>
</div>

<h2>Select the quiz ,you want to try.</h2>

<h3><b>WELCOME @ <?php echo $user;?>!!</b></h3>
<div class="row">
<div class="side">
  <p>Previous quizzes available for self practice.</p>
  <form action="practice_quiz.php" name="quiz selection" method="post">
  <?php
  $date=date("Y-m-d");
  $sql = "SELECT  quizname FROM quizdata WHERE date<'$date'";
  $result = mysqli_query($conn, $sql);
  
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    echo' <input type="radio"  name="quiz" value="' . $row["quizname"] . '">';
    echo"<label>" . $row["quizname"] . "</label>" ;
    echo"<br>" ;
}
  ?>
  
  
  
  <button type="submit">TRY</button>
  </form>
  </div>
  
  
<div class="main">

<p>For today following quizes are scheduled.</p>
<h3>CHOOSE ONE OF THEM::</h3>
<form action="quiz.php" name="quiz selection" method="post">



<?php

$sql = "SELECT  quizname FROM quizdata WHERE date='$date'";
$result = mysqli_query($conn, $sql);

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
       echo' <input type="radio"  name="quiz" value="' . $row["quizname"] . '">';
       echo"<label>" . $row["quizname"] . "</label>" ;
       echo"<br>" ;
  }
?>

<button type="submit">NEXT</button>


</form>
</div>

</div>

<br>
<br>
<div class="footer">
  <h2>A non-profit educational site.</h2>
</div>

</body>




</html>