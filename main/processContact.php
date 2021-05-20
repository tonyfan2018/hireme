<?php
//receive post variables
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$subject = $_POST["subject"];

//connect to database
include('../includes/include-connectDatabase.php');

$stmt = $pdo->prepare("INSERT INTO `contact` (`contactId`, `firstname`, `lastname`, `email`, `subject`) 
VALUES (NULL, '$firstname', '$lastname', '$email', '$subject');");
$stmt->execute();

header("Location: contact.php");
?>