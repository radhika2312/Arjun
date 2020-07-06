<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
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
form {

border: 10px dashed #000  ;
padding:10px;
height:auto;
width:800px;
text-align:"center";
margin:auto;
background-color:black;


}

#test {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}
p{
  text-align:right;
  font-size:30;

}
input {
  padding: 10px;
  width: 20%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}
.timer{
  text-align:right;
  color:red;

}
button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

</style>

<body>



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
$_SESSION["conn"]=$conn;


$quiz=$_POST["quiz"] ;
$quizrecord=$quiz."record";

$username=$_SESSION["username"];
//to check user have given already given quiz
$sql_query = "SELECT count(*) as cntUser FROM $quizrecord WHERE participant='".$username."' ";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            
            header('Location: alreadygiven.php');
        }




//to get time
$sql= "SELECT * FROM quizdata  ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    if ($row['quizname']==$quiz){
    
    $time=$row['time'];
  }}
  
  



$sql = "SELECT def_question,def_option1,def_option2,def_option3,def_option4 FROM $quiz";
$result = mysqli_query($conn, $sql);




?>
<div class="navbar">
  <a href="about.php">ABOUT US</a>
  
</div>


<h1>Here it goes: <?php echo $quiz ?></h1>
<div class="timer"><h3>Test ends in <span id="time" ><?php echo $time;?>:00</span> minutes!</h3></div>

<form action="evaluate.php" method="post" id="test" class="box">

  <!-- One "tab" for each step in the quiz: -->
  
<?php
$i=1;
$_SESSION["quiz"]=$quiz ;






echo '<input type="text" name="quiz" value="' . $quiz . '" readonly>';
echo"<br>";

while($row = mysqli_fetch_assoc($result)) {
  
  
  echo "question $i:";
  echo"<br><br>";
     echo "<b>" . $row['def_question'] . "</b>"; 
     echo"<br><br>";
    
    

        echo' <input type="radio"  name="answer' . $i . '" value="' . $row["def_option1"] . '">';
       echo ' <label>' . $row["def_option1"] . ' </label> ';
       echo"<br>";
       

       echo' <input type="radio"  name="answer' . $i . '" value="' . $row["def_option2"] . '">';
       echo"<label>";
        echo $row["def_option2"] ;echo "</label>" ;
       echo"<br>" ;

       echo' <input type="radio"  name="answer' . $i . '" value="' . $row["def_option3"] . '">';
       echo"<label>";
        echo $row["def_option3"] ;echo "</label>" ;
       echo"<br>" ;

       echo' <input type="radio"  name="answer' . $i . '" value="' . $row["def_option4"] . '">';
       echo"<label>";
        echo $row["def_option4"] ;echo "</label>" ;
       echo"<br>" ;

        


    
    echo"<br>";
    echo"<hr>";
    echo"<br>";
    

       $i++;

}

     ?>  
<button type="submit" >done</button>    
</form>
<!-- Display the countdown timer in an element -->

<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            // Simulate a mouse click:
window.location.href = "evaluate.php";
        }
    }, 1000);
}

window.onload = function () {
    var a=<?php echo $time;?>;
    var fiveMinutes = 60 * a;
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>


</body>
</html>