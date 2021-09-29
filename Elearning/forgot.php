<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
    $emailquery = "select * from users where user_name = '$user_name'";
    $query = mysqli_query($con,$emailquery);
    $count = mysqli_num_rows($query);
    
    if($count)
		{
      $userdata = mysqli_fetch_array($query);
      $name=$userdata['name'];
      $token=$userdata['user_id'];
		      $subject = "Password Reset";
          $body = "Hi $name, Click here to reset your password. 
          http://localhost/SepmShivangFinal/create.php?user_id=$token ";
          $headers = "From: elearningsepm03@gmail.com";

       if (mail($email, $subject, $body, $headers)) {
            $_SESSION['msg'] = "Check your Email to reset your password at
             $email";
            header("Location: Login.php");
             } else {
               echo "Email sending failed...";
               }
    
	         	}
             else{
              ?>
              <script>
                alert("Email not found!");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css" />
  </head>

  <body>
    <div class="nav-container">
      <div class="wrapper">
        <nav>
          <div class="logo">E-LEARNING PLATFORM</div>
        </nav>
      </div>
    </div>
    <div class="fdiv">
      <p>
        "In order to create an engaging learning experience,<br />
        the role of a instructor is optimal but the role of learner is
        essential."<br />

        <br />&emsp;&emsp;&emsp;&emsp; -Bernard Bull,Author
      </p>
    </div>
    <div class="sdiv1" style="margin-top:50px; text-align:center;">
      <h1>Forgot Password</h1>
      <form method="post">
      
        
        <label for="username" style="font-size: 25px;"><b><br><br>Username<br><br></b></label>
        <input type="text" placeholder="Enter Username" name="user_name" style="width: 25%; height: 28px;" required>
         <br>
        <label for="email" style="font-size: 25px;"><b><br><br>Email<br><br></b></label>
        <input type="text" placeholder="Enter Email" name="email" style="width: 25%; height: 28px;" required>
          <br><br>
          <button type="submit" name="submit" style="color: #ffffff; 
                                                     background-color: #d4149b; 
                                                     border-radius: 2px; font-size: 15px; 
                                                     font-family:'Original Surfer', cursive;
                                                     font-weight: 500;">Send Mail</button>
        
      
      </form>
    </div>
    <div class="clr"></div>
    <div class="rectangle">
      <navi>
        <ul class="navi-items">
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
  </body>
</html>
