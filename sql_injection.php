<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <script src="bootstrap.js"></script>
  <title>Demo</title>
</head>
<body>
<?php
include_once 'db.php';

if (isset($_POST["submit"])) {
    $first = mysqli_real_escape_string($connection, $_POST["first"]);
    $last = mysqli_real_escape_string($connection, $_POST["last"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $uid = mysqli_real_escape_string($connection, $_POST["uid"]);
    $pwd = mysqli_real_escape_string($connection, md5($_POST["pwd"]));

    $sql  = "INSERT INTO users (first, last, email, uid, pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd')";

    mysqli_query($connection, $sql);

    header('Location: sql_injection.php');
}
 ?>

<form action="sql_injection.php" method="post">
  <input type="text" name="first" placeholder="Firstname"><br>
  <input type="text" name="last" placeholder="Lastname"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="uid" placeholder="Username"><br>
  <input type="password" name="pwd" placeholder="Password"><br>
  <button type="submit" name="submit">Sign up</button>
</form>

</body>
</html>
