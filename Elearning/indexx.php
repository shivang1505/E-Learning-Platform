<?php
include 'db.php';
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Homepage</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="nav-container">
    <div class="wrapper">
      <nav>
        <div class="logo">E-LEARNING PLATFORM</div>
        <ul class="nav-items">
          <li>
            <a href="Register.html">Register</a>
          </li>
          <li>
            <a href="Login.html">Login</a>
          </li>
          <li>
            <a href="#">Contact Us</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="header-container">
    <div class="wrapper">
      <header>
        <div class="logo-content">
          <div class="bottom">WHAT ARE YOU LOOKING FOR?</div>
          <div class="search-container">
            <form class="search" name="keywords" action="result.php" method="POST">
              <input type="search" placeholder=" Type Something.." name="keywords" />
              <button type="submit">Search</button>
            </form>
          </div>
          <div class="image">
            <img src="Elearning/images/Rectangle 6.jpg" alt="e-learning" />
          </div>
        </div>
      </header>
    </div>
  </div>
  <h2>About Us</h2>
  <div class="cont">
    We are a bunch of people who believe in the power of learning. Learning is
    the source of human progress. It has the power to transform our world, our
    lives and our communities. But a good source plays a major role in the
    quality of learning. With a good source, we can truly understand the
    potential of certain thing. So, we are trying to collect the best source
    materials to learn almost anything where the sources will be provided by
    you, common people, which will be available to everyone. Thus anyone can
    transform their life through learning.
  </div>
  <h3>What you can expect</h3>
  <div class="content">
    <img src="Elearning/images/E-learning 1.svg" alt="e-learning" />
    Here, we don’t directly provide the essential materials required for your
    learning hold on, but we act asa medium to obtain the best sources with
    their weblinks provided to reach them. So you cannot get any study
    materials here but you can get many good resources related to the subject
    of your interest. And also, we can only provide the way to learn anything,
    you should be the one doing the learning, This explains the partof what
    you should expect from us and what you should not.
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

  <script src="main.js"></script>
</body>

</html>