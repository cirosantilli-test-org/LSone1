<html>
<head>
<title>Home</title>
</head>

<body>

<form action="site.php" method="post">
  <input type="number" name="number">
  <br>
  <input type="submit">
</form>

<?php

$num = $_POST['number'];

function cube($num){
  echo "The result is ";
  return $num * $num * $num;
}

$cubeResult = cube($num);
echo $cubeResult;

 ?>


</body>

 <html>
