
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>corporation-personal</title>
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
            <!-- <div class="log">
                <a class="loging"  href="../login/login.php">LOG IN</a>
                <a class="loging"  href="../login/register.php">SIGN UP</a><br />
            </div> -->

            <a class="logl" style="margin-left:200px;" href="../login/logout.php">LOG OUT</a>
                <a style="font-size:15px" href="../student/corPersonal.php"><?php echo($_SESSION["username"]);?></a>
                <!-- student avater  -->
                <?php

                $username = $_SESSION["username"];
                //connect to database
                include('../includes/include-connectDatabase.php');
                //select information from database
                //studentInformation
                $stmt = $pdo->prepare("SELECT * FROM `corporation` WHERE `corEmail` = '$username'");
                $stmt->execute();

                // $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?><img src="../images/corporation/<?php echo($row["corAvatar"]);?>.jpg" height='40px' width='40px' style="border-radius:50%;"/><?php } ?>
        </header>

<?php


$corEmail = $_SESSION["username"];

//connect to database
include('../includes/include-connectDatabase.php');

//select from corporation table
$stmt = $pdo->prepare("SELECT * FROM `corporation` WHERE `corEmail` = '$corEmail'");
$stmt->execute();
//get userId from user table
?><div class="corpersonal-back"><?php
    ?><div class="corpersonal"><?php
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<div class='coravatar' >";
    ?><img  src="../images/corporation/<?php echo($row["corAvatar"]);?>.jpg" width="200px"  style="border-radius:50%"/><?php
    echo "</div>";
   
    echo "<div class='corname' >";
    echo($row["corName"]);
    echo "</div>";

    echo "<div class='coremail' >";
    echo($row["corEmail"]);
    echo "</div>";

    echo "<div class='coraddress'>";
    echo($row["corAddress"]);
    echo "</div>";

    echo "<div class='corintro' >";
    echo($row["corIntro"]);
    echo "</div>";

}
        ?></div><?php
?></div><?php
?>

    
</body>
</html>