<?php
$id = intval($_GET['id']);
echo $id;

$dbhost = "localhost";
$dbuser = "user";
$dbpass = "pass";
$db = "sampledatabase";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "DELETE FROM productlist WHERE id=$id";
  
  if ($conn->query($sql) === TRUE) {
    $ok = "Removed Success!";
        $conn->close();
        echo "<script> alert('$ok');
        window.location.href='orderlist.php';</script>";  

  } else {
    echo "Error deleting record: " . $conn->error;
    $ok = "Error";
        $conn->close();
        echo "<script> alert('$ok');
        window.location.href='orderlist.php';</script>";  
  }
?>

?>