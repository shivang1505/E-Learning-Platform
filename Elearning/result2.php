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
  <title>Search Results</title>
  <link rel="stylesheet" href="result-style.css" />
</head>

<body>
  <div class="nav-container">
    <div class="wrapper">
      <nav>
        <div class="logo">E-LEARNING PLATFORM</div>
        <ul class="nav-items">
          <li>
            <a href="upload-page.html">My Uploads</a>
          </li>
          <li>
            <a href="ap.html">Account</a>
          </li>
          <li>
            <a href="indexx.php">Log Out</a>
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
            <form id="myform" class="search" action="" method="POST">
              <input type="text" placeholder=" Type Something.." name="keywords" id="user" />
              <select name="filter" id="ff">
                <option value='date'>by Upload date</option>
                <option value='title'>by Title</option>
                <option value='type'>by Type</option>
              </select>
              <button type="submit" name="submit">Search</button>
            </form>
          </div>
          <img src="Elearning/images/Rectangle 3.jpg" alt="e-learning" />
        </div>
      </header>
    </div>
  </div>
  <div class="results">
    <?php
    // Purifying Keywords to avoid SQL injection and additional white spaces
    if (isset($_POST['submit'])) {
      // Purifying Keywords to avoid SQL injection and additional white spaces
      $keywords = mysqli_real_escape_string($connection, htmlentities(trim($_POST['keywords'])));
      $sort = $_POST['filter'];

      $errors = array();
      if (empty($keywords)) {
        $errors[] = "You did not enter any search term :(";
      } else {
        if (strlen($keywords) < 4) {
          $errors[] = "Search term should be at least 4 characters long :(";
        }
        if (search_results($keywords) === false) {
          $errors[] = "Your search did not return any results :(";
        }
      }


      if (empty($errors)) {
        //Calling function if there was no error in entered kewyords
        $results = sort_results($keywords, $sort);
        $result_num = count($results);
        //Displaying returned results
        echo "<h2>Your search for <strong>" . $keywords . "</strong> produced " . $result_num . " result(s)</h2>";
        echo "<hr />";
        foreach ($results as $result) {
          echo "<h4>" . $result['title'] . "</h4>";
          echo '<div class="des">' . $result['description'] . '</div>';
          echo "<br />";
          echo "<br />";
          echo "<a class=\"link\" href=\"" . $result['link'] . "\">" . $result['link'] . "</a>";
          echo '<div class="items">';
          echo '<ul class="n-items">';
          echo '<li>' . $result['type'] . '</li>';
          echo '<li>' . $result['username'] . '</li>';
          echo '<li>' . $result['date'] . '</li>';
          echo '</ul>';
          echo '</div>';
          $a = $result['title'];
          $b = $result['description'];
          $c = $result['link'];
          $d = $result['type'];
          $e = $result['username'];
          $f = $result['date'];

          echo ("<div class=\"report\"><a href=\"report.php?title=$a&des=$b&link=$c&type=$d&upder=$e&update=$f\">report file</a></div>");
          echo "<hr />";
        }
      } else {
        // Display errors in case the entered keywords voilates validation rules
        foreach ($errors as $error) {
          echo "<h2>" . $error . "</h2>";
          $sort = 'date';
          $results = no_results($keywords, $sort);
          $result_num = count($results);
          //Displaying returned results
          echo "<h2>Hey! Have a look at our recent uploads</h2>";
          echo "<hr />";
          foreach ($results as $result) {
            echo "<h4>" . $result['title'] . "</h4>";
            echo '<div class="des">' . $result['description'] . '</div>';
            echo "<br />";
            echo "<br />";
            echo "<a class=\"link\" href=\"" . $result['link'] . "\">" . $result['link'] . "</a>";
            echo '<div class="items">';
            echo '<ul class="n-items">';
            echo '<li>' . $result['type'] . '</li>';
            echo '<li>' . $result['username'] . '</li>';
            echo '<li>' . $result['date'] . '</li>';
            echo '</ul>';
            echo '</div>';
            $a = $result['title'];
            $b = $result['description'];
            $c = $result['link'];
            $d = $result['type'];
            $e = $result['username'];
            $f = $result['date'];

            echo ("<div class=\"report\"><a href=\"report.php?title=$a&des=$b&link=$c&type=$d&upder=$e&update=$f\">report file</a></div>");
            echo "<hr />";
          }
        }
      }
    } else {
      $keywords = mysqli_real_escape_string($connection, htmlentities(trim($_POST['keywords'])));
      $sort = $_POST['filter'];
      $errors = array();
      if (empty($keywords)) {
        $errors[] = "You did not enter any search term";
      } else {
        if (strlen($keywords) < 4) {
          $errors[] = "Search term should be at least 4 characters long";
        }
        if (search_results($keywords) === false) {
          $errors[] = "Your search did not return any results";
        }
      }

      if (empty($errors)) {
        //Calling function if there was no error in entered kewyords
        $results = sort_results($keywords, $sort);
        $result_num = count($results);
        //Displaying returned results
        echo "<h2>Your search for <strong>" . $keywords . "</strong> produced " . $result_num . " result(s)</h2>";
        echo "<hr />";
        foreach ($results as $result) {
          echo "<h4>" . $result['title'] . "</h4>";
          echo '<div class="des">' . $result['description'] . '</div>';
          echo "<br />";
          echo "<br />";
          echo "<a class=\"link\" href=\"" . $result['link'] . "\">" . $result['link'] . "</a>";
          echo '<div class="items">';
          echo '<ul class="n-items">';
          echo '<li>' . $result['type'] . '</li>';
          echo '<li>' . $result['username'] . '</li>';
          echo '<li>' . $result['date'] . '</li>';
          echo '</ul>';
          echo '</div>';
          $a = $result['title'];
          $b = $result['description'];
          $c = $result['link'];
          $d = $result['type'];
          $e = $result['username'];
          $f = $result['date'];


          echo ("<div class=\"report\"><a href=\"report.php?title=$a&des=$b&link=$c&type=$d&upder=$e&update=$f\">report file</a></div>");
          echo "<hr />";
        }
      } else {
        // Display errors in case the entered keywords voilates validation rules
        foreach ($errors as $error) {
          echo "<h2>" . $error . "</h2>";
          $sort = 'date';
          $results = no_results($keywords, $sort);
          $result_num = count($results);
          //Displaying returned results
          echo "<h2>Hey! Have a look at our recent uploads</h2>";
          echo "<hr />";
          foreach ($results as $result) {
            echo "<h4>" . $result['title'] . "</h4>";
            echo '<div class="des">' . $result['description'] . '</div>';
            echo "<br />";
            echo "<br />";
            echo "<a class=\"link\" href=\"" . $result['link'] . "\">" . $result['link'] . "</a>";
            echo '<div class="items">';
            echo '<ul class="n-items">';
            echo '<li>' . $result['type'] . '</li>';
            echo '<li>' . $result['username'] . '</li>';
            echo '<li>' . $result['date'] . '</li>';
            echo '</ul>';
            echo '</div>';
            $a = $result['title'];
            $b = $result['description'];
            $c = $result['link'];
            $d = $result['type'];
            $e = $result['username'];
            $f = $result['date'];

            echo ("<div class=\"report\"><a href=\"report.php?title=$a&des=$b&link=$c&type=$d&upder=$e&update=$f\">report file</a></div>");
            echo "<hr />";
          }
        }
      }
    }
    ?>
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

  <!-- 
    <header>
    <h2>Search Results for  *filename*</h2>
    <form method="post">
    <label for="sort">Filter:</label>
    <select name="filter" id="ff">
         <option value='0'>by Upload date</option>
         <option value='1'>by Title</option>
         <option value='2'>by Type</option>
    </select>
</form>
    </header> -->
  <!-- <hr />
    <h4>Filename</h4>
    <div class="des">
        description</strong>
    </div>
    <div class="link">
        <a href="#">this part contains link</a>
    </div>
    <div class="items">
    <ul class="n-items">
        <li>type</li>
        <li>uploader</li>
        <li>uploaded date</li>
    </ul>
    <div class="report">
        <a href="report.html">report file</a>
    </div>
    </div>
    <hr>
    <h4>File Name</h4>
    <div class="des">
        file description Lorem ipsum dolor sit amet consectetur 
    </div>
    <div class="link">
        <a href="#">this part contains link</a>
    </div>
    <div class="items">
    <ul class="n-items">
        <li>type</li>
        <li>uploader</li>
        <li>uploaded date</li>
    </ul>
    <div class="report">
        <a href="report.html">report file</a>
    </div>
    </div>
    <hr>
    <h4>File Name</h4>
    <div class="des">
        file description Lorem ipsum dolor sit amet consectetur 
    </div>
    <div class="link">
        <a href="#">this part contains link</a>
    </div>
    <div class="items">
    <ul class="n-items">
        <li>type</li>
        <li>uploader</li>
        <li>uploaded date</li>
    </ul>
    <div class="report">
        <a href="report.html">report file</a>
    </div>
    </div> -->
  <!-- <hr>
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

    <script src="result.js"></script> -->
</body>

</html>