<?php

include 'control/include.php';

if (isset($_POST["additem"])) {

    $itemname = $_POST["itemname"];
    $itemclass = $_POST["itemclass"];
    $itemtype = $_POST["itemtype"];
    $itemdesc = $_POST["itemdesc"];
    $itemprice = $_POST["itemprice"];
    $itemdate = $SDate = date("Y/m/d");
 
    $sql = "INSERT INTO items VALUES (null , '$itemname', '$itemclass' , '$itemtype' , '$itemdesc' , '$itemprice' , 'Available', '$itemdate')";
    if ($conn->query($sql) === TRUE) 
    {

    } 
    else
     {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
     
}
else
{

}

if (isset($_POST['checkoutbt'])){
    $query3 = "SELECT * FROM itempreorder";
    if ($result3 = $conn->query($query3)) {
        while ($row = $result3->fetch_assoc()) {
            $name3= $row["ItemName"];
            $image3 = $row["Images"];
            $type3= $row["Type"];
            $desc3 = $row["Description"];
            $price3 = $row["Price"];
            $totalprice3 = $row["TotalPrice"];
            $quantity3 = $row["Quantity"];
            $GID = $row["ID"];
            $Date3 = date("Y/m/d");

            
            $sql4 = "INSERT INTO productlist VALUES (null , '$name3', '$type3' , '$desc3' , '$price3' , '$quantity3' , '$totalprice3' , '$image3' , '$Date3' , 'Ordered')";
            if ($conn->query($sql4) === TRUE) {
                echo "wawa";
            } 
            else {
            echo "Error: " . $sql4 . "<br>" . $conn->error;
            }

            $sql2 = "DELETE FROM itempreorder WHERE ID=$GID";
    
            if ($conn->query($sql2) === TRUE) {
            
            } 
            else 
            {

            }

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
                        <button onclick="addnewitem()" name="additem" class="col-5 input-field" >Add Item</button>
                        <h4><b>Order</b></h4>
                    </div>
                    
                </div>
            </div>
            <div>
                <div class="row main align-items-center">
                    <form align="center" method="post" action="" id="addnewitem">
                        <h4><b>Add New Item<br><br></b></h4>
                        <input class="col-7 input-auto text-center border" type="text" name="itemname" placeholder="Item Name" required>
                        <select class="col-7 input-auto text-center border" name="itemclass" id="tshirts" required>
                            <option value="redt.jfif">Red</option>
                            <option value="bluet.jfif">Blue</option>
                            <option value="greent.jfif">Green</option>
                            <option value="blackt.jfif">Black</option>
                        </select>
                        <select class="col-7 input-auto text-center border" name="itemtype" id="tshirts" required>
                            <option selected value="T-Shirt">T-Shirt</option>
                        </select>
                        <input class="col-7 input-auto text-center border" type="text" name="itemdesc" placeholder="Item Description" required>
                        <input class="col-7 text-center border" type="number" name="itemprice" placeholder="Item Price" required>
                        <button onclick="addeditem()"  name="additem" class="col-5 input-field" >Add Item</button>
                    </form>
                </div>
            </div>

            
            <?php
                echo "<div id='hideitems'>";
               $query = "SELECT * FROM items where Status = 'Available' ";
               $idarray[] = 0;

                if ($result = $conn->query($query)) {

                    while ($row = $result->fetch_assoc()) {
                    
                        $adding = 1; 
                        $name[$adding] = $row["ItemName"];
                        $image[$adding] = $row["Image"];
                        $type[$adding] = $row["Type"];
                        $desc[$adding] = $row["Descriptions"];
                        $price[$adding] = $row["Price"];
                        $dates[$adding] =  $row["Date"];
                        $idarray[$adding] = $row["ID"];
                        $me = $row["ID"];
                        echo "<div class='row border-top border-bottom'>
                                <div class='row main align-items-center'>
                                    <div class='col-2'><img class='img-fluid' src='images/". $image[$adding] ."'></div>
                                    <div class='col'>
                                        <div class='row text-muted'>". $type[$adding] ."<br>" . $desc[$adding] ."</div>
                                        <div class='row'>". $name[$adding] ."</div>
                                        <div class='row text-muted'>". $dates[$adding] ."</div>
                                        <div class='row'><a href='updateitem.php?id=". $idarray[$adding] ."'><span class='close'>Update</span></a> </div>
                                    </div>
                                    <form class='col main align-items-right text-left' method='post' action='addingitem.php?id=". $idarray[$adding] ."''>
                                        Quantity: <input type='number' name='quantity". $me ."' class='input-field' value='0'>

                                        <input type='number' name='itemnames". $idarray[$adding] ."' class='input-field' value='". $idarray[$adding] ."' disabled>
                                        
                                        <br>Price: P ". $price[$adding] .".00<br>
                                        <input class='input-field' name='submit' type='submit' value='Add to Cart'><a href='removeitem.php?id=". $idarray[$adding] ."'><span class='close'>Remove</span></a>
                                    </form>
                                </div>
                            </div>";
                        $adding++;
                    }  
                }
                echo "</div>";

                
            ?>

	        <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div class="row">
                <div class="col"><h5><b>My Cart</b></h5></div>
                <div class="col">
                    <form class="align-items-left" action="" method="post">
                        <input type="number" name="resetme" value="1" hidden readonly>
                        <input class="btn" type="submit" value="Reset">
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
                    $query2 = "SELECT * FROM itempreorder";
                    if ($result2 = $conn->query($query2)) {
                        while ($row = $result2->fetch_assoc()) {
                            $name2= $row["ItemName"];
                            $totalprice2 = $row["TotalPrice"];
                            $quantity2 = $row["Quantity"];

                                echo "<div>" . $name2 ." x".$quantity2;       
                                echo "</div>   
                                <div>";
                                echo "P ".$totalprice2.".00 </div><br> ";
                        }
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
                    
                </div>
            </div> <form action="" method="post"> <button name="checkoutbt" class="btn">PRE-ORDER</button></form>
           
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
      <a href=""> FashionGeek.com</a>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="javascript/js.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


</body>