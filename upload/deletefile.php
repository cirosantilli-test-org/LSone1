<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="deletefile.php" method="post">
      <button type="submit" name="submit">Delete file</button>
    </form>

    <?php
    $path = 'file/';
    $fileInfo = glob($path);
    $fileActualName = $fileInfo[0];

    if (!unlink($path)) {
      echo "You have an error!";
    } else {
      header('Location: deletefile.php?deletesuccess');
    }
     ?>
  </body>
</html>
