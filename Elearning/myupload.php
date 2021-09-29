
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Uploads</title>
    <link rel="stylesheet" href="myupload.css" />
  </head>
  <body>
    <div class="nav-container">
      <div class="wrapper">
        <nav>
          <div class="logo">E-LEARNING PLATFORM</div>
          <ul class="nav-items">

            <li>
              <a href="ap.php">Account</a>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="head-container">
      <div class="head-wrapper">
          <heady>
              <div class="headlogo">MY UPLOADS</div>
          </heady>
      </div>
    </div>
    <header>
    <h2>Uploads by <?php
        session_start();
        include('uploaddb.php');
        include("functions.php");
   
       $user_data = check_login($conn);
    echo $user_data['name'];
    ?></h2>
    <div class="up">
      <a href="upload.php">+ Upload</a>
    </div>
    <form method="post">
    </header>
    <div class="results">
    <?php

    $sqlget = "SELECT * FROM articles";
    $sqldata = mysqli_query($conn,$sqlget);
    $userid = $user_data['user_id'];
     while ($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
       if($row['user_id'] == $user_data['user_id'])
       {
        ?>
       <hr>
       <h4>
        <?php
        ECHO $row['filename'];
        ?>
        </h4>
       <div class="des">
       <?php
       ECHO $row['description'];
       ?>
       </div>
       <div class="link">
       <?php
      echo '<a href=',$row['url'],'>',$row['url'],'</a>';
      ?>
       </div>
       <div class="items">
      <ul class="n-items">
        <li>
        <?php
        ECHO $row['filetype'];
        ?>
        </li>
        <li><?php
         ECHO  $row['dt'];
        ?></li>
    </ul>
     
    <div class="edit">
        <a href="#">edit file</a>
    </div>
    <div class="delete">
      <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    </div>
    </div>
     <?php
     }
     }
    ?>
      <hr>
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