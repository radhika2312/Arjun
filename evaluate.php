
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
$username=$_SESSION["username"];


$i=1;
$score=0 ;
$total=0 ;


$quiz=mysqli_real_escape_string($conn,$_POST["quiz"]); 


$sql = "SELECT * FROM $quiz";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){


$answer=mysqli_real_escape_string($conn,$_POST["answer$i"]); 


if($answer==$row["def_answer"]){

  $score++;
}else{
  $score=$score-0.5 ;
}
$total++ ;
$i++;
}





//inserting result of user
$quizrecord=$quiz."record";

$sql = "INSERT into $quizrecord(participant,marks,total) 
    VALUES('$username','$score','$total')";

if (mysqli_query($conn, $sql)) {
  echo "done with entry"  ;
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
h3{
  text-align:centre;
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
  background-color: black; /* Grey background color */
  color:white;
  padding: 20px; /* Some padding */
}

/* Main column */
.main {
  flex: 70%; /* Set the width of the main content */
  background-color: white; /* White background color */
  padding: 20px; /* Some padding */
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

/* Style the table */
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

/* Style table headers and table data */
th, td {
  text-align: center;
  padding: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

/* Zebra-striped table rows */
tr:nth-child(even) {
  background-color: #f2f2f2
}

.fa-check {
  color: green;
}

.fa-remove {
  color: red;
}






</style>
</head>
<body>
<div class="navbar">
  <a href="act.php">Try another test</a>
  <a href="about.php">ABOUT US</a>
  
  <a href="homepage.php" class="right">LOGOUT</a>
</div>
<div class="header">
  <h1>RESULT!!!!!</h1>
  <h2>You scored:<?php echo$score;?>  Out of :<?php echo $total;?>!!</h2>
</div>
<div class="row">
  <div class="side">
  <?php
  $sql = "SELECT * FROM users ";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
  if($row['username']==$username){
  echo"<h2>" . $row['username'] . "</h2>";
  echo"<br><hr><br>";
  echo"<h3>Email:" . $row['email'] . "</h3>";
  echo"<br>";
  echo"<h3>Phone:" . $row['phone'] . "</h3>";
}
}
  
  ?>
  
  
  
  </div>
  <div class="main">
  <h3>DETAILED ANALYSIS:</h3>
  <table>
  <tr>
    <th style="width:50%">Q.NO.</th>
    <th>Correct answer</th>
    <th>Your answer</th>
    <th>response</th>
  </tr>
<?php
  $sql = "SELECT * FROM $quiz";
$result = mysqli_query($conn, $sql);
$i=1;

while($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo"<td>" . $i . "</td>";
 echo "<td>" . $row["def_answer"] . "</td>";

$answer=mysqli_real_escape_string($conn,$_POST["answer$i"]); 
 
echo "<td>" . $answer ."</td>";

if($answer==$row["def_answer"]){
  echo "<td>"; echo"<i class='fa fa-check'>"; echo "</i>";echo "</td>";


  
}else{
  echo"<td>";echo "<i class='fa fa-remove'>" ;echo"</i>";echo "</td>";
}

$i++;
}


  ?>
</table>
  
  
  
  
  
  </div>
</div>
<div class="footer">
  <h2>A non-profit educational site.</h2>
</div>

</body>
</html>

