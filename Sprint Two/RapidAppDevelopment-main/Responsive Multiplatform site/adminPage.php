

     <?php

include_once 'connect.php';


                        $sql = "SELECT `FirstName`,`LastName`,`Email`,`Removal`,`NewsLetter`,`BrkNews` FROM `members` WHERE 1";

                        $results = $conn->query($sql);

                        if ($results->num_rows > 0) {
                            // output data of each row

                                                  echo ' <div> 
                              <table border="1" cellspacing="13" cellpadding="2"> 
                                                                  
                              <tr> 
                                  <td> <font face="Arial">First Name</font> </td> 
                                  <td> <font face="Arial">Last Name</font> </td> 
                                  <td> <font face="Arial">Email</font> </td> 
                                  <td> <font face="Arial">Request</font> </td> 
                                  <td> <font face="Arial">NewsLetter</font> </td> 
                                  <td> <font face="Arial">Breaking News</font> </td> 
                                  
                              </tr>';
                            while($row = $results->fetch_assoc()) {

                              $db1 = $row["FirstName"];                          
                              $db2 = $row["LastName"];
                              $db3 = $row["Email"];
                              $db4 = $row["Removal"];
                              $db5 = $row["NewsLetter"];
                              $db6 = $row["BrkNews"];

                                                echo '<tr>
                                  <td>'.$db1.'</td>
                                  <td>'.$db2.'</td>
                                  <td>'.$db3.'</td>
                                  <td>'.$db4.'</td>
                                  <td>'.$db5.'</td>
                                  <td>'.$db6.'</td>
                                  
                              </tr>';
                            
                              
                            }

                          }
                ?>
                                    
                                    
                                                     
            