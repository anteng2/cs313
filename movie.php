<!DOCTYPE html>
<html>
 <head>
    
  </head>
	<body>
		   <h1>Movies title</h1>
<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=movies', 'movieGuy', 'password!');

$queryString = 'SELECT a.firstName, a.lastName,m.title FROM actorMovie am JOIN actor a ON am.actorId = a.id JOIN movie m ON am.movieId = m.id';

foreach ($db->query($queryString) as $row)
{
    echo $row["firstName"] . "<br />";
}
?>
	</body>
</html>