
                              
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
                                  $db1: <select name = 'Score'>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                              </select>
                              <input type = 'hidden' value = '$db1' name = 'Title'>
                              <input type='submit' name='submit' value='submit'  >
                              </form>";

                              $find_current_rating = $conn->prepare("SELECT * FROM `movies` WHERE `Title` = '$db1'");

                                $find_current_rating->execute();
                        if (isset($_POST["Score"]) ){
                                                                                                             
                                
                                // the number of hits is the number of people who have rated the movie
                                $current_hits = $row['Hits'];
                            

                            $new_hits = $current_hits + 1;
                            $update_hits = $conn->prepare("UPDATE movies SET Hits = '$new_hits' WHERE `Title` = '$db1'");

                            $pre_rating = $db1 + $Score;
                            $new_rating = $pre_rating / $new_hits;
                            $update_hits->execute();
                            $update_rating = $conn->prepare("UPDATE movies SET Score = '$new_rating' WHERE `Title` = '$db1'");
                            $update_rating->execute();
                            
                        }
       
                }
              


                        
                
            } else {
                echo "0 results";
            }
        }
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }

        
    

    
?>




  
                        
                        
                                                     
            