<?php
//homePage.php
session_start();
if(isset($_SESSION["username"])){
    // Iduser see this page
    $username = $_SESSION["username"];
    //Distinguish user type
    //connect to database
    include('../includes/include-connectDatabase.php');

    $stmt = $pdo->prepare("SELECT `userType` FROM `user` WHERE `userName` = '$username'");
    $stmt->execute();
    //$row = $stmt->fetch(PDO::FETCH_ASSOC);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userType = $row["userType"];
    }

    if($userType === "student"){
    //student see this page
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>contact-page</title>
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
        <link rel="stylesheet" href="../css/contact.css" />
        <link rel="stylesheet" href="../css/main.css" />

    </head>
    
    <body>
        <header>
            <!-- logo/login/register/logout-Fixed location -->
            <div>
                <a  id="logoPic"  href="homePage.php"><img src="../images/logo/logo00.png" alt="logo"/></a> 
            </div>            

            <!-- Navigation with link-Fixed location -->           
            <nav>
                <ul>
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <!-- <div class="log">
                <a class="loging"  href="../login/login.php">LOG IN</a>
                <a class="loging"  href="../login/register.php">SIGN UP</a><br />
            </div> -->

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

        <h3>Contact Us</h3>

                <div class="newcontainer">
                <form action="processContact.php" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your last name.."><br>
                    

                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                    <input type="submit" value="Submit" id="submit">
                </form>
                </div>

        </main>

    </body>
</html>

    <?php

    }else{
    //corporation see this page
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>contact-page</title>
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
        <link rel="stylesheet" href="../css/contact.css" />
        <link rel="stylesheet" href="../css/main.css" />

    </head>
    
    <body>
        <header>
            <!-- logo/login/register/logout-Fixed location -->
            <div>
                <a  id="logoPic"  href="homePage.php"><img src="../images/logo/logo00.png" alt="logo"/></a> 
            </div>            

            <!-- Navigation with link-Fixed location -->           
            <nav>
                <ul>
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
        <main>

        <h3>Contact Us</h3>

                <div class="newcontainer">
                <form action="processContact.php" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your last name.."><br>
                    

                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                    <input type="submit" value="Submit" id="submit">
                </form>
                </div>

        </main>

    </body>
</html>
    
    <?php
    }
    
}else{
    //Public user see this page
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>contact-page</title>
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
        <link rel="stylesheet" href="../css/contact.css" />
        <link rel="stylesheet" href="../css/main.css" />

    </head>
    
    <body>
        <header>
            <!-- logo/login/register/logout-Fixed location -->
            <div>
                <a  id="logoPic"  href="homePage.php"><img src="../images/logo/logo00.png" alt="logo"/></a> 
            </div>            

            <!-- Navigation with link-Fixed location -->           
            <nav>
                <ul>
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="log">
                <a class="loging"  href="../login/login.php">LOG IN</a>
                <a class="loging"  href="../login/register.php">SIGN UP</a><br />
            </div>
            
        </header>
        <main>

        <h3>Contact Us</h3>

                <div class="newcontainer">
                <form action="processContact.php" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your last name.."><br>
                    

                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                    <input type="submit" value="Submit" id="submit">
                </form>
                </div>

        </main>

    </body>
</html>
    
    <?php
}
?>