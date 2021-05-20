<?php
//process-login.php
session_start();
//receive post variables
//$username = $_POST["username"];
$username = $_POST["username"];
$password = $_POST["password"];


//connect to database
include('../includes/include-connectDatabase.php');

// Prepare and execute SQL Statement ;
$stmt = $pdo->prepare
("SELECT * FROM `user` WHERE `userName` = '$username' AND `password` = '$password'");
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    //successful username/password combination
    $_SESSION["username"] = $row["userName"];

    // Redirection
    header("Location: ../main/homePage.php");

}else{
    
	//incorrect username/password
    ?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>hireme-LoginPage</title>
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
            
            <p>Sorry, Incorrect username or password. Please login</p>
        
            <a href="login.php">Login here</a><br />
            
        <foot>
            <a href="#">Accept Cookies</a>
        </foot>
    </html>
            
<?php
            
}

?>