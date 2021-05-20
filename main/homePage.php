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
        <title>hireme-HomePage</title>
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

                <!-- College student designer exhibition list -->

                <?php

                    //connect to database
                    include('../includes/include-connectDatabase.php');

                    // $sql = "SELECT CONCAT(myguests.firstname,' ',myguests.lastname) AS name, myguests.email, messages.message 
                    // From myguests 
                    // INNER JOIN messages 
                    // ON myguests.id = messages.id";

                    $stmt = $pdo->prepare("SELECT student.studentId, CONCAT(student.firstName,' ',student.lastName) AS name, student.school, student.address, portfolio.image, student.studentAvatar, portfolio.likes
                    FROM `student` 
                    INNER JOIN `portfolio` 
                    ON student.studentId = portfolio.studentId"
                    );
                    $stmt->execute();

                    // $stmt = $pdo->prepare("SELECT * FROM `portfolio`");
                    // $stmt->execute();
        ?><div  class="whole-page"><?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                        //print_r($row); // recursively print out object.

            
                echo"<div class='student-page'>";
                        //portfolio-image
                        ?><div class="imagecontainer"><img class="portfolioImage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" />

                        <!-- student-Avatar -->
                    <img class="studentAvatar" src="../images/student/<?php echo($row["studentAvatar"]);?>.jpg" />
                    </div>
                        
                        <div class="nscontainer">
                        <!--  studentName  -->
                        <div class="name"><?php echo($row["name"]);?></div>

                        <!--  school  -->
                        <div class="school"><?php echo($row["school"]);?></div>
                        </div>

                        <!-- address  -->
                        <div class="address"><i class="fas fa-map-marker-alt"></i><?php echo($row["address"]);?></div>
                    
                        <!-- Read More  -->
                    <a href="../student/student.php?studentId=<?php echo($row["studentId"]);?>"><i class="fas fa-bars"></i></a>
                        
                        <!--  likes  -->
                        <div class="like"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></div>

                <?php

                echo"</div>";
                    }
                    //echo $output;
        ?></div>

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
        <title>hireme-HomePage</title>
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

                <!-- College student designer exhibition list -->

                <?php

                    //connect to database
                    include('../includes/include-connectDatabase.php');

                    // $sql = "SELECT CONCAT(myguests.firstname,' ',myguests.lastname) AS name, myguests.email, messages.message 
                    // From myguests 
                    // INNER JOIN messages 
                    // ON myguests.id = messages.id";

                    $stmt = $pdo->prepare("SELECT student.studentId, CONCAT(student.firstName,' ',student.lastName) AS name, student.school, student.address, portfolio.image, student.studentAvatar, portfolio.likes
                    FROM `student` 
                    INNER JOIN `portfolio` 
                    ON student.studentId = portfolio.studentId"
                    );
                    $stmt->execute();

                    // $stmt = $pdo->prepare("SELECT * FROM `portfolio`");
                    // $stmt->execute();
        ?><div  class="whole-page"><?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                        //print_r($row); // recursively print out object.

            
                echo"<div class='student-page'>";
                        //portfolio-image
                        ?><div class="imagecontainer"><img class="portfolioImage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" />

                        <!-- student-Avatar -->
                    <img class="studentAvatar" src="../images/student/<?php echo($row["studentAvatar"]);?>.jpg" />
                    </div>
                        
                        <div class="nscontainer">
                        <!--  studentName  -->
                        <div class="name"><?php echo($row["name"]);?></div>

                        <!--  school  -->
                        <div class="school"><?php echo($row["school"]);?></div>
                        </div>

                        <!-- address  -->
                        <div class="address"><i class="fas fa-map-marker-alt"></i><?php echo($row["address"]);?></div>
                    
                        <!-- Read More  -->
                    <a href="../student/student.php?studentId=<?php echo($row["studentId"]);?>"><i class="fas fa-bars"></i></a>
                        
                        <!--  likes  -->
                        <div class="like"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></div>

                <?php

                echo"</div>";
                    }
                    //echo $output;
        ?></div>

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
        <title>hireme-HomePage</title>
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

                <!-- College student designer exhibition list -->

                <?php

                    //connect to database
                    include('../includes/include-connectDatabase.php');

                    // $sql = "SELECT CONCAT(myguests.firstname,' ',myguests.lastname) AS name, myguests.email, messages.message 
                    // From myguests 
                    // INNER JOIN messages 
                    // ON myguests.id = messages.id";

                    $stmt = $pdo->prepare("SELECT student.studentId, CONCAT(student.firstName,' ',student.lastName) AS name, student.school, student.address, portfolio.image, student.studentAvatar, portfolio.likes
                    FROM `student` 
                    INNER JOIN `portfolio` 
                    ON student.studentId = portfolio.studentId"
                    );
                    $stmt->execute();

                    // $stmt = $pdo->prepare("SELECT * FROM `portfolio`");
                    // $stmt->execute();
        ?><div  class="whole-page"><?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                        //print_r($row); // recursively print out object.

            
                echo"<div class='student-page'>";
                        //portfolio-image
                        ?><div class="imagecontainer"><img class="portfolioImage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" />

                        <!-- student-Avatar -->
                    <img class="studentAvatar" src="../images/student/<?php echo($row["studentAvatar"]);?>.jpg" />
                    </div>
                        
                        <div class="nscontainer">
                        <!--  studentName  -->
                        <div class="name"><?php echo($row["name"]);?></div>

                        <!--  school  -->
                        <div class="school"><?php echo($row["school"]);?></div>
                        </div>

                        <!-- address  -->
                        <div class="address"><i class="fas fa-map-marker-alt"></i><?php echo($row["address"]);?></div>
                    
                        <!-- Read More  -->
                    <a href="../student/student.php?studentId=<?php echo($row["studentId"]);?>"><i class="fas fa-bars"></i></a>
                        
                        <!--  likes  -->
                        <div class="like"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></div>

                <?php

                echo"</div>";
                    }
                    //echo $output;
        ?></div>

            </main>

            <script src="../js/00main.js"></script>
        </body>
    </html>
    
    <?php
}
?>