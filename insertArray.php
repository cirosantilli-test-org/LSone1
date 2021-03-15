<?php
include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $sql = "SELECT * FROM data";
    $result = mysqli_query($connection, $sql);
    $datas = array();
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result))
      $datas[] = $row;
    }

    //print_r($datas);

    foreach ($datas as $data) {
      echo $data['id'] . $data['text'] . "<br>";
    }
     ?>

  </body>
</html>
