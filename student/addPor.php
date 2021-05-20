<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>addPor</title>
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
        <!-- CSS -->
        <style>

            body{

            font-family: 'Open Sans', sans-serif;
            color: #424242;
            font-size: 15px;
            display: flex;
            justify-content: center;
            
            }
            .form{
            width: 400px;
            height: 800px;
            padding: 10px 20px;
            border: 1px solid rgb(216, 216, 216);
            border-radius: 10px;


            }


            input, select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            
            input[type=submit] {
                width: 100%;
                background-color: #5A80FB;;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            
            input[type=submit]:hover {
                background-color:  #2048ce;

            
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
                    <li><a href="../main/homePage.php">Home</a></li>
                    <li><a href="../main/about.php">About</a></li>
                    <li><a href="../main/contact.php">Contact</a></li>
                </ul>
            <!-- </nav>
            <div class="log">
                <a class="loging"  href="../login/login.php">LOG IN</a>
                <a class="loging"  href="../login/register.php">SIGN UP</a><br />
            </div>    -->
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

<?php
    //receive GET variables
    $studentId = $_GET["studentId"];

    ?>
 
    <!-- upload image -->
    <form class="form" method="post" enctype="multipart/form-data" action="uploadPor.php">     
        Title: <input type="text" name="title" required/><br />
        Date: <input type="date" name="date" required/><br />
        Content: <textarea name="content" rows="10" cols="40" required></textarea><br/><br/>
        Portfolio Image: <input type="file" name="userfile" />
        
        <input type="hidden" name="studentId" value="<?php echo($studentId);?>"/>
        <input type="submit" value="Submit"/> 
    </form>
   
    <script src="../js/00main.js"></script>
    </body>
</html>

<?php
?>
