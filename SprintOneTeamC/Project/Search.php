<!DOCTYPE html>
<html lang="en">

<head>
    <title>First Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CssExample.css">

</head>

<body>

<div class="topnav" id="myTopnav">
    <a href="index.html">Home</a>
    <a href="http://localhost/Project/Display.php">Show Movies</a>
    <a href="http://localhost/Project/Search.php">Search</a>
	<a href="http://localhost/Project/Graph.html">Graph</a>
  	
    <i class="fa fa-bars"></i>
    </a>
  </div>
    <div class="row">
        <header class="col-lg-12 bg-info">
            <h1 class="col-lg-11 text-center">Movie Searcher</h1>
        </header>
    </div>
    
  

<?php
 
/*Connect to our MySQL database using the PDO extension.*/
$pdo = new PDO('mysql:host=localhost;dbname=movie', 'root', '');
/*Our select statement. This will retrieve the data that we want.*/
$sql = "SELECT Genre FROM movies GROUP BY Genre";
/*Prepare the select statement.*/
$stmt = $pdo->prepare($sql); 
/*Execute the statement.*/
$stmt->execute();
/**Retrieve the rows using fetchAll.*/
$genres = $stmt->fetchAll();
 
?>

<?php
$pdo1 = new PDO('mysql:host=localhost;dbname=movie', 'root', '');
$sql1 = "SELECT Year FROM movies GROUP BY Year";
$stmt1 = $pdo1->prepare($sql1); 
$stmt1->execute();
$years = $stmt1->fetchAll();
?>

<?php
$pdo2 = new PDO('mysql:host=localhost;dbname=movie', 'root', '');
$sql2 = "SELECT Rating FROM movies GROUP BY Rating";
$stmt2 = $pdo2->prepare($sql2); 
$stmt2->execute();
$ratings = $stmt2->fetchAll();
?>


        <main class="col-lg-10">
            <!-- 10 here  -->
            <h1>Search For A Movie</h1>
            <p></p>
            <form action="search.php" method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title">

                    <label for="genre">Genre:</label>
                    <select name="genre" id="genre">
                        <optgroup label="Genres">
                        <option value=""></option>
                        <?php foreach($genres as $Genre): ?>
                            <option value="<?= $Genre['Genre']; ?>"><?=$Genre['Genre']?></option>
                        <?php endforeach; ?>
                        </optgroup>
                    </select>

                    <label for="year">Year:</label>
                    <select name="year" id="year">
                        <optgroup label="Year">
                        <option value=""></option>
                        <?php foreach($years as $Year): ?>
                            <option value="<?= $Year["Year"]; ?>"><?=$Year["Year"]?></option>
                        <?php endforeach; ?>
                        </optgroup>
                    </select>

                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating">
                        <optgroup label="Rating">
                        <option value=""></option>
                        <?php foreach($ratings as $Rating): ?>
                            <option value="<?= $Rating['Rating']; ?>"><?=$Rating['Rating']?></option>
                        <?php endforeach; ?>
                        </optgroup>
                    </select>


                
                <button type="submit" name="submit" class="btn btn-default" value="Search">Search</button>
            </div>
            </form>



            <?php

            $sql = "";
            $sql2 = "";

            if (isset($_POST['submit'])) {
                $error_msg = "";
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $year = $_POST['year'];
                $rating = $_POST['rating'];

                if (!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND genre = '$genre'
                    AND year = '$year' AND rating = '$rating'";
                }

                if (!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND genre = '$genre'
                    AND year = '$year'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    rating = '$rating'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    year = '$year' AND rating = '$rating'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    genre = '$genre' AND rating = '$rating'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND rating = '$rating'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND year = '$year' AND rating = '$rating'";
                }

                if (!empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND genre = '$genre'
                    AND rating = '$rating'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['year']) && !empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND genre = '$genre'
                    AND rating = '$rating'";
                }

                if (!empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND genre = '$genre'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%' AND year = '$year'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    genre = '$genre' AND year = '$year'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title LIKE '%$title%'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT * FROM `movies` WHERE genre = '$genre'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT *  FROM `movies` WHERE year = '$year'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['year']) && empty($_POST['rating'])) {
                    $sql = "SELECT *  FROM `movies` WHERE year = '$year'";
                }


                if (empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['year']) && empty($_POST['rating'])) {
                    $error_msg = "Please Enter Something To Search!";
                }
                if (!empty($_POST['title'])) {
                    $sql2 = "UPDATE `movies` SET Frequency = `Frequency` + 1 WHERE Title = '$title'";
                }
                


                if (!empty($error_msg)) {
                    echo "<p>Error: </p>" . $error_msg;
                    echo "<p>Please go <a href='search.php'>back</a> 
                    and try again</p>";
                } else {


                    $submit = $_POST['submit'];

                    if ($submit == "Search") {
                        echo "<table style='border: solid 2px black;'>";
                        echo "<tr><th>ID</th><th>Title</th><th>Studio</th><th>Status</th><th>Sound</th>
                        <th>Versions</th><th>RecRetPrice</th><th>Rating</th><th>Year</th><th>Genre</th>
                        <th>Aspect</th><th>Frequency</th></tr>";

                        class TableRows extends RecursiveIteratorIterator
                        {
                            function __construct($it)
                            {
                                parent::__construct($it, self::LEAVES_ONLY);
                            }

                            function current()
                            {
                                return "<td style='width:300px;border:2px solid black;'>" . parent::current() . "</td>";
                            }

                            function beginChildren()
                            {
                                echo "<tr>";
                            }

                            function endChildren()
                            {
                                echo "</tr>" . "\n";
                            }
                        }

                        $servername = "localhost";
                        $dbname = "movies";
                        $username = "root";
                        $password = "";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                                echo $v;
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        echo "</table>";
                        if (!empty($_POST['title'])) {
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare($sql2);
                                $stmt->execute();
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            $conn = null;
                        }
                    }
                }
            }
            ?>
        </main>
    </div> 

</body>

</html>