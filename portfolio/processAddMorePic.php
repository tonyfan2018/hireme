<?php
session_start();
//receive post variables
$studentId = $_POST["studentId"];
$portfolioId = $_POST["portfolioId"];

//more picture
$uploaddir = "../images/portfolio/portPic/";
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

    $stmt = $pdo->prepare("INSERT INTO `portfolio-images` (`ImageId`, `portfolioId`, `studentId`, `portPic`) VALUES (NULL, $portfolioId, $studentId, '$image');");
    $stmt->execute();

    header("Location: portfolio.php?portfolioId=$portfolioId");

?>