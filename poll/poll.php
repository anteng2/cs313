<?php
include('openshift.php');
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
	            <li class="active"><a href="" class="smothscroll">Polls</a></li>
	            <li><a href="" class="smothScroll">Sign up</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
			<?php
		$stmt = $db->prepare("SELECT * FROM room");
		$stmt->execute();
	?>
	<!-- INTRO WRAP -->
	<div>
		<div class="container">
			<div class="row">
				<h1>Polls</h1>
				<br>
			<?php for ($i = 0; $i < 11; $i++) { ?>
			<?php $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
			<a href="view_poll.php?id=<?php echo $row['id']; ?>">
					<div class="col-lg-4">
						<img src="assets/img/intro01.png" alt="">
						<h3><?php echo $row['title']; ?></h3>
						<p><?php echo $row['content']; ?></p>
					</div>
				</a>
			<?php } ?>
			</div>			
	    </div> <!--/ .container -->
	</div><!--/ #introwrap -->
	<div id="c">
		<div class="container">
			<p>Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>
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
