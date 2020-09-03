<?php 
	 
	 $conn=mysqli_connect('localhost','sanjana','1234','hungy hippo');
	//check connection
	if(!$conn){
		echo "Connecion error" . mysql_connect_error();
	}

 ?>