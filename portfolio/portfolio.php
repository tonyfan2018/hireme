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
        <title>portfolio-page</title>
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
 
<section class="whole-page">
<?php



        //receive GET variables
        $portfolioId = $_GET["portfolioId"];
        //echo($portfolioId);

        //connect to database
        include('../includes/include-connectDatabase.php');

  ?><div class="portfolio-display"><?php
  ?><div class="image-area"><?php
        //portfolio more pic
        $stmt = $pdo->prepare("SELECT * FROM `portfolio-images` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();
        while($rownew = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //portfolio-image
            ?><img src="../images/portfolio/portPic/<?php echo($rownew["portPic"]);?>.jpg" width="300px"/></br><?php
        }

        //portfolio
        $stmt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();

 
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            //portfolio-image
          ?></div><?php
            ?>
          
            <!--  title  -->
            <p class="portfolio-tile"><?php echo($row["title"]);?></p>

            <!--  date  -->
            <p class="portfolio-date"><?php echo($row["date"]);?></p>

            <!--  content  -->
            <p class="portfolio-content"><?php echo($row["content"]);?></p>

            <!--  likes  -->
            <p class="portfolio-likes"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></p>

            <!-- cancel-->
            <a class="cancel" href="../student/student.php?studentId=<?php echo($row["studentId"]);?>">&#215;</a>
            
            <?php
  
        }

    ?></div>

</section>
       
<?php
?><div class="back"></div><?php
$stmtt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
$stmtt->execute();
while($row = $stmtt->fetch(PDO::FETCH_ASSOC)) {
?><img class="backimage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" /></br><?php
}
?>

</body>
</html>


    <?php

    }else{
    //corporation see this page
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>portfolio-page</title>
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
 
<section class="whole-page">
<?php



        //receive GET variables
        $portfolioId = $_GET["portfolioId"];
        //echo($portfolioId);

        //connect to database
        include('../includes/include-connectDatabase.php');

  ?><div class="portfolio-display"><?php
  ?><div class="image-area"><?php
        //portfolio more pic
        $stmt = $pdo->prepare("SELECT * FROM `portfolio-images` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();
        while($rownew = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //portfolio-image
            ?><img src="../images/portfolio/portPic/<?php echo($rownew["portPic"]);?>.jpg" width="300px"/></br><?php
        }

        //portfolio
        $stmt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();

 
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            //portfolio-image
          ?></div><?php
            ?>
          
            <!--  title  -->
            <p class="portfolio-tile"><?php echo($row["title"]);?></p>

            <!--  date  -->
            <p class="portfolio-date"><?php echo($row["date"]);?></p>

            <!--  content  -->
            <p class="portfolio-content"><?php echo($row["content"]);?></p>

            <!--  likes  -->
            <p class="portfolio-likes"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></p>

            <!-- Add More  picture-->
            
            
            <?php
  
        }

    ?></div>

</section>
       
<?php
?><div class="back"></div><?php
$stmtt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
$stmtt->execute();
while($row = $stmtt->fetch(PDO::FETCH_ASSOC)) {
?><img class="backimage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" /></br><?php
}
?>

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
        <title>portfolio-page</title>
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
            <div class="log">
                <a class="loging"  href="../login/login.php">LOG IN</a>
                <a class="loging"  href="../login/register.php">SIGN UP</a><br />
            </div>
            

        </header>
 
<section class="whole-page">
<?php



        //receive GET variables
        $portfolioId = $_GET["portfolioId"];
        //echo($portfolioId);

        //connect to database
        include('../includes/include-connectDatabase.php');

  ?><div class="portfolio-display"><?php
  ?><div class="image-area"><?php
        //portfolio more pic
        $stmt = $pdo->prepare("SELECT * FROM `portfolio-images` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();
        while($rownew = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //portfolio-image
            ?><img src="../images/portfolio/portPic/<?php echo($rownew["portPic"]);?>.jpg" width="300px"/></br><?php
        }

        //portfolio
        $stmt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
        $stmt->execute();

 
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            //portfolio-image
          ?></div><?php
            ?>
          
            <!--  title  -->
            <p class="portfolio-tile"><?php echo($row["title"]);?></p>

            <!--  date  -->
            <p class="portfolio-date"><?php echo($row["date"]);?></p>

            <!--  content  -->
            <p class="portfolio-content"><?php echo($row["content"]);?></p>

            <!--  likes  -->
            <p class="portfolio-likes"><i class="fas fa-heart"></i><?php echo($row["likes"]);?></p>

            <!-- Add More  picture-->
            
            
            <?php
  
        }

    ?></div>

</section>
       
<?php
?><div class="back"></div><?php
$stmtt = $pdo->prepare("SELECT * FROM `portfolio` WHERE `portfolioId` = $portfolioId");
$stmtt->execute();
while($row = $stmtt->fetch(PDO::FETCH_ASSOC)) {
?><img class="backimage" src="../images/portfolio/<?php echo($row["image"]);?>.jpg" /></br><?php
}
?>

</body>
</html>

    
    <?php
}
?>