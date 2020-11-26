<?php
//declare values
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

//declare selections array
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

$found = false; //declare found 

//iterate through selections
for ($i = 0;$i < 10;$i++)
{
    if ($_POST[$selections[$i]] != "") //check if field is filled out
    {
        $found = true;
    }
    else {
        $found = false;
        break;
    }
}

$error = true;

if (!$found) //check if all fields aren't filled 
{
    //display error to user
    echo "Please fill out all fields";
    echo "<br><a href='add_movie.php'>Go back</a>";
}
else
{
    $error = false;
    //check if year is 4 digit number
    if (!preg_match("/^[1-9][0-9]{3,3}$/", $Year))
    {
        echo "Year can only be 4 digit number <br>";
        $error = true;
    }
}

if (!$error)
{
    //Do database entry
    //declare db info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "movies_db";

    try
    {
        //create PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //insert sql
        $sql = "INSERT INTO movies (Title, Studio, Status, Sound, Versions, RecRetPrice, Rating, Year, Genre, Aspect) VALUES ('$Title', '$Studio', '$Status', '$Sound', '$Versions', '$RecRetPrice', '$Rating', '$Year', '$Genre', '$Aspect')";

        //execute
        $conn->exec($sql);

        //tell user
        echo "<br>Successfully added movie to our database!";
        echo "<br><a href='index.php'>Go back</a>";
    }
    catch(PDOException $e)
    {
        //tell user if error
        echo "Connection failed: " . $e->getMessage();
    }

    //close connection
    $conn = null;
}

//function to clean user input
function test_input(string $data):
    string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
