

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
                            if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"])){

                                
                                  
                                  $fname = test_input($_POST["fname"]);
                                if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
                                  $nameErr = "Only letters ";
                                  echo $nameErr;
                                }else{


                                    
                                          $lname = test_input($_POST["lname"]);
                                          if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
                                            $nameErr = "Only letters ";
                                            echo $nameErr;
                                          }else{
                                                    // filter and validate email
                                                    $email = test_input($_POST["email"]);
                                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                    $emailErr = "Invalid email";
                                                    echo $emailErr;
                                                } else{
                                                  if(isset($_POST["NewsLetter"]) Or isset($_POST["bknews"])){

                                                    if(isset($_POST["NewsLetter"]) && isset($_POST["bknews"])){

                                                    

                                                              $stmt = $conn->prepare("SELECT * FROM `members` WHERE `Email` = '$email' ");
                          
                                                                      
                                                              //sql statment is exequted
                                                              $stmt->execute();
                                              
                                                              if($stmt->rowCount() > 0){
                                                              echo "Email already exists";
                                                              }else{
                                                                  echo "";
                                                              $sql = $conn->prepare("INSERT INTO members(`FirstName`,`LastName`,`Email`,`Removal`,`NewsLetter`,`BrkNews`) VALUES ('$fname','$lname','$email','No',1,1)");
                                  
                                                              $sql->execute();
                                                              header("Location: Thank_youPage.php");
                                                              }
                                                    
                                                    }elseif(isset($_POST["NewsLetter"])){

                                                              $stmt = $conn->prepare("SELECT * FROM `members` WHERE `Email` = '$email' ");
                          
                                                                      
                                                                      //sql statment is exequted
                                                                      $stmt->execute();
                                              
                                                              if($stmt->rowCount() > 0){
                                                              echo "Email already exists";
                                                              }else{
                                                                  echo "";
                                                              $sql = $conn->prepare("INSERT INTO members(`FirstName`,`LastName`,`Email`,`Removal`,`NewsLetter`,`BrkNews`) VALUES ('$fname','$lname','$email','No',1,0)");
                                  
                                                              $sql->execute();
                                                              header("Location: Thank_youPage.php");
                                                              }  

                                                    }elseif(isset($_POST["bknews"])){

                                                        $stmt = $conn->prepare("SELECT * FROM `members` WHERE `Email` = '$email' ");
                          
                                                                      
                                                                      //sql statment is exequted
                                                                      $stmt->execute();
                                              
                                                                      if($stmt->rowCount() > 0){
                                                                          echo "Email already exists";
                                                                      }else{
                                                                              echo "";
                                                                          $sql = $conn->prepare("INSERT INTO members(`FirstName`,`LastName`,`Email`,`Removal`,`NewsLetter`,`BrkNews`) VALUES ('$fname','$lname','$email','No',0,1)");
                                              
                                                                          $sql->execute();
                                                                          header("Location: Thank_youPage.php");
                                                                      }  

                                                    }
   
                                                                      //SQL
                                                                       
                                                                    }else{
                                                                      echo "Tick one of boxes";
                                                                    } 
                                                                  
                               }
                                     
                                }

                              }
                                
                                

                            }else{
                                
                            }
                                
                                
                            
                 
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                      }

                ?>
                                    
                                    
                                                     
            