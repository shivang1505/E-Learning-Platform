<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' and status = '0' ";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index2.php");
						die;
					}
				}
			}
			
      ?>
      <script>
        alert("Wrong username or password or the account is not active!");
      </script>
      <?php
		}else
		{ 
  
      ?>
      <script>
        alert("Wrong username or password or the account is not active!");
      </script>
      <?php
		
	}}

?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="login-nav-container">
      <div class="login-wrapper">
        <nav>
          <div class="login-logo">E-LEARNING PLATFORM</div>
          <ul class="login-nav-items">
            <li>
              <a href="Register.php">Register</a>
            </li>
            <li>
              <a href="index.html">Home</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="login-wrapper">
      <div class="login-sidenav">
        <div class="login-text">
          “In order to create an engaging learning experience,<br />
          the role of instructor is optional, but the<br />
          role of learner is essential.”<br />

          <br />- Bernard Bull, Author
        </div>
      </div>

      <h2>Login</h2>
      <br />
      
      <div class="login">
        <form id="login" method="POST">
        <div>
      <p class="session-text"> <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
      
      
        ?>  </p><br>
      </div>
          <label><b>User Name </b> </label>
          <input type="text" name="user_name" id="Uname" placeholder="Username" />
          <br /><br />
          <label><b>Password </b> </label>
          <input type="Password" name="password" id="Pass" placeholder="Password" />
          
          <br /><br />
          <button name="submit" type="submit" name="log" id="log">Log In</button>
          <br /><br />
          <input type="checkbox" id="check" />
          <span>Remember me?</span>
          <br /><br />
          <a href="forgot.php">Forgot Password</a>
        </form>
      </div>
    </div>
    <div class="login-rectangle">
      <navi>
        <ul class="login-navi-items">
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