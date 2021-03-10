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
  <style>
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

button {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-transform: uppercase;
  }

button:hover {
    background-color: #45a049;
  }

  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  </style>
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

    $sql  = "INSERT INTO users (first, last, email, uid, pwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL ERROR";
    } else {
      mysqli_stmt_blind_param($stmt, "sssss", $first, $last, $email, $uid, $pwd);
      mysqli_stmt_execute($stmt);
    }

    header('Location: pre_statements.php');
}
 ?>

<div>
<form action="sql_injection.php" method="post">
  <input type="text" name="first" placeholder="Firstname"><br>
  <input type="text" name="last" placeholder="Lastname"><br>
  <input type="text" name="email" placeholder="Email"><br>
  <input type="text" name="uid" placeholder="Username"><br>
  <input type="password" name="pwd" placeholder="Password"><br>
  <button type="submit" name="submit">Sign up</button>
</form>
</div>

</body>
</html>
