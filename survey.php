<?php
	session_start();

	if (isset($_SESSION['color']))
	{
		header("location: surveyResult.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>What is your idea?</title>
  <link rel="stylesheet" type="text/css" href="css/survey.css">
</head>
<body>
	<div class="wrapper">
	<h1>SURVEY</h1>
	<p>Please vote below questions.</p>

	<form action="surveyResult.php" method="POST">
	<p>1. What is better color?</p>
	Red<input id="red" type="radio" name="color" value="red" />
	Blue<input id="blue" type="radio" name="color" value="blue" />


	<p>2. What is better meat?</p>
	Beef<input id="beef" type="radio" name="meat" value="beef" />
	Pork<input id="pork" type="radio" name="meat" value="pork" />

	<p>3. What is better to live?</p>
	City<input id="city" type="radio" name="place" value="city" />
	Country<input id="country" type="radio" name="place" value="country" />

	<p>3. Who is your hero?</p>
	Batman<input id="batman" type="radio" name="hero" value="batman" />
	Superman<input id="superman" type="radio" name="hero" value="superman" />

	</br></br>
	
	<input type="submit" value="submit">
	</form>
</wrapper>
</body>
</html>