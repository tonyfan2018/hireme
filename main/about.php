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
        <title>hireme-aboutpage</title>
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
        <!-- css inline -->
        <style>
            main{
                margin-top: 2em; 
                margin-right: 5em; 
                margin-left: 5em;
            }
            h1{
                font-weight: bold;
                color: #7898f8;
                margin-bottom: 20px;
            }
        </style>
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
            </div>            -->
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

        <!-- banner -->
                <div class="slideshow-container">

                    <div class="mySlides fade">
                
                    <img src="../images/other/banner.jpeg" style="width:100%">
                    
                    </div>

                    <div class="mySlides fade">
      
                    <img src="../images/other/banner02.png" style="width:100%">
                 
                    </div>

                    <div class="mySlides fade">
                 
                    <img src="../images/other/banner03.png" style="width:100%">
                   
                    </div>

                    <div class="prevnext">
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>

                    <div class="group-dot">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>   
            
                </div>
    
        <main>
            <h1>About Us</h1>
            <p>
            Hireme is a display platform for college students majoring in design. College student designers can display their own portfolios on this platform, and they can also visit the outstanding design works of other college students. College student designers can meet and learn from each other on this platform. In addition, Hireme also facilitates the recruitment and selection of design majors for design companies, which will increase the employment rate of college students after graduation.
            </p>          
        </main>

        <script src="../js/00main.js"></script>
    </body>

</html>

    <?php

    }else{
    //corporation see this page
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>hireme-aboutpage</title>
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
        <!-- css inline -->
        <style>
            main{
                margin-top: 2em; 
                margin-right: 5em; 
                margin-left: 5em;
            }
            h1{
                font-weight: bold;
                color: #7898f8;
                margin-bottom: 20px;
            }
        </style>
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
            </div>            -->

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

        <!-- banner -->
                <div class="slideshow-container">

                    <div class="mySlides fade">
                
                    <img src="../images/other/banner.jpeg" style="width:100%">
                    
                    </div>

                    <div class="mySlides fade">
      
                    <img src="../images/other/banner02.png" style="width:100%">
                 
                    </div>

                    <div class="mySlides fade">
                 
                    <img src="../images/other/banner03.png" style="width:100%">
                   
                    </div>

                    <div class="prevnext">
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>

                    <div class="group-dot">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>   
            
                </div>
    
        <main>
            <h1>About Us</h1>
            <p>
            Hireme is a display platform for college students majoring in design. College student designers can display their own portfolios on this platform, and they can also visit the outstanding design works of other college students. College student designers can meet and learn from each other on this platform. In addition, Hireme also facilitates the recruitment and selection of design majors for design companies, which will increase the employment rate of college students after graduation.
            </p>          
        </main>

        <script src="../js/00main.js"></script>
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
        <title>hireme-aboutpage</title>
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
        <!-- css inline -->
        <style>
            main{
                margin-top: 2em; 
                margin-right: 5em; 
                margin-left: 5em;
            }
            h1{
                font-weight: bold;
                color: #7898f8;
                margin-bottom: 20px;
            }
        </style>
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

        <!-- banner -->
                <div class="slideshow-container">

                    <div class="mySlides fade">
                
                    <img src="../images/other/banner.jpeg" style="width:100%">
                    
                    </div>

                    <div class="mySlides fade">
      
                    <img src="../images/other/banner02.png" style="width:100%">
                 
                    </div>

                    <div class="mySlides fade">
                 
                    <img src="../images/other/banner03.png" style="width:100%">
                   
                    </div>

                    <div class="prevnext">
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>

                    <div class="group-dot">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>   
            
                </div>
    
        <main>
            <h1>About Us</h1>
            <p>
            Hireme is a display platform for college students majoring in design. College student designers can display their own portfolios on this platform, and they can also visit the outstanding design works of other college students. College student designers can meet and learn from each other on this platform. In addition, Hireme also facilitates the recruitment and selection of design majors for design companies, which will increase the employment rate of college students after graduation.
            </p>          
        </main>

        <script src="../js/00main.js"></script>
    </body>

</html>
    
    <?php
}
?>