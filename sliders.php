
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartmethods";
$conn = new mysqli($servername, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $s1 = $_POST['s1'];
  $s2 = $_POST['s2'];
  $s3 = $_POST['s3'];
  $s4 = $_POST['s4'];
  $s5 = $_POST['s5'];
  $s6 = $_POST['s6'];
  $motorState = $_POST['motorState'];
  
  $sql = "INSERT INTO motor (motor1, motor2, motor3, motor4, motor5, motor6, motorState)
    VALUES ('$s1', '$s2', '$s3','$s4','$s5','$s6','$motorState');";
  If(mysqli_query($conn,$sql)){
    echo print_r($_POST);
  }

}
$conn->close();
?>