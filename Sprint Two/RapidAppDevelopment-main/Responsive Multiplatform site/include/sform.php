<?php
// echoing the search form
echo '<div class="middle">
<h1>Search Form</h1>
<p>Fill out the form below to get a list of matching movies</p>
<form action="search.php" method="POST">
    
    <input type="text" class="input" id="title" name="Title" placeholder="Title"><br>
    
    <input type="text" class="input" id="studio" name="Studio" placeholder="Studio"><br>
    
    <input type="text" class="input" id="status" name="Status" placeholder="Status"><br>
    
    <input type="text" class="input" id="sound" name="Sound" placeholder="Sound"><br>
    
    <input type="text" class="input" id="versions" name="Versions" placeholder="Versions"><br>
    
    <input type="text" class="input" id="recretprice" name="RecRetPrice" placeholder="RecRetPrice"><br>
    
    <input type="text" class="input" id="rating" name="Rating" placeholder="Rating"><br>
    
    <input type="text" class="input" id="year" name="Year" placeholder="Year"><br>
    
    <input type="text" class="input" id="genre" name="Genre" placeholder="Genre"><br>
    
    <input type="text" class="input" id="aspect" name="Aspect" placeholder="Aspect"><br>
    <input type="checkbox" id="graph" name="Graph" value="Yes">
    <label for="graph"> Show most searched? </label><br><br>
    * click submit without any inputs for all results <br>
    <input type="submit" class="button" value="Submit">
  </form>
</div>';
?>