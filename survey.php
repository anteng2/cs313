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
	<script type="text/javascript">
	function handleClick(value)
	{
		var id = document.getElementById(value).value;
			
		if (id == "red")
		{
			document.getElementById("colorDisplayImg").innerHTML = "<img src=\"red.png\" />";
		}
		else if (id == "blue")
		{
			document.getElementById("colorDisplayImg").innerHTML = "<img src=\"blue.png\" />";
		}
		else if (id == "pork")
		{
			document.getElementById("meatDisplayImg").innerHTML = "<img src=\"pork.png\" />";
		}
		else if (id == "beef")
		{
			document.getElementById("meatDisplayImg").innerHTML = "<img src=\"beef.png\" />";
		}
		else if (id == "city")
		{
			document.getElementById("placeDisplayImg").innerHTML = "<img src=\"city.png\" />";
		}
		else if (id == "country")
		{
			document.getElementById("placeDisplayImg").innerHTML = "<img src=\"country.png\" />";
		}
		else if (id == "superman")
		{
			document.getElementById("heroDisplayImg").innerHTML = "<img src=\"superman.png\" />";
		}
		else if (id == "batman")
		{
			document.getElementById("heroDisplayImg").innerHTML = "<img src=\"batman.png\" />";
		}
	}
	</script>
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
	Red<input id="red" type="radio" name="color" value="red" onclick="handleClick('red');" />
	Blue<input id="blue" type="radio" name="color" value="blue" onclick="handleClick('blue');" />
	<div style="margin-top: 15px;" id="colorDisplayImg"></div>

	<p>2. What is better meat?</p>
	Beef<input id="beef" type="radio" name="meat" value="beef" onclick="handleClick('beef');" />
	Pork<input id="pork" type="radio" name="meat" value="pork" onclick="handleClick('pork');" />
	<div style="margin-top: 15px;" id="meatDisplayImg"></div>
	
	<p>3. What is better to live?</p>
	City<input id="city" type="radio" name="place" value="city" onclick="handleClick('city');" />
	Country<input id="country" type="radio" name="place" value="country" onclick="handleClick('country');" />
	<div style="margin-top: 15px;" id="placeDisplayImg"></div>
	
	<p>3. Who is your hero?</p>
	Batman<input id="batman" type="radio" name="hero" value="batman" onclick="handleClick('batman');" />
	Superman<input id="superman" type="radio" name="hero" value="superman" onclick="handleClick('superman');" />
	<div style="margin-top: 15px;" id="heroDisplayImg"></div>
	</br></br>
	
	<input type="submit" value="submit">
	</form>
</wrapper>
</body>
</html>