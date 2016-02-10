<?php
include('openshift.php');

	
	$id = $_GET['id'];
	
	$stmt = $db->prepare("SELECT * FROM room WHERE id=$id");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$userId = $row['u_id'];
	$stmt = $db->prepare("SELECT userName FROM user WHERE id=$userId");
	$stmt->execute();
	$userId = $stmt->fetch(PDO::FETCH_ASSOC);
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
	            <li class="active"><a href="poll.php" class="smothscroll">Polls</a></li>
	            <li><a href="" class="smothScroll">Sign up</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	<!-- INTRO WRAP -->
	<div>
		<div class="container">
			<div class="row">
				<h1>
					<?php echo $row['title']; ?> <span class="pull-right"><?php echo $userId['userName']; ?></span><br />
				</h1>
				<hr />
				<br>
				<div class="col-lg-6">
					<img src="assets/img/intro01.png" alt="">
					<h3><?php echo $row['option_title1']; ?></h3>
					<p><?php echo $row['option1_content']; ?></p>
				</div>
				<div class="col-lg-6">
					<img src="assets/img/intro01.png" alt="">
					<h3><?php echo $row['option_title2']; ?></h3>
					<p><?php echo $row['option2_content']; ?></p>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-12">
					<h3><b>Description</b></h3>
					<p>
						<?php echo $row['content']; ?>
					</p>
				</div>	
				</div>
			</div>					
	    </div> <!--/ .container -->
	</div><!--/ #introwrap -->
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
