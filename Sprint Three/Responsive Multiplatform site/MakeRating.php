
                              
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
            

            $stmt = $conn->prepare("SELECT Title FROM movies WHERE Title LIKE '.$Title.' ");            
            //sql statment is exequted
            $stmt->execute();

            if($stmt->rowCount() > 0){
               
                //open table
               
                // output data of each row
                while($row = $stmt->fetch()) {                   

                    $db1 = $row["Title"];  
       
                    }
            } 
        }
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }

        
    

    
?>




                        
                                                     
            