

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
                            if (isset($_POST["id"]) && isset($_POST["email"])){
                                
                                $name = test_input($_POST["id"]);
                                if (!preg_match('/^[0-9]+$/',$name)) {
                                  $nameErr = "Only Numbers ";
                                  echo $nameErr;
                                }else{
                                          // filter and validate email
                                           $email = test_input($_POST["email"]);
                                           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                           $emailErr = "Invalid Email";
                                           echo $emailErr;
                                       } else{
   
                                               //SQL
                                               $stmt = $conn->prepare("SELECT * FROM `adminmembers` WHERE `Email` = '$email' ");
   
                                               
                                              //sql statment is exequted
                                               $stmt->execute();
                       
                                               if($stmt->rowCount() > 0){
                                                header("Location: AdminPageht.php");
                                               }else{
                                                       echo " not";
                                                   $sql = $conn->prepare("INSERT INTO adminmembers(`ID`,`Email`) VALUES ('$name','$email')");
                       
                                                   $sql->execute();
                                                   
                                               }    
                               }
                                     
                                }

                            }else{
                              echo "Enter ID And Password";
                                
                            }
                                
                                
                            
                 
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                      }

                ?>
                                    
                                    
                                                     
            