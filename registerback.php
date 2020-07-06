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
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);


$r=0;    

    
$sql = "INSERT into users(username,passwords,email,phone,quizzes) 
    VALUES('$username','$password','$email','$phone','$r')";





    
        
         
         if (mysqli_query($conn, $sql)){
                 $_SESSION['username'] = $username;
                 

      
 
             echo "<div class='box'>
 <h3>You are registered successfully.</h3>";
        ("location:homepage.php"); 
         }
         else{echo"error";}
        
        ?>