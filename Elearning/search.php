<?php
  include 'db.php'; // include db.php file for databse connectivity
  include 'function.php'; // include function.php file to use the function
 ?>
<html>
  <head>
    <title>Search</title>
  </head>
  <body>
    <h1>Search The Database</h1>
      <form action="" method="POST">
              <input type="text" name="keywords" size="50"  />
              <input type="submit" name="submit" value="search"  />
      </form>
<?php
//capturing form values upon form submission
if(isset($_POST['submit'])){
  // Purifying Keywords to avoid SQL injection and additional white spaces
  $keywords = mysqli_real_escape_string($connection,htmlentities(trim($_POST['keywords'])));

$errors = array();
  if(empty($keywords)){
          $errors[] = "You did not enter any search term";
      }else{
  if(strlen($keywords)<4){
          $errors[] = "Search term should be at least 4 characters long";
        }
  if(search_results($keywords)===false){
          $errors[] = "Your search did not return any results";
        }
      }

        if(empty($errors)){
//Calling function if there was no error in entered kewyords
                $results = search_results($keywords);
                $result_num = count($results);
//Displaying returned results
                echo "Your search for <strong>". $keywords. "</strong> produced " . $result_num . "results<br  />";
                foreach($results as $result){
                  echo "<h3>" .$result['title'] . "</h3>";
                  echo "<p>" .$result['description'] . "</p>";
                  echo "<a href=\"" .$result['link'] . "\">" . $result['link'] . "</a>";
                }

        }else{
// Display errors in case the entered keywords voilates validation rules
              foreach($errors as $error){
                  echo $error . "<br />";
                      }

        }

}


 ?>

  </body>
</html>
