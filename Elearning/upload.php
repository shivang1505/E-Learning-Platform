<?php
session_start();
include('uploaddb.php');
include("functions.php");

$user_data = check_login($conn);
if(isset($_POST['submit']))  
 {
  $filename =$_POST['file_name'];
  $filetype =$_POST['file_type'];
  $description =$_POST['Description'];
  $url =$_POST['ad_link'];
  $keywords =$_POST['Keywords'];
  $userid = $user_data['user_id'];
  // echo $userid ;
  $errors = array();
  if(empty($filename)||empty($filetype)||empty($description)||empty($url)||empty($keywords))
  {
    $errors[] ="All feilds must be filled";
  }else{
    if(str_word_count($keywords)<2){
      $errors[]="There must be at least 2 keywords";
    }
    if(!filter_var($url, FILTER_VALIDATE_URL )){
      $errors[]='This is not a proper URL';
    }
  }

if(!empty($errors)){
  foreach($errors as $error){
    echo $error . "<br /><br />";
  }
}
if(empty($errors)){

  $query =   "INSERT INTO `articles` (`filename`, `filetype`, `description`, `url`, `keywords`,`user_id`) VALUES ('{$filename}', '{$filetype}', '{$description}', '{$url}', '{$keywords}','{$userid}')";
  $result = mysqli_query($conn,$query);
    if($result){
    }
  else{
      die("failed" . mysqli_error($conn));
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
    <title>Upload Page</title>
    <link rel="stylesheet" href="upload.css" />
  </head>
  <body>
    <div class="nav-container">
      <div class="wrapper">
        <nav>
          <div class="logo">E-LEARNING PLATFORM</div>
          <ul class="nav-items">
            <li>
              <a href="myupload.php">Uploads</a>
            </li>
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
          <div class="headlogo">UPLOAD</div>
        </heady>
      </div>
    </div>
    <header>
      <h2>Upload the file</h2>
    </header>
    <hr />
    <div class="databox">
      <form action="" method="POST">
        <label for="filename">File Name</label>
        <input
          class="fn"
          type="text"
          id="filename"
          name="file_name"
        /><br /><br />
        <label for="filetypr">File Type</label>
        <input
          class="ft"
          type="text"
          id="filetype"
          name="file_type"
        /><br /><br />
        <label for="description">Description</label>
        <input
          class="ds"
          type="text"
          id="description"
          name="Description"
        /><br /><br />
        <label for="adlink">Address Link</label>
        <input class="al" id="adlink" name="ad_link" /><br /><br />
        <label for="keywords">keywords</label>
        <input class="kw" type="text" id="adlink" name="Keywords" /><br /><br />
        <input class="sbt" name="submit"type="submit" value="Submit" />
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