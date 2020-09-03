<?php 
	include 'db_connection.php';
	if(isset($_POST['id_to_delete'])){
		$id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
		$sql="DELETE FROM feedbacks WHERE id=$id_to_delete";
		if(mysqli_query($conn,$sql)){
			header('Location:index.php');
		}else{
			echo "Query error" . mysqli_error($conn);
		}
	}
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$sql="SELECT * FROM feedbacks WHERE id=$id";
		$result=mysqli_query($conn,$sql);
		$feed = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($conn);
		
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback detail page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 align="center" style="color: white">Hungry Hippo Feedbacks</h1>
	<hr/>
<div align="center" style="color: white;padding: 20px;">
	<h3>   Feedback Details:  </h3>
	<?php if($feed): ?>
	<h4> Username : <?php echo $feed['username']; ?></h4>
	<h4> Nationality : <?php echo $feed['nation']; ?></h4>
	<h4> Feedback : <?php echo $feed['feedback']; ?></h4>
	<h4> Given at : <?php echo $feed['time']; ?></h4>
	<!-- Delete form -->
	<form action="details.php" method="POST">
		<input type="hidden" name="id_to_delete" value=" <?php echo $feed['id'] ?>">
		<input type="submit" name="Delete" value="Delete">
	</form>
	<?php else: ?>
		<h2>No such feedback available.....!!</h2>
	<?php endif; ?>



	
</div>
</body>
</html>