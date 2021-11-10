<?php 
session_start();

include 'control/include.php';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
        if (!empty($_POST['username']) and !empty($_POST['password'])){

            $myusername = mysqli_real_escape_string($conn,$_POST['username']);
            $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
            
            $sql = "SELECT * FROM User WHERE Username = '$myusername' and Password = '$mypassword'";

            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            
            if($count == 1) { 	
                    $_SESSION['username'] = $myusername;
                    $_SESSION['password'] = $mypassword;
                    header("location: selectorder.php");
                }
            else {
                $error = "Your Login Name or Password is invalid";
                echo "<script type='text/javascript'>alert('$error');</script>";
            }
        }
        if (!empty($_POST['SUsername']) and !empty($_POST['SPassword'])){

            $SFname = $_POST['FName'];
            $SLName = $_POST['LName'];
            $SUsername = $_POST['SUsername'];
            $SPassword = $_POST['SPassword'];
            $SDate = date("Y/m/d");

            $sql = "INSERT INTO user VALUES (null, '$SFname' , '$SLName' , '$SUsername' , '$SPassword' , 'N/A' , 'N/A' , '$SDate' , 'Member')";
            if ($conn->query($sql) === TRUE) {
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else
        {
            $error = "Error";
                echo "<script type='text/javascript'>alert('$error');</script>";
        }
  	}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="header">
        <a href="" class="logo">Fasion Geek</a>
        <div class="header-right">
          <a class="active" href="">Home</a>
       </div>
    </div>
</head>
<body>

<div class="cards" align="center">
    <div class="row">
        <div class="">
            <div class="title">
            <form class="col-7" action="#" method="post" id="signform"  >
                <input type="text" class="input-auto text-center border" name="FName" placeholder="First Name" required>
                <input type="text" class="input-auto text-center border" name="LName" placeholder="Last Name" required>
				<input type="text" class="input-auto text-center border" name="SUsername" placeholder="Username" required>
				<input type="password" class="input-auto text-center border" name="SPassword" placeholder="Password" required>
			    <button type="submit" name="submit-signup" class="btn btn-primary">Sign Up</button>
		    </form>
            <button type="submit" name="" id="inlogbt" class="col-7 input-field" onclick="inlog()">Log In</button>

            

			<form class="col-7" action="#" method="post" id="logform">
				<input type="text" class="input-auto text-center border" name="username" placeholder="Username" required>
				<input type="password" class="input-auto text-center border" name="password" placeholder="Password" required>
				<a href=""><span class="col-s-8 col-8 forgotpass"><br>Forgot Password?</span></a>
			    <button type="submit" name="submit-btn" class="btn btn-primary">Log In</button>
		    </form>
            <button type="submit" id="insignbt" name="" class="col-7 input-field" onclick="insign()">Sign Up</button>
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
<script src="javascript/js.js">
    
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
?>