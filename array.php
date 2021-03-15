<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>array</title>
  </head>
  <body>

    <?php

    $data1 = array();
    $data1[] = "Bruce";
    $data1[] = "Bob";
    $data1[] = "Mike";

    echo $data1[0] . "<br>";
    print_r($data1);

    $data2 = array();
    array_push($data2, "Daniel", 15, 25);
    print_r($data2);

     ?>

  </body>
</html>
