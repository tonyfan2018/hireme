<?php
session_start();
//receive post variables
$title = $_POST["title"];
$date = $_POST["date"];
$content = $_POST["content"];
$studentId = $_POST["studentId"];


//protfolio picture
$uploaddir = "../images/portfolio/";
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

    $stmt = $pdo->prepare("INSERT INTO `portfolio` (`portfolioId`, `studentId`, `title`, `date`, `content`, `likes`, `comment`, `image`) 
    VALUES (NULL, '$studentId', '$title', '$date', '$content', NULL, NULL, '$image');");
    $stmt->execute();

    header("Location: student.php?studentId=$studentId");

?>