<?php

include 'control/include.php';

$id = intval($_GET['id']);


$quantity = $_POST["quantity$id"];


$query = "SELECT * FROM items where ID = '$id' ";

 if ($result = $conn->query($query)) {
     while ($row = $result->fetch_assoc()) {
         $name= $row["ItemName"];
         $image = $row["Image"];
         $type= $row["Type"];
         $desc = $row["Descriptions"];
         $price = $row["Price"];
     }
}

$totalprice = $price * $quantity;

$sql = "INSERT INTO itempreorder VALUES (null , '$name', '$type' , '$desc' , '$price' , '$quantity' , '$totalprice' , '$image')";
if ($conn->query($sql) === TRUE) {
  header("location: neworder.php");
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
        $ok = "Error!";
        $conn->close();
        echo "<script> alert('$ok');
        window.location.href='neworder.php';</script>";  
        $result->free();
}
?>