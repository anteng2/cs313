<?php
include('openshift.php');

session_start();
	
	$id = $_GET['id'];
	
	$stmt = $db->prepare("SELECT * FROM room WHERE id=$id");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$userId = $row['u_id'];
	$stmt = $db->prepare("SELECT userName FROM user WHERE id=$userId");
	$stmt->execute();
	$userId = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if (isset($_POST['image1']))
	{
		$img1Id = $_POST['image1'];
		$stmt0 = $db->prepare("SELECT numVote FROM picture WHERE id=$img1Id");
		$stmt0->execute();
		$row0 = $stmt0->fetch(PDO::FETCH_ASSOC);
		
		$numVote = $row0['numVote'];
		
		$numVote += 1;
		

		$stmt0 = $db->prepare("UPDATE picture SET numVote='$numVote' WHERE id='$img1Id'");
		$stmt0->execute();
		
		
	}
	
	if (isset($_POST['image2']))
	{
		$img2Id = $_POST['image2'];
		$stmt0 = $db->prepare("SELECT numVote FROM picture WHERE id=$img2Id");
		$stmt0->execute();
		$row0 = $stmt0->fetch(PDO::FETCH_ASSOC);
		
		$numVote = $row0['numVote'];
		
		$numVote += 1;

		$stmt0 = $db->prepare("UPDATE picture SET numVote='$numVote' WHERE id='$img2Id'");
		$stmt0->execute();
		
		
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
					<?php 
						$picId1 = $row['picId1'];
						$picId2 = $row['picId2'];
						
						$stmt = $db->prepare("SELECT * FROM picture WHERE id=$picId1");
						$stmt->execute();
						$picture1 = $stmt->fetch(PDO::FETCH_ASSOC);
						
						$stmt = $db->prepare("SELECT * FROM picture WHERE id=$picId2");
						$stmt->execute();
						$picture2 = $stmt->fetch(PDO::FETCH_ASSOC);
					?>
				<form action="view_poll.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<input type="image" name="image1" value="<?php echo $picId1; ?>" style="width: 569px; height: 350px" src="<?php echo $picture1['url']; ?>" alt="">
					<h3><?php echo $row['option_title1']; ?> <span class="pull-right"><b>Vote:</b> <?php echo $picture1['numVote']; ?></span></h3>
					<p><?php echo $row['option1_content']; ?></p>
				</div>
				<div class="col-lg-6">
					<input type="image" name="image2" value="<?php echo $picId2; ?>" style="width: 569px; height: 350px" src="<?php echo $picture2['url']; ?>" alt="">
					<h3><?php echo $row['option_title2']; ?> <span class="pull-right"><b>Vote:</b> <?php echo $picture2['numVote'];  ?></span></h3>
					<p><?php echo $row['option2_content']; ?></p>
				</div>
				</form>
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
