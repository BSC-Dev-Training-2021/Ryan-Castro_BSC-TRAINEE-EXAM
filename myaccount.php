<?php
$dbhost = "localhost";
$dbuser = "user";
$dbpass = "pass";
$db = "sampledatabase";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

$query = "SELECT * FROM productlist where Status = 'Ordered' ";

if (isset($_POST["shipbt"])) {
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $sql = "UPDATE productlist SET Status='Shipping' WHERE id=".$field1name.";";
     if ($conn->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
        $ok = "Shipping Success!";
        $conn->close();
        echo "<script> alert('$ok');
        window.location.href='myaccount.php';</script>";  
$result->free();
}
}
$total = 0;
$idarray[] = 0;
?>

<head>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="header">
        <a href="" class="logo">Fasion Geek</a>
        <div class="header-right">
          <a href="orderlist.php">Home</a>
          <a class="" href="selectorder.php">Shop</a>
          <a class="active" href="myaccount.php">MyAccount</a>
          <a href="index.php">Logout</a>
          <img class="imglogo" src="images/mypicturelogo.jpg">
       </div>
    </div>
</head>
<body>
 
<div class="card">
    <div class="row">  
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>My Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">Pre-Order List</div>
                    <div class="col align-self-center text-right text-muted"></div>
                </div>
            </div>
            <?php
                if ($result = $conn->query($query)) {

                    while ($row = $result->fetch_assoc()) {
                        $name = $row["ProductName"];
                        $desc = $row["Descriptions"];
                        $price = $row["Price"];
                        $totalprice = $row["TotalPrice"];
                        $image = $row["Images"];
                        $quant = $row["Quantity"];

                        $adding = 1; 
                        $idarray[$adding] = $row["ID"];
                        echo $idarray[$adding];
                        
                        $total = $total + $totalprice;
                         
                        ECHO  "<div class='row border-top border-bottom'>";
                            ECHO  "<div class='row main align-items-center'>";
                                ECHO  "<div class='col-2'><img class='img-fluid' src='images/".$image."'></div>";
                                    ECHO  "<div class='col'>";
                                        ECHO  " <div class='row text-muted'>" . $desc . "</div>";
                                        ECHO  "<div class='row'>". $name ."</div>";
                                        ECHO  "<div class='row text-muted'>11/05/2021</div>";
                                ECHO "</div>";
                                        ECHO  "<div class='col'> <input type='number' class='input-auto text-center border' value='". $quant ."' name='blackshirt' readonly> </div>";
                                        ECHO  "<div class='col'>P ". $price ."<br>P ".$totalprice.".00 <a href='remove2.php?id=". $idarray[$adding] ."'><span class='close'>Remove</span></a></div>";
                            ECHO  "</div>";
                        ECHO "</div>"; 
                    }
                 
                 /*freeresultset*/
                 $result->free();
                 }
            ?>

            <div class="back-to-shop "><a class="backarrow" href="selectorder.php">&leftarrow;<span class="text-muted">Order Item Here</span></a></div>
            
        </div>


        <div class="col-md-4 summary">
            <div class="profile" align="center">
                <img src="images/mypicture.jpg">
            </div>
            <hr>
            <div class="row">
                <div class="col text-right">Name: </div>
                <div class="col text-left">Ryan R. Castro</div>
            </div>
            <div class="row">
                <div class="col text-right">Type: </div>
                <div class="col text-left">Member</div>
            </div>
            <div class="row">
                <div class="col text-right">Address: </div>
                <div class="col text-left">San Fernando</div>
            </div>
            <div class="row">
                <div class="col text-right">Contact: </div>
                <div class="col text-left">09123456789</div>
            </div>
            <div class="row">
                <div class="col text-right">Joined: </div>
                <div class="col text-left">11/05/2021</div>
            </div>	
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Shipping Fee</div>
                <div class="col text-right">P 50.00</div>
            </div> 
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Total Price&rightarrow;</div>
                <div class="col text-right">P <?php echo $total+50; ?>.00</div>
            </div> 
            <form action="orderlist.php" method="post">
            <a><button name="shipbt" class="btn">SHIP NOW</button></a>
            </form>
        </div>
    </div>
    
</div>

<footer class="footer">
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
      <a href="" class="backarrow"> FashionGeek.com</a>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>