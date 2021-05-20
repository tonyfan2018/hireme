<?php
session_start();
    //receive GET variables
    $portfolioId = $_GET["portfolioId"];

    //connect to database
    include('../includes/include-connectDatabase.php'); 

    //portfolio
    $stmt = $pdo->prepare("SELECT `studentId`, `portfolioId` FROM `portfolio` WHERE `portfolioId` = $portfolioId");
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

<!-- upload image -->
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
height: 500px;
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

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }

</style>
<form method="post" enctype="multipart/form-data" action="processAddMorePic.php">     
    File(Only ".jpg" file): <input type="file" name="userfile" />
    
    <input type="hidden" name="studentId" value="<?php echo($row["studentId"]);?>"/> 
    <input type="hidden" name="portfolioId" value="<?php echo($portfolioId);?>"/>     
   <input type="submit" value="Submit" /> 
</form>


</html>
<?php
    }
?>