<?php 
	include('db_connection.php');
	$sql='SELECT id,username,feedback FROM feedbacks';
	$result=mysqli_query($conn,$sql);
	$feedback=mysqli_fetch_all($result,MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungry Hippo Feedbacks</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 align="center" style="color: white">
	Hungry Hippo Feedbacks!
</h1>
<br/>
<center><a href="sample.php" style="color: white">Give Feedback</a></center>
<br/>
<h3 style="color: white; padding-left: 10px" >Given Feedbacks:</h3><br/>
<div style="padding: 20px">
	<?php foreach ($feedback as $key) {	 ?>
		<div style="background-color: white;padding: 20px">
			<h4>Given By: <?php echo htmlspecialchars($key['username']); ?></h4><br/>
			<h4>Feedback : <?php echo htmlspecialchars($key['feedback']) ?></h4><br/>
			<a href="details.php?id=<?php echo $key['id'] ?>">More Info</a>
		</div>
		<br/>
	<?php } ?>
</div>

</body>
</html>