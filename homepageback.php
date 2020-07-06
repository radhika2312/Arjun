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

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);



    if ($username != "" && $password != ""){
        
        if ($username=="admin" && $password="admin"){
            header('Location:admin.php');}
        else{
        $sql_query = "SELECT count(*) as cntUser FROM users WHERE username='".$username."' and passwords='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            
            header('Location: act.php');
        }else{
            echo "Invalid username and password";
        }

    }

}



?>