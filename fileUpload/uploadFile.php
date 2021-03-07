<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
    <lable for="file">File Name: </lable>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
//Allowed file extension
$allowedExtension = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 204800)
        && in_array($extension, $allowedExtension)) {
    }if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "File name: " . $_FILES["file"]["name"] . "<br>";
        echo "File format: ". $_FILES["file"]["type"] . "<br>";
        echo "File size:  ". $_FILES["file"]["size"] / (1024) . "<br>";
        echo "Temporary file storage location: ". $_FILES["file"]["tmp_name"];
    }
} else {
    echo "Invalid format!";
}


?>
</body>
</html>
