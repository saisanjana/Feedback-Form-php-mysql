<?php
include 'db_connection.php';
$errors= array('a'=>'','b'=>'','c'=>'','d'=>'');
$username='';
$password='';
$nation='';
$feedback='';
if(isset($_POST['submit'])){
	if(empty($_POST['a'])){
		$errors['a']='Username cant be empty!';
	}else{
		$username=$_POST['a'];
		if(!preg_match('/[a-zA-z\s\d]+$/', $username)){
			$errors['a']='Check username!';
		}
	}
	if(empty($_POST['b'])){
		$errors['b']='Password cant be empty!';
	}else{
		$password=$_POST['b'];
		
	}
	if(empty($_POST['c'])){
		$errors['c']='Nationality cant be empty!';
	}else{
		$nation=$_POST['c'];
		if(!preg_match('/[a-zA-z\s\d]+$/', $nation)){
			$errors['c']='Check Nationality!';
		}
	}
	if(empty($_POST['d'])){
		$errors['d']='feedback cant be empty!';
	}else{
		$feedback=$_POST['d'];
		if(!preg_match('/[a-zA-z\s\S]+$/', $feedback)){
			$errors['d']='Check feedback!';
		}
	}
	if(array_filter($errors)){
		echo "errors";
	}else{
		$username=mysqli_real_escape_string($conn,$_POST['a']);
		$password=mysqli_real_escape_string($conn,$_POST['b']);
		$nation=mysqli_real_escape_string($conn,$_POST['c']);
		$feedback=mysqli_real_escape_string($conn,$_POST['d']);
		$sql= "INSERT INTO feedbacks(username,password,nation,feedback) VALUES('$username','$password','$nation','$feedback')";
		//save to db and check
		if(mysqli_query($conn,$sql)){
			header('Location:index.php');
		}
		else{
			//error
			echo "Query error" . mysqli_error($conn);
		}

		
	}
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<h1>HUNGRY HIPPO RESTAURANT<br>Feedback Form</h1>
<font font-size="15" align=center>
<form  action="sample.php" method="POST">
USERNAME:<br><input name="a" type="text" value= <?php echo "$username"; ?>   ><br><br>
<div style="color: red"> <?php echo $errors['a'] ?> </div>
PASSWORD:<br><input name="b" type="password"><br><br>
<div style="color: red"> <?php echo $errors['b'] ?> </div>
NATIONALITY:<br><input name="c" type="text" value= <?php echo "$nation"; ?>><br><br>
<div style="color: red"> <?php echo $errors['c'] ?> </div>
FEEDBACK:<br>
<textarea name="d" row="5" col="20" value= <?php echo "$feedback"; ?> ></textarea><br><br>
<div style="color: red"> <?php echo $errors['d'] ?> </div>
<input type="submit" value="SUBMIT" name="submit">
<input type="reset" >
</form>
</font>


</body>
</html>