
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartmethods";
$conn = new mysqli($servername, $username, $password, $dbname);


  
  $sql = "SELECT  motor1, motor2, motor3, motor4, motor5, motor6, motorState FROM motor ORDER BY id desc LIMIT 1";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  foreach($result as $key => $item)
  {
    echo "$key: $item ";
  };
$conn->close();
?>