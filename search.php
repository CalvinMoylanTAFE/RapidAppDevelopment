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

//Post values
$Title = $_POST["Title"];
$Studio = $_POST["Studio"];
$Status = $_POST["Status"];
$Sound = $_POST["Sound"];
$Versions = $_POST["Versions"];
$RecRetPrice = $_POST["RecRetPrice"];
$Rating = $_POST["Rating"];
$Year = $_POST["Year"];
$Genre = $_POST["Genre"];
$Aspect = $_POST["Aspect"];

//Check if the graph has been posted to
$Graph = isset($_POST['Graph']) ? $_POST['Graph'] : 'No';

//create array of all db headers
$selections = array(
    "Title",
    "Studio",
    "Status",
    "Sound",
    "Versions",
    "RecRetPrice",
    "Rating",
    "Year",
    "Genre",
    "Aspect"
);

$where = ""; //init the where clause

$found = false; //declare found as false. this will be used to see if there is anything inputted in the form

//Loop through the selections array
for ($i = 0;$i < 10;$i++)
{
    if ($_POST[$selections[$i]] != "") //If the _POST[] is not empty that means there was data inputted
    {
        $where = $where . " AND " . $selections[$i] . "='" . $_POST[$selections[$i]] . "'"; //Add it to the where clause
        $found = true; //set found to true
    }
}

//remove 'AND ' from the start of the where clause 
$where = substr($where, 4);

//echo website html
echo '<!DOCTYPE html> <head> <link rel="stylesheet" href="styles.css"> <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,700&display=swap" rel="stylesheet"> </head> <html> <body style="background-size: 100vw 100vh"> <nav> <!-- <li><img height="50px" src="websitelogo.png" ></li> --> <li><a href="index.php">HOME</a></li> <li><a href="search_movie.php">SEARCH</a></li> <li><a href="add_movie.php">ADD</a></li> </nav> <main> <div class="result">';
echo "<table style=''>";
echo "<tr><th>Id</th><th>Title</th><th>Studio</th><th>Status</th><th>Sound</th><th>Versions</th><th>RecRetPrice</th><th>Rating</th><th>Year</th><th>Genre</th><th>Aspect</th><th>Searched Count</th></tr>";

//declare db info
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "movies_db";

//This will be used to see if there were any results fetched
$results = false;


try
{
    //create PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($found) //this means user put in data to search for
    {
        //default sql query + where clause
        $sql = "SELECT * FROM movies WHERE " . $where;
        $updateSQL = "UPDATE movies SET Searched = Searched + 1 WHERE " . $where; // SQL to update the searched

        $conn->exec($updateSQL); //execute
    }
    else
    {
        //default search
        $sql = "SELECT * FROM movies"; 
    }

    //execute SQL
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //display results
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v)
    {
        $results = true;
        echo $v;
    }

    if ($Graph == "Yes") // if the user has checked the "show most searched" button
    {
        $sql = "SELECT Title, Searched FROM movies ORDER BY Searched DESC LIMIT 10;"; //SQL to get top 10 searched values
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
            0,
            0,
            0
        );
        
        //declare titles
        $titles = array();

        while ($row = $stmt->fetch()) //loop through results
        {
            $numbers[$count] = $row['Searched']; //add searched count to numbers array
            $titles[$count] = $row['Title']; //add movie title to titles array
            $count = $count + 1; //increment
        }

        $max = max($numbers); //find the highest number

        $width = 515; //set image width
        $height = $max * 25; //set the height (this will scale depending on the results)

        $image = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream"); //create img
        $backgroundColor = imagecolorallocate($image, 42, 48, 53); //set bg

        $red = imagecolorallocate($image, 255, 0, 0); //set colour
        $white = imagecolorallocate($image, 255, 255, 255); //set colour

        $textColor = imagecolorallocate($image, 255, 255, 255); //set text colour

        for ($i = 0;$i < 10;$i++) //loop through numbers
        {
            $x = $i * 50 + 10; //get x pos
            $y = $height - $numbers[$i] * 25; //get y pos
            imagerectangle($image, $x, $y, $x + 45, $height - 20, $red); //the red bar
            imagestring($image, 20, $x, $height - 20, $numbers[$i], $white); // Number at bottom
            $chars = str_split(strtoupper($titles[$i])); //seperate string into chars and set to uppercase

            $charY = $y;
            foreach ($chars as $char) //iterate through string and draw each letter verically
            {
                imagestring($image, 20, $x + 15, $charY, $char, $white); //draw letter
                $charY = $charY + 12; //increment Y

            }
        }

        //draw X and Y lines
        imageline($image, 5, 5, 5, $height - 20, $white);
        imageline($image, 5, $height - 20, $width - 5, $height - 20, $white);

        imagepng($image, "outputimage.png"); //save image
        echo "<br><img src='outputimage.png'><p></p>"; //echo src for img

        imagedestroy($image);//kill image
    }
}
catch(PDOException $e) //catch PDO errors
{
    echo "Connection failed: " . $e->getMessage(); //display to user

    $conn = null;
}

$conn = null; //close connection

if (!$results) //if there were no movies found by those filters
{
    echo "No movies found by those filters <br> " . $where;
}
?>
