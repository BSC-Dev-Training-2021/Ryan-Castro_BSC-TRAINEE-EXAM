<?php
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
else{
    session_destroy();
}

if (empty($_SESSION['blacktshirt'])){
    $_SESSION['blacktshirt'] = 0;
    $_SESSION['blackt'] = 0;
    $_SESSION['totalitem1'] = 0;
}

if (empty($_SESSION['redtshirt'])){
    $_SESSION['redtshirt'] = 0;
    $_SESSION['redt'] = 0;
    $_SESSION['totalitem2'] = 0;

}

if (empty($_SESSION['bluetshirt'])){
    $_SESSION['bluetshirt'] = 0;
    $_SESSION['bluet'] = 0;
    $_SESSION['totalitem3'] = 0;
}

if (empty($_POST['blacktshirt'])){
}
else{
    if ($_POST['blacktshirt'] < 0){
    $_POST['blacktshirt'] = 0;
    }
}

if (empty($_POST['redtshirt'])){

}
else{
    if ($_POST['redtshirt'] < 0){   
    $_POST['redtshirt'] = 0;
}
}
if (empty($_POST['bluetshirt'])){

}
else{
    if ($_POST['bluetshirt'] < 0){
    $_POST['bluetshirt'] = 0;
}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST['resetme']))
    {
    }
    else
    {
        session_destroy();
        header("location: selectorder.php");
    }

    if (empty($_POST['blacktshirt'])){
    }
    else{
        if ($_POST['blacktshirt'] > 0){
            $_SESSION['blackt'] = $_POST['blacktshirt'];
            $_SESSION['blacktshirt'] = $_SESSION['blackt'] + $_SESSION['blacktshirt'];

            $_SESSION['totalitem1'] = 100 * $_SESSION['blacktshirt'];
            
            $_SESSION['alltotalitem'] =  $_SESSION['totalitem3'] +  $_SESSION['totalitem2'] + $_SESSION['totalitem1'];
        }
    }

    if (empty($_POST['redtshirt'])){
         }
    else{
        if ($_POST['redtshirt'] > 0){
            $_SESSION['redt'] = $_POST['redtshirt'];
            $_SESSION['redtshirt'] = $_SESSION['redt'] + $_SESSION['redtshirt'];

            $_SESSION['totalitem2'] = 120 * $_SESSION['redtshirt'];

            $_SESSION['alltotalitem'] =  $_SESSION['totalitem3'] +  $_SESSION['totalitem2'] + $_SESSION['totalitem1'];
        }
    }   

    if (empty($_POST['bluetshirt'])){
    }
    else{
        if ($_POST['bluetshirt'] > 0){
            $_SESSION['bluet'] = $_POST['bluetshirt'];
            $_SESSION['bluetshirt'] = $_SESSION['bluet'] + $_SESSION['bluetshirt'];

            $_SESSION['totalitem3'] = 110 * $_SESSION['bluetshirt'];

            $_SESSION['alltotalitem'] =  $_SESSION['totalitem3'] +  $_SESSION['totalitem2'] + $_SESSION['totalitem1'];
        }
    }
}





if (isset($_POST["checkoutbt"])) {
    
    $dbhost = "localhost";
    $dbuser = "user";
    $dbpass = "pass";
    $db = "sampledatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else
      { 
        if ($_SESSION['blacktshirt'] > 0){
            $ftotalprice = $_SESSION['totalitem1'];
            $fquantity =  $_SESSION['blacktshirt'];
            $fprice = 100;

            $sql = "INSERT INTO productlist (ID, ProductName, Descriptions, Price, Quantity, TotalPrice, Images, Status)
            VALUES (null , 'Black T-Shirt', 'Shirt - 100% Cotton' , '$fprice' , '$fquantity' , '$ftotalprice' , 'blackt.jfif' , 'Ordered')";
         if ($conn->query($sql) === TRUE) {
           
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
          
        if ($_SESSION['redtshirt'] > 0){
            $ftotalprice = $_SESSION['totalitem2'];
            $fquantity =  $_SESSION['redtshirt'];
            $fprice = 120;

            $sql = "INSERT INTO productlist (ID, ProductName, Descriptions, Price, Quantity, TotalPrice, Images, Status)
            VALUES (null , 'Red T-Shirt', 'Shirt - 100% Cotton' , '$fprice' , '$fquantity' , '$ftotalprice' , 'redt.jfif' , 'Ordered')";
            if ($conn->query($sql) === TRUE) {
            } 
            else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
          if ($_SESSION['bluetshirt'] > 0){
            $ftotalprice = $_SESSION['totalitem3'];
            $fquantity =  $_SESSION['bluetshirt'];
            $fprice = 110;

            $sql = "INSERT INTO productlist (ID, ProductName, Descriptions, Price, Quantity, TotalPrice, Images, Status)
            VALUES (null , 'Blue T-Shirt', 'Shirt - 100% Cotton' , '$fprice' , '$fquantity' , '$ftotalprice' , 'bluet.jfif' , 'Ordered')";
         if ($conn->query($sql) === TRUE) {
           
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
            
            
         }
            if ($_SESSION['blacktshirt'] > 0 OR $_SESSION['redtshirt'] > 0 OR $_SESSION['bluetshirt'] > 0)
        {           
            $ok = "Checkout Success!";
            session_destroy();
            $conn->close();
            echo "<script> alert('$ok');
            window.location.href='myaccount.php';</script>";
        }
        } 
      }

?>
<head>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="header">
        <a href="" class="logo">Fasion Geek</a>
        <div class="header-right">
          <a href="orderlist.php">Home</a>
          <a class="active" href="">Shop</a>
          <a href="myaccount.php">MyAccount</a>
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
                        <h4><b>Order</b></h4>
                    </div>
                    
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="images/blackt.jfif"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Black T-shirt</div>
                        <div class="row text-muted">11/05/2021</div>
                    </div>
					<form class="col main align-items-right text-left" method="post" action="">
                    	Quantity: <input type="number" name="blacktshirt" class="input-field" value="0">
                    	<br>Price: P 100.00<br>
						<input class="input-field" name="submit" type="submit" value="Add to Cart">
					</form>
                </div>
            </div>

            <div class="row">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="images/bluet.jfif"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Blue T-shirt</div>
                        <div class="row text-muted">11/05/2021</div>
                    </div>
					<form class="col main align-items-center text-left" method="post" action="">
                		Quantity: <input type="number" name="bluetshirt" class="input-field" value="0">
                   		<br>Price: P 110.00<br>
						<input class="input-field" type="submit" value="Add to Cart">
					</form>
                </div>
            </div>

            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="images/redt.jfif"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Red T-shirt</div>
                        <div class="row text-muted">11/05/2021</div>
                    </div>
					<form class="col main align-items-center text-left" method="post" action="">
                   		Quantity: <input type="number" name="redtshirt" class="input-field" value="0">
                    	<br>Price: P 120.00<br>
						<input class="input-field" type="submit" value="Add to Cart">
					</form>
                </div>
            </div>

	        <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div class="row">
                <div class="col"><h5><b>My Cart</b></h5></div>
                <div class="col">
                    <form class="align-items-left" action="" method="post">
                        <input type="number" name="resetme" value="1" hidden readonly>
                        <input class="reset-btn" type="submit" value="Reset">
                    </form>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">&rightarrow;ITEMS</div>
            </div>
            <div class="row">
                <div class="col">
                 <?php 
                    if ($_SESSION['blackt'] > 0){
                        echo "Black T-Shirt" ." x".$_SESSION['blacktshirt'];       
                    }
                 ?>
                </div>    
                <div class="col">
                <?php 
                    if ($_SESSION['blackt'] > 0){
                        echo "P ".$_SESSION['totalitem1'].".00";
                    }
                 ?>
                </div> 
            </div>

            <div class="row">
                <div class="col">
                 <?php 
                    if ($_SESSION['bluet'] > 0){
                        echo "Blue T-Shirt" ." x".$_SESSION['bluetshirt'];       
                    }
                 ?>
                </div>    
                <div class="col">
                <?php 
                    if ($_SESSION['bluet'] > 0){
                        echo "P ".$_SESSION['totalitem3'].".00";
                    }
                 ?>
                </div> 
            </div>
            <div class="row">
                <div class="col ">
                 <?php 
                    if ($_SESSION['redt'] > 0){
                        echo "Red T-Shirt" ."  x".$_SESSION['redtshirt'];       
                    }
                 ?>
                </div>    
                <div class="col">
                <?php 
                    if ($_SESSION['redt'] > 0){
                        echo "  ". "P ".$_SESSION['totalitem2'].".00";
                    }
                 ?>
               
            </div>

            </div>

            <form>
                <p><br>Shipping Fee</p> <input value="P 50.00" readonly>
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">
                    <?php 
                        if (empty($_SESSION['alltotalitem'])){
                            
                        }    
                        else
                        {
                            echo "P ". $_SESSION['alltotalitem'] + 50 .".00";
                        }                 
                    ?>
                </div>
            </div> <form action="" method="post"> <button name="checkoutbt" class="btn">CHECKOUT</button></form>
           
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
      <a href=""> FashionGeek.com</a>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>