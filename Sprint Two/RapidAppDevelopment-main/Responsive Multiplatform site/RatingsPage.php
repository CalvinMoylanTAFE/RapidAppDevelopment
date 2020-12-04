<!DOCTYPE html>
<head>
        <!-- Linking stylesheet and the font -->
        <title>SMT Movie Rentals</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,700&display=swap" rel="stylesheet">
    </head>
<html>
    <body style="background-size: cover;">
        <!-- include nav  -->
        <?php
include_once ('include/nav.php');
?>
        <main>
            <!-- include search form -->
            <?php
//Class to display the database data
class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return "<td style='min-width:2px;border:1px solid black;word-break: break-all;'>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

//echo website html
echo '<!DOCTYPE html> <head> <link rel="stylesheet" href="styles.css"><main> <div class="result">';
echo "<table style=''>";
echo "<tr><th>Title</th><th>Score</th><th>Hits</th></tr>";

 

//declare db info
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "movies_db";

//This will be used to see if there were any results fetched
$results = false;

//create PDO
$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT Title, Score, Hits from movies");
$stmt->execute(); 

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //display results
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v)
    {
        $results = true;
        echo $v;
    }

?>

<div class="middle">

    <form action="RatingsPage.php" method="POST">
        <label for="title">Search Title:</label><br>
        <input type="text" name="Title"><input type="submit" value="Search"> <br>
        
    </form>
    <?php
                    //create PDO
                    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
               

                    //This will be used to see if there were any results fetched
                    $results = false;


                $stmt = $conn->prepare("SELECT * from movies WHERE `Title` = '10'");
                $stmt->execute(); 
                while($row = $stmt->fetch())
                {
                    $Title = $row["Title"];
                    $Studio = $row["Studio"];
                    $Status = $row["Status"];
                    $Sound = $row["Sound"];
                    $Versions = $row["Versions"];
                    $RecRetPrice = $row["RecRetPrice"];
                    $Rating = $row["Rating"];
                    $Year = $row["Year"];
                    $Genre = $row["Genre"];
                    $Aspect = $row["Aspect"];
                    $Score = $row["Score"];
                    $Hits = $row["Hits"];

                    echo "
                    <form action = 'RatingsPage.php' method = 'POST'>
                        $Title: <select name = 'Score'>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <input type = 'hidden' value = '$Title' name = 'Title'>
                    
                    </form>";
                }

            ?>
                </p>
</div>





<?php
    $Title = $_POST['Title'];
    $Score = $_POST['Score'];

    $find_current_rating = $conn->prepare("SELECT * FROM `movies` WHERE `Title` = '10'");

                $find_current_rating->execute();
      while($row = $find_current_rating->fetch())
                        {
                            $current_rating = $row['Score'];
                            
                            // the number of hits is the number of people who have rated the movie
                            $current_hits = $row['Hits'];
                        

                        $new_hits = $current_hits + 1;
                        $update_hits = $conn->prepare("UPDATE movies SET Hits = '$new_hits' WHERE `Title` = '10'");

                        $pre_rating = $current_rating + $Score;
                        $new_rating = $pre_rating / $new_hits;
                        $update_hits->execute();
                        $update_rating = $conn->prepare("UPDATE movies SET Score = '$new_rating' WHERE `Title` = '10'");
                        $update_rating->execute();
                        }
              
?>  
        </main>

        <!-- include footer -->
        
    </body>
</html>
