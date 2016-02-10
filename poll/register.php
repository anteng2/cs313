<?php
    include('openshif.php');

	
	if (isset($_POST['formsubmitted'])) {
    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['name'])) {//if no name has been supplied 
        $error[] = 'Please Enter a name ';//add to array "error"
    } else {
        $name = $_POST['name'];//else assign it a variable
    }
	    if (empty($_POST['userName'])) {//if no name has been supplied 
        $error[] = 'Please Enter a name ';//add to array "error"
    } else {
        $userName = $_POST['userName'];//else assign it a variable
    }
	
    if (empty($_POST['e-mail'])) {
        $error[] = 'Please Enter your Email ';
    } else {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression for email validation
		  
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

    if (empty($error)) //send to Database if there's no error '
    { // If everything's OK...

		$query = 'SELECT * FROM user WHERE email = :email';
		$statement = $db->prepare($query);
		$statement->bindParam(':email', $Email);
		$statement->execute();
		$count = $statement->rowCount();
	
        if (!$statement) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if ($count == 0) { // IF no previous user is using this email
			$query2 = 'INSERT INTO user (name, userName, email, password) VALUES (:name, :userName, :email, :password)';
			$statement2 = $db->prepare($query2);
			$statement2->bindParam(':name', $name);
			$statement2->bindParam(':userName', $userName);
			$statement2->bindParam(':email', $Email);
			$statement2->bindParam(':password', $Password);
			$statement2->execute();
           
			$count2 = $statement2->rowCount();
		   	$row2 = $statement2->fetch(PDO::FETCH_ASSOC);
         
            if (!$statement2) {
                echo 'Query Failed ';
            }
			
            if ($count2 == 1) { //If the Insert Query was successfull.
	
            header("Location: index.php");
                // Finish the page:
                echo '<div class="success">Thank you for
registering!  </div>';

         header("refresh:3;url=index.php");
            } else { // If it did not run OK.
                echo '<div class="errormsgbox">You could not be registered due to a system
error. We apologize for any
inconvenience.</div>';
            }

        }else { // The email address is not available.
            echo '<div class="errormsgbox" >That email
address has already been registered.
</div>';
        }
    } else {//If the "error" array contains error msg , display them

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }

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
      <form  action="register.php" method="POST" class="form-signin">
        <h2 class="form-signin-heading">New Account</h2>
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
		<label for="userName" class="sr-only">User Name</label>
        <input type="text"  name="userName" id="userName" class="form-control" placeholder="User Name" required>
        <label for="e-mail" class="sr-only">Email Address</label>
        <input type="text" name="e-mail" id="e-mail" class="form-control" placeholder="Email address" required>
		<label for="password" class="sr-only">Password</label>
        <input type="password" name="Password" id="password" class="form-control" placeholder="Password" required>
		<input type="hidden" name="formsubmitted" value="TRUE" />
		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>