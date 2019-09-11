<?php
include("connection.php");
session_start();
if(!isset($_SESSION["user"]))
{
	header("location:index.php");
}
$email=$_SESSION["user"];
$qry=mysqli_query($con,"SELECT * FROM `table1` WHERE email='$email'");
$row=mysqli_fetch_array($qry);
extract($row);
?>
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
	<div class="container">
		<div class="col-md-4" style="height: 400px; border: 1px solid black;float: left;">
			<?php echo "<img src='img/$pic' style='width:352px; height:400px;'>"; ?>
		</div>
		<div class="col-md-4" style="height: 400px; border: 1px solid black;float: right;">
			<div class="col-sm-4" style="float: left;border: 1px solid black; text-align: center; margin-top: 20px;">Name</div>
			<div class="col-sm-8" style="float: right;border: 1px solid black;text-align: center;margin-top: 20px;"><?php echo $name;  ?></div>

			<div class="col-sm-4" style="float: left;border: 1px solid black; text-align: center;margin-top: 20px;">Email</div>
			<div class="col-sm-8" style="float: right;border: 1px solid black;text-align: center;margin-top: 20px;"><?php echo $email;  ?></div>

			<div class="col-sm-4" style="float: left;border: 1px solid black; text-align: center;margin-top: 20px;">Gender</div>
			<div class="col-sm-8" style="float: right;border: 1px solid black;text-align: center;margin-top: 20px;"><?php echo $gender;  ?></div>

			<div class="col-sm-4" style="float: left;border: 1px solid black; text-align: center;margin-top: 20px;">Qualification</div>
			<div class="col-sm-8" style="float: right;border: 1px solid black;text-align: center;margin-top: 20px;"><?php echo $qualification;  ?></div>

			<div class="col-sm-4" style="float: left;border: 1px solid black; text-align: center;margin-top: 20px;">DOB</div>
			<div class="col-sm-8" style="float: right;border: 1px solid black;text-align: center;margin-top: 20px;"><?php echo $date;  ?></div>

			<div class="col-sm-12">
				<a href="edit.php?id=<?php echo $id; ?>" class="btn btn-info" role="button" style="margin-top: 20px; margin-left: 40%;">Edit</a>
			</div>
		</div>
	</div>
</body>
</html>