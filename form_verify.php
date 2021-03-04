<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and space";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+/", $email)) {
            $emailErr = "Invalid format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i]", $website)) {
            $websiteErr = "Invalid URL";
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    ?>

<h2>PHP Form Verify</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name">
<span class="error">* <?php echo "$nameErr";?></span><br>
Email: <input type="text" name="email">
<span class="error">* <?php echo "$emailErr";?></span><br>
Website: <input type="text" name="website">
<span class="error">* <?php echo "$websiteErr";?></span><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="Male">Male
<span class="error">* <?php echo "$genderErr";?></span><br>
Comment: <br>
<textarea name="comment" id="" cols="30" rows="10"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Information: </h2>";
echo $name . "<br>";
echo $email . "<br>";
echo $website . "<br>";
echo $gender . "<br>";
echo $comment . "<br>";
?>

</body>
</html>
