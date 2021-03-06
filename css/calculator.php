<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="utf-8">
  <title>Home</title>
</head>

<style>



</style>

<body>

  <form action="calculator.php" method="post">
    First Number: <input type="number" name="num1"> <br/>
    OP: <input type="text" name="op"> <br/>
    Second Number: <input type="number" name="num2">
  </form>

<?php
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$op = $_POST["op"];

if ($op == "+") {
  echo $num1 + $num2;
} elseif ($op == "-") {
  echo $num1 - $num2;
} elseif ($op == "/") {
  echo $num1 / $num2;
} elseif ($op == "*") {
  echo $num1 * $num2;
} else {
  echo "Invalid Oprator";
}

 ?>




</body>
