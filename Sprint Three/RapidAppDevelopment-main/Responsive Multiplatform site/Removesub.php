<!DOCTYPE html>
<html lang = "en">

    <?php
            
    ?>

    <head>
        <title>Membership Management</title>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="main4.css">
    </head > 

    <Body >
        <?php 
    include_once ('include/nav.php');
    ?>
    
    <div class="wrapper">   
        <div class="contact-form">
            <div class="input-fields">
            

                <form Name="Form1" class="input" method="post"  >

                Unsubscription
                
                <input Name="fname" class="input" Type="Text" placeholder="First Name" >
                <br>

                <input Name="lname" class="input" Type="Text" placeholder="Last Name" > 
                <br>

                <input Name="email" class="input" Type="Text" placeholder="Email" >               

                
                <input type="submit" name="remove" value="Remove" class="button" onclick="location.href = 'ShowAllUsers.php';" />
                <br>
                

                

                <?php
                            include 'Remove_User.php';                                
                        ?>  
                                    
                                                     
                </Form>
                <br>               
            </div>
            
            
        </div>
        
    </div>

    <?php
    
    include_once ('include/footer.php');

    ?>
            
    </Body>
   
</html>








