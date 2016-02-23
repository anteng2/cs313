<?php
include('openshift.php');

session_start();

	
	if (isset($_POST['title']))
	{
		$u_id = $_SESSION['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$optionOneTitle = $_POST['optionOneTitle'];
		$optionTwoTitle = $_POST['optionTwoTitle'];
		$optionOneContent = $_POST['optionOneContent'];
		$optionTwoContent = $_POST['optionTwoContent'];
		$optionOneURL = $_POST['optionOneURL'];
		$optionTwoURL = $_POST['optionTwoURL'];
		
		$stmt = $db->prepare("INSERT INTO picture (url) VALUES (:optionOneURL), (:optionTwoURL)");
		$stmt->bindParam(':optionOneURL', $optionOneURL);
		$stmt->bindParam(':optionTwoURL', $optionTwoURL);
		$stmt->execute();
		
		$lastId = $db->lastInsertId();
		$lastId2 = $db->lastInsertId() + 1;

		echo $lastId;
		$stmt = $db->prepare("INSERT INTO room (title, content, picId1, picId2, u_id, option_title1, option_title2, option1_content, option2_content) VALUES 
		(:title, :content, :lastId, :lastId2, :u_id, :optionOneTitle, :optionTwoTitle, :optionOneContent, :optionTwoContent)");
		
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':content', $content);
		$stmt->bindParam(':lastId', $lastId2);
		$stmt->bindParam(':lastId2', $lastId);
		$stmt->bindParam(':u_id', $u_id);
		$stmt->bindParam(':optionOneTitle', $optionOneTitle);
		$stmt->bindParam(':optionTwoTitle', $optionTwoTitle);
		$stmt->bindParam(':optionOneContent', $optionOneContent);
		$stmt->bindParam(':optionTwoContent', $optionTwoContent);
		
		$stmt->execute();
		
		$lastId = $db->lastInsertId();
		
		header("Location: view_poll.php?id=$lastId"); 
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
    <meta name="author" content="Alvarez.is - BlackTie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Fifty-Fifty - Your Ideal</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script>
		function option1()
		{
			var value = document.getElementById("optionOneURL").value;
			
			if (value)
			{
				var html = "<img style=\"width: 569px; height: 350px; margin-top: 15px; margin-bottom: 10px;\" src=\"";
				document.getElementById("pic1").innerHTML = html + value + '\">';
			}
			else
			{
				document.getElementById("pic1").innerHTML = "";
			}
		}
		
		function option2()
		{
			var value = document.getElementById("optionTwoURL").value;
			
			if (value)
			{
				var html = "<img style=\"width: 569px; height: 350px; margin-top: 15px; margin-bottom: 10px;\" src=\"";
				document.getElementById("pic2").innerHTML = html + value + '\">';
			}
			else
			{
				document.getElementById("pic2").innerHTML = "";
			}
		}
	</script>

  </head>

  <body>
    <!-- Fixed navbar -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.php"><b>Fifty-Fifty</b></a>
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="index.php" class="smothscroll">Home</a></li>
	            <li><a href="poll.php" class="smothscroll">Polls</a></li>
				<?php if (isset($_SESSION['name'])) { ?>
				<?php $name = $_SESSION['name']; ?>
				<li class="active"><a href="write_poll.php">Create a Poll</a></li>
				<li><a href="logout.php"><b><?php echo $name; ?></b></a></li>
				<?php } else { ?>
				 <li><a href="signin.php" class="smothScroll">Sign in</a></li>
				 <li><a href="register.php" class="smothScroll">Sign up</a></li>
				<?php } ?>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	<!-- INTRO WRAP -->
		<div class="container">
			<div class="row">
				<h1>Create a Poll</h1>
				<br>	
				<form action="write_poll.php" method="POST">
					<label for="title">Poll Title</label><br />
					<input type="text" class="form-control" id="title" name="title" required="required"/>
					<label for="content">Content</label><br />
					<textarea type="text" class="form-control" id="content" name="content" required="required"/></textarea>
			<div class="row">
					<div class="col-md-6">
						<label for="optionOneTitle">Option 1 Title</label><br />
						<input type="text" class="form-control" id="optionOneTitle" name="optionOneTitle" required="required" />
					</div>
					<div class="col-md-6">
						<label for="optionTwoTitle">Option 2 Title</label><br />
						<input type="text" class="form-control" id="optionTwoTitle" name="optionTwoTitle" required="required" />
					</div>
			</div>
			<div class="row">
					<div id="pic1" class="col-md-6">
					</div>
					<div id="pic2" class="col-md-6">
					</div>
			</div>
			<div class="row">
					<div class="col-md-6">
						<label for="optionOneURL">Option 1 Photo URL</label><br />
						<input type="text" class="form-control" id="optionOneURL" onchange="option1()" name="optionOneURL" required="required" />
					</div>
					<div class="col-md-6">
						<label for="optionTwoURL">Option 2 Photo URL</label><br />
						<input type="text" class="form-control" id="optionTwoURL" onchange="option2()" name="optionTwoURL" required="required" />
					</div>
			</div>
			<div class="row">
			<div class="col-md-6">
					<label for="optionOneContent">Option 1 Content</label><br />
					<textarea type="text" class="form-control" id="optionOneContent" name="optionOneContent" required="required" ></textarea>
					</div>
					<div class="col-md-6">
					<label for="optionTwoContent">Option 2 Content</label><br />
					<textarea  type="text" class="form-control" id="optionTwoContent" name="optionTwoContent" required="required" ></textarea>
					</div>
			</div>	
				<br />
				<input type="submit" value="Create a Poll" class="form-control btn btn-primary"/>
				</form>
			</div>		
		</div>			
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
	<script>
	$('.carousel').carousel({
	  interval: 3500
	})
	</script>
  </body>
</html>
