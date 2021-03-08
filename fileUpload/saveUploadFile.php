<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
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
        echo "Temporary file storage location: ". $_FILES["file"]["tmp_name"] . "<br>";

        //Determine whether the file exists
        //If upload directory don't exist and create one
        if (file_exists("upload/". $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . "File already exists!";
        } else {
            //If file is not in the upload directory and move it
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "The file is stored at: " . "upload/" . $_FILES["file"]["name"];
        }
    }
} else {
    echo "Invalid format!";
}

?>

</body>
</html>