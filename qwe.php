<?php 
 $dbhost = "localhost";
 $dbuser = "user";
 $dbpass = "pass";
 $db = "sampledatabase";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

$query = "SELECT * FROM productlist where Status = 'Ordered'";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $conn->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $sql = "UPDATE productlist SET Status='Shipping' WHERE id=".$field1name.";";
     if ($conn->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

/*freeresultset*/
$result->free();
}
?>