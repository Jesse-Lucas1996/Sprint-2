<!DOCTYPE html>
<html lang="en" width = "100%" height = "100%">

<head>
    <title>Search Page</title>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width = 100%">
    <link rel="stylesheet" href="CssExample.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	 


        <main class="col-lg-10">
            <!-- 10 here  -->
      
       
<?php

echo "<table style='border: solid 2px black;'>";
echo '<table class="table-striped table-bordered table-responsive table">';
echo "<tr><th>ID</th><th>Title</th><th>Studio</th><th>Status</th><th>Sound</th><th>Versions</th><th>RecRetPrice</th><th>Rating</th><th>Year</th><th>Genre</th><th>Aspect</th><th>Frequency</th></tr>";
class TableRows extends RecursiveIteratorIterator {
 

    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current() {
        return "<td style='width:150px;border:1px solid black;'> " . parent::current(). "</td> ";
    }
    function beginChildren() {
        echo "<tr> ";
    }
    function endChildren() {
        echo "</tr> " . "\n";
    }
	function responsive(){
	echo '</table> width 100%';
	}
	
} 
$username = 'root';
$password = '';
try 
{
$conn = new PDO('mysql:host=localhost;dbname=movie', $username, $password); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare('SELECT * FROM `movies` WHERE 1');
$stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchall())) as $k=>$v) {
        echo $v;
}
}

catch(PDOException $e) 
{
  echo 'ERROR: ' . $e->getMessage();
}
$conn = null;



?>

      </main>
    </div> 

</body>

</html>