<!DOCTYPE html>
<html lang = "en">

    <?php
            
    ?>

    <head>
        <title>Membership Management</title>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="main5.css">
    </head > 

    <Body >
        <?php 
    include_once ('include/nav.php');
    ?>
    
    <div class="wrapper">   
        <div class="contact-form">
            <div class="input-fields">
            

                <form Name="Form1" class="input" method="post"  >

                    Administration
                
                <input Name="id" class="input" Type="Text" placeholder="ID" >
                <br>

                <input Name="email" class="input" Type="Text" placeholder="Email" >           
                <br>

                <input Name="password" class="input" Type="Text" placeholder="Password" >  
                
                <?php
                            include 'admin.php';                                
                        ?>
                        <br>

                <input type="submit" name="submit" value="Login" class="button" onclick="location.href = 'ShowAllUsers.php';" />
                <br>

                

                 
                                    
                                                     
                </Form>
                <br>               
            </div>
            
            
        </div>
        
    </div>
            
    </Body>
   
</html>








