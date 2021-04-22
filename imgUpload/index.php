<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    if (isset($_SESSION['id'])) {
      if (isset($_SESSION['id'] == 1)) {
        echo "You are logged in as user #1";
      }
      echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
              <input type='file' name='file'>
              <button type='submit' name='submit'>Upload</button>
            </form>";
    } else {
      echo "You are not logged in!";
      echo "<form action='login.php' method='post'>
              <input type='text' name='first' placeholder='Firstname'>
              <input type='text' name='last' placeholder='Lastname'>
              <input type='text' name='uid' placeholder='Username'>
              <input type='password' name='pwd' placeholder='Password'>
              <button type='submit' name='submitSignup'>Signup</button>
            </form>"
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
