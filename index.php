<?php include ("connection.php");  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 0%;">
	<!-- Login Form-->
	<div class="col-sm-4" style=" height: 400px; float: left;border: 1px solid black;">
		<form action="" method="post">
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			</div>
			<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
			</div>
			<div class="form-group form-check">
			<label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="remember"> Remember me
			</label>
			</div>
			<button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <?php
        	if(isset($_POST["login"]))
        	{
        		extract($_POST);
        		$qry=mysqli_query($con,"SELECT * FROM `table1` WHERE email='$email' AND password='$password'");
        		$row=mysqli_fetch_array($qry);
        		if($row)
        		{
        			session_start();
        			$_SESSION["user"]=$email;
        			header("location:profile.php");
        			//echo "Suuuuu";
        		}
        		
        	}
        ?>
	</div>
	<!-- END Login Form-->

	<div class="col-sm-4" style="height: 650px; float: right;border: 1px solid black;">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="usr">Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="pwd">Email:</label>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="usr">Qualification:</label>
			</div>
			<div class="form-check-inline">
      			<label class="form-check-label" for="check1">
        		<input type="checkbox" class="form-check-input" id="check1" name="qualification[]" value="something1" checked>Option 1
      			</label>
    		</div>
    		<div class="form-check-inline">
      			<label class="form-check-label" for="check2">
        		<input type="checkbox" class="form-check-input" id="check2" name="qualification[]" value="something2">Option 2
      			</label>
    		</div>
    		<div class="form-check-inline">
      			<label class="form-check-label">
        		<input type="checkbox" class="form-check-input" id="check3" name="qualification[]" value="something3">Option 3
      			</label>
    		</div>

    		<div class="form-group">
				<label for="usr">Gender:</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
				<input type="radio" class="form-check-input" name="gender" value="Femail">Femail
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
				<input type="radio" class="form-check-input" name="gender" value="Mail">Mail
				</label>
			</div>
			<div class="form-check-inline disabled">
				<label class="form-check-label">
				<input type="radio" class="form-check-input" name="gender" disabled>Option 3
				</label>
			</div>
			<div class="form-group"style="margin-top: 20px;">
				<label for="pwd">DOB:</label>
				<input type="date" class="form-control" name="date">
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<label for="usr">File:</label>
			</div>
			<div class="form-group">
      			<input type="file" class="form-control-file border" name="pic" style="padding-top: -1%;">
    		</div>
    		<button type="submit" name="signup" class="btn btn-primary">Signup</button>

		</form>
	</div>
</div>
<?php
	if(isset($_POST["signup"]))
	{
		extract($_POST);
		$qualification=implode(",",$_POST["qualification"]);
		$pic=$_FILES["pic"]["tmp_name"];
		$destination="img/".$_FILES["pic"]["name"];
		if(move_uploaded_file($pic, $destination))
		{
			$pic=$_FILES["pic"]["name"];
		}
		$con=mysqli_connect("localhost","root","","demo");
		$qry=mysqli_query($con,"INSERT INTO `table1`(`name`, `email`, `password`,`qualification`, `gender`,`date`,`pic`,`path`) VALUES ('$name','$email','$password','$qualification','$gender','$date','$pic','$destination')");

	}

?>
</body>
</html>