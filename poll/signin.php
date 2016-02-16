<?php
include('openshift.php');

	if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
	session_start();
    $error = array();//this aaray will store all error messages

    if (empty($_POST['e-mail'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    } else {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           
            $Email = $_POST['e-mail'];
			
        } else {
             $error[] = 'Your EMail Address is invalid  ';
        }
    }

    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }

    if (empty($error))//if the array is empty , it means no error found
    { 
       	$query = 'SELECT * FROM user WHERE (email=:email AND password=:password)';
		$statement = $db->prepare($query);
		$statement->bindParam(':email', $Email);
		$statement->bindParam(':password', $Password);
		$statement->execute();
		$count = $statement->rowCount();
		
        if(!$statement){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if ($count == 1)//if Query is successfull 
        { // A match was made.
            $_SESSION = $statement->fetch(PDO::FETCH_ASSOC);
           
            header("Location: index.php");
        }else
        { 
            $msg_error= 'Email address /Password is Incorrect';
        }

    }  else {
		echo '<div class="errormsgbox"> <ol>';
				foreach ($error as $key => $values) {
					
					echo '	<li>'.$values.'</li>';
				}
				echo '</ol></div>';
	}
    
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    /// var_dump($error);

} // End of the main Submit conditional.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <form class="form-signin" action="signin.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="e-mail" class="sr-only">Email address</label>
        <input type="email" id="e-mail" name="e-mail" class="form-control" placeholder="Email address" required autofocus>
        <label for="Password" class="sr-only">Password</label>
        <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
		<input type="hidden" name="formsubmitted" value="TRUE" />
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
      </form>
    </div> <!-- /container -->
	<div id="createAnAccount">
		<a href="register.php">Create an account</a>
	</div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>