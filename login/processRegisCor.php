<?php
//receive post variables
$corName = $_POST["corName"];
$corEmail = $_POST["corEmail"];
$corIntro = $_POST["corIntro"];
$corAddress = $_POST["corAddress"];
$corPassword = $_POST["corPassword"];

//avater
$uploaddir = "../images/corporation/";
$uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);

if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

// if($_FILES["userfile"["size"] > 100000){
//     echo("File is too large");
// }else{move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)
// }


$image=basename( $_FILES["userfile"]["name"],".jpg"); // used to store the filename in a variable

//connect to database
include('../includes/include-connectDatabase.php');

// insert into user table
$stmt = $pdo->prepare("INSERT INTO `user` (`userId`, `userType`, `userName`, `password`) 
VALUES (NULL,'corporation','$corEmail','$corPassword');");
$stmt->execute();

//select from user table
$stmt = $pdo->prepare("SELECT `userId` FROM `user` WHERE `userName` = '$corEmail'");
$stmt->execute();
    //get userId from user table
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo($row["userId"]);
    $userId = $row["userId"];}

//inser into corporation table
$stmt = $pdo->prepare("INSERT INTO `corporation` (`corporationId`, `corEmail`, `corName`, `corIntro`, `corAddress`, `corPassword`, `corAvatar`, `userId`) 
VALUES (NULL,'$corEmail','$corName','$corIntro','$corAddress','$corPassword','$image','$userId');");
$stmt->execute();

header("Location: login.php");
?>