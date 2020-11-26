<?php
// echoing the search form
echo '<div class="middle">
<h1>Search Form</h1>
<p>Fill out the form below to get a list of matching movies</p>
<form action="search.php" method="POST">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="Title"><br>
    <label for="studio">Studio:</label><br>
    <input type="text" id="studio" name="Studio"><br>
    <label for="status">Status:</label><br>
    <input type="text" id="status" name="Status"><br>
    <label for="sound">Sound:</label><br>
    <input type="text" id="sound" name="Sound"><br>
    <label for="versions">Versions:</label><br>
    <input type="text" id="versions" name="Versions"><br>
    <label for="recretprice">RecRetPrice:</label><br>
    <input type="text" id="recretprice" name="RecRetPrice"><br>
    <label for="rating">Rating:</label><br>
    <input type="text" id="rating" name="Rating"><br>
    <label for="year">Year:</label><br>
    <input type="text" id="year" name="Year"><br>
    <label for="genre">Genre:</label><br>
    <input type="text" id="genre" name="Genre"><br>
    <label for="aspect">Aspect:</label><br>
    <input type="text" id="aspect" name="Aspect"><br>
    <label for="score">Score:</label><br>
    <input type="text" id="score" name="Score"><br>
    <label for="hits">Hits:</label><br>
    <input type="text" id="hits" name="Hits"><br>
    <input type="checkbox" id="graph" name="Graph" value="Yes">
    <label for="graph"> Show most searched? </label><br><br>
    * click submit without any inputs for all results <br>
    <input type="submit" value="Submit">
  </form>
</div>';
?>