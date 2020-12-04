
<?php
//Class to display the database data

//declare db info
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "movies_db";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST["Score"])) {
    $Score = $_POST["Score"];
    $find_current_rating = $conn->prepare("SELECT Score, Hits FROM `movies` WHERE `Title` LIKE '$Title%'");
    $find_current_rating->execute();
        while($row = $find_current_rating->fetch())
            {
                //score rated by user
                $current_rating = $row['Score'];
                
                // the number of hits is the number of people who have rated the movie
                $current_hits = $row['Hits'];
            }

            $new_hits = $current_hits + 1;
            $update_hits = $conn->prepare("UPDATE `movies` SET Hits = '$new_hits' WHERE `Title` LIKE '$Title%'");

            $pre_rating = $current_rating + $Score;
            $new_rating = $pre_rating / $new_hits;
            $update_hits->execute();
            $update_rating = $conn->prepare("UPDATE `movies` SET Score = '$new_rating' WHERE `Title` LIKE '$Title%'");
            $update_rating->execute();

        }
?>  
