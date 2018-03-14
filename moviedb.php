<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    //this part this part makes a PDO connection to our db
    $conn = new PDO("mysql:host=$servername;dbname=exercise_3", $username, $password);       
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    /*
     * this part creates a table in our new db  
     *   
    $sqltable = "CREATE TABLE movies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    actors VARCHAR(200) NOT NULL,
    director VARCHAR(50),
    producer VARCHAR(50),
    year_of_prod YEAR(4),
    language VARCHAR(50),
    category ENUM('comedy','horror','action','drama'),
    storyline TEXT(250),
    video VARCHAR(200)
    )";   
    $conn->exec($sqltable);
    */
    
    //this part inserts the data from the form into our table
    if(isset($_POST['submit'])){
        
        $title = $_POST['title'];
        $actors = $_POST['actors'];
        $director = $_POST['director'];
        $producer = $_POST['producer'];
        $year_of_prod = $_POST['year_of_prod'];
        $language = $_POST['language'];
        $category = $_POST['category'];
        $storyline = $_POST['storyline'];
        $video = $_POST['video'];
        
        $sql = "INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video)
    VALUES ($title, $actors, $director, $producer, $year_of_prod, $language, $category, $storyline, $video)";
        try{
            $conn->query($sql);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
<style>
#box
{
    width:350px;
    height:270px;
    margin:0px auto;
    border:2px solid black;
}
h2{
    text-align: center;
}
table{
    margin:0px auto;
}
</style>
</head>
<body>

	<form action="moviedb.php" method="post">
    	<h2>Add movies to our movie database!</h2>
    	<input type="text" name="title" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="text" name="actors" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="text" name="director" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="text" name="producer" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="number" name="year_of_prod" placeholder="YYYY" min="1700" max="2100">
    	<input type="text" name="language" >
    	<input type="text" name="category" >
    	<input type="text" name="storyline" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="text" name="video" pattern=".{5,}"   required title="5 characters minimum">
    	<input type="submit" name="submit" value="Done!">
    </form>
</body>
</html>