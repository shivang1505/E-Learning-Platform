<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    if(isset($_GET['user_id'])){
      $token = $_GET['user_id'];
   
      $newpassword = $_POST['newpassword'];
		  $newpassword2 = $_POST['newpassword2'];

    

      if($newpassword == $newpassword2)
		  {
       $update = "update users set password='$newpassword' where user_id = '$token'";
       $iquery = mysqli_query($con,$update);
        if($iquery){
          $_SESSION['msg']="Your password has been updated!";
          header('location: Login.php');
       }
      }else{
              ?>
            <script>
                alert("Passwords don't match!");
            </script>
	          	<?php	
    }
  }

  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Password</title>
    <link rel="stylesheet" href="create.css" />
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
        “In order to create an engaging learning experience<br />
        the role of instructor is optional, but the role of learner is
        essential.”<br />

        <br />&emsp;&emsp;&emsp;&emsp; - Bernard Bull, Author
      </p>
    </div>
    <div class="sdiv">
      <h1>Create New Password<br><br></h1>
      
      <div class="form">
      <form method="post">
        <div class="my-form">
          <label> Enter New Password <br></label>
          <input type="password" name="newpassword" required>
        </div>

        <div class="my-form" name="password2">
          <label> Confirm New Password <br></label>
          <input type="password" name="newpassword2" required>
        </div>
        <button type="submit" name="submit" style="color: #ffffff; 
        background-color: #d4149b; 
        border-radius: 2px; font-size: 15px; 
        font-family:'Original Surfer', cursive;
        font-weight: 500;">Change Password</button>
      </div>
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
