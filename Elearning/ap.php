<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Profile</title>
    <link rel="stylesheet" href="ap.css" />
  </head>
  <body background="Elearning/images/study-bg.jpg">
    <div class="nav-container">
      <div class="wrapper">
        <nav>
          <div class="logo" style="font-family: 'Original Surfer', cursive;">E-LEARNING PLATFORM</div>
          <ul class="nav-items">
            <li>
              <a href="my-uploads.html">Uploads</a>
            </li>
            <li>
              <a href="ap.html">Account</a>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="header-container">
      <div class="wrapper">
        <header>
          <div class="logo-content" style="text-align: center; font-family: 'Original Surfer', cursive;">ACCOUNT PROFILE</div>
        </header>
      </div>
    </div>
    <img src="Elearning/images/profile-picture.png" alt="profile-picture  " />
    <form class="my-form" style="text-align: center;">
      <button type="button" class="form-items">Change image</button>
      <button type="button" class="form-items">Remove image</button><br><br><br>


      <div class="account" 
          style="text-align:center;
                 display:block;
                 width:100%;
                 color:cornsilk;
                 ">
        <br><p class="form-items-text" style="font-size: 30px; font-weight: bold; font-family: 'Original Surfer', cursive;"><nobr>Name: <?php echo $user_data['name']; ?></nobr></p> <br>
      
        <br><p class="form-items-text" style="font-size: 30px; font-weight: bold; font-family: 'Original Surfer', cursive;"><nobr>Username: <?php echo $user_data['user_name']; ?></nobr></p><br>
      
        <br><p class="form-items-text" style="font-size: 30px; font-weight: bold; font-family: 'Original Surfer', cursive;"><nobr>Email: <?php echo $user_data['email']; ?></nobr></p><br>
      
        <br><p class="form-items-text" style="font-size: 30px; font-weight: bold; font-family: 'Original Surfer', cursive;">Mobile: <?php echo $user_data['mobile']; ?></p><br>
      </div>
      <button type="button" class="form-items">Edit Info</button>
      <!-- <div class="form-group">
          <label id="pd"> Password </label>
          <input type="text" id="pdi" value="    Password">
      </div> -->
      <br />
      <button type="button" class="form-items">Change Password</button>
    </form>

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
