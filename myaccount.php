<?php

?>
<head>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/checkoutstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="header">
        <a href="" class="logo">Fasion Geek</a>
        <div class="header-right">
          <a href="">Home</a>
          <a class="active" href="">MyAccount</a>
          <a href="">Logout</a>
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
                    <div class="col align-self-center text-right text-muted">3 items</div>
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
                    
                    <div class="col"> <input type="number" class="input-auto text-center border" value="1" name="blackshirt" readonly> </div>
                    <div class="col">P 100.00 <a href=""><span class="close">Remove</span></a></div>
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
                    <div class="col">  <input type="number" class="input-auto text-center border" value="1" id="blueshirt" readonly> </div>
                    <div class="col">P 100.00 <a href=""><span class="close">Remove</span></a></div>
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
                    <div class="col"> <input type="number" class="input-auto text-center border" value="1" name="redshirt" readonly> </div>
                    <div class="col">P 100.00 <a href=""><span class="close">Remove</span></a></div>
                </div>
            </div>

            <div class="back-to-shop "><a class="backarrow" href="#">&leftarrow;<span class="text-muted">Get More Items</span></a></div>
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
                <div class="col">Total Price&rightarrow;</div>
                <div class="col text-right">P 300.00</div>
            </div> 
            <form action="#" method="post">
            <a><button name="submit-btn" class="btn">SHIP NOW</button></a>
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