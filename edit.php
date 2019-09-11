<?php
include("connection.php");
session_start();
if(!isset($_SESSION["user"]))
{
	header("location:index.php");
}
echo $id=$_REQUEST['id'];
$email=$_SESSION["user"];
$qry=mysqli_query($con,"SELECT * FROM `table1` WHERE email='$email'");
$row=mysqli_fetch_array($qry);
extract($row);
$a=$row["qualification"];
$b=explode(",",$a);
//print_r($b);
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
<div class="container" style="margin-top: 0%;">

	<div class="col-sm-4" style="height: 650px;border: 1px solid black;">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="usr">Name:</label>
				<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="pwd">Email:</label>
				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
			</div>
			
			<div class="form-group">
				<label for="usr">Qualification:</label>
			</div>
			<div class="form-check-inline">
      			<label class="form-check-label" for="check1">
        		<input type="checkbox" class="form-check-input" id="check1" name="qualification[]" value="something1" 

					<?php 
					if(in_array("something1",$b))
					{
					echo "checked";
					}

					?>

        		>Option 1
      			</label>
    		</div>
    		<div class="form-check-inline">
      			<label class="form-check-label" for="check2">
        		<input type="checkbox" class="form-check-input" id="check2" name="qualification[]" value="something2"
					<?php 
					if(in_array("something2",$b))
					{
					echo "checked";
					}

					?>

        		>Option 2
      			</label>
    		</div>
    		<div class="form-check-inline">
      			<label class="form-check-label">
        		<input type="checkbox" class="form-check-input" id="check3" name="qualification[]" value="something3"
        		<?php 
					if(in_array("something3",$b))
					{
					echo "checked";
					}

					?>

        		>Option 3
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
				<input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
			</div>
			<!-- <div class="form-group" style="margin-top: 20px;">
				<label for="usr">File:</label>
			</div>
			<div class="form-group">
      			<input type="file" class="form-control-file border" name="pic" style="padding-top: -1%;">
    		</div> -->
    		<button type="submit" name="update" class="btn btn-primary">Signup</button>

		</form>
	</div>
</div>
<?php
	if(isset($_POST["update"]))
	{
		extract($_POST);
		// $qualification=implode(",",$_POST["qualification"]);
		// $pic=$_FILES["pic"]["tmp_name"];
		// $destination="img/".$_FILES["pic"]["name"];
		// if(move_uploaded_file($pic, $destination))
		// {
		// 	$pic=$_FILES["pic"]["name"];
		// }
	    $qualification=implode(",",$_POST['qualification']);
		$con=mysqli_connect("localhost","root","","demo");
		$qry=mysqli_query($con,"UPDATE `table1` SET `name`='$name',`email`='$email',`gender`='$gender',`date`='$date',`qualification`='$qualification' WHERE id='$id'");
		header("location:profile.php");

	}

?>
</body>
</html>