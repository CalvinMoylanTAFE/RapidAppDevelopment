
                              
<?php
              
//Selecting a movie
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movies_db";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //finding a movie 
        if (isset($_POST["Title"])) {
            require("Connector.php");
            $Title = $_POST["Title"];

            $stmt = $conn->prepare("SELECT Title FROM movies WHERE Title LIKE '$Title%' ");            
            //sql statment is exequted
            $stmt->execute();

            if($stmt->rowCount() > 0){
               
                //open table
               
                // output data of each row
                while($row = $stmt->fetch()) {                   

                    $db1 = $row["Title"];  
                   

                    echo "
                              <form action = 'MovieRatings.php' method = 'POST'>
                                  $db1: <select class='dropdown-content' name = 'Score'>
                                  <option Name = '1'>1</option>
                                  <option Name = '2'>2</option>
                                  <option Name = '3'>3</option>
                                  <option Name = '4'>4</option>
                                  <option Name = '5'>5</option>
                              </select>
                              <input type = 'hidden' value = '$db1' name = 'Title'>
                              <input type='submit' class='button' name='submit' value='submit'>
                              </form>";

                
                }include 'RatingsPage.php';
            } else {
                echo "0 results";
            }
        }
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }

        
    

    
?>




  
                        
                        
                                                     
            