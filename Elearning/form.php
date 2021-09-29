<?php
//Include the database connectivity in this file
include 'db.php';
//Capture the values of form after submission
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $keywords = $_POST['keywords'];
    $errors = array();
    //Validating form data using different validation rules
    if(empty($title) || empty($description) || empty($url) || empty($keywords)){
      $errors[] = "All fields must be filled";
    }else{
      if(str_word_count($keywords)<2){
        $errors[] = "There must be at least 2 keywords";
      }
      if(!filter_var($url, FILTER_VALIDATE_URL)){
        $errors[] = "This is not a proper URL";
      }
    }
    //Here we are going to display $errors
    if(!empty($errors)){
      foreach($errors as $error){
        echo $error . "<br />";
      }

    }
//Execution of Query for entering data in database
if(empty($errors)){
    $query =   "INSERT INTO articles(title,description,url,keywords) VALUES
      ('{$title}','{$description}','{$url}','{$keywords}')";
      $result = mysqli_query($connection,$query);
      if($result){
        echo "Record Saved Successfully";
      }else{
        die("Database Query Failed" . mysqli_error($connection));
      }

  }
}



 ?>
<html>
  <head>
    <title>Form for entering Data</title>
  </head>
  <body>
    <form action="" method="POST">
    <p>
      Article Title<br />
      <input type="text" name="title" size="100" />
    </p>
    <p>
      Description <br />
      <textarea name="description" cols="50" rows="5"></textarea>
    </p>
    <p>
      URL <br  />
      <input type = "text" name="url" size="100" />
    </p>
  <p>
    Keywords <br / />
    <input type="text" name="keywords" size="100" />
  </p>
  <input type = "submit" name="submit" value="Save"  />
    </form>
  </body>
</html>
