

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
   
                                                                      //SQL
                                                                      $stmt = $conn->prepare("SELECT * FROM `members` WHERE `Email` = '$email' ");
                          
                                                                      
                                                                      //sql statment is exequted
                                                                      $stmt->execute();
                                              
                                                                      if($stmt->rowCount() > 0){
                                                                        $sql = $conn->prepare("UPDATE `members` SET `Removal`='Yes' WHERE `Email` = '$email'");
                                                                          
                                                                          $sql->execute();

                                                                          require_once('PHPMailer\PHPMailerAutoload.php');
                                  
                                                                          $mail = new PHPMailer();
                                                                          $mail->isSMTP();
                                                                          $mail->SMTPAuth = true;
                                                                          $mail->SMTPSecure = 'tls';
                                                                          $mail->Host = 'smtp.live.com';
                                                                          $mail->Port = '587';
                                                                          $mail->isHTML();
                                                                          $mail->Username = 'RemovalRequest01@outlook.com';
                                                                          $mail->Password = 'B97csAVWYt;pTL:';
                                                                          $mail->SetFrom('RemovalRequest01@outlook.com');
                                                                          $mail->Subject = 'Hello World';
                                                                          $mail->Body = $fname.' '.$lname.', has requested to be removed from the Subcription ';
                                                                          $mail->AddAddress('RemovalRequest01@outlook.com');
                                                                        
                                                                          echo "Removed";
                                                                          $mail->Send();
                                                                      }else{
                                                                              echo "User does not Exist";
                                                                          
                                              
                                                                          $sql->execute();
                                                                          header("Location: Thank_youPage.php");
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
                                    
                                    
                                                     
            