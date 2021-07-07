
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartmethods";
$conn = new mysqli($servername, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $btn = $_POST['btn'];

  $sql = "INSERT INTO directions (dir) VALUES ('$btn');";
  if (mysqli_query($conn, $sql)) {
    echo "Data Inserted";
  }
}else{
$dir_sql = "SELECT  dir FROM directions ORDER BY id desc LIMIT 1";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$dir_sql));
  foreach($result as  $item)
  {
    echo "Direction: $item ";
  };}
$conn->close();
?>
