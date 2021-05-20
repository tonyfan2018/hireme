<?php
//receive post variables
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$gender = $_POST["gender"];
$major = $_POST["major"];
$school = $_POST["school"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
//avater
$uploaddir = "../images/student/";
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
VALUES (NULL,'student','$email','$password');");
$stmt->execute();

//select from user table
$stmt = $pdo->prepare("SELECT `userId` FROM `user` WHERE `userName` = '$email'");
$stmt->execute();
    //get userId from user table
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo($row["userId"]);
    $userId = $row["userId"];}
    
//inser into student table
$stmt = $pdo->prepare("INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `gender`, `major`, `school`, `email`, `password`, `address`, `studentAvatar`, `userId`) 
VALUES (NULL,'$firstName','$lastName','$gender','$major','$school','$email','$password','$address','$image','$userId');");
$stmt->execute();


header("Location: login.php");
?>