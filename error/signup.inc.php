<?php

//check if the user has clicked the signup button
if (isset($_POST["submit"])) {

  //include the database connection
  include_once 'db.php';

  //get the data from the signup form and use prepared statements
  $first = mysqli_real_escape_string($connection, $_POST["first"]);
  $last = mysqli_real_escape_string($connection, $_POST["last"]);
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $uid = mysqli_real_escape_string($connection, $_POST["uid"]);
  $pwd = mysqli_real_escape_string($connection, md5($_POST["pwd"]));

//check if input are empty
if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
  header("Location: index.php?signup=empty");
  exit();
} else {
  //check if input characters are invalid
  if (!preg_match("/^[a-zA-Z ]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $last)) {
    header("Location: index.php?signup=char");
    exit();
  } else {
    //check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?signup=invalidemail");
    exit();
} else {
  header("Location: index.php?signup=success");
  exit();
}
}
} 
} else {
  header("Location: index.php");
  exit();
}

?>
