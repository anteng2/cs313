<?php
	session_start();
	$red_count = null;
	$blue_count = null;
	$beef_count = null;
	$pork_count = null;
	$city_count = null;
	$country_count = null;
	$batman_count = null;
	$superman_count = null;

	$file = "results.txt";
	$fdata = file_get_contents($file);  //read file date
	$votes = explode(PHP_EOL, $fdata);
	

	if (isset($_POST['color']) && !empty($_POST['color']))
	{
		$_SESSION['color'] = $_POST['color'];
		if ($_POST['color'] == "red")
			$votes[0] = intval($votes[0]) + 1;
		else
			$votes[1] = intval($votes[1]) + 1;
	} 

	if (isset($_POST['meat']) && !empty($_POST['meat']))
	{
		if ($_POST['meat'] == "beef")
			$votes[2] = intval($votes[2]) + 1;
		else
			$votes[3] = intval($votes[3]) + 1;
	} 

	if (isset($_POST['place']) && !empty($_POST['place']))
	{
		if ($_POST['place'] == "city")
			$votes[4] = intval($votes[4]) + 1;
		else
			$votes[5] = intval($votes[5]) + 1;
	} 

	if (isset($_POST['hero']) && !empty($_POST['hero']))
	{
		if ($_POST['hero'] == "batman")
			$votes[6] = intval($votes[6]) + 1;
		else
			$votes[7] = intval($votes[7]) + 1;
	} 

	$allData = null;

	for ($i=0; $i<8; $i++)
	{
		$allData .= strval($votes[$i]) . PHP_EOL;
	}

	file_put_contents($file, $allData);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Survey Result</title>
  <link rel="stylesheet" type="text/css" href="css/survey.css">
</head>

<body>
	<div class="wrapper">
	<h1>Survey Results:</h1>
	<h2>Color: </h2>
	<p>Red: <?php echo $votes[0]; ?></p>
	<p>Blue: <?php echo $votes[1]; ?></p>
	<h2>Meat:</h2>
	<p>Beef: <?php echo $votes[2]; ?></p>
	<p>Pork: <?php echo $votes[3]; ?></p>
	<h2>Place:</h2>
	<p>City: <?php echo $votes[4]; ?></p>
	<p>Country: <?php echo $votes[5]; ?></p>
	<h2>Hero:</h2>
	<p>Batman: <?php echo $votes[6]; ?></p>
	<p>Superman: <?php echo $votes[7]; ?></p>
</div>
</body>
</html>