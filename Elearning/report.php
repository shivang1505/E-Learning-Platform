<?php
include 'db.php'; // include db.php file for databse connectivity
include 'function.php'; // include function.php file to use the function

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Report Page</title>
  <link rel="stylesheet" href="report-style.css" />
</head>

<body>
  <div class="nav-container">
    <div class="wrapper">
      <nav>
        <div class="logo">E-LEARNING PLATFORM</div>
        <ul class="nav-items">
          <li>
            <a href="my-uploads.html">Uploads</a>
          </li>
          <li>
            <a href="ap.html">Account</a>
          </li>
          <li>
            <a href="indexx.php">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="header-container">
    <div class="wrapper">
      <header>
        <div class="logo-content">
          <div class="bottom">NEED TO FIND ANYTHING ELSE?</div>
          <div class="search-container">
            <form class="search" action="result.php" method="POST">
              <input type="text" placeholder=" Type Something.." name="keywords" />
              <button type="submit">Search</button>
            </form>
          </div>
          <img src="Elearning/images/Rectangle 3.jpg" alt="e-learning" />
        </div>
      </header>
    </div>
  </div>
  <header>
    <h2>REPORT FILE</h2>
  </header>
  <?php

  $title = $_GET['title'];
  $des = $_GET['des'];
  $link = $_GET['link'];
  $type = $_GET['type'];
  $uploader = $_GET['upder'];
  $update = $_GET['update'];
  echo "<hr />";
  echo "<h4>" . $title . "</h4>";
  echo '<div class="des">' . $des . '</div>';
  echo "<br />";
  echo "<br />";
  echo "<a class=\"link\" href=\"" . $link . "\">" . $link . "</a>";
  echo '<div class="items">';
  echo '<ul class="n-items">';
  echo '<li>' . $type . '</li>';
  echo '<li>' . $uploader . '</li>';
  echo '<li>' . $update . '</li>';
  echo '</ul>';
  echo '</div>';

  if (isset($_POST['submit'])) {
    $reason = $_POST['report'];
    $errors = array();
    if (empty($errors)) {
      $query = "INSERT INTO tabble(title,description,link,username,reason) VALUES
      ('{$title}','{$des}','{$link}','{$uploader}','{$reason}')";
      $result = mysqli_query($connection, $query);
      if ($result) {
        //echo "Record Saved Successfully";
      } else {
        die("Database Query Failed" . mysqli_error($connection));
      }
    }
  }


  ?>
  <!-- <hr />
    <h4>File Name</h4>
    <div class="des">File Description</div>
    <div class="link">
      <a href="#">this part contains link</a>
    </div>
    <div class="items">
      <ul class="n-items">
        <li>type</li>
        <li>uploader</li>
        <li>uploaded date</li>
      </ul>
    </div> -->
  <br /><br />
  <h4>Reason</h4>
  <form action="" method="POST">
    <input type="text" id="report" name="report" class="repbox" /><br /><br />
    <input type="submit" name="submit" value="Submit" class="subm" />
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
  <script src="result.js"></script>
</body>

</html>