<!DOCTYPE html>
<head>
        <!-- Linking stylesheet and the font -->
        <title>SMT Movie Rentals</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,700&display=swap" rel="stylesheet">
        <?PHP
        include_once ('include/nav.php');
        ?>
    </head>
<html>

<div class="wrapper">
  <div class="title">
    <h1 class="top">
  </div>
  <div class="contact-form">
    <div class="input-fields">
      <form Name="Form1" class="middle" method="post"  >
      
        
      <h3 >Find a movie</h3>    

            <input Name="Title" class="input" Type="Text" placeholder="Title" >   
            <input type="submit" name="submit" value="Search" class="button" onclick="location.href = 'MovieRatings.php';" />        
            <br> 
            <?php
              include 'MakeRatingUpdated.php';
            ?>
        </form> 
        <form>
             
        </form>       
    </div>
</div>

    <body style="background-size: cover;">
        <!-- include nav  -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql =  $conn->prepare("SELECT Title,Score,Hits FROM movies");
  
  $sql->execute();

  if($sql->rowCount() > 0){

  echo '<!DOCTYPE html> <head> <link rel="stylesheet" href="styles.css"><main> <div class="result">';
  echo "<table style=''>";
//open table
  echo '<table class="table table-striped" id="outTable" table border="1" cellspacing="13" cellpadding="2">';
  
  
echo "	<tr>
      <th>Title</th>
      <th>Score</th>
      <th>Hits</th>
    </tr>";
// output data of each row
while($row = $sql->fetch()) {
  $Title = $row['Title'];
  $Score = $row['Score'];
  $Hits = $row['Hits'];

echo "<tr>
    <td onclick=popfields($Title)>$Title</td>
    <td>$Score</td>
    <td>$Hits</td>
  </tr>";
}
} 
?>
</html>