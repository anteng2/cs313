<?php
session_start();

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
  <body data-spy="scroll" data-offset="0" data-target="#navigation">
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
	            <li class="active"><a href="#home" class="smothscroll">Home</a></li>
	            <li><a href="poll.php" class="smothscroll">Polls</a></li>
				<?php if (isset($_SESSION['name'])) { ?>
				<?php $name = $_SESSION['name']; ?>
				<li><a href="write_poll.php">Create a Poll</a></li>
				<li><a href="logout.php"><b><?php echo $name; ?></b></a></li>
				<?php } else { ?>
				 <li><a href="signin.php" class="smothScroll">Sign in</a></li>
				 <li><a href="register.php" class="smothScroll">Sign up</a></li>
				<?php } ?>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	<section id="home" name="home"></section>
	<div id="headerwrap">
	    <div class="container">
	    	<div class="row centered">
	    		<div class="col-lg-12">
					<h1>Welcome To <b>Fifty-Fifty</b></h1>
					<h3>Pick one for me!</h3>
					<br>
	    		</div>
	    		<div class="col-lg-2">
	    			<h5>Amazing Results</h5>
	    			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	    			<img class="hidden-xs hidden-sm hidden-md" src="assets/img/arrow1.png">
	    		</div>
	    		<div class="col-lg-8">
	    			<img class="img-responsive" src="assets/img/app-bg.png" alt="">
	    		</div>
	    		<div class="col-lg-2">
	    			<br>
	    			<img class="hidden-xs hidden-sm hidden-md" src="assets/img/arrow2.png">
	    			<h5>Fun Polls</h5>
	    			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	    		</div>
	    	</div>
	    </div> <!--/ .container -->
	</div><!--/ #headerwrap -->
	
	<?php
		$stmt = $db->prepare("SELECT * FROM room");
		$stmt->execute();
	?>
	
	<section id="desc" name="desc"></section>
	<!-- INTRO WRAP -->
	<div id="intro">
		<div class="container">
			<div class="row centered">
				<h1>Hot Polls</h1>
				<br>
				<br>
			<?php for ($i = 0; $i < 3; $i++) { ?>
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
			<br>
			<hr>
			<div class="row centered">
				<h1>Closing Soon</h1>
				<br>
				<br>
				<?php for ($i = 0; $i < 3; $i++) { ?>
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
			<br>
			<hr>
			<div class="row centered">
				<h1>Newest</h1>
				<br>
				<br>
				<?php for ($i = 0; $i < 3; $i++) { ?>
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
			<br>
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
