<?php 

// connect to the database
	$conn = mysqli_connect('localhost', 'Ric', 'test1234', 'job');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}



?>