<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="main6.css">
</head>
<body>
	<?php 
    include_once ('include/nav.php');
    ?>
	
<div class="wrapper">
  <div class="title">
    <h1 class="top">Administration</h1>
  </div>
  <div class="contact-form">
    <div class="input-fields">
      <form Name="Form1" class="input" method="post"  >

      <h2 class='top'>Remove Users</h2>    
                
                <input Name="fname" class="input" Type="Text" placeholder="First Name" >
                <br>

                <input Name="email" class="input" Type="Text" placeholder="Email" >    
                   
                <input type="submit" name="submit" value="remove" class="button" onclick="location.href = 'AdminPageht.php';" />        
                <br> 
                <?php
                include 'adminPage_remove.php';                                
                ?>
                
                
                                                  
                </Form>
                <br>     
                 

                
    </div>
    <div class="msg">
            <h2 class='top'>Members</h2>
            <br>
            <?php
             include 'adminPage.php';                                
            ?>  
            <br>
            
            
                
      
    </div>
    
  </div>
  
  
</div>
	
</body>
</html>