<?php
    session_start();
    include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php

    $sql1 = "SELECT * FROM user";
    $result1 = mysqli_query($connection, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      while ($row1 = mysqli_fetch_assoc($result1)) {
        $id = $row1['id'];
        $sql2 = "SELECT * FROM profileimg WHERE userid='$id'";
        $result2 = mysqli_query($connection, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2)) {
          echo "<div class='user-container'>";
          if ($row2['status'] == 0) {
            echo "<img src='uploads/profile".$id.".jpg?'".mt_rand().">";
          } else {
            echo "<img src='uploads/profile.jpeg'>";
          }
          echo "<p>".$row1['username']."</p>";
          echo "</div>";
        }
      }
    } else {
      echo "There are no users yet.";
    }

    if (isset($_SESSION['id'])) {
      if ($_SESSION['id'] == 1) {
        echo "You are logged in as user #1";
      }
      echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
              <input type='file' name='file'>
              <button type='submit' name='submit'>Upload</button>
            </form>";
    } else {
      echo "You are not logged in!";
      echo "<form action='signup.php' method='post'>
              <input type='text' name='first' placeholder='Firstname'>
              <input type='text' name='last' placeholder='Lastname'>
              <input type='text' name='uid' placeholder='Username'>
              <input type='password' name='pwd' placeholder='Password'>
              <button type='submit' name='submitSignup'>Signup</button>
            </form>";
    }
     ?>

    <p>Login as a user: </p>
    <form action="login.php" method="post">
      <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Logout: </p>
    <form action="logout.php" method="post">
      <button type="submit" name="submitLogout">Logout</button>
    </form>
  </body>
</html>
