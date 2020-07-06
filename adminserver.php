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

$_SESSION["conn"]=$conn;
session_start();


$qid=mysqli_real_escape_string($conn,$_POST["qid"]); 
$quizname=mysqli_real_escape_string($conn,$_POST["quizname"]); 
$date=mysqli_real_escape_string($conn,$_POST["date"]); 
$question=mysqli_real_escape_string($conn,$_POST["question"]); 
$time=mysqli_real_escape_string($conn,$_POST["time"]); 


echo $qid ."<br>" ;
echo $quizname ."<br>";
echo $date ."<br>" ;
echo $question ."<br>";
echo $time ."<br>";

$_SESSION["quizname"]=$quizname ;
echo  $_SESSION["quizname"] ."<br>" ;
$_SESSION["question"]=$question ;
echo  $_SESSION["question"] ."<br>" ;


$sql = "INSERT into quizdata(qid,quizname,date,question,time) VALUES('$qid','$quizname','$date','$question','$time')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



$sql = "CREATE TABLE $quizname (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    def_question VARCHAR(400) NOT NULL,
    def_option1 VARCHAR(400) NOT NULL,
    def_option2 VARCHAR(400) NOT NULL,
    def_option3 VARCHAR(400) NOT NULL,
    def_option4 VARCHAR(400) NOT NULL,
    def_answer VARCHAR(400) NOT NULL
    )";
  
    if (mysqli_query($conn, $sql)) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    $quizrecord=$quizname."record";
    echo $quizrecord;
   //make table for quiz record of participants
   $sql = "CREATE TABLE $quizrecord (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant VARCHAR(400) NOT NULL,
    marks VARCHAR(400) NOT NULL,
    total VARCHAR(400) NOT NULL)";
  
    if (mysqli_query($conn, $sql)) {
      echo "Table2 created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
   
   


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Putting questions</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  align:"center";
}
.header {
  padding: 70px; /* some padding */
  text-align: center; /* center the text */
  background:#1abc9c; /* green background */
  color: white; /* white text color */
  background-image: url('IMG_20200701_134453.jpg');/*to set image as background */
  height:14px;
}
/* Increase the font size of the <h1> element */
.header h1 {
  font-size: 40px;}
.header p{
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

  border: 10px dashed #000  ;
  padding:10px;
  height:auto;
  width:800px;
  align:"center";
  margin:auto;
  background-color:black;

  
}

/* Full-width inputs */
input[type=text] {
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
  width: 20%;
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
  <h1><?php echo  $_SESSION["quizname"] ."<br>" ;?></h1>
  <p>Dated:<?php echo $date ."<br>" ;?></p>
</div>
<div class="navbar">
  <a href="about.php">ABOUT US</a>
  <a href="register.php">SIGNUP</a>
  
  <a href="homepage.php" class="right">LOGOUT</a>
</div>

    
<form action="new.php" method="post" name="details" class="box"> 

<?php
$i=1;





while ($i<=$question){ 
    
     
    
  echo '<input type="text" name="question?' . $i . '" placeholder="question?" required/><br>';
  echo'<input type="text" name="option1' . $i . '" placeholder="option1" required><br>';
  echo'<input type="text" name="option2' . $i . '"  placeholder="option2" required> <br>';
  echo'<input type="text" name="option3' . $i . '" placeholder="option3" required ><br>';
 echo'<input type="text" name="option4' . $i . '" placeholder="option4" required ><br>';
  echo'<input type="text" name="answer' . $i . '" placeholder="correct answer" required> <br><br><br>';
  


  
  $i++;
  
}

?>

<button type="submit" >done</button>

</form>




</html>