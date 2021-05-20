<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <title>registerStu-page</title>
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
        <!-- internal css -->
        <style>
            .regiStu-page{


                display: flex;
              justify-content: center;
              width: auto;
              height: 100vmax;
              background-color:#EEF1FE;
            }

            .regiStu-form{
            align-self:center;
            display:flex;
            flex-wrap:wrap;


            }

            input, select {
                width: 300px;
                padding: 12px 10px;
                margin: 8px 0;
                display: block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
              }
              
              input[type=submit] {
                width: 300px;
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

            /* div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
              } */

        </style>

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
                <a class="loging"  href="login.php">LOG IN</a>
                <a class="loging"  href="register.php">SIGN UP</a><br />
            </div>
                    
        </header>

        <section class="regiStu-page">
          <div class="regiStu-form">
              <form method="post" enctype="multipart/form-data" action="processRegisStu.php">
                    First Name: <input type="text" name="firstName" />
                    Last Name: <input type="text" name="lastName" />
                    Gender: <select name="gender">
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                    Major: <input type="text" name="major" />
                    School: <input type="text" name="school" />
                    Email: <input type="email" name="email" />
                    Address: <input type="text" name="address" />
                    Avatar(Only ".jpg" file): <input type="file" name="userfile" /> 
                    password: <input type="password" name="password" />

                    <input type="submit" value="Submit" /> 
                </form>
          </div> 
        </section> 

    </body>
</html>