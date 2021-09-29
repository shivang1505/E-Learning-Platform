<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$user_name = $_POST['user_name'];
    $mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		if(!empty($user_name) && !empty($password) && !empty($email) && !empty($name) && !empty($password2) && $password == $password2)
		{

			//save to database
			$user_id = random_num(10);
			$query = "insert into users (user_id,name,user_name,mobile,email,password,status) values ('$user_id','$name','$user_name','$mobile','$email','$password','0')";

			mysqli_query($con, $query);
      
          $subject = "Email Activation";
          $body = "Hi $name, Click here to activate your account. 
          http://localhost/activate.php?user_id=$user_id ";
          $headers = "From: elearningsepm03@gmail.com";

       if (mail($email, $subject, $body, $headers)) {
            $_SESSION['msg'] = "Activation Email sent to $email";
            header("Location: Login.php");
             } else {
               echo "Email sending failed...";
             }
			           
	         	}
		
		else{
		?>
    <script>
      alert("Passwords don't match!");
    </script>
		<?php	
    }
	}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="nav-container">
      <div class="wrapper">
        <nav>
          <div class="logo">E-LEARNING PLATFORM</div>
          <ul class="nav-items">
            
            <li>
              <a href="Login.php">Login</a>
            </li>
            <li>
              <a href="index.html">Home</a>
           </li>
            <li>
              
              <a href="#">Contact Us</a>
            </li>
          </ul>
        </nav>
      </div>

          <div class="register-wrapper">
           
            <div class="register-sidenav">
                <div class="register-text">
                    "Learning is not the product of teaching.<br> 
                     Learning is the product of the activity of learners."<br> 
                                                             <br>- John Holt, Educator
                </div>                
              </div> 
              <div class="Register-container" style="margin-right: 300px;">
                <h1>Register Here!</h1>
                <br>
                <br>
                <hr>
                <form method="post">
                <label for="name"><b>Full Name<br></b></label>
             
                
                <input type="text" placeholder="Enter First Name" name="name" required>
                
                <label for="Username"><b><br>Username<br></b></label>
                <input type="text" placeholder="Enter Username" name="user_name" required>
                <label for="Username"><b><br>Mobile<br></b></label>
                <input type="text" placeholder="Enter Mobile No." name="mobile" required>
                <label for="email"><b><br>Email<br></b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                
            
                <label for="psw"><b><br>Password<br></b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            
                <label for="psw-repeat"><b><br>Confirm Password<br></b></label>
                <input type="password" placeholder="Confirm Password" name="password2" required>
            
                <label>
                  <br><input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>
                
            
                <div class="clearfix">
                  
                    <button name="submit" type="submit" class="signupbtn">Sign Up</button>
                 
                </div>
              </form> 
              </div>
          </div>
      <div class="Register-rectangle">
        <navi>
          <ul class="Register-navi-items">
            <li>
              <a href="#">Privacy Policy</a>
            </li>
            <li>
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </navi>
        <p>&copy; 2021 E-Learning</p>
      </div>
      <script src="main.js"></script>
    </body>
  </html>