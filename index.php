<?php 
session_start();


 $dbhost = "localhost";
 $dbuser = "user";
 $dbpass = "pass";
 $db = "sampledatabase";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM sampletable WHERE username = '$myusername' and password = '$mypassword'";

      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);

      
      if($count == 1) { 	

    		$_SESSION['username'] = $myusername;
			$_SESSION['password'] = $mypassword;
			header("location: show.php");
     	}
      else {
         $error = "Your Login Name or Password is invalid";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }
  	}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/checkoutstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="header">
        <a href="" class="logo">Fasion Geek</a>
        <div class="header-right">
          <a href="login.html">Home</a>
          <a class="active" href="">MyAccount</a>
          <a href="">Logout</a>
       </div>
    </div>
</head>
<body>
    

<div class="card">
    <div class="row">
        <div class="">
            <div class="title">
			<form class="" action="#" method="post">
				<input type="text" class="input-auto text-center border" name="username" placeholder="Username" required>
				<input type="password" class="input-auto text-center border" name="password" placeholder="Password" required>
				<a href=""><span class="col-s-8 col-8 forgotpass">Forgot Password?</span></a>
			<button type="submit" name="submit-btn" class="btn">Log In</button>
		</form>
			</div>
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
</html>
<?php

?>