<?php
include('uploaddb.php');

if (isset($_POST['submit'])) {
  $Name = $_POST['Name'];
  $Email = $_POST['Email'];
  $pn = $_POST['pn'];
  $msg = $_POST['msg'];
  $query =  " INSERT INTO `contact` ( `Name`, `Email`, `pn`, `msg`) VALUES ('$Name', '$Email', '$pn', '$msg')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // echo "sucessfull";
  } else {
    die("failed" . mysqli_error($conn));
    // echo "failed";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact us</title>
  <link rel="stylesheet" href="contact_us.css" />
</head>

<body>
  <div class="nav-container">
    <div class="wrapper">
      <nav>
        <div class="logo">E-LEARNING PLATFORM</div>
        <ul class="nav-items">
          <!-- <li>
              <a href="myupload.php">Uploads</a>
            </li>
            <li>
              <a href="ap.html">Account</a>
            </li> -->
          <!-- <li>
              <a href="index.html">Logout</a>
            </li> -->
        </ul>
      </nav>
    </div>
  </div>
  <div class="head-container">
    <div class="head-wrapper">
      <heady>
        <div class="headlogo">CONTACT US</div>
      </heady>
    </div>
  </div>

  <div class="databox">
    <form action="" method="POST">
      <label>Name</label>
      <input class="fn" id="filename" name="Name" /><br /><br />
      <label>Email</label>
      <input class="ft" id="filetype" name="Email" /><br /><br />
      <label>Phone number</label>
      <input class="kw" id="adlink" name="pn" />
      <br /><br />
      <label>Message</label>
      <input class="ds" id="description" name="msg" /><br /><br />

      <input class="sbt" name="submit" type="submit" value="Send" />
      <img src="Elearning/images/contact.png" alt="">
    </form>
  </div>
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