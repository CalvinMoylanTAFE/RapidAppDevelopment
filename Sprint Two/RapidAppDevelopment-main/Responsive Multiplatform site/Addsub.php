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

                <h1>Signup for Subscription</h1>
                
                <input Name="fname" class="input" Type="Text" placeholder="First Name" >
                <br>

                <input Name="lname" class="input" Type="Text" placeholder="Last Name" > 
                <br>

                <input Name="email" class="input" Type="Text" placeholder="Email" > 

                <input type="checkbox" id="NewsLetter" name="NewsLetter" value="NewsLetter">
                <label for="NewsLetter">NewsLetter</label><br>     

                <input type="checkbox" id="bknews" name="bknews" value="">
                <label for="bknews">Breaking News</label><br>            

                <input type="submit" name="submit" value="Subscribe" class="button" onclick="location.href = 'ShowAllUsers.php';" />
                <input  name="remove" value="Unsubscribe" class="button" onclick="location.href = 'Removesub.php';" />
                <br>
                

                <?php
                            include 'Add_User.php';                                
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








