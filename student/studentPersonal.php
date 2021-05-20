<?php
session_start();

$username = $_SESSION["username"];

//connect to database
include('../includes/include-connectDatabase.php');

//select from student table
$stmt = $pdo->prepare("SELECT `studentId` FROM `student` WHERE `email` = '$username'");
$stmt->execute();
//get userId from user table
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//echo($row["userId"]);
$studentId = $row["studentId"];}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>student-portfolio</title>
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="description" content="This is a website designed for college student designers. This website is intended to provide a platform to display the portfolio of college student designers and increase the employment rate of college student designers." />
        <meta name="keywords" content="college students, designer, graphic design, illustration, illustrator, student designer, poster design" />
        <!-- web logo -->
        <link rel="apple-touch-icon" sizes="180x180" href="../images/logo/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/logo/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/logo/favicon/favicon-16x16.png">
        <link rel="manifest" href="../images/logo/favicon/site.webmanifest">
        <link rel="mask-icon" href="../images/logo/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <meta name="apple-mobile-web-app-title" content="Hireme">
        <meta name="application-name" content="Hireme">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <!-- css link -->
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="stylesheet" href="../css/student.css" />
    </head>
    
    <body>
        <header>
            <!-- logo/login/register/logout-Fixed location -->
            <div>
                <a  id="logoPic"  href="../main/homePage.php"><img src="../images/logo/logo00.png" alt="logo"/></a> 
            </div>            

            <!-- Navigation with link-Fixed location -->           
            <nav>
                <ul>
                    <li><a href="../main/homePage.php">Home</a></li>
                    <li><a href="../main/about.php">About</a></li>
                    <li><a href="../main/contact.php">Contact</a></li>
                </ul>
            </nav>
            <a class="logg" style="margin-left:200px;" href="../login/logout.php">LOG OUT</a>
                    <a style="font-size:15px" href="../student/studentPersonal.php"><?php echo($_SESSION["username"]);?></a>
                    <!-- student avater  -->
                    <?php

                    $username = $_SESSION["username"];
                     //connect to database
                    include('../includes/include-connectDatabase.php');
                    //select information from database
                    //studentInformation
                    $stmt = $pdo->prepare("SELECT * FROM `student` WHERE `email` = '$username'");
                    $stmt->execute();

                    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?><img src="../images/student/<?php echo($row["studentAvatar"]);?>.jpg" height='40px' width='40px' style="border-radius:50%; marign-right:20px;"/><?php } ?>

        </header>

        <main>

        <?php
                //receive GET variables
                //$studentId = $_GET["studentId"];

                //connect to database
                include('../includes/include-connectDatabase.php');
                //select information from database

                //studentInformation
                $stmt = $pdo->prepare("SELECT `studentId`, CONCAT(firstName,' ',lastName) AS name, `gender`, `major`, `school`, `email`, `address`, `studentAvatar` 
                FROM `student` WHERE `studentId` = $studentId");
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="student-area"><?php
                //student-Avatar
        
                ?><img class="student-avatar" src="../images/student/<?php echo($row["studentAvatar"]);?>.jpg"/></br>
                <!--  studentName  -->
                <div class="student-name" ><?php echo($row["name"]);?></div>
                <!--  gender  -->
                <!-- <div class="student-gender" > //echo($row["gender"]);?></div> -->
                <!--  major  -->
        
                <div class="student-major" ><?php echo($row["major"]);?></div>


                <span class="education">Education</span>
                <hr>
                    
                <!--  school  -->
                <div class="student-school" ><?php echo($row["school"]);?></div>
            
                <!-- email  -->
                <span class="email">Email</span>
                <hr>
                <div class="student-email" ><?php echo($row["email"]);?></div>

                <!-- address  -->
                <span class="location">Location</span>
                <hr>
                <div class="student-address" ><?php echo($row["address"]);?></div>
        
                <!-- Add portfolio -->
                <div class="addportfolio"><a  href="../student/addPor.php?studentId=<?php echo($row["studentId"]);?>"><i class="fas fa-plus-circle"></i>Portfolio</a></div><?php
            ?></div><?php

                //portfolio
                $stmt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `studentId` = $studentId");
                $stmt->execute();

                //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?><div class="portfolio-area"><?php
            
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    ?><div class="student-portfolio"><?php
                        //portfolio-image
                    
                        ?><img src="../images/portfolio/<?php echo($row["image"]);?>.jpg" /></br>

                        <!--  title  -->
                        <div class="title" ><?php echo($row["title"]);?></div>

                        <!--  date  -->
                        <div class="date" ><?php echo($row["date"]);?></div>
                        <div class="strip"></div>

                        <!--  content  -->
                        <!-- <div class="content" > //echo($row["content"]);</div> -->

                        <!--  likes  -->
                        <div class="likes" ><i class="fas fa-heart"></i><?php echo($row["likes"]);?></div>

                        <!-- Read More  -->
                        <a  href="../portfolio/portPersonal.php?portfolioId=<?php echo($row["portfolioId"]);?>"><i id="readmore" class="fas fa-bars"></i></a><?php
                ?></div><?php

                    }
        ?></div><?php
        ?>

        </main>

    <script src="../js/00main.js"></script>
 </body>