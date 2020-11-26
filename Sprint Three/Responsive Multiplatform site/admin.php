

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
                            if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["password"])){
                                
                                $name = test_input($_POST["id"]);
                                if (!preg_match('/^[0-9]+$/',$name)) {
                                  $nameErr = "Only Numbers ";
                                  echo $nameErr;
                                }else{
                                      // filter and validate email
                                        $email = test_input($_POST["email"]);
                                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $emailErr = "Invalid Email";
                                        echo $emailErr;
                                      }
                                        else{
                                        // filter and validate password
                                          $password = test_input($_POST["password"]);
                                          $password_pattern = "/^[a-zA-Z0-9]{3,15}$/";
                                          //hashing using a built in library to make the password more secure
                                          $hash = password_hash($password, PASSWORD_DEFAULT);
                                          if (preg_match($password_pattern, strlen($password) >= 6 && $password===$password_pattern)) {
                                          $passwordErr = "Invalid Password too short";
                                          echo $passwordErr;
                                          } else{
  
                                            //SQL
                                            $stmt = $conn->prepare("SELECT * FROM `adminmembers` WHERE `Password` = '$password' ");

                                            
                                            //sql statment is exequted
                                            $stmt->execute();
                    
                                            if($stmt->rowCount() > 0){
                                              header("Location: AdminPageht.php");
                                            }else{
                                                          echo " not";
                                                      $sql = $conn->prepare("INSERT INTO adminmembers(`ID`,`Email`,`Password`) VALUES ('$name','$email','$password')");
                          
                                                      $sql->execute();
                                                      
                                                  }    
                                            }
                                        }
                                     
                              }

                            }else{
                              echo "Enter ID, Email And Password";
                                
                            }
                                
                                
                            
                 
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                      }

                ?>
                                    
                                    
                                                     
            