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
$question=$_SESSION["question"];
$quizname=$_SESSION["quizname"];

$i=1;
    
while($i<=$question){ 
     $def_question=mysqli_real_escape_string($conn,$_POST["question?$i"]); 
    $def_option1=mysqli_real_escape_string($conn,$_POST["option1$i"]); 
    $def_option2=mysqli_real_escape_string($conn,$_POST["option2$i"]); 
    $def_option3=mysqli_real_escape_string($conn,$_POST["option3$i"]); 
    $def_option4=mysqli_real_escape_string($conn,$_POST["option4$i"]); 
    $def_answer=mysqli_real_escape_string($conn,$_POST["answer$i"]); 


    

    $sql = "INSERT into $quizname(def_question,def_option1,def_option2,def_option3,def_option4,def_answer) 
    VALUES('$def_question','$def_option1','$def_option2','$def_option3','$def_option4','$def_answer')";

if (mysqli_query($conn, $sql)) {
  echo "done with entry"  ;
  header("location:admin.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$i++;
}


?>