<?php
session_start();
include_once 'db.php';
$sessionId = $_SESSION['id'];

$fileName = "uploads/profile".$sessionId."*";
$fileInfo = glob($fileName);
$fileExt = explode(".", $fileInfo[0]);
$fileActualExt = $fileExt[1];

$file = "uploads/profile".$sessionId.".".$fileActualExt;

if (!unlink()) {
  echo "File was not deleted!";
} else {
  echo "File was deleted!";
}

$sql = "UPLOAD profileimg SET status = 1 WHERE userid = '$sessionId';";
mysqli_query($connection, $sql);

header("Location: index.php?deletesuccess");

?>
