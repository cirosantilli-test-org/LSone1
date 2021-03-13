<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Error handler</title>
    <style>
    body {
      background-image: url(../images/wallhaven-gj991d.png);
    }
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      width: 600px;
      margin: auto;
      margin-top: 120px;
    }

    h2 {
      text-align: center;
    }

    input[type=text] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      font-size: 16px;
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }

    p {
      text-align: center;
    }
    </style>
  </head>
  <body>
  <div>
    <h2>Sign up</h2>
    <form action="signup.inc.php" method="post">
      <?php
      if (isset($_GET["first"])) {
        $first = $_GET["first"];
        echo '<input type="text" name="first" placeholder="Firstname" value="$first">';
      }
      else {
        echo '<input type="text" name="first" placeholder="Firstname">';
      }

      if (isset($_GET["last"])) {
        $last = $_GET["last"];
        echo '<input type="text" name="last" placeholder="Lastname"> value="$last">';
      }
      else {
        echo '<input type="text" name="last" placeholder="Lastname">';
      }

      if (isset($_GET["email"])) {
        $email = $_GET["email"];
        echo '<input type="text" name="email" placeholder="Email"> value="$email">';
      }
      else {
        echo '<input type="text" name="email" placeholder="Email">';
      }

      if (isset($_GET["uid"])) {
        $uid = $_GET["uid"];
        echo '<input type="text" name="uid" placeholder="Username"> value="$uid">';
      }
      else {
        echo '<input type="text" name="uid" placeholder="Username">';
      }
       ?>
      <input type="text" name="pwd" placeholder="Password">
      <button type="submit" name="submit">Sign up</button>
    </form>
    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "signup=empty") == true) {
      echo "<p class='error'>You did not fill in a fields!</p>";
      exit();
    }
    elseif (strpos($fullUrl, "signup=char") == true) {
      echo "<p class='error'>You used invalid characters!</p>";
      exit();
    }
    elseif (strpos($fullUrl, "signup=invalidemail") == true) {
      echo "<p class='error'>You used invalid email!</p>";
      exit();
    }
    elseif (strpos($fullUrl, "signup=success") == true) {
      echo "<p class='success'>You have been signed up!</p>";
      exit();
    }

  /*
  //Another method for error message
    if (!isset($_GET["signup"])) {
      exit();
    }
    else {
      $signupCheck = $_GET["signup"];

      if ($signupCheck == "empty") {
        echo "<p class='error'>You did not fill in a fields!</p>";
        exit();
      }
      elseif ($signupCheck == "char") {
        echo "<p class='error'>You used invalid characters!</p>";
        exit();
      }
      elseif ($signupCheck == "email") {
        echo "<p class='error'>You used invalid email!</p>";
        exit();
      }
      elseif ($signupCheck == "success") {
        echo "<p class='success'>You have been signed up!</p>";
        exit();
      }
    }
    */

     ?>
  </div>
  </body>
</html>
