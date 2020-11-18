

     <?php
              

              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "databasemembers";
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        
                        
                          // the function used to filter the nam field
                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                          }
                           
                            //filter name field  
                            if (isset($_POST["fname"]) && isset($_POST["email"])){
                                
                                $fname = test_input($_POST["fname"]);
                                if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
                                  $nameErr = "Only letters ";
                                  echo $nameErr;
                                }else{


                                    
                                          
                                                    // filter and validate email
                                                    $email = test_input($_POST["email"]);
                                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                    $emailErr = "Invalid email";
                                                    echo $emailErr;
                                                } else{
   
                                                                      //SQL
                                                                      $stmt = $conn->prepare("DELETE FROM `members` WHERE `FirstName` = '$fname' AND `Email` = '$email'");
                                                                                    
                                                                      
                                                                      //sql statment is exequted
                                                                      $stmt->execute();
                                              
                                                                      if($stmt->rowCount() > 0){
                                                                          echo "Removed";
                                                                      }else{
                                                                          echo "User doesn't exist";
                                                                      }    
                               }
                                     
                                

                              }

                            }else{
                                
                            }
                                
                                
                            
                 
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                      }

                ?>
                                    
                                    
                                                     
            