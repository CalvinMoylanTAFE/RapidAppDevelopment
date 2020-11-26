<!DOCTYPE html>
<head>
        <!-- Linking stylesheet and the font -->
        <title>SMT Movie Rentals</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,700&display=swap" rel="stylesheet">
        <?PHP
        include_once ('include/nav.php');
        header("Refresh:3");
        ?>
    </head>
    <div class="wrapper">
  <div class="title">
    <h1 class="top">Rating Comparison Chart</h1>
  </div>


<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT Title, Score FROM movies ORDER BY Score DESC LIMIT 8;"; //SQL to get top 10 searched values
        //execute
        $stmt = $conn->query($sql);
        $stmt->execute();
        $count = 0; //declare count
        //create numbers array
        $numbers = array(
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0
        );
        
        //declare titles
        $Title = array();

        while ($row = $stmt->fetch()) //loop through results
        {
            $numbers[$count] = $row['Score']; //add searched count to numbers array
            $Title[$count] = $row['Title']; //add movie title to titles array
            $count = $count + 1; //increment
        }

        $max = max($numbers); //find the highest number

        $width = 515; //set image width
        $height = $max * 130; //set the height (this will scale depending on the results)

        $image = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream"); //create img
        $backgroundColor = imagecolorallocate($image, 50, 48, 53); //set bg

        $red = imagecolorallocate($image, 255, 0, 0); //set colour
        $white = imagecolorallocate($image, 255, 255, 255); //set colour

        $textColor = imagecolorallocate($image, 255, 255, 255); //set text colour

        for ($i = 0;$i < 8;$i++) //loop through numbers
        {
            $x = $i * 50 + 10; //get x pos
            $y = $height - $numbers[$i] * 120; //get y pos
            imagerectangle($image, $x, $y, $x + 45, $height - 20, $red); //the red bar
            imagestring($image, 20, $x, $height - 20, $numbers[$i], $white); // Number at bottom
            $chars = str_split(strtoupper($Title[$i])); //seperate string into chars and set to uppercase

            $charY = $y;
            foreach ($chars as $char) //iterate through string and draw each letter verically
            {
                imagestring($image, 2, $x + 8, $charY, $char, $white); //draw letter
                $charY = $charY + 11; //increment Y

            }
        }

        //draw X and Y lines
        imageline($image, 5, 5, 5, $height - 20, $white);
        imageline($image, 5, $height - 20, $width - 8, $height - 20, $white);

        imagepng($image, "outputimage.png"); //save image
        echo "<br><img src='outputimage.png'><p></p>"; //echo src for img

        imagedestroy($image);//kill image


?>
<div class="title">
    <h2 class="top">5 Star rating for movies</h2>
  </div>
</html>