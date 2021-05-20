<?php
session_start();
if(isset($_SESSION["username"])){
    //allow to see this page
    session_destroy();
  
    $src_page = $_SERVER['HTTP_REFERER'];
    header("location:../main/homePage.php");
}else{
?>
            <p>Access denied.</p>
            <a href="../main/homePage.php">Go back to the Home page</a>

<?php
}
?>